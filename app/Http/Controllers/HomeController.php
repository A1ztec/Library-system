<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $books = Book::with('category')->paginate(20);
        return view('front.home' , compact('books'));
    }

    public function borrowBook(Book $book)
    {
        $user_id = auth()->id();
        $quantity = $book->quantity;
        $borrow = Borrow::where('user_id', $user_id)->where('book_id', $book->id)->first();

        if ($borrow) {
                flash()->error('You have already a pending request');
                return back();
            }


        if ($quantity >= 1) {
            if (!$borrow) {
                $borrow = new Borrow();
                $borrow->user_id = $user_id;
                $borrow->book_id = $book->id;
            }
            $borrow->status = 'pending';
            $borrow->save();
            flash()->success('Book requested successfully');
        } else {
            flash()->error('Book is not available');
        }

        return back();
    }


    public function bookHistory()
    {
        $user_id = auth()->id();
        $borrows = Borrow::where('user_id', $user_id)->with('book')->get();
        return view('front.book_history', compact('borrows'));
    }

    public function cancelRequest(Borrow $borrow)
    {
        if ($borrow->status == 'approved' || $borrow->status == 'returned') {
            flash()->error('You can not cancel this request');
            return back();

        } else {

            $borrow->delete();
            flash()->success('Request cancelled successfully');
            return back();
        }
    }

    public function exploredBooks(Request $request)
    {
        $books = Book::query();
        $categories = Category::all();


        if ($request->has('search') && !empty($request->search)) {
            $books->where('title', 'like', '%' . $request->search . '%');
        }


        if ($request->has('category') && !empty($request->category)) {
            $books->where('category_id', $request->category);
        }


        $books = $books->get();

        // Pass the results and categories to the view
        return view('front.explore', compact('books', 'categories'));
    }

    public function bookDetails(Book $book)
    {
        return view('front.book_details', compact('book'));
    }







}
