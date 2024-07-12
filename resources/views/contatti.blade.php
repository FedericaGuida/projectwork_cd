@extends('layouts.app')

@section('title', 'contatti')

@section('content')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Vuoi suggerirci un album da aggiungere alla nostra selezione? Contattaci!</h5>
                    @if(session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                          </div>
                            @endif


            <form class="my-3 mx-3" method="post" action="{{ route('sendEmail') }}">
              @csrf
            <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" id="name">
            </div>
          <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">

          </div>
          <div class="mb-3">
          <label for="message">Messaggio:</label>
          <textarea name="message" id="message" class="form-control" cols="30" rows="6"></textarea>
          </div>

            <button type="submit" class="btn btn-secondary">Submit</button>
            </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
