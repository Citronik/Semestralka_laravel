
<div class="card" style="width: 18rem;" onmouseenter="event.preventDefault();
            showButtons('{{ route('ajax.getPresentationButtons', ['id' => $presentation->id]) }}','{{ $presentation->id }}')" onmouseleave="hideButtons('{{ $presentation->id }}')">
    <div id="{{ $presentation->id }}" class="buttons is" data-id="{{ $presentation->id }}"></div>
    <a href="{{ route('presentations.show', ['presentation' => $presentation->id ]) }}" class="btn">
    <img class="card-img-top" src="/storage/images/{{$presentation->photo->filename}}"  width="100" alt="{{$presentation->name}}">
    <div class="card-body">
        <h5 class="card-title">{{$presentation->name}}</h5>
        <p class="card-text">{{$presentation->description}}</p>
    </div>
    </a>
</div>
