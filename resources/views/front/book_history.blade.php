<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.css')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #f8f9fa;
            background-color: #343a40;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .alert-info {
            font-size: 1.25rem;
            color: #f8f9fa;
            max-width: 600px;
            margin: auto;
            padding: 2rem;
            background-color: #495057;
            border-color: #6c757d;
            border-radius: 0.5rem;
            text-align: center;
        }
        .currently-market {
            background-color: #495057;
            border-radius: 0.5rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .table {
            background-color: #343a40;
            color: #e9ecef;
            border-radius: 0.5rem;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        .table thead {
            background-color: #495057;
        }
        .table thead th {
            color: #e9ecef;
            font-weight: bold;
            text-align: center;
            padding: 1rem;
        }
        .table tbody tr {
            transition: background-color 0.3s;
        }
        .table tbody tr:hover {
            background-color: #6c757d;
        }
        .table tbody td {
            vertical-align: middle;
            padding: 1rem;
            text-align: center;
        }
        .badge {
            font-size: 0.875rem;
        }
        .img-thumbnail {
            border: none;
            border-radius: 0.5rem;
            max-width: 100px;
            height: auto;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            color: #fff;
            text-decoration: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            text-decoration: none;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
    </style>
</head>
<body>

@include('front.header')

<div class="currently-market py-5 flex-grow-1">
    <div class="container">
        @if($borrows->isEmpty())
            <div class="alert alert-info" role="alert">
                <strong>No borrowed books found.</strong>
            </div>
        @else
            <h2 class="text-center mb-4" style="font-size: 2.5rem; color: #e9ecef;">Borrowed Books</h2>
            @include('flash::message')
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Book Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->book->title }}</td>
                        <td>{{ $borrow->book->author_name }}</td>
                        <td>
                            <span class="badge {{ $borrow->status == 'approved' ? 'bg-success' : 'bg-danger' }}" style="color: #fff;">{{ ucfirst($borrow->status) }}</span>
                        </td>
                        <td>
                            <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                <img src="{{ $borrow->book->book_img }}" alt="Book Image" class="img-thumbnail">
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('cancel_request', $borrow) }}" class="btn btn-warning">Cancel</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@include('front.footer')

</body>
</html>
