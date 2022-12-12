	<!-- search Area -->
    @include('searchbox')
    <!-- /search Area -->

    <section class="main-content grey-bg pt-5 pb-5">
        <div class="container">	
            <div id="content" class="addBookWapper white-bg pt-5 pb-5" role="main">
                <div class="titleBook">
                    {{$bookdetail->book_name}}
                </div>
                <div class="bookAuthorArea">
                    <span>{{$bookdetail->author}}</span>
                    <span><strong>ISBN:</strong>{{$bookdetail->isbn}}</span>
                    <div class="float-end"><a class="btn btn-primary btn-sm">Add to Fav.</a></div>
                </div>
                <div class="starRatingArea">
                    <span class="starRating">
                        @php 
                        $overRating = 0;
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                        @if ($i<=$bookdetail->book_rating)
                        <i class="fa fa-star"></i>
                        @else
                            @if (($i-$bookdetail->book_rating) <= 0.5 && ($i-$bookdetail->book_rating) >= 0.1)
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
                    </span>
                    <span style="margin-left: 15px;">
                        <a href="/bookXchange/home/viewbook/bookreview/1" style="color:#0088dd;">(123)</a>
                    </span>
                </div>
                <div class="bookDesc">
                    Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry into to end. Monterhing in the best book testem ipsum is simply dtest in find in a of the printing and typeseting industry...
                </div>
                <div class="bookCoverImages">
                    
                    <div class="bookImg">
                        <img src="{{asset('/upload/books/'.$bookdetail->book_image)}}">
                    </div>
                </div>
                <!-- availBookUsers -->
                <div class="availBookUsers">
                    <div class="row">
                        @foreach ($booksWithSameIsbn as $bookWithSameIsbn)
                        <div class="col-md-6">
                            <div class="userBookBox">
                                <div class="userImg"><img src="{{asset('/upload/books/'.$bookWithSameIsbn->book_image)}}"></div>
                                <h3><a href="#">{{$bookWithSameIsbn->user_name}}</a></h3>
                                <div class="addressUser">{{$bookWithSameIsbn->user_address}}</div>
                                <div class="bookCondition"><strong>Condition: </strong>{{$bookWithSameIsbn->book_condition}}</div>
                                <div class="requestBtn"><a href="#" class="btn btn-sm btn-primary">Send Request</a></div>
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
                <!-- /availBookUsers -->
            </div>
        </div>				
    </section>
    