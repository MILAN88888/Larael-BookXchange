<section class="main-content">
    <div class="container">	
        <div class="row">
            @include('slidebox')
            <div class="col-md-9">
                <div class="accountRightSide ps-md-5 ps-lg-9">
                    <h6>Borrows List</h6>
                    <div class="accountInfoMain">
                        <div class="table-responsive">
                            <table id="mybooktable" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="bookCover">Book Cover</th>
                                        <th>Book Title</th>
                                        <th>Request Date</th>
                                        <th>Issued Date</th>
                                        <th>Return Date</th>
                                        <th>Status</th>
                                        <th>Book Owner</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach($borrows as $borrow)
                                    <tr>
                                        <td>
                                            <div class="bookCoverArea">
                                                <img src="{{asset('/upload/books/'.$borrow->book_image)}}">
                                            </div>
                                        </td>
                                        <td>{{$borrow->book_name}}</td>
                                        <td>{{$borrow->rqst_date}}</td>
                                        <td>{{$borrow->issued_date}}</td>
                                        <td>{{$borrow->return_date}}</td>
                                        <td>@if ($borrow->status == 0)
                                            Requested
                                            @elseif ($borrow->status == 1)
                                            Issued
                                            @elseif ($borrow->status == 2)
                                            Returning
                                            @elseif ($borrow->status == 3)
                                            Returned
                                            @endif
                                        </td>
                                        <td>{{$borrow->user_name}}</td>
                                        <td>
                                            <a href="/bookXchange/dashboard/viewbook/{{$borrow->book_id}}" class="btn btn-primary btn-sm">View</a>
                                            {{-- <a href="#" class="btn btn-success btn-sm">Edit</a> --}}
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