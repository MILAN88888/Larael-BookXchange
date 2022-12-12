<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class UserController extends Controller
{
    public function getSignin(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        $result = DB::table('register')->where(['user_email' => $email])->first();
        if ($result) {
            if (Hash::check($password, $result->password)) {
                $request->session()->put('user_login', true);
                $request->session()->put('user_id', $result->id);
                $request->session()->put('user_name', $result->user_name);
                return redirect('bookXchange/dashboard');
            } else {
                $request->session()->flash('signinerror', 'Invalid Credintial');
                return redirect('/bookXchange/signin');
            }
        } else {
            $request->session()->flash('signinerror', 'Email doesnot exist!!');
            return redirect('/bookXchange/signin');
        }
    }

    public function logout()
    {
        // $request->session()->flush();
        session()->forget('user_login');
        session()->forget('user_id');
        session()->forget('user_name');
        session()->put('msg', 'Logout Successfully');
        return redirect('/bookXchange');
    }

    /**
     * Function myAccountDetial
     * 
     * @return array array of details.
     */
    public function myAccountDetail()
    {
        $users = DB::table('register')
            ->select('*')->where(['id' => session('user_id')])
            ->first();
        return $users;
    }
    /**
     * Function myaccount
     */
    public function myaccount()
    {
        $accDetail = $this->myAccountDetail();
        return view('header') . view('myaccount', ['acdetail' => $accDetail]) . view('footer');
    }
    /**
     * Function isEmailExist
     * 
     * @param $email is user email.
     * 
     * @return int number of email present.
     */
    public function isEmailExist(string $email): int
    {
        $result = DB::table('register')->where(['user_email' => $email])->count();
        return $result;
    }

    /**
     * Function isPhoneExist
     * 
     * @param $phone is user email.
     * 
     * @return int number of phone no. present.
     */
    public function isPhoneExist(string $phone): int
    {
        $res = DB::table('register')->where(['mobile_no' => $phone])->count();
        return $res;
    }


    /**
     * Function getSignUp 
     * 
     * @return mixed targeted to getSignin and then dashboard.
     */
    public function getSignUp(Request $request)
    {
        $firstName = $request->post('firstname');
        $lastName = $request->post('lastname');
        $userName = "$firstName $lastName";
        $email = $request->post('email');
        $phone = $request->post('phone');
        $address = $request->post('address');
        $password = $request->post('password');
        $confirmPass = $request->post('passwordConfirmation');
        $newUserImage = 'user_image.jpg';
        if ($request->hasFile('user_img')) {
            if ($request->file('user_img')->getSize() > 0) {
                $image = $request->user_img;
                $userImage = $image->getClientOriginalName();
                $imgType = $image->getClientOriginalExtension();
                $randomno = rand(0, 100000);
                $generateName = 'user' . date('Ymd') . $randomno;
                $generateUserImage = $generateName . '.' . $imgType;
                $desImage = public_path() . '/upload/users/' . $generateUserImage;
                move_uploaded_file($_FILES['user_img']['tmp_name'], $desImage);
                $newUserImage = $generateUserImage;
            }
        }
        $token = $request->session()->token();
        $token = csrf_token();
        $status = 'active';
        $userType = 0;
        if (!empty($userName) && !empty($email) && !empty($phone) && !empty($address) && !empty($password) && !empty($confirmPass)) {
            if ($this->isEmailExist($email) == 0) {
                if ($this->isPhoneExist($phone) == 0) {
                    $hashPassword = Hash::make($password);
                    $result = DB::table('register')->insert([
                        'user_image' => $newUserImage, 'user_name' => $userName, 'mobile_no' => $phone, 'user_address' => $address, 'user_email' => $email, 'password' => $hashPassword, 'status' => $status, 'user_token' => $token, 'user_type' => $userType
                    ]);
                    if ($result) {
                        $request->session()->flash('signuperror', 'Signup Successfully!!');
                        return redirect('/bookXchange/signup');
                    } else {
                        $request->session()->flash('signuperror', 'Signup Failed!!');
                        return redirect('/bookXchange/signup');
                    }
                } else {
                    $request->session()->flash('signuperror', 'Phone Number Already Exist. Please register with new Phone Number!!');
                    return redirect('/bookXchange/signup');
                }
            } else {
                $request->session()->flash('signuperror', 'Email Already Exist. Please register with new Email!!');
                return redirect('/bookXchange/signup');
            }
        } else {
            $request->session()->flash('signuperror', 'Please filled all the fields!!');
            return redirect('/bookXchange/signup');
        }
    }

    /**
     * Function getMyAccountUpdate
     * 
     */
    public function getMyAccountUpdate(Request $request)
    {
        $firstName = $request->post('firstname');
        $lastName = $request->post('lastname');
        $userName = "$firstName $lastName";
        $userEmail = $request->post('user_email');
        $userPhone = $request->post('user_phone');
        $userAddress = $request->post('user_address');
        $userImage = $request->post('old_image');
        if ($request->hasFile('newimage')) {
            if ($request->file('newimage')->getSize() > 0) {
                $image = $request->newimage;
                $uImage = $image->getClientOriginalName();
                $imgType = $image->getClientOriginalExtension();
                $randomno = rand(0, 100000);
                $generateName = 'user' . date('Ymd') . $randomno;
                $generateUserImage = $generateName . '.' . $imgType;
                $desImage = public_path() . '/upload/users/' . $generateUserImage;
                move_uploaded_file($_FILES['newimage']['tmp_name'], $desImage);
                $userImage = $generateUserImage;
            }
        }
        if (!empty($userName) && !empty($userEmail) && !empty($userPhone) && !empty($userAddress) && !empty($userImage)) {
            $result = DB::table('register')->where(['id' => session('user_id')])->update(['user_name' => $userName, 'user_email' => $userEmail, 'mobile_no' => $userPhone, 'user_address' => $userAddress, 'user_image' => $userImage]);
            if ($result) {
                $request->session()->flash('accounterror', 'Updated successfully!!');
                return redirect('/bookXchange/myaccount');
            } else {
                $request->session()->flash('accounterror', 'Update failed!!');
                return redirect('/bookXchange/myaccount');
            }
        } else {
            $request->session()->flash('accounterror', 'Please Filled the all field Carefully!!');
            return redirect('/bookXchange/myaccount');
        }
    }

    /**
     * Function updatePassword
     * 
     */
    public function updatePassword(Request $request)
    {
        $currentPass = $request->post('old_user_password');
        $newPass = $request->post('new_user_password');
        $confirmPass = $request->post('confirmPassword');
        if (!empty($currentPass) && !empty($newPass) && !empty($confirmPass)) {
            if ($newPass == $confirmPass) {
                $result = DB::table('register')->where(['id' => session('user_id')])->first();
                if (Hash::check($currentPass, $result->password)) {
                    $hashNewPass = Hash::make($newPass);
                    $res = DB::table('register')->where(['id' => session('user_id')])->update(['password' => $hashNewPass]);
                    if ($res) {
                        $request->session()->flash('accounterror', 'Password Update Successfully!!');
                        return redirect('/bookXchange/myaccount');
                    }
                } else {
                    $request->session()->flash('accounterror', 'Please Enter valid current password !!');
                    return redirect('/bookXchange/myaccount');
                }
            } else {
                $request->session()->flash('accounterror', 'Confirm password doesnot match !!');
                return redirect('/bookXchange/myaccount');
            }
        } else {
            $request->session()->flash('accounterror', 'Please fill all the field carefully !!');
            return redirect('/bookXchange/myaccount');
        }
    }
}
