<section id="page-title" class="page-title">
    <div class="container">
        <h1>Edit Book</h1>
        <ol class="breadcrumb-trail breadcrumb breadcrumbs">
            <li><span><a class="home" href="/bookXchange/dashboard">Dashboard</a></span></li>
            <li><span><a class="home" href="/bookXchange/myaccount">Myaccount</a></span></li>
            <li><span><a class="home" href="/bookXchange/myaccount/mybook">Mybook</a></span></li>
            <li class="active"><span class="active">Edit Book</span></li>
        </ol>		
    </div>
</section>

<section class="main-content grey-bg pt-5 pb-5">
	<div class="container">
		<div id="content" class="addBookWapper white-bg" role="main">
			<h4 class="mb-3 pt-5 text-center">Edit the book you want to change book details</h4>

			<form action="{{route('BookController.updateeditbook')}}" id="editbook-form" class="loginForm" method="post" enctype="multipart/form-data" automcomplete="off">
				@csrf
                <div class="mb-3">
                    <input type="text" name="book_id" value="{{$bookDetail->id}}" hidden>
					<label for="bookname" class="form-label">Name&nbsp;<span class="required">*</span></label>
					<input type="text" class="inputGrey form-control" name="book_name" value="{{$bookDetail->book_name}}" id="bookname">
				</div>
				<div class="mb-3">
					<label for="bookname" class="form-label">Genre&nbsp;<span class="required">*</span></label>
					<select class="inputGrey form-select" name="book_genre"  id="bookgenre">
						@foreach ($bookGenre as $g)
						@if ($g->id == $bookDetail->genre_id)
						<option value="{{$g->id}}" selected>{{$g->genre_name}}</option>
						@else
						<option value="{{$g->id}}">{{$g->genre_name}}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="mb-3">
							<label for="bookauthor" class="form-label">Author&nbsp;<span
									class="required">*</span></label>
							<input type="text" class="inputGrey form-control" name="book_author" value="{{$bookDetail->author}}" id="bookauthor"
								value="">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="mb-3">
							<label for="bookpublisher" class="form-label">Publisher&nbsp;<span
									class="required">*</span></label>
							<input type="text" class="inputGrey form-control" name="book_publisher" value="{{$bookDetail->publisher}}" id="bookpublisher"
								value="">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="mb-3">
							<label for="bookedition" class="form-label">Edition&nbsp;<span
									class="required">*</span></label>
							<input type="text" class="inputGrey form-control" name="book_edition" id="bookedition" value="{{$bookDetail->edition}}"
								value="" style="appearance: auto;">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="mb-3 bookISBN">
							<label for="bookISBN" class="form-label">ISBN&nbsp;<span class="required">*</span></label>
							<input type="text" class="inputGrey form-control" name="book_isbn" value="{{$bookDetail->isbn}}" id="book_isbn" value=""
								style="appearance: auto;">
							<div class="codeArea">
								<img src="{{asset('web_asset/assets/images/codeScan.png')}}">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="mb-3">
							<label for="booklanguage" class="form-label">Language&nbsp;<span
									class="required">*</span></label>
							<select class="inputGrey form-select"  name="book_language" >
								@foreach ($bookLang as $l)
								@if ($l->id == $bookDetail->book_lang)
								<option value="{{$l->id}}" selected>{{$l->language}}</option>
								@else
								<option value="{{$l->id}}">{{$l->language}}</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="mb-3">
							<label for="bookcondition" class="form-label">Condition&nbsp;<span
									class="required">*</span></label>
							<select class="inputGrey form-select" name="bookcondition" id="bookcondition">
								@if ($bookDetail->book_condition == 1)
								<option value="2">Best</option>
								<option value="1" selected>Good</option>
								<option value="0">Bad</option>
								@elseif ($bookDetail->book_condition == 2)
								<option value="2" selected>Best</option>
								<option value="1">Good</option>
								<option value="0">Bad</option>
								@elseif ($bookDetail->book_condition == 0)
								<option value="2">Best</option>
								<option value="1">Good</option>
								<option value="0" selected>Bad</option>
								@endif
							</select>
						</div>
					</div>
				</div>
				<div class="mb-3">
					<label for="bookname" class="form-label">Description</label>
					<textarea class="form-control inputGrey" rows="4" id="bookdescription" name="book_des">{{$bookDetail->description}}</textarea>
				</div>
				<div class="mb-3">
					<label for="starRating" class="form-label">Rating</label>
					<div class="">
					<fieldset class="rate">
						<input type="radio" id="rating10" onclick="starmark(this)" name="rating" value="5" /><label for="rating10" title="5 stars"></label>
						<input type="radio" id="rating9" onclick="starmark(this)" name="rating" value="4.5" /><label class="half" for="rating9" title="4 1/2 stars"></label>
						<input type="radio" id="rating8" onclick="starmark(this)" name="rating" value="4" /><label for="rating8" title="4 stars"></label>
						<input type="radio" id="rating7" onclick="starmark(this)" name="rating" value="3.5" /><label class="half" for="rating7" title="3 1/2 stars"></label>
						<input type="radio" id="rating6" onclick="starmark(this)" name="rating" value="3" /><label for="rating6" title="3 stars"></label>
						<input type="radio" id="rating5" onclick="starmark(this)" name="rating" value="2.5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
						<input type="radio" id="rating4" onclick="starmark(this)" name="rating" value="2" /><label for="rating4" title="2 stars"></label>
						<input type="radio" id="rating3" onclick="starmark(this)" name="rating" value="1.5" /><label class="half" for="rating3" title="1 1/2 stars"></label>
						<input type="radio" id="rating2" onclick="starmark(this)" name="rating" value="1" /><label for="rating2" title="1 star"></label>
						<input type="radio" id="rating1" onclick="starmark(this)" name="rating" value="0.5" /><label class="half" for="rating1" title="1/2 star"></label>
					
					</fieldset>
					<input type="text" name="rating" id="rating" value="{{$bookDetail->book_rating}}" hidden>
					</div> 
					
				</div>
				<div class="form-group">
					<label for="bookcover" class="form-label">Upload Book Cover</label>
					<div class="custom-file">
                        <input type="text" name="old_book_image" value="{{$bookDetail->book_image}}" hidden>
						<input class="form-control" type="file" name="book_image" id="book_image"
							style="max-width: 300px;">
					</div>
				</div>
				<div class="mb-3 mt-5">
					<button type="submit" class="btn btn-primary btn-block py-3" name="editbook"
						style="width: 300px;">Submit</button>
				</div>
			</form>
            @if(session('editerror') != null)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('editerror')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @php
            Session::forget('editerror');
            @endphp
            @endif
		</div>
	</div>
</section>
<script>
function starmark(item)
{
   var count  = item.value;
   $('#rating').val(count);
}
$(document).ready(function () {
rating = $('#rating').val();
 {
    for(i=0;i<=rating*2;i++) {
        $('#rating'+(i)).attr("checked","checked");
    }
 }
});
</script>