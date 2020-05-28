@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Users
                    <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-secondary float-right">Create</a>
                </div>

                <div class="card-body">

                    @if (session('message'))
                        <x-alert :type="session('type')" :message="session('message')"/>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{$role->display_name}}
                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                        @method('DELETE') @csrf
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info text-white">Edit</a>
                                            <button type="submit" class="btn btn-danger text-white">Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
