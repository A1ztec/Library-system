@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">student Details</h3>

                <div class="card-tools">
                    <a href="{{ route('student.index') }}" class="btn btn-tool" title="Back to List">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <!-- User Details -->
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                student Information
                            </div>
                            <div class="card-body">
                                <p><strong>student id :</strong> {{ $user->id }}</p>
                                <p><strong>Name:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Phone:</strong> {{ $user->phone }}</p>
                                <p><strong>Address:</strong> {{ $user->address }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- User Profile Picture -->
                    <div class="col-md-6">
                        <div class="card mb-3">

                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <form method="post" action="{{ route('user.destroy', $user) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
