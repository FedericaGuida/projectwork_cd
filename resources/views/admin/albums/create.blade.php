@extends('layouts.admin')

@section('title', 'lista albums')

@section('content')
{{-- @dd($categorie) --}}
<div class="container">
    <h1>Inserimento Album</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.albums.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="title" name="title" required>
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="singer_id" class="form-label">Cantante</label>
            <select name="singer_id" id="singer_id" class="form-control">
                @foreach($singers as $singer)
                    <option value="{{ $singer->id}}">{{ $singer->name}} </option>
                @endforeach
            </select>

        </div>
        <div class="mb-3">
            <label for="recordcompany_id" class="form-label">Etichetta discografica</label>
            <select name="recordcompany_id" id="recordcompany_id" class="form-control">
                @foreach($recordcompanies as $recordcompany)
                <option value="{{ $recordcompany->id}}">{{ $recordcompany->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Anno di pubblicazione</label>
            <input type="year" class="form-control" id="year" name="year" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Durata</label>
            <input type="time" class="form-control" id="duration" name="duration" required>
        </div>


        <div class="mb-3">
            @foreach($categories as $category)
            <input type="checkbox" id="category_{{$category->id}}" name="category[]" value="{{$category->id}}">
            <label for="category_{{$category->id}}"> {{ $category->name }} </label>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="tracks" class="form-label">Tracce</label><br>
            <textarea rows="10" cols="30" name="tracks" id="tracks" required>
            </textarea>

        </div>

        <button type="submit" class="btn btn-primary">Invia</button>
      </form>
</div>

@endsection
