<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->paginate(20);
        return view('front.home' , compact('books'));
    }
}
