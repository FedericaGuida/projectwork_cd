{{-- Gli diciamo quale layout prendere --}}
@extends('layouts.app')

@section('title', 'albums')

@section('content')
<div class="container">
    {{-- @dd($albums) --}}
    {{-- @dd($singers) --}}
    <h1>Ecco una selezione di albums scelta per te! </h1>
    <div class="row g-2">
        @foreach($albums as $album)
        {{-- @dd($album) --}}
        {{-- @dd($categories) --}}
        <div class="col-lg-3">
            <div class="card h-100" >
                <div class="card-body">
                  <h5 class="card-title"> {{$album->title}} </h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">Cantante: {{$album->singer->name}} </h6>
                  <h6 class="card-subtitle mb-2 text-body-secondary">Etichetta Discografica: {{$album->recordcompany->name}} </h6>
                  <p class="card-text">Anno: {{$album->year}}</p>
                  @if($album->category->isNotEmpty())
                  <p class="card-text">Categorie:
                    @foreach($album->category as $categoria)
                    {{ $categoria->name }}
                    @unless($loop->last), @endunless
                    @endforeach
                  </p>
                  @endif
                  <a href="{{ route('albums.show', $album->id)}}" class="card-link">Mostra tracce</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
