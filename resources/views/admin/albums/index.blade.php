@extends('layouts.admin')

@section('title', 'lista albums')

@section('content')
{{-- @dd($albums) --}}
<h1>Lista degli albums</h1>
<a href="{{ route('admin.albums.create') }} ">Inserisci un nuovo album</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Titolo</th>
        <th scope="col">Cantante</th>
        <th scope="col">Anno</th>
        <th scope="col">Operazioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach($albums as $album)
      <tr>
        <th scope="row"> {{ $album->title }} </th>
        <td>{{ $album->singer->name }} </td>
        <td>{{ $album->year }}</td>
        <td>
          <a href="{{ route('admin.albums.edit', $album->id) }} ">Modifica</a>
          <form action="{{ route('admin.albums.destroy', $album->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Cancella" onclick="return confirm('Confermi?')">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination-container">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            {{-- Link alla pagina precedente --}}
            @if ($albums->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $albums->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif

            {{-- Link alle pagine --}}
            @foreach ($albums->getUrlRange(1, $albums->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $albums->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Link alla pagina successiva --}}
            @if ($albums->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $albums->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
</div>
@endsection
