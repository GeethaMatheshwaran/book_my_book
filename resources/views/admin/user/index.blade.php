@extends('admin.layout')
@section('title')
User
@endsection
@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-14">
                <div class="card">
                    <div class="card-header">User</div>
                    <div class="card-body">

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Phone No</th>
                                        <th>Role</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $userData)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $userData->name }}</td>
                                        <td>{{ $userData->email }}</td>
                                        <td>{{ $userData->age }}</td>
                                        <td>{{ $userData->phone_no }}</td>
                                        <td>
                                        @if ($userData->role == 1)
                                            {{'Admin'}}
                                        @else
                                            {{'Customer'}}
                                        @endif
                                        </td>
                                        <td>{{ $userData->password }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
