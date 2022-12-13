<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Function addbook
     * 
     * @return mixed rendering addbook page.
     */
    public function addbook()
    {
        $bookGenre = DB::table('book_genre')->get();
        $bookLang = DB::table('language')->get();
        return view('header') . view('addbook', ['bookGenre' => $bookGenre, 'bookLang' => $bookLang]) . view('footer');
    }

    /**
     * Function viewBook
     * 
     */
    public function viewBook($id)
    {

        $bookdetail = $this->getBookDetailById($id);
        $uniqueBookGenre = $this->getUniqueBookGenre();
        $searchAuthor = $this->getSearchAuthor();
        $bookIsbn = $bookdetail->isbn;
        $booksWithSameIsbn = $this->getBooksWithSameIsbn($bookIsbn);
        return view('header') . view('viewbook', ['bookdetail' => $bookdetail, 'uniqueBookGenre' => $uniqueBookGenre, 'searchAuthor' => $searchAuthor, 'booksWithSameIsbn' => $booksWithSameIsbn]) . view('footer');
    }
    /**
     * Function viewBook
     * 
     */
    public function bookreview($id)
    {

        return view('header') . view('bookreview') . view('footer');
    }

    /**
     * Function getAddBook
     * 
     */
    public function getAddBook(Request $request)
    {
        $bookName = $request->post('book_name');
        $bookGenre = $request->post('book_genre');
        $bookAuthor = $request->post('book_author');
        $bookPublisher = $request->post('book_publisher');
        $bookEdition = $request->post('book_edition');
        $bookIsbn = $request->post('book_isbn');
        $bookLang = $request->post('book_language');
        $bookCondition = $request->post('bookcondition');
        $bookDes = $request->post('book_des');
        $bookRating = $request->post('rating');
        $bookReview = $request->post('book_review');
        if ($request->hasFile('book_image')) {
            if ($request->file('book_image')->getSize() > 0) {
                $image = $request->book_image;
                $bookImage = $image->getClientOriginalName();
                $imgType = $image->getClientOriginalExtension();
                $randomno = rand(0, 100000);
                $generateName = 'books' . date('Ymd') . $randomno;
                $generateBookImage = $generateName . '.' . $imgType;
                $desImage = public_path() . '/upload/books/' . $generateBookImage;
                move_uploaded_file($_FILES['book_image']['tmp_name'], $desImage);
                $newBookImage = $generateBookImage;
            }
        }
        if (!empty($bookName) && !empty($bookGenre) && !empty($bookAuthor) && !empty($bookPublisher) && !empty($bookEdition) && !empty($bookIsbn) && !empty($bookLang) && !empty($bookCondition) && !empty($bookDes) && !empty($bookRating) && !empty($bookReview)) {
            $result = DB::table('books')->insert(['book_name' => $bookName, 'book_image' => $newBookImage, 'genre_id' => $bookGenre, 'author' => $bookAuthor, 'edition' => $bookEdition, 'publisher' => $bookPublisher, 'description' => $bookDes, 'book_rating' => $bookRating, 'book_lang' => $bookLang, 'isbn' => $bookIsbn, 'owner_id' => session('user_id')]);
            if ($result) {
                $request->session()->flash('addbookerror', "$bookName is added successfully");
                return redirect('/bookXchange/addbook');
            } else {
                $request->session()->flash('addbookerror', 'failed!!');
                return redirect('/bookXchange/addbook');
            }
        } else {
            $request->session()->flash('addbookerror', 'Please Filled the all field Carefully!!');
            return redirect('/bookXchange/addbook');
        }
    }

    /**
     * Function getMyBook
     * 
     */
    public function getMyBook()
    {
        $mybooks = Books::where(['owner_id' => session('user_id')])->get();
        return view('header') . view('mybooks', ['mybooks' => $mybooks]) . view('footer');
    }

    /**
     * Function request section
     * 
     */
    public function bookRequest()
    {
        $receivedRequest = DB::table('request')
            ->select('request.*', 'register.user_name as requester_name','books.book_name')
            ->join('books', 'books.id', 'request.book_id')
            ->join('register', 'register.id', 'request.owner_id')
            ->where('request.owner_id', session('user_id'))
            ->get();
        $sentRequest = DB::table('request')
            ->select('request.*', 'register.user_name as owner_name','books.book_name')
            ->join('books', 'books.id', 'request.book_id')
            ->join('register', 'register.id', 'request.requester_id')
            ->where('request.requester_id', session('user_id'))
            ->get();

        return view('header') . view('bookrequest', ['allreceivedrequest' => $receivedRequest, 'allsentrequest' => $sentRequest]) . view('footer');
    }
    /**
     * Function lending History
     * 
     */
    public function lendingHistory()
    {
        $lendingHistory = DB::table('request')->select('request.*', 'register.user_name', 'books.book_image', 'books.book_name')->join('register', 'register.id', 'request.requester_id')->join('books', 'books.id', 'request.book_id')->where(['request.owner_id' => session('user_id')])->get();
        return view('header') . view('lendingHistory', ['lendingHistory' => $lendingHistory]) . view('footer');
    }
    /**
     * Function lending borrows
     * 
     */
    public function borrows()
    {
        $borrows = DB::table('request')->select('request.*', 'register.user_name', 'books.book_image', 'books.book_name')->join('register', 'register.id', 'request.requester_id')->join('books', 'books.id', 'request.book_id')->where(['request.requester_id' => session('user_id')])->get();
        return view('header') . view('borrows', ['borrows' => $borrows]) . view('footer');
    }
    /**
     * Function lending wishlist
     * 
     */
    public function wishlist()
    {
        $wishlist = DB::table('wish_list')->select('wish_list.*', 'books.book_image', 'books.book_name')->join('books', 'books.id', 'wish_list.book_id')->where(['wish_list.user_id' => session('user_id')])->get();
        return view('header') . view('wishlist', ['wishlist' => $wishlist]) . view('footer');
    }

    /**
     * Function getRecentBook
     * 
     * @return object list of recent books
     */
    public function getRecentBook(): object
    {
        $recentBooks = DB::table('books')->join('book_genre', 'books.genre_id', 'book_genre.id')->select('books.*', 'book_genre.genre_name')->orderBy('upload_date', 'desc')->get();
        return $recentBooks;
    }

    /**
     * Function getMostRated
     * 
     * @return object list of most rated books.
     */
    public function getMostRated(): object
    {
        $mostRateds = DB::table('books')->join('book_genre', 'books.genre_id', 'book_genre.id')->select('books.*', 'book_genre.genre_name')->orderBy('book_rating', 'desc')->get();
        return $mostRateds;
    }

    /**
     * Function getUniqueBookGenre
     * 
     * @return object list of unique book genre.
     */
    public function getUniqueBookGenre(): object
    {
        $uniqueBookGenre = DB::table('books')->join('book_genre', 'books.genre_id', 'book_genre.id')->select('book_genre.genre_name', 'book_genre.id', DB::raw('COUNT(books.genre_id) as genre_no'))->groupBy('book_genre.id', 'book_genre.genre_name')->orderBy('genre_no', 'desc')->get();
        return $uniqueBookGenre;
    }


    /**
     * Function getSearchAuthor
     * 
     * @return object list of author.
     */
    public function getSearchAuthor(): object
    {
        $searchAuthor = DB::table('books')->select('author', DB::raw('COUNT(author) as author_no'))->groupBy('author')->orderBy('author_no', 'desc')->get();
        return $searchAuthor;
    }

    /**
     * Function getBookDetailById
     * 
     * @param $id is book id.
     * 
     * @return object is book detail
     */
    public function getBookDetailById(int $id): object
    {
        $bookDetail = DB::table('books')->where([
            'id' => $id
        ])->first();
        return $bookDetail;
    }

    /**
     * Function getBooksWithSameIsbn
     * 
     * @param $bookIsbn is book isbn
     * 
     * @return object is list of books.
     */
    public function getBooksWithSameIsbn(string $bookIsbn): object
    {
        $booksWithSameIsbn = DB::table('books')->select('books.*', 'register.user_name', 'register.user_address')->join('register', 'books.owner_id', 'register.id')->where(['isbn' => $bookIsbn])->get();
        return $booksWithSameIsbn;
    }

    /**
     * Funciton searchBook
     * 
     */
    public function searchBook(Request $request)
    {
        $bookTitle = $request->get('title');
        $bookGenre = $request->get('book_genre');
        $bookAuthor = $request->get('book_author');
        if (empty($bookTitle)) {
            $bookTitle = '';
        }
        if (empty($bookGenre)) {
            $bookGenre = 0;
        }
        if (empty($bookAuthor)) {
            $bookAuthor = '';
        }
        $searchBooksList = $this->getSearchBooksList($bookTitle, $bookGenre, $bookAuthor);
        $uniqueBookGenre = $this->getUniqueBookGenre();
        $searchAuthor = $this->getSearchAuthor();
        return view('header') . view('searchbook', ['uniqueBookGenre' => $uniqueBookGenre, 'searchAuthor' => $searchAuthor, 'searchBooksList' => $searchBooksList]) . view('footer');
    }

    /**
     * Function getSearchBook
     * 
     * @param $bookTitle is book title
     * @param $bookGenre is book genre
     * @param $bookAuthor is book author
     * 
     * @return object is list of books.
     */
    public function getsearchBooksList(string $bookTitle, int $bookGenre, string $bookAuthor): object
    {

        if (empty($bookTitle)) {
            $bookTitle = null;
        } else {
            $bookTitle = "%$bookTitle%";
        }
        if (empty($bookGenre)) {
            $bookGenre = 0;
        } else {
            $bookGenre = "%$bookGenre%";
        }
        if (empty($bookAuthor)) {
            $bookAuthor = null;
        } else {
            $bookAuthor = "%$bookAuthor%";
        }
        $searchBooksList = DB::table('books')->select('books.*', 'book_genre.genre_name')->join('book_genre', 'books.genre_id', 'book_genre.id')->where('books.book_name', 'LIKE', "{$bookTitle}")->orWhere('books.genre_id', 'LIKE', "{$bookGenre}")->orWhere('books.author', 'LIKE', "{$bookAuthor}")->get();
        return $searchBooksList;
    }

    /**
     * Function getEditBook
     * 
     */
    public function getEditBook($id)
    {
        $bookDetail = DB::table('books')->where(['id' => $id])->first();
        $bookGenre = DB::table('book_genre')->get();
        $bookLang = DB::table('language')->get();
        return view('header') . view('editbook', ['bookDetail' => $bookDetail, 'bookGenre' => $bookGenre, 'bookLang' => $bookLang]) . view('footer');
    }

    /**
     * Function upateEditBook
     * 
     */
    public function updateEditBook(Request $request)
    {
        $bookId = $request->post('book_id');
        $bookName = $request->post('book_name');
        $bookGenre = $request->post('book_genre');
        $bookAuthor = $request->post('book_author');
        $bookPublisher = $request->post('book_publisher');
        $bookEdition = $request->post('book_edition');
        $bookIsbn = $request->post('book_isbn');
        $bookLang = $request->post('book_language');
        $bookCondition = $request->post('bookcondition');
        $bookDes = $request->post('book_des');
        $bookRating = $request->post('rating');
        $newBookImage = $request->post('old_book_image');
        if ($request->hasFile('book_image')) {
            if ($request->file('book_image')->getSize() > 0) {
                $image = $request->book_image;
                $bookImage = $image->getClientOriginalName();
                $imgType = $image->getClientOriginalExtension();
                $randomno = rand(0, 100000);
                $generateName = 'books' . date('Ymd') . $randomno;
                $generateBookImage = $generateName . '.' . $imgType;
                $desImage = public_path() . '/upload/books/' . $generateBookImage;
                move_uploaded_file($_FILES['book_image']['tmp_name'], $desImage);
                $newBookImage = $generateBookImage;
            }
        }
        if (!empty($bookName) && !empty($bookGenre) && !empty($bookAuthor) && !empty($bookPublisher) && !empty($bookEdition) && !empty($bookIsbn) && !empty($bookLang) && !empty($bookCondition) && !empty($bookDes) && !empty($bookRating)) {
            $result = DB::table('books')->where(['id' => $bookId])->update(['book_name' => $bookName, 'book_image' => $newBookImage, 'genre_id' => $bookGenre, 'author' => $bookAuthor, 'edition' => $bookEdition, 'publisher' => $bookPublisher, 'description' => $bookDes, 'book_rating' => $bookRating, 'book_lang' => $bookLang, 'isbn' => $bookIsbn, 'book_condition' => $bookCondition]);
            if ($result) {
                $request->session()->flash('editmsg', "$bookName is updated successfully");
                return redirect('/bookXchange/myaccount/mybook');
            } else {
                $request->session()->flash('editmsg', "There is no any update in $bookName!!");
                return redirect('/bookXchange/myaccount/mybook');
            }
        } else {
            $request->session()->flash('editerror', 'Please Filled the all field Carefully!!');
            return redirect('/bookXchange/dashboard/myaccount/editbook/' . $bookId);
        }
    }

    /**
     * Function getDeleteWishList
     * 
     */
    public function getDeleteWishList($id)
    {
        $res = DB::table('wish_list')->where(['id' => $id])->delete();
        if ($res) {
            session()->flash('wishmsg', 'Deleted Successfully!!');
            return redirect('/bookXchange/myaccount/wishlist');
        } else {
            session()->flash('wishmsg', 'Delete failed!!');
            return redirect('/bookXchange/myaccount/wishlist');
        }
    }

    /**
     * Function getRejectRequest
     * 
     */
    public function getRejectRequest(Request $request)
    {
        $bookStatus = 4;
        $requestId = $request->post('requestid');
        $reason = $request->post('reason');
        $res = DB::table('request')
            ->where('id', $requestId)
            ->update(['status'=>$bookStatus, 'reason'=>$reason]);
        if($res) {
            session()->flash('rejectmsg', "You have rejected book request !!");
        } else {
            session()->flash('rejectmsg', 'Your rejection is failed!!');
        }
        return redirect('/bookXchange/bookrequest');
    }

    /**
     * Function updateGrandRequest
     * 
     */
    public function updateGrantRequest(Request $request)
    {
        $requestId = $request->post('requestid');
        $bookStatus = 1;
        $res = DB::table('request')
            ->where('id', $requestId)
            ->update(['status'=>$bookStatus]);
        if($res) {
            session()->flash('rejectmsg', "You have granded book request !!");
        } else {
            session()->flash('rejectmsg', 'Your grand is failed!!');
        }
        return redirect('/bookXchange/bookrequest');

    }
    /**
     * Function insertUserRating
     * 
     */
    public function insertUserRating(Request $request) 
    {
        $requestId = $request->post('requestid');
        $userId = $request->post('requesterid');
        $userRating = $request->post('requester_rating');
        $ratedDate = date('y-m-d');

        $res = DB::table('request')
        ->where('id', $requestId)->update(['status'=>3]);

        DB::table('users_rating')
            ->insert(['user_id'=>$userId, 'rating'=>$userRating, 'rated_date'=>$ratedDate]);
        if($res) {
            session()->flash('rejectmsg', "You have granted the return!!");
        } else {
            session()->flash('rejectmsg', 'Your Grant is failed!!');
        }
        return redirect('/bookXchange/bookrequest');
    }
}
