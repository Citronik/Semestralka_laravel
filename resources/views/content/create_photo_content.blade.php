<div class="card">
    <div class="card-header">{{ __('Add Photo') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('presentations.store') }}">
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
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Presentations</label>
                <div class="col-md-6">
                    <select name="photo" id="photo" class="form-control">
                        @foreach($photos as $photo)
                            <option value="{{$photo->id}}">{{$photo->filename}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <!--
                            <div class="row mb-3">
                                <div class="col-md-4")>
                                    <div class="form-group">
                                        <label for="FileInput">Your Presentation</label>
                                        <input type="file" id="file" class="form-control-file @error('file') is-invalid @enderror" id="FileInput">
                                    </div>
                                </div>

                                <div class="col-md-4")>
                                    <div class="form-group">
                                        <label for="FileInput">Title picture</label>
                                        <input type="file" id="image" class="form-control-file @error('file') is-invalid @enderror" id="FileInput">
                                    </div>
                                </div>
                            </div>
-->

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
