<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.css')
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .content-wrapper {
            min-height: calc(100vh - 100px);
            display: flex;
            flex-direction: column;
        }

        /* Footer specific styling */
        footer {
            margin-top: auto;
        }
    </style>
</head>
<body>

@include('front.header')

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="discover-items">
        <div class="container">
            <div class="discover-items">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="section-heading">
                                <h2>Discover Our <em>Item</em>.</h2>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form id="search-form" name="gs" method="get" role="search" action="{{ route('explore') }}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="text" name="search" class="searchText" placeholder="Type Something..." autocomplete="on">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <select name="category" class="form-select" aria-label="Default select example">
                                                <option value="">All Categories</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-2">
                                        <fieldset>
                                            <button type="submit" class="main-button">Search</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="currently-market">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="section-heading">
                                            <div class="line-dec"></div>
                                            <h2><em>Items</em> Currently In The Market.</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row grid">
                                        @foreach($books as $book)
                                            <div class="col-lg-6 currently-market-item all msc">
                                                <div class="item">
                                                    <div class="left-image">
                                                        <img src="{{asset($book->book_img)}}" alt="" style="border-radius: 20px; min-width: 195px;">
                                                    </div>
                                                    <div class="right-content">
                                                        <h4>{{$book->title}}</h4>
                                                        <span class="author">
                    <img src="{{asset($book->author_img)}}" alt="" style="max-width: 50px; border-radius: 50%;">
                    <h6>{{$book->author_name}}</h6>
                  </span>
                                                        <div class="line-dec"></div>
                                                        <span class="bid">
                    Current Available<br><strong>{{$book->quantity}}</strong><br>
                  </span>

                                                        <div class="text-button">
                                                            <a href="{{route('book_details' , $book)}}">View Item Details</a>
                                                        </div>
                                                        <br>

                                                        <div class="">
                                                            <a  class="btn btn-primary"  href="{{route('borrow_book' , $book)}}">Apply to Borrow</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('front.footer')

</body>
</html>
