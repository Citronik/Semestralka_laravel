@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        @include('includes.presentation', ['presentations.show' => $presentation])
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Change Presentation') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('presentations.update', ['presentation' => $presentation->id ]) }}" enctype="multipart/form-data">
                            @method('patch')
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $presentation->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $presentation->description }}" required autocomplete="description" autofocus>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

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

                                <div class="row mb-8">
                                    <div class="col-md-4")>
                                        <div class="form-group">
                                            <select name="tags[]" class="selectpicker" multiple>
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('tags')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save changes') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var tags = {!! $presentation->tags->map->id!!};
            $('.selectpicker').selectpicker('val', tags.map(String));
            $('.selectpicker').selectpicker('render');
        });
    </script>
@endsection
