@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Articles
                    <a href="{{ route('article.create') }}" class="btn btn-sm btn-secondary float-right">Create</a>
                </div>

                <div class="card-body">

                    @if (session('message'))
                    <x-alert :type="session('type')" :message="session('message')" />
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Published</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>{{ $article->published ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <form action="{{ route('article.destroy', $article->id) }}" method="post">
                                        @method('DELETE') @csrf
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-info text-white">Edit</a>
                                            <button type="submit" class="btn btn-danger text-white">Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
