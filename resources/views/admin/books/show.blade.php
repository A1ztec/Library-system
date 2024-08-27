@extends('admin.layout')



@section('content')

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Book Details</h3>

                <div class="card-tools">
                    <a href="{{ route('books.index') }}" class="btn btn-tool" title="Back to List">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Book Details -->
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                Book Details
                            </div>
                            <div class="card-body">
                                <p><strong>Title:</strong> {{ $book->title }}</p>
                                <p><strong>Description:</strong> {{ $book->description }}</p>
                                <p><strong>Category:</strong> {{ $book->category->cat_name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Author Details -->
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                Author Details
                            </div>
                            <div class="card-body">
                                <p><strong>Author Name:</strong> {{ $book->author_name }}</p>
                                <p><strong>Author Image:</strong></p>
                                <img src="{{ asset($book->author_img) }}"
                                     style="width: 100px; height: auto; object-fit: cover; border-radius: 5px;"
                                     alt="Author Image">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-success text-white">
                                Book Image and Price
                            </div>
                            <div class="card-body">
                                <p><strong>Price:</strong> {{ $book->price }}</p>
                                <p><strong>Quantity:</strong> {{ $book->quantity }}</p>
                                <p><strong>Book Image:</strong></p>
                                <img src="{{ asset($book->book_img) }}"
                                     style="width: 100px; height: auto; object-fit: cover; border-radius: 5px;"
                                     alt="Book Image">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-4">
                    <form method="post" action="{{ route('books.destroy', $book) }}" class="d-inline" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>

@endsection
