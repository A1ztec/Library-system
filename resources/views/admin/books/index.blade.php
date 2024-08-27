@extends('admin.layout')

@section('content')

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Books</h3>

            </div>
            <div class="card-body">
                <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> Add Book
                </a>
                @include('flash::message')

                @if(count($records))
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Author name</th>
                                <th>book Image</th>
                                <th>description</th>
                                <th>Category</th>
                                <th>price</th>
                                <th>quantity</th>
                                <th>author image</th>
                                <th>Edit</th>
                                <th>show</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $record->title }}</td>
                                    <td>{{$record->author_name}}</td>
                                    <td>
                                        <img src="{{ asset($record->book_img) }}"
                                             style="width: 100px; height: auto; object-fit: cover; border-radius: 5px;"
                                             alt="Post Image">
                                    </td>
                                    <td>{{ $record->description }}</td>
                                    <td>{{ $record->category->cat_name }}</td>
                                    <td>{{ $record->price }}</td>
                                    <td>{{ $record->quantity }}</td>
                                    <td>
                                        <img src="{{ asset($record->author_img) }}"
                                             style="width: 100px; height: auto; object-fit: cover; border-radius: 5px;"
                                             alt="Author Image">
                                    </td>


                                    <td>
                                        <a href="{{ url(route('books.edit', $record)) }}" class="btn btn-success btn-sm" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url(route('books.show', $record)) }}" class="btn btn-info btn-sm" title="Show">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('books.destroy', $record) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-danger mb-0" role="alert">
                        No data available.
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>

@endsection
