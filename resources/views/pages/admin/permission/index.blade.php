@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Permissions
                    <a href="{{ route('admin.permission.create') }}" class="btn btn-sm btn-secondary float-right">Create</a>
                </div>

                <div class="card-body">

                    @if (session('message'))
                    <x-alert :type="session('type')" :message="session('message')" />
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->display_name }}</td>
                                <td>
                                    <form action="{{ route('admin.permission.destroy', $permission->id) }}" method="post">
                                        @method('DELETE') @csrf
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-info text-white">Edit</a>
                                            <button type="submit" class="btn btn-danger text-white">Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
