@extends('admin.layout')

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">List of Users</h3>


        </div>

        <div class="card-body">
            @include('flash::message')

            <div class="mb-3">
                <a href="{{ route('user.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> New User
                </a>
            </div>

            <form action="{{ route('user.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search users by name" value="{{ request()->input('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            @if($users->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>address</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('user.edit', $user) }}" class="btn btn-success btn-sm mr-1">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form method="post" action="{{ route('user.destroy', $user) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"  @if(auth()->user()->id == $user->id) disabled @endif>
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
                <div class="alert alert-danger" role="alert">
                    No data available.
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
