<!--
<div class="col-lg-3 p-3 text-black bg-light">
    <div class="header zaujimavsie">
        <div class="img-container">
            <img src="/img/{{$presentation->photo->filename}}"  width="100%" height="auto" alt="{{$presentation->name}}">
        </div>
            <h5 class="title">{{$presentation->name}}</h5>
        <h10 class="dole">{{$presentation->description}}</h10>
    </div>
</div>
-->

<div class="card" style="width: 18rem;">
    <a href="{{ route('presentations.edit', ['presentation' => $presentation->id ]) }}" class="btn">
    <img class="card-img-top" src="/img/{{$presentation->photo->filename}}"  width="100%" height="auto" alt="{{$presentation->name}}">
    <div class="card-body">
        <h5 class="card-title">{{$presentation->name}}</h5>
        <p class="card-text">{{$presentation->description}}</p>
    </div>
    </a>
</div>
