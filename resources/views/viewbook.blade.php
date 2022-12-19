	<!-- search Area -->
    @include('searchbox')
    <!-- /search Area -->

    <section class="main-content grey-bg pt-5 pb-5">
        <div class="container">	
            <div id="content" class="addBookWapper white-bg pt-5 pb-5" role="main">
                @if(session()->has('viewmsg'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('viewmsg')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @php
                    Session::forget('viewmsg');
                    @endphp
                @endif
                <div class="titleBook">
                    {{$bookdetail->book_name}}
                </div>
                <div class="bookAuthorArea">
                    <span>{{$bookdetail->author}}</span>
                    <span><strong>ISBN:</strong>{{$bookdetail->isbn}}</span>
                    @if (session()->has('user_id'))
                        @if ($bookdetail->wishid != 0)
                        <div class="float-end">
                            <a href="/bookXchange/myaccount/wishlist" class="btn btn-primary btn-sm">Added to Fav.</a>
                        </div>
                        @else
                            <form action={{route('BookController.addwishlist')}} method="POST">
                                @csrf
                                <div class="float-end">
                                    <input type="text" value="{{$bookdetail->id}}" name="book_id" hidden />
                                    <button type="submit" name="addfav" class="btn btn-primary btn-sm">Add to Fav.</button>
                                </div>
                            </form>
                        @endif
                        
                    @else 
                        <div class="float-end">
                            <a href="/bookXchange/signin" class="btn btn-primary btn-sm">Add to Fav.</a>
                        </div>
                    @endif
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
                                <div class="bookCondition"><strong>Condition: </strong>
                                    @if ($bookWithSameIsbn->book_condition == 0)
                                    Bad
                                    @elseif ($bookWithSameIsbn->book_condition ==1)
                                    Good
                                    @elseif ($bookWithSameIsbn->book_condition ==2)
                                    Best
                                    @endif
                                </div>
                                <!-- request Button -->
                            @if (session()->has('user_id'))
                                @if ($bookWithSameIsbn->owner_id != session('user_id'))
                                    @if (is_null($bookWithSameIsbn->status))
                                    @php 
                                    $reqst = -1 
                                    @endphp
                                    @else
                                    @php
                                     $reqst = $bookWithSameIsbn->status
                                    @endphp
                                    @endif

                                    @if ($bookWithSameIsbn->rq_status == 0)
                                        @if (($reqst == -1) || ($reqst == 3))
                                        <form action="{{route('BookController.requestbook')}}" method="post">
                                            @csrf
                                            <input type='text' name="book_id" value="{{$bookWithSameIsbn->id}}" hidden />
                                            <input type='text' name="owner_id" value="{{$bookWithSameIsbn->owner_id}}" hidden />
                                            <div class="requestBtn"><button class="btn btn-sm btn-primary"
                                                >Request</button></div> 
                                        </form>
                                        @else
                                        <div class="requestBtn"><a class="btn btn-sm btn-primary"
                                            style="pointer-events:none">Requested</a>
                                        </div>
                                        @endif

                                    @elseif ($bookWithSameIsbn->rq_status == 1)
                                        @if ($reqst == 1)
                                            <form action="{{route('BookController.returnbook')}}" method="post">
                                                @csrf
                                                <input type="text" name="book_id" hidden value="{{$bookWithSameIsbn->id}}" />
                                                <input type='text' name="request_id" value="{{$bookWithSameIsbn->request_id}}" hidden />
                                                <div class="requestBtn"><button class="btn btn-sm btn-primary"
                                                    >Return</button></div> 
                                            </form>
                                        @else
                                        <div class="requestBtn"><a href="#" class="btn btn-sm btn-primary"
                                                style="pointer-events:none">Not Available</a></div>
                                        @endif
                                    @elseif ($bookWithSameIsbn->rq_status == 2)
                                        @if ($reqst == 2)
                                        <div class="requestBtn"><a href="#" class="btn btn-sm btn-primary"
                                                style="pointer-events:none">Return Requested</a></div>
                                        @else
                                        <div class="requestBtn"><a href="#" class="btn btn-sm btn-primary"
                                                style="pointer-events:none">Not Available</a></div>
                                        @endif
                                    @endif
                                @endif
                            @else
                            <div class="requestBtn"><a href="/bookXchange/signin"
                                    class="btn btn-sm btn-primary">Send Request</a></div>
                            @endif
                            <!-- end of request button -->
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
                <!-- /availBookUsers -->
            </div>
        </div>				
    </section>
    