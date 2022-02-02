@extends('layouts.app')

@section('content')
@include('includes.status')
<div class="container-fluid mt-1 bg-light">
    <div class="header bg-light">
        <h1>Some of our lections</h1>
    </div>
    <div class="container-fluid logged">
        <div class="row">
            <div class="col-md-12 p-3 text-black bg-light">
                <div class="header">
                    <p class="align-content-center ">Networking and security professionals involved in the management,
                        configuration, administration, and monitoring of FortiGate devices used to secure their
                        organizations' networks should attend this course.</p>
                    <p>You should have a thorough understanding of all the topics covered in the FortiGate Security
                        course before attending the FortiGate Infrastructure course.</p>
                </div>
            </div>
            @foreach($presentations as $presentation)
                @if($loop->iteration == 1)
                    <div class="row mt-5">
                @endif
                @include('includes.presentation', ['presentations.show' => $presentation])
                @if($loop->iteration % 4 === 0)
                    </div>
                    <div class="row">
                @endif
                @if($loop->last && $loop->iteration % 4 !== 0)
<!--                        <div class="row">-->
                @endif
           @endforeach
                {{--
                <div class="col-lg-3 p-3 text-black bg-light">
                    <div class="header zaujimavsie">
                        <div class="img-container justify-content-end">
                            <a href="{{ route('presentations.create') }}">
                                <i class="bi bi-file-plus display-1 justify-content-center"></i>
                            </a>
                        </div>
                    </div>
                </div>
--}}
                    <div class="card justify-content-center" style="width: 18rem">
                        <a href="{{ route('presentations.create') }}" class="btn">
                            <i class="bi bi-file-plus display-1 justify-content-center"></i>
                        </a>
                    </div>
            </div>
        </div>
</div>
    <div class="container-fluid anonym">
        <p class="align-content-center text-sm-center">To see all of our presentations log in or create account
        </p>
    </div>
</div>
    @if(!Auth::check())
        <script>checkDivForLogged()</script>
    @else
        <script>checkDivForLogged()</script>
    @endif
@endsection
