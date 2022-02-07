@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="margin-top: 10px; margin-bottom: 10px">
                <nav class="navbar-expand-sm navbar-dark bg-dark justify-content-center">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-link active" id="nav-presentation-tab" data-bs-toggle="tab" href="" onclick="event.preventDefault();
                      loadDoc('{{ route('ajax.getView', ['id' => 'create_presentation_content']) }}');"
                      role="tab" aria-controls="nav-home" aria-selected="true">
                      {{ __('Add Presentation') }}
                    </a>
                    <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                      role="tab" aria-controls="nav-contact" aria-selected="false" href=""
                      onclick="event.preventDefault();
                      loadDoc('{{ route('ajax.getView', ['id' => 'create_tag_content']) }}');">
                        {{ __('Add Tag') }}
                    </a>
                    <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                      role="tab" aria-controls="nav-contact" aria-selected="false" href=""
                      onclick="event.preventDefault();
                      loadDoc('{{ route('ajax.getView', ['id' => 'show_tag_content']) }}');">
                        {{ __('Edit Tags') }}
                    </a>

                    </div>
                  </nav>
                <div id="page" class="card">
                    <div  class="card-body">
                        <form method="POST" action="{{ route('presentations.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-12">
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

                            <div class="row mb-12" style="margin-top: 10px">
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

                            <div class="row mb-12" style="margin-top: 30px">
                                <label for="file" class="col-md-4 col-form-label text-md-end">{{ __('Title picture') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="presentation_photo" id="presentation_photo" class="form-control @error('presentation_photo') is-invalid @enderror">

                                    @error('presentation_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-12" style="margin-top: 10px">
                                <label for="file" class="col-md-4 col-form-label text-md-end">{{ __('Presentation file') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="presentation_file" id="presentation_file" class="form-control @error('presentation_file') is-invalid @enderror">

                                    @error('presentation_file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-12" style="margin-top: 10px">
                                <label for="selectpicker" class="col-md-4 col-form-label text-md-end">{{ __('Chose tags') }}</label>
                                <div id="selectpicker" class="col-md-6" style="margin-left: 0">
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
                                <div class="col-md-5 offset-md-5" style="justify-content: center; text-align: center;">
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
