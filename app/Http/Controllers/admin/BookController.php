<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $records = Book::with('category')->paginate(20);
        return view('admin.books.index', compact('records'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create' , compact('categories'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'book_image' => 'nullable|image',
            'author_image' => 'nullable|image',
            'quantity' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('book_image')) {
            $data['book_img'] = $request->file('book_image')->store('images', 'public');
        }
        if ($request->hasFile('author_image')) {
            $data['author_img'] = $request->file('author_image')->store('images', 'public');
        }

        Book::create($data);
        flash()->success('Book Created Successfully');
        return redirect(route('books.index'));
    }



    public function show(Book $book)
    {

        return view('admin.books.show', compact('book'));
    }


    public function edit(Book $book)
    {

        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }


    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'book_img' => 'image',
            'author_img' => 'image',
            'quantity' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($request->hasfile('book_img')){
            File::delete(storage_path('app/public/'.$book->book_img));
            $data['book_img']=$request->book_img->store('images','public');
        }
        if($request->hasfile('author_img')){
            File::delete(storage_path('app/public/'.$book->author_img));
            $data['author_img']=$request->author_img->store('images','public');
        }
        $book->update($data);
        flash()->success('Book Updated Successfully');
        return redirect(route('books.index'));

    }


    public function destroy(Book $book)
    {
        $book->delete();
        File::delete(storage_path('app/public/'.$book->book_img));
        File::delete(storage_path('app/public/'.$book->author_img));
        flash()->success('Book Deleted Successfully');
        return redirect(route('books.index'));

    }

    public function borrowRequest()
    {
        $records = Borrow::with('book', 'user')->get();
        return view('admin.books.borrow_request', compact('records'));

    }

    public function approveBorrow(Borrow $borrow)
    {
        if ($borrow->status == 'approved') {
            flash()->error('Borrow Request Already Approved');

        }else {
            $borrow->status = 'approved';
            $borrow->book->decrement('quantity');

            $borrow->save();
            flash()->success('Borrow Request Approved Successfully');

        }
        return back();
    }

    public function returnBook(Borrow $borrow)
    {
        if ($borrow->status == 'returned') {
            flash()->error('Book Already Returned');
        }else {
            $borrow->status = 'returned';
            $borrow->book->increment('quantity');
            $borrow->save();
            flash()->success('Book Returned Successfully');
        }
        return back();
    }

    public function rejectBorrow(Borrow $borrow)
    {
        if ($borrow->status == 'rejected') {
            flash()->error('Borrow Request Already Rejected');
        }else {
            $borrow->status = 'rejected';
            $borrow->save();
            flash()->success('Borrow Request Rejected Successfully');
        }
        return back();
    }
}
