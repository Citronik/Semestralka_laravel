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
                <div class="row mt-5">
                    @include('includes.presentation', ['presentations.show' => $presentation])
                </div>
            </div>
            <div class="container-fluid anonym">
                <p class="align-content-center ">To see all of our presentations log in or create account
                </p>
            </div>
            @if(!Auth::check())
                <script>checkDivForLogged()</script>
            @else
                <script>checkDivForLogged()</script>
            @endif
        </div>
@endsection
