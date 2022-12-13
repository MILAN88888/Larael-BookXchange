@if(session('rejectmsg') != null)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('rejectmsg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @php
    Session::forget('rejectmsg');
    @endphp
@endif
<section class="request">
    <div class="sent-request-div">
        <h4 class="mt-4">Sent Request</h4>
        @if (sizeof($allsentrequest) == 0) {
            <p class="text-info">No Send Request</p>
        }
        @endif
        @foreach ($allsentrequest as $sentrequest)
        <div class="sent-request-item">
            @if ($sentrequest->status == 0)
            <p class="text-info">You requested {{ $sentrequest->book_name }} to {{$sentrequest->owner_name}}</p>
            @elseif ($sentrequest->status == 1)
            <p>{{ $sentrequest->owner_name }} issued {{$sentrequest->book_name}} to you</p>
            @elseif ($sentrequest->status == 2)
            <p class="text-info">You requested return {{$sentrequest->book_name}} to {{ $sentrequest->owner_name }}</p>
            @elseif ($sentrequest->status == 3)
            <p class="text-info">{{ $sentrequest->owner_name }} granted return of {{$sentrequest->book_name}}</p>
            @elseif ($sentrequest->status == 4)
            <P class="text-info">Reason: {{$sentrequest->reason}}</P>
            <p class="text-danger">request cancelled</p>
            @endif
        </div>
        
        @endforeach
    </div>    
    <div class="recieved-request-div">
        <h4 class="mt-4">Received Request</h4>
        @if (sizeof($allreceivedrequest) == 0) {
            <p class="text-info">No Send Request</p>
        }
        @endif
        @foreach ($allreceivedrequest as $receivedrequest)
        <div class="sent-request-item">
            @if ($receivedrequest->status == 0)
            <p class="text-info">{{$receivedrequest->requester_name}} requested you {{$receivedrequest->book_name}} </p>
            <form id="grand-form" action="{{route('BookController.grantrequest')}}" method="post"
                onsubmit="return confirm('Do you really want to comfirm request?');" style="display:inline-block">
                @csrf
                <input type="text" value="{{$receivedrequest->id}}" name="requestid" hidden>
                <button type="submit" class="btn btn-sm btn-success" name="requestgrand">Grant</button>
            </form>
            <button onclick="reject()" class="btn btn-sm btn-danger">Reject</button>
            <div id="request-reject-div">
                <button id="request-closer">x</button>
                <h3 class="mb-4 text-white"><b>________Reason_______</b></h3>
                <form id="reject-form" action="{{route('BookController.requestreject')}}" method="post">
                    @csrf
                    <input type="text" value="{{$receivedrequest->id}}" name="requestid" hidden>
                    <input type="text" name="reason" placeholder="Enter reason for rejection">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-sm btn-success" name="requestgrand">submit</button>
                </form>
            </div>
    
            @elseif ($receivedrequest->status == 1)
            <p class="text-info">You Granted Requst to {{$receivedrequest->requester_name}} for {{ $receivedrequest->book_name }}</p>
            @elseif ($receivedrequest->status == 2)
            <p class="text-info"> {{ $receivedrequest->requester_name }} requested you to return {{$receivedrequest->book_name}}</p>
            <button onclick="grant()" class="btn btn-sm btn-success">grant</button>
            <div id="return-grand-div">
                <button id="grand-closer">x</button>
                <h3 class="mb-4 text-white"><b>______User Rating_____</b></h3>
                <form id="returngrand-form" action="{{route('BookController.userrating')}}" method="post">
                    @csrf
                    <input type="text" value="{{$receivedrequest->id}}" name="requestid" hidden>
                    <input type="text" value="{{$receivedrequest->requester_id}}" name="requesterid" hidden>
                    <select name="requester_rating" class="requester_rating">
                        <option>-1</option>
                        <option>3</option>
                    </select>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-sm btn-success" value="submit" name="userrating">
                </form>
            </div>
            @elseif ($receivedrequest->status == 3)
            <p class="text-info">You Granted Return Request to {{ $receivedrequest->requester_name }} for {{$receivedrequest->book_name}}</p>
            @elseif ($receivedrequest->status == 4)
            <P class="text-info">You cancelled the request by :{{$receivedrequest->requester_name}}</P>
            <p>request cancelled</p>
            @endif
        </div>
        @endforeach
    </div>
    </section>
    <script>
         $('#request-closer').click(function () {
        $(document).find('#request-reject-div').hide()
        $(document).find('#reject-form')[0].reset();

    })
    
    $('#grand-closer').click(function () {
        $(document).find('#return-grand-div').hide()
        $(document).find('#returngrand-form')[0].reset();

    })
    </script>