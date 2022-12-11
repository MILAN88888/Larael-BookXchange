@if(session()->has('user_name'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	Welcome {{session('user_name')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
</div>
@php
Session::forget('user_name');
@endphp
@endif
		<!-- slider -->
		<section class="slider-wrap">
			<div class="fadeOut owl-carousel owl-theme">
            <div class="item">
				<img src="{{asset('web_asset/assets/images/slider-01.jpg')}}">
				<div class="container">
					
				</div>
            </div>
            <div class="item">
				<img src="{{asset('web_asset/assets/images/slider-02.jpg')}}">
				<div class="container">
				</div>
            </div>
			<div class="item">
				<img src="{{asset('web_asset/assets/images/slider-03.jpg')}}">
				<div class="container">
				</div>
            </div>
          </div>
		</section>
		<!-- /slider -->
		<!-- search Area -->
		<section class="searchArea">
			<div class="container">
				<form class="" method="get" action="">
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="mb-3">
								<input name="s" value="" type="text" class="form-control" id="keyword" placeholder="Book Title">
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
							<div class="mb-3">
								<select name="product_cat" id="product_cat" class="form-control">
									<option value="0">Book Category</option>
									<option class="level-0" value="drama">Drama</option>
									<option class="level-1" value="inspiration">&nbsp;&nbsp;&nbsp;Inspiration</option>
									<option class="level-1" value="love-story">&nbsp;&nbsp;&nbsp;Love Story</option>
									<option class="level-0" value="life-style">Life Style</option>
									<option class="level-1" value="business">&nbsp;&nbsp;&nbsp;Business</option>
									<option class="level-1" value="culture">&nbsp;&nbsp;&nbsp;Culture</option>
									<option class="level-0" value="science">Science</option>
								</select>
								<i class="select-arrow fa fa-angle-down"></i>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
							<div class="mb-3">
								<select name="book_author" id="book_author" class="form-control">
									<option value="0">Book Author</option>
									<option class="level-0" value="atkia">Atkia</option>
									<option class="level-0" value="brian-owell">Brian O’Well</option>
									<option class="level-0" value="saifudin-a">Saifudin A.</option>
									<option class="level-0" value="sarfaraz">Sarfaraz</option>
								</select>
								<i class="select-arrow fa fa-angle-down"></i>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
							<div class="mb-3">
								<button type="submit" class="btn btn-primary btn-block">
								<i class="fa fa-search"></i>&nbsp;Find Book</button>
							</div>
						</div>

					</div>
				</form>
			</div>
		</section>
		<!-- /search Area -->

		<!-- Recently Added -->
		<section class="recentlyBook section-padding">
			<div class="container">
				<div class="sectionHeading">Recently Added</div>
				<div class="bookListing">
					<div class="row">
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-21.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Drama, Love Story
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-22.png">
									</div>
									<div class="book-Short-Detail">
										<h2>See me</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Saifudin A.
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Drama, Love Story
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-23.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Drama, Love Story
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-24.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Drama, Love Story
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Recently Added -->
		<!-- Most popular -->
		<section class="mostPopular section-padding">
			<div class="container">
				<div class="sectionHeading">Most Popular</div>
				<div class="bookListing">
					<div class="row">
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-21.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Drama, Love Story
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-22.png">
									</div>
									<div class="book-Short-Detail">
										<h2>See me</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Saifudin A.
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Drama, Love Story
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-23.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Drama, Love Story
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-24.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Drama, Love Story
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Most popular -->
		<!-- Browse Library -->
		<section class="browseLibrary section-padding" style="background: url('{{asset('web_asset/assets/images/banner-01.jpg')}}');">
			<div class="container">
				<h2>Browse Through Our Complete Library</h2>
				<a href="#"> BROWSE COLLECTION</a>
			</div>
		</section>
		<!-- Browse Library -->
		<!--Fiction -->
		<section class="mostPopular section-padding">
			<div class="container">
				<div class="sectionHeading">Fiction</div>
				<div class="bookListing">
					<div class="row">
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-21.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Fiction
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-22.png">
									</div>
									<div class="book-Short-Detail">
										<h2>See me</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Saifudin A.
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Fiction
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-23.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Fiction
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-24.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Fiction
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Fiction -->
		<!-- Horror -->
		<section class="mostPopular section-padding">
			<div class="container">
				<div class="sectionHeading">Horror</div>
				<div class="bookListing">
					<div class="row">
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-21.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Horror
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-22.png">
									</div>
									<div class="book-Short-Detail">
										<h2>See me</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Saifudin A.
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Horror
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-23.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Horror
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-24.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; Horror
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Horror -->
		<!-- History -->
		<section class="mostPopular section-padding">
			<div class="container">
				<div class="sectionHeading">History</div>
				<div class="bookListing">
					<div class="row">
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-21.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; History
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-22.png">
									</div>
									<div class="book-Short-Detail">
										<h2>See me</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Saifudin A.
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; History
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-23.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; History
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="#">
									<div class="bookCoverImg">
										<img src="assets/images/book-24.png">
									</div>
									<div class="book-Short-Detail">
										<h2>The Dead Compendium Volume 3</h2>
										<div class="author-rating">
											<span class="starRating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span> &nbsp;|&nbsp; Atkia
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp; History
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /History -->

		<div class="p-5 text-center">
			<a href="#" class="btn loadBtn">Load More</a>
		</div>


		