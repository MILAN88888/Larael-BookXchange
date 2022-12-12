<!-- search Area -->
<section class="searchArea">
    <div class="container">
        <form class="" method="get" action="@if (session()->has('user_id')) {{route('BookController.searchbook')}} @else {{route('BookController.searchbookhome')}} @endif">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                        <input name="title" value="" type="text" class="form-control" id="keyword" placeholder="Book Title">
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                        <select name="book_genre" id="product_cat" class="form-control">
                            <option value="">Book Category</option>
                           @foreach ($uniqueBookGenre as $uniqueGenre)
                            <option value="{{$uniqueGenre->id}}">{{$uniqueGenre->genre_name}}</option>
                           @endforeach
                        </select>
                        <i class="select-arrow fa fa-angle-down"></i>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                        <select name="book_author" id="book_author" class="form-control">
                            <option value="">Book Author</option>
                            @foreach ($searchAuthor as $author)
                            <option value="{{$author->author}}">{{$author->author}}</option>
                            @endforeach
                        </select>
                        <i class="select-arrow fa fa-angle-down"></i>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-search"></i>&nbsp;Find Book</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
<!-- /search Area -->
