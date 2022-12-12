<section class="main-content">
    <div class="container">
        <div class="row">
        @include('slidebox')
            <div class="col-md-9">
                <div class="accountRightSide ps-md-5 ps-lg-9">
                    <h6 class="accountTitle">Account Details</h6>
                    <div class="accountInfoMain">

                        <div class="subTitle editTitle">Edit Account</div>
                        @if(session('accounterror') != null)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('accounterror')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @php
                        Session::forget('aacounterror');
                        @endphp
                    @endif
                    <form id="profile-form" method="post" action="{{route('BookController.getMyAccountUpdate')}}" enctype="multipart/form-data">
                            @csrf
                            <div class=" ">

                                <img src="{{asset('/upload/users/'.$acdetail->user_image)}}" alt=""
                                    class="img-fluid mb-3 d-none d-md-block"
                                    style="height:150px ;width:200px;border-radius:50px">
                            </div>
                            <div class="row border-bottom  mb-5 pb-5">
                                @php  
                                $originalName = explode(' ', $acdetail->user_name);
                                @endphp
                                <div class="col-md-6 mb-4">
                                    <div class="js-form-message">
                                        <label for="firstname" class="form-label">First Name <em>*</em></label>
                                        <input type="text" class="form-control rounded-0" id="firstname"
                                            name="firstname" placeholder="Kabul" value="{{$originalName[0]}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="js-form-message">
                                        <label for="lastname" class="form-label">Last Name <em></em></label>
                                        <input type="text" class="form-control rounded-0" id="lastname" name="lastname"
                                            placeholder="" value="{{$originalName[1]}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="js-form-message">
                                        <label for="email" class="form-label">Email Address <em>*</em></label>
                                        <input hidden name="old_email" value="" />
                                        <input type="text" class="form-control rounded-0" id="email" name="user_email"
                                            placeholder="" value="{{$acdetail->user_email}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input hidden name="old_number" value="" />
                                    <div class="js-form-message">
                                        <label for="phoneNumber" class="form-label">Phone Number <em>*</em></label>
                                        <input type="text" class="form-control rounded-0" id="phoneNumber"
                                            name="user_phone" placeholder="" value="{{$acdetail->mobile_no}}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4 mb-md-0">
                                    <div class="js-form-message">
                                        <label for="address" class="form-label">Address <em>*</em></label>
                                        <textarea class="form-control rounded-0" name="user_address" id="address"
                                            readonly>{{$acdetail->user_address}}</textarea>
                                    </div>
                                </div>
                                <!--upload profile pic-->
                                <input hidden name="old_image" value="{{$acdetail->user_image}}">

                                <div class="form-group mt-4 upload-pic upload-profile">
                                    <label for="bookcover" class="form-label">Upload New Profile</label>
                                    <div class="custom-file">
                                        <input class="form-control" type="file" id="new_user_image" name="newimage"
                                            style="max-width: 300px;">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group col-lg-12 mx-auto mb-0 mt-5 text-center submit-profile">
                                    <button href="#" class="btn btn-primary btn-lg" name="updateprofile"
                                        style="width: 300px;">
                                        <span class="font-weight-bold">Save changes</span>
                                    </button>
                                </div>
                                <div class="form-group col-lg-12 mx-auto mb-0 mt-5 text-center edit-btn-div">
                                    <button href="#" type="button" class="btn btn-primary btn-lg edit-btn"
                                        name="profile-name" style="width: 250px;">
                                        <span class="font-weight-bold">Edit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="text-center w-100 reset-click">
                            <p class="text-muted font-weight-bold" style="font-size: 16px;">If you want to reset
                                password. <a id="reset-pass-btn" style="cursor:pointer;" class="text-primary ml-2">Reset
                                    Password</a></p>
                        </div>

                        <form id="reset-password-form" action="{{route('UserController.updatePassword')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="js-form-message">
                                        <label for="currentPassword" class="form-label">Current Password
                                            <em>*</em></label>
                                        <input type="password" id="oldPassword" class="form-control rounded-0"
                                            name="old_user_password" id="currentPassword">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="js-form-message">
                                        <label for="newPassword" class="form-label">New Password <em>*</em></label>
                                        <input type="password" class="form-control rounded-0" name="new_user_password"
                                            id="new_user_password">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-5">
                                    <div class="js-form-message">
                                        <label for="confirmPassword" class="form-label">Confirm New Password
                                            <em>*</em></label>
                                        <input type="password" class="form-control rounded-0" name="confirmPassword"
                                            id="confirmPassword">
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <button type="submit" name="reset_new_password"
                                        class="btn btn-primary rounded-0">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    #reset-password-form {
        display: none;
    }
</style>

