@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Article') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('article.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" placeholder="Title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-7">
                                <textarea name="body" id="body" cols="30" rows="3" required autocomplete="body" class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="published" class="col-md-3 col-form-label text-md-right">{{ __('Published') }}</label>

                            <div class="col-md-7">
                                <select name="published" id="published" class="form-control @error('published') is-invalid @enderror">
                                        <option value="0" {{ old('published') == 0 ? 'selected' : ''}}>Unpublished</option>
                                        <option value="1" {{ old('published') == 1 ? 'selected' : ''}}>Published</option>
                                </select>

                                @error('published')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
