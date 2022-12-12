
		<section class="main-content mt-5 mb-5">
			<div class="container">				
				<div id="content" class="" role="main">
					<div class="row py-5 mt-4 justify-content-between">
						<!-- For Demo Purpose -->
						<div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
							<h1>Create an Account</h1>
							<p class="font-italic text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							<br>
							<img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
							
							
						</div>

						<!-- Registeration Form -->
						<div class="col-md-6 col-lg-6 ml-auto formRegister">
							@if(session('signuperror') != null)
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									{{session('signuperror')}}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								@php
								Session::forget('signuperror');
								@endphp
							@endif
							<form id="register-form" action="{{route('UserController.getSignUp')}}" method="post" enctype="multipart/form-data" >
								@csrf
								<div class="row">

									<!-- First Name -->
									<div class="col-lg-6 mb-4">	
										<label for="firstName" class="form-label">First Name&nbsp;<span class="required">*</span></label>
										<input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control inputGrey border-left-0 border-md">
									</div>

									<!-- Last Name -->
									<div class="col-lg-6 mb-4">		
										<label for="lastName" class="form-label">Last Name</label>
										<input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control inputGrey border-left-0 border-md">
									</div>

									<!-- Email Address -->
									<div class="col-lg-12 mb-4">
										<label for="email" class="form-label">Email Address&nbsp;<span class="required">*</span></label>
										<input id="email" type="email" name="email" placeholder="Email Address" class="form-control inputGrey border-left-0 border-md">
									</div>

									<!-- Phone Number -->
									<div class=" col-lg-12 mb-4">	
										<label for="phoneNumber" class="form-label">Phone Number&nbsp;<span class="required">*</span></label>
										<input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control inputGrey border-md border-left-0 pl-3">
									</div>
									<!-- Address -->
									<div class="col-lg-12 mb-4">
										<label for="address" class="form-label">Address&nbsp;<span class="required">*</span></label>
										<textarea id="address" name="address" placeholder="Address" class="form-control inputGrey border-left-0 border-md"></textarea>
									</div>

									<!-- Password -->
									<div class="col-lg-6 mb-4">
										<label for="password" class="form-label">Password&nbsp;<span class="required">*</span></label>
										<input id="password" type="password" name="password" placeholder="Password" class="form-control inputGrey border-left-0 border-md">
									</div>

									<!-- Password Confirmation -->
									<div class="col-lg-6 mb-4">
										<label for="passwordConfirmation" class="form-label">Confirm Password&nbsp;<span class="required">*</span></label>
										<input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="form-control inputGrey border-left-0 border-md">
									</div>

									<!-- upload profile image -->
									<div class="col-lg-6 mb-4">
										<div class="input-group">
											<div class="input-file-container">
												<label for="my-file" class="form-label mb-2">Upload Photo</label>
												<input class="input-file" name="user_img" id="user_img" type="file">
												
											</div>
										</div>
									</div>


									<!-- Submit Button -->
									<div class="form-group col-lg-12 mx-auto mb-0 mt-5 text-center">
										<button type="submit" href="#" class="btn btn-primary btn-lg" style="width: 300px;">
											<span class="font-weight-bold">Create your account</span>
										</button>
									</div>

									<!-- Divider Text -->
									<div class="form-group col-lg-12 mx-auto d-flex align-items-center my-5">
										<div class="border-bottom w-100 ml-5"></div>
										<span class="px-2 small text-muted font-weight-bold text-muted" style="font-size: 16px;font-weight: bold;">OR</span>
										<div class="border-bottom w-100 mr-5"></div>
									</div>

									<!-- Already Registered -->
									<div class="text-center w-100 ">
										<p class="text-muted font-weight-bold" style="font-size: 16px;">Already Registered? <a href="signin" class="text-primary ml-2">Login</a></p>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>				
		</section>