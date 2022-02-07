@extends('layouts.app')

@section('content')
    @include('includes.status')
    <div class="container-fluid mt-1 bg-light">
        <div class="row">
        <div class="header bg-light">
            <h1>Some of our lections</h1>
        </div>
        <div class="container-fluid logged" style="margin-bottom: 10px; position: static !important;">
            <div class="card mb-3" style="max-width: auto; margin-bottom: 30px">
                <div class="row g-0">
                  <div class="col-md-4" style="justify-content: center">
                    <img src="/storage/images/{{$presentation->photo->filename}}" class="img-fluid rounded-start" width="100%" height="auto" alt="{{$presentation->name}}" style="margin: 2px">
                </div>
                <div class="col-md-8" style="justify-content: center; text-align: center;">
                    <div class="card-body" style="justify-content: center; text-align: center;">
                        <h5 class="card-title">{{$presentation->name}}</h5>
                        <p class="card-text">{{$presentation->description}}</p>
                        <ul class="list-group">
                            @foreach ($presentation->tags as $tag)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$tag->name}}
                                    <button type="button" class="btn btn-primary btn-sm" style="background-color: lightblue !important; ">
                                        Usage <span class="badge bg-secondary">{{ DB::table("presentation_tags")
                                            ->where("tag_id", "=", $tag->id)->get()->count();}}</span>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                        <p class="card-text"><small class="text-muted">Last updated {{$presentation->updated_at}}</small></p>
                    </div>
                    @if ($presentation->file)
                    <a href="{{ route('files.show', ['id' => $presentation->file->id ]) }}"><button class="btn btn-sm" id="btn" ><i class="bi bi-file-earmark-arrow-down"></i> Download</button></a>
                    @else
                        <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="We currently working on it!">
                      <i class="bi bi-file-earmark-arrow-down"></i> Download</button>
                    @endif
                </div>
                </div>
              </div>
            <div class="container-fluid anonym">
                <p class="align-content-center ">To see all of our presentations log in or create account
                </p>
            </div>
            @if(!Auth::check())
                <script>checkDivForLogged(); $('.btn').popover();</script>
            @else
                <script>checkDivForLogged()</script>
            @endif
        </div>
    </div>
    </div>
    <script>
    setTimeout(function(){
        $('.btn').popover();
    }, 1.0*50);</script>
@endsection
