@extends('admin.layout')

@section('content')
    <section class="content">
        <!-- Card Container -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">List of Borrow Requests</h3>
            </div>
            <div class="card-body">

                @include('flash::message')

                @if(count($records))
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-secondary text-white">
                            <tr>
                                <th>#</th>
                                <th>Student</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Book Title</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $record->user->name }}</td>
                                    <td>{{ $record->user->email }}</td>
                                    <td>{{ $record->user->phone }}</td>
                                    <td>{{ $record->book->title }}</td>
                                    <td>{{ $record->book->quantity }}</td>
                                    <td>
                                    <span class="badge {{ $record->status == 'pending' ? 'bg-warning text-dark' : ($record->status == 'approved' ? 'bg-success text-dark' : 'bg-danger text-dark') }}">
                                     {{ ucfirst($record->status) }}
                                    </span>
                                    </td>
                                    <td>
                                        <img src="{{ asset($record->book->book_img) }}"
                                             style="width: 70px; height: auto; object-fit: cover; border-radius: 5px;"
                                             alt="Book Image">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-outline-primary btn-sm" href="{{route('approve_borrow' , $record)}}">Approved</a>
                                            <a class="btn btn-outline-danger btn-sm" href="{{route('reject_borrow' , $record)}}">Rejected</a>
                                            <a class="btn btn-outline-info btn-sm" href="{{route('return_book' , $record)}}">Returned</a>
                                        </div>
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
        </div>
    </section>
@endsection
