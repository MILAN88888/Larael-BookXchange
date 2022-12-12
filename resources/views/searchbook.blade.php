@include('searchbox')
<!-- Search list book -->
<section class="recentlyBook section-padding" style="min-height:100vh;">
    <div class="container">
        <div class="sectionHeading">Search Book List</div>
        <div class="bookListing">
            <div class="row">
              
                @if (sizeof($searchBooksList) == 0) 
                    <p>No Matched Data Found</p>
                @endif 
                
                @foreach ($searchBooksList as $searchBook)
                <div class="col col-md-3 mb-3 search-one">
                    <div class="bookBox">
                        <a href="/bookXchange/dashboard/viewbook/{{$searchBook->id}}">
                            <div class="bookCoverImg">
                                <img src="{{asset('/upload/books/'.$searchBook->book_image)}}"
                                    style="height:280px;" />
                            </div>
                            <div class="book-Short-Detail">
                                <h2>{{$searchBook->book_name}}</h2>
                                <div class="author-rating">
                                    <span class="starRating">
                                        @php 
                                        $overRating = 0;
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                        @if ($i<=$searchBook->book_rating)
                                        <i class="fa fa-star"></i>
                                        @else
                                            @if (($i-$searchBook->book_rating) <= 0.5 && ($i-$searchBook->book_rating) >= 0.1)
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
                                    </span>&nbsp;|&nbsp;{{$searchBook->author}} 
                                </div>
                                <div class="genresArea">
                                    <strong>Genres</strong>&nbsp;{{$searchBook->genre_name}}
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
@if (sizeof($searchBooksList) > 7)
<div class="p-5 text-center">
    <a class="btn loadBtn" id="loadMoreSearch">Load More</a>
</div>
@endif