<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Status') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::check())
                    {{ __('You are logged in!') }}
                    @else
                    {{ __('You are not logged in.') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>