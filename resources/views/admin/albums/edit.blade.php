@extends('layouts.admin')

@section('title', 'modifica album')

@section('content')
<div class="container">
    <h1>Modifica Album</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- @dd($album) --}}
    <form action="{{ route('admin.albums.update', $album->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $album->title }}">
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="singer_id" class="form-label">Cantante</label>
            <select name="singer_id" id="singer_id" class="form-control" required>
                @foreach($singers as $singer)
                    <option value="{{ $singer->id }}" {{ $album->singer_id == $singer->id ? 'selected' : '' }}>{{ $singer->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="recordcompany_id" class="form-label">Etichetta discografica</label>
            <select name="recordcompany_id" id="recordcompany_id" class="form-control" required>
                @foreach($recordcompanies as $recordcompany)
                    <option value="{{ $recordcompany->id }}" {{ $album->recordcompany_id == $recordcompany->id ? 'selected' : '' }}>{{ $recordcompany->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Anno di pubblicazione</label>
            <input type="year" class="form-control" id="year" name="year" value="{{ $album->year }}">
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Durata</label>
            <input type="time" class="form-control" id="duration" name="duration" value="{{ $album->duration }}">
        </div>


        <div class="form-group">
            <label for="category">Categorie</label><br>
            @foreach($categories as $category)
                <input type="checkbox" id="category_{{ $category->id }}" name="category[]" value="{{ $category->id }}" {{ $album->category->contains($category->id) ? 'checked' : '' }}>
                <label for="category_{{ $category->id }}">{{ $category->name }}</label><br>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="tracks" class="form-label">Tracce</label>
            <input type="text-area" class="form-control" id="tracks" name="tracks" value="{{ $album->tracks }}">
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
      </form>
</div>

@endsection
