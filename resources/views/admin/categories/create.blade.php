@extends('admin.layout')

@section('content')

    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Category</h3>
                        </div>
                        <div class="card-body">

                            @include('validation_errors')

                            <form method="post" action="{{ route('categories.store') }}">

                                @csrf

                                <div class="form-group mb-3">
                                    <label for="cat_name" class="form-label">Name</label>
                                    <input type="text" name="cat_name" class="form-control" id="cat_name" placeholder="Enter category name" value="{{ old('cat_name') }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
