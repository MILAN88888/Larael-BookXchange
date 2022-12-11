
		<section class="main-content mt-5 mb-5">
			<div class="container">				
				<div id="content" class="" role="main">
					<div class="row py-5 mt-4 justify-content-between">
						<!-- For Demo Purpose -->
						<div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
							<h1>Signin to your account</h1>
							<p class="font-italic text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							<br>
							<img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
							
							
						</div>

						<!-- Registeration Form -->
						<div class="col-md-6 col-lg-6 ml-auto formRegister">
							@if(session('signinerror') != null)
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									{{session('signinerror')}}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								@php
								Session::forget('signinerror');
								@endphp
							@endif
							<form id="login-form" action="{{route('UserController.getSignin')}}" method="post">
								@csrf
								<!-- Phone Number -->
								<div class="mb-4">	
									<label for="phoneNumber" class="form-label">Email&nbsp;<span class="required">*</span></label>
									<input id="phoneNumber" type="email" name="email" placeholder="Enter Your Email Address" class="form-control inputGrey border-md border-left-0 pl-3">
								</div>

								<!-- Password -->
								<div class="mb-4">
									<label for="password" class="form-label">Password&nbsp;<span class="required">*</span></label>
									<input id="password" type="password" name="password" placeholder="Enter Your Password" class="form-control inputGrey border-left-0 border-md">
								</div>
								<div class="text-right col-lg-12 mb-2"><a href="#" class="forgotLink"><u>Forgot Password</u></a></div>

									<!-- Submit Button -->
									<div class="form-group col-lg-12 mx-auto mb-0 mt-5 text-center">
										<button type="submit" class="btn btn-primary btn-lg" style="width: 220px;">
											<span class="font-weight-bold">Login</span>
										</button>
									</div>

									<!-- Divider Text -->
									<div class="form-group col-lg-12 mx-auto d-flex align-items-center my-5">
										<div class="border-bottom w-100 ml-5"></div>
										<span class="px-2 small text-muted font-weight-bold text-muted" style="font-size: 16px;font-weight: bold;">OR</span>
										<div class="border-bottom w-100 mr-5"></div>
									</div>

									<!-- Already Registered -->
									<div class="text-center w-100">
										<p class="text-muted font-weight-bold" style="font-size: 16px;"><a href="/bookXchange/signup" class="text-primary ml-2">Join</a>  if you don't have an account</p>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>				
		</section>