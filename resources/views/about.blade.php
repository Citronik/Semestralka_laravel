@extends('layouts.app')

@section('content')
@include('includes.status')

<nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-center"
     style="opacity: 1; padding: 10px 10px; z-index: 9; position: inherit; margin-bottom: 5px;margin-top: 5px">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="justify-content: center; " id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item" style="">
                    <a class="nav-link" >
                        <button id="btn-about" onclick="event.preventDefault();
                        loadDoc('{{ route('ajax.getView', ['id' => 'about_content']) }}');" type="button"
                                                 class="btn btn-primary btn-small btn-nav">About us
                        </button>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" ><button id="btn-history" onclick="event.preventDefault();
                        loadDoc('{{ route('ajax.getView', ['id' => 'history_content']) }}');" type="button"
                                                 class="btn btn-primary btn-small btn-nav">History</button></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid mt-1 bg-light" id="page">
    <div class="header bg-light">
        <h1 class="onas">About us</h1>
    </div>
    <div class="row">
        <div class="col-md-8 p-3 text-black bg-light">
            <div class="header">
                <p class="align-content-center onas text-black">
                    Fortinet (NASDAQ: FTNT) secures the largest enterprise, service provider, and government organizations around the world.
                    Fortinet empowers its customers with intelligent, seamless protection across the expanding attack surface and the power
                    to take on ever-increasing performance requirements of the borderless network—today and into the future.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 p-3 text-black bg-light">
                <div class="header">
                    <img src="/img/Aboutus.png" width="720" height="720" alt="Security fabric">
                </div>
            </div>
            <div class="col-xl-6 p-3 text-black bg-light stred">
                <div class="header">
                    <h1>
                        The Security Fabric
                    </h1>
                    <p>
                        The Security Fabric enables organizations to achieve their digital innovations
                        outcomes without compromise by delivering a true cybersecurity platform that provides:
                    </p>
                    <dl>
                        <dt>Broad</dt>
                        <dd>visibility and protection of the entire digital attack surface to better manage risk</dd>
                        <dt>Integrated</dt>
                        <dd>solutions that reduce management complexity and share threat intelligence</dd>
                        <dt>Automated</dt>
                        <dd>self-healing networks with Al-driven security for fast and efficient operations</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
