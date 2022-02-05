@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-center"
                 style="opacity: 1; padding: 10px 10px; z-index: 9; position: inherit; margin-bottom: 5px;margin-top: 5px">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" style="justify-content: center; " id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item" style="">
                                <a class="nav-link" ><button id="btn-about" onclick="event.preventDefault();
                                        loadDoc('{{ route('ajax.getView', ['id' => 'create_presentation_content']) }}');" type="button"
                                                             class="btn btn-primary btn-small btn-nav">Add presentation</button></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" ><button id="btn-history" onclick="event.preventDefault();
                                        loadDoc('{{ route('ajax.getView', ['id' => 'create_photo_content']) }}');" type="button"
                                                             class="btn btn-primary btn-small btn-nav">Add photo</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page" class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Presentation') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('presentations.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name of presentation') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"></textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-md-4")>
                                    <div class="form-group">
                                        <label for="file">Title picture</label>
                                        <input type="file" name="presentation_photo" id="presentation_photo" class="form-control @error('presentation_photo') is-invalid @enderror">

                                        @error('presentation_photo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-8">
                                <div class="col-md-4")>
                                    <div class="form-group">
                                        <label for="file">File</label>
                                        <input type="file" name="presentation_photo" id="presentation_file" class="form-control @error('presentation_photo') is-invalid @enderror">

                                        @error('presentation_photo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-md-4")>
                                    <div class="form-group">
                                        <select name="tags[]" class="selectpicker" multiple>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <div class="col-md-5 offset-md-5">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 10px">
                                        {{ __('Add Presentation') }}
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
