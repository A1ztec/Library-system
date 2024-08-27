@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title mb-0">Add Book</h3>
                        </div>
                        <div class="card-body">
                            @include('validation_errors')

                            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="category" class="form-label">Category</label>
                                        <select id="category" name="category_id" class="form-select" required>
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach($categories as $cate)
                                                <option value="{{ $cate->id }}">
                                                    {{ $cate->cat_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter book title" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="author_name" class="form-label">Author Name</label>
                                        <input type="text" name="author_name" class="form-control" id="author_name" placeholder="Enter author name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter book description" required></textarea>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" name="price" class="form-control" id="price" placeholder="Enter price" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="book_img" class="form-label">Book Image</label>
                                        <input type="file" name="book_image" class="form-control" id="book_img" accept="image/*">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="author_img" class="form-label">Author Image</label>
                                    <input type="file" name="author_image" class="form-control" id="author_img" accept="image/*">
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
