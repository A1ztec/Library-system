@extends('admin.layout')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Edit Book</h3>
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="card-body p-4">
                            @include('validation_errors')

                            <form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="category" class="form-label">Category</label>
                                        <select id="category" name="category_id" class="form-select" required>
                                            <option value="" disabled>Select Category</option>
                                            @foreach($categories as $cate)
                                                <option value="{{ $cate->id }}" {{ $book->category_id == $cate->id ? 'selected' : '' }}>
                                                    {{ $cate->cat_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $book->title) }}" required>
                                    </div>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="author_name" class="form-label">Author Name</label>
                                        <input type="text" name="author_name" class="form-control" id="author_name" value="{{ old('author_name', $book->author_name) }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity', $book->quantity) }}" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="4" required>{{ old('description', $book->description) }}</textarea>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $book->price) }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="book_img" class="form-label">Book Image</label>
                                        <input type="file" name="book_img" class="form-control" id="book_img" accept="image/*">
                                    </div>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="author_img" class="form-label">Author Image</label>
                                        <input type="file" name="author_img" class="form-control" id="author_img" accept="image/*">
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success btn-lg shadow-sm">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection
