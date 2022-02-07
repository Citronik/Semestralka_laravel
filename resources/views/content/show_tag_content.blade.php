                    <div class="card-body" style="justify-content: center">
                        <form method="POST" action="{{ route('tags.update', ['tag' => $tags[0] ]) }}">
                            @method('patch')
                            @csrf

                            <div class="container">
                                @foreach ($tags as $tag)

                            <div class="row" style="margin-top: 5px; justify-content: center">
                                <div class="col-2">
                                  <label for="name" style="position: relative; margin-left: 0px" class="col-md-4 col-form-label"><i class="bi bi-tag display-4"></i></label>
                                </div>
                                <div class="col-8">
                                  <li id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name{{ $tag->id }}" required autocomplete="name" autofocus>{{ $tag->name }}</li>

                                  @error('name{{ $tag->id }}')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                                <div class="col-1">
                                    <a href="" onclick="event.preventDefault();
                                        loadDoc('{{ route('ajax.getEditTag', ['id' => $tag->id ]) }}');">
                                        <button  type="submit" class="btn btn-primary btn-sm" style="margin:0px auto;border:1px red solid; position: relative;">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <form method="POST" action="{{ route('tags.destroy', ['tag' => $tag ]) }}">
                                        @method('delete')
                                        @csrf
                                        <button  type="submit" class="btn btn-primary btn-sm" style="margin:0px auto;border:1px red solid; position: relative;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                              </div>
                            @endforeach
                            </div>
                        </form>
                    </div>

