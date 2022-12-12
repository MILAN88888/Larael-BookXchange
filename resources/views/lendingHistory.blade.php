<section class="main-content">
    <div class="container">	
        <div class="row">
            @include('slidebox')
            <div class="col-md-9">
                <div class="accountRightSide ps-md-5 ps-lg-9">
                    <h6>Lending History</h6>
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
                                        <th>Requested By</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach($lendingHistory as $lendingbook)
                                    <tr>
                                        <td>
                                            <div class="bookCoverArea">
                                                <img src="{{asset('/upload/books/'.$lendingbook->book_image)}}">
                                            </div>
                                        </td>
                                        <td>{{$lendingbook->book_name}}</td>
                                        <td>{{$lendingbook->rqst_date}}</td>
                                        <td>{{$lendingbook->issued_date}}</td>
                                        <td>{{$lendingbook->return_date}}</td>
                                        <td>@if ($lendingbook->status == 0)
                                            Requested
                                            @elseif ($lendingbook->status == 1)
                                            Issued
                                            @elseif ($lendingbook->status == 2)
                                            Returning
                                            @elseif ($lendingbook->status == 3)
                                            Returned
                                            @endif
                                        </td>
                                        <td>{{$lendingbook->user_name}}</td>
                                        <td>
                                            <a href="/bookXchange/dashboard/viewbook/{{$lendingbook->book_id}}" class="btn btn-primary btn-sm">View</a>
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