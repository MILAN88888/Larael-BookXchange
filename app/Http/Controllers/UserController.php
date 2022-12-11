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
    public function getSignin(Request $request) {
        $email = $request->post('email');
        $password = $request->post('password');
        $result = DB::table('register')->where(['user_email'=>$email])->first();
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
           
        } else 
        {
            $request->session()->flash('signinerror', 'Email doesnot exist!!');
            return redirect('/bookXchange/signin');
        }
    }
    
    public function logout() {
        // $request->session()->flush();
        session()->forget('user_login');
        session()->forget('user_id');
        session()->forget('user_name');
        session()->put('msg','Logout Successfully');
        return redirect('/bookXchange');
    }

     /**
     * Function myAccountDetial
     * 
     * @return array array of details.
     */
    public function myAccountDetail() {
        $users = DB::table('register')
            ->select('*')->where(['id'=>session('user_id')])
            ->first();
            return $users;
    }
    /**
     * Function myaccount
     */
    public function myaccount() {
        $accDetail = $this->myAccountDetail();
        return view('header').view('myaccount',['acdetail'=>$accDetail]).view('footer');
    }

    /**
     * Function getSignUp 
     * 
     * @return mixed targeted to getSignin and then dashboard.
     */
    public function getSignUp(Request $request) {
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
               // $name = explode('.', $userImage[0]);
                $imgType = $image->getClientOriginalExtension();
                $randomno = rand(0, 100000);
                $generateName = 'user'.date('Ymd').$randomno;
                $generateUserImage = $generateName.'.'.$imgType;
                $desImage=public_path().'/upload/users/'.$generateUserImage;
                move_uploaded_file($_FILES['user_img']['tmp_name'], $desImage);
                $newUserImage = $generateUserImage;
            }
        }
        $token = $request->session()->token();
        $token = csrf_token();
        $status = 'active';
        $userType = 0;
        if(!empty($userName) && !empty($email) && !empty($phone) && !empty($address) && !empty($password) && !empty($confirmPass)) {
            $hashPassword = Hash::make($password);
            $result = DB::table('register')->insert([
                'user_image'=>$newUserImage, 'user_name'=>$userName, 'mobile_no'=>$phone, 'user_address'=>$address, 'user_email'=>$email, 'password'=>$hashPassword, 'status'=>$status, 'user_token'=>$token, 'user_type'=>$userType
            ]);
            if($result) {
                $request->session()->flash('signuperror', 'Signup Successfully!!');
                return redirect('/bookXchange/signup');
            } else {
                $request->session()->flash('signuperror', 'Signup Failed!!');
                return redirect('/bookXchange/signup');
            }
        } else {
            $request->session()->flash('signuperror', 'Please filled all the fields!!');
            return redirect('/bookXchange/signup');
        }
    }
}
