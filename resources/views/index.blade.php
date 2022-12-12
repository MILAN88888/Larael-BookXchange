@if(session()->has('msg'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
	{{session('msg')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
@php
Session::forget('msg');
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
		@include('searchbox')
		<!-- Recently Added -->
		<section class="recentlyBook section-padding">
			<div class="container">
				<div class="sectionHeading">Recently Added</div>
				<div class="bookListing">
					<div class="recent-scroll">
						@foreach($recentBooks as $recentBook)
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="/bookXchange/home/viewbook/{{$recentBook->id}}">
									<div class="bookCoverImg">
										<img src="{{asset('/upload/books/'.$recentBook->book_image)}}">
									</div>
									<div class="book-Short-Detail">
										<h2>{{$recentBook->book_name}}</h2>
										<div class="author-rating">
											<span class="starRating">
												@php 
												$overRating = 0;
												@endphp
												@for ($i = 1; $i <= 5; $i++)
												@if ($i<=$recentBook->book_rating)
												<i class="fa fa-star"></i>
												@else
													@if (($i-$recentBook->book_rating) <= 0.5 && ($i-$recentBook->book_rating) >= 0.1)
														<i class="fa fa-star-half"></i>
														@php
														$overRating = $i;
														@endphp
													@endif
													@if ($i > $overRating)
													<i class="fa fa-star-o"></i>
													@endif
												@endif
												@endfor
											</span> &nbsp;|&nbsp; {{$recentBook->author}}
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp;{{$recentBook->genre_name}}
										</div>
									</div>
								</a>
							</div>
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</section>
		<!-- /Recently Added -->
		<!-- Most popular -->
		<section class="mostPopular section-padding">
			<div class="container">
				<div class="sectionHeading">Most Rated</div>
				<div class="bookListing">
					<div class="recent-scroll">
						@foreach($mostRateds as $mostRated)
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="/bookXchange/home/viewbook/{{$mostRated->id}}">
									<div class="bookCoverImg">
										<img src="{{asset('/upload/books/'.$mostRated->book_image)}}">
									</div>
									<div class="book-Short-Detail">
										<h2>{{$mostRated->book_name}}</h2>
										<div class="author-rating">
											<span class="starRating">
												@php 
												$overRating = 0;
												@endphp
												@for ($i = 1; $i <= 5; $i++)
												@if ($i<=$mostRated->book_rating)
												<i class="fa fa-star"></i>
												@else
													@if (($i-$mostRated->book_rating) <= 0.5 && ($i-$mostRated->book_rating) >= 0.1)
														<i class="fa fa-star-half"></i>
														@php
														$overRating = $i;
														@endphp
													@endif
													@if ($i > $overRating)
													<i class="fa fa-star-o"></i>
													@endif
												@endif
												@endfor
											</span> &nbsp;|&nbsp; {{$mostRated->author}}
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp;{{$mostRated->genre_name}}
										</div>
									</div>
								</a>
							</div>
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</section>
		<!-- /Most popular -->
		<!-- Browse Library -->
		<section class="browseLibrary section-padding" style="background: url('{{asset('web_asset/assets/images/banner-01.jpg')}}');">
			<div class="container">
				<h2>Browse Through Our Complete Library</h2>
				<a href="/bookXchange/home/searchbook"> BROWSE COLLECTION</a>
			</div>
		</section>
		<!-- Browse Library -->

		
		<!--unique Genre -->
		@foreach ($uniqueBookGenre as $uniqueGenre)
		<section class="mostPopular section-padding All-category">
			<div class="container">
				<div class="sectionHeading">{{$uniqueGenre->genre_name}}</div>
				<div class="bookListing">
					<div class="recent-scroll">
						@foreach ($recentBooks as $recentBook)
						@if ($uniqueGenre->genre_name == $recentBook->genre_name)
						<div class="col col-md-3">
							<div class="bookBox">
								<a href="/bookXchange/home/viewbook/{{$recentBook->id}}">
									<div class="bookCoverImg">
										<img src="{{asset('/upload/books/'.$recentBook->book_image)}}">
									</div>
									<div class="book-Short-Detail">
										<h2>{{$recentBook->book_name}}</h2>
										<div class="author-rating">
											<span class="starRating">
												@php 
												$overRating = 0;
												@endphp
												@for ($i = 1; $i <= 5; $i++)
												@if ($i<=$recentBook->book_rating)
												<i class="fa fa-star"></i>
												@else
													@if (($i-$recentBook->book_rating) <= 0.5 && ($i-$recentBook->book_rating) >= 0.1)
														<i class="fa fa-star-half"></i>
														@php
														$overRating = $i;
														@endphp
													@endif
													@if ($i > $overRating)
													<i class="fa fa-star-o"></i>
													@endif
												@endif
												@endfor
											</span> &nbsp;|&nbsp; {{$recentBook->author}}
										</div>
										<div class="genresArea">
											<strong>Genres</strong>&nbsp;{{$recentBook->genre_name}}
										</div>
									</div>
								</a>
							</div>
						</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</section>
		<!-- /unique genre -->
		@endforeach
		<div class="p-5 text-center">
			<a class="btn loadBtn" id="loadMore">Load More</a>
		</div>
