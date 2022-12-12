<section class="main-content">
    <div class="container">	
        <div class="row">
            @include('slidebox')
            <div class="col-md-9">
                <div class="accountRightSide ps-md-5 ps-lg-9">
                    <h6>Wish List</h6>
                    @if(session('wishmsg') != null)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('wishmsg')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @php
                    Session::forget('wishmsg');
                    @endphp
                    @endif
                    <div class="accountInfoMain">
                        <div class="table-responsive">
                            <table id="mybooktable" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="bookCover">Book Cover</th>
                                        <th>Book Title</th>
                                        <th>Added Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach($wishlist as $wish)
                                    <tr>
                                        <td>
                                            <div class="bookCoverArea">
                                                <img src="{{asset('/upload/books/'.$wish->book_image)}}">
                                            </div>
                                        </td>
                                        <td>{{$wish->book_name}}</td>
                                        <td>{{date('Y-m-d',strtotime($wish->added_date))}}</td>
                                        <td>
                                            <a href="/bookXchange/dashboard/viewbook/{{$wish->book_id}}" class="btn btn-primary btn-sm">View</a>
                                            <a href="/bookXchange/dashboard/myaccount/deletewishlist/{{$wish->id}}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>				
</section>