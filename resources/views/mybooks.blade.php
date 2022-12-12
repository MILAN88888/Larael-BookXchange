<section class="main-content">
    <div class="container">	
        <div class="row">
            @include('slidebox')
            <div class="col-md-9">
                <div class="accountRightSide ps-md-5 ps-lg-9">
                    <h6>My Books</h6>
                    @if(session('editmsg') != null)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('editmsg')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @php
                    Session::forget('editmsg');
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
                                    @foreach($mybooks as $mybook)
                                    <tr>
                                        <td>
                                            <div class="bookCoverArea">
                                                <img src="{{asset('/upload/books/'.$mybook->book_image)}}">
                                            </div>
                                        </td>
                                        <td>{{$mybook->book_name}}</td>
                                        <td>{{date('Y-m-d',strtotime($mybook->upload_date))}}</td>
                                        <td>
                                            <a href="/bookXchange/dashboard/viewbook/{{$mybook->id}}" class="btn btn-primary btn-sm">View</a>
                                            <a href="/bookXchange/dashboard/myaccount/editbook/{{$mybook->id}}" class="btn btn-success btn-sm">Edit</a>
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