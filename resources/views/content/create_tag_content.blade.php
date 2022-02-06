<div  class="card-body">
    <form method="POST" action="{{ route('tags.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row mb-12">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name your tag') }}<div style="font-size: 2rem;"><i class="bi bi-tag fa-lg"></i></div></label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-6">
            <div class="col-md-5 offset-md-5">
                <button type="submit" class="btn btn-primary" style="margin-top: 10px">
                    {{ __('Add Tag') }}
                </button>
            </div>
        </div>
    </form>
</div>
