@extends('layouts.app')

@section('title', 'albums')

@section('content')
<div class="container">
    <h1> {{ $album->title }} </h1>
    {{-- @dd($album) --}}
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $album->singer->name }} </h2>
            <h3>{{ $album->recordcompany->name }} </h3>

            <div class="col-lg-5">
                    <div class="card-body"> Tracce: <br>  {{ $album->tracks }}</div>
            </div>




        </div>
    </div>
</div>
@endsection
