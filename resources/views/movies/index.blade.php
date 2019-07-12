@extends('layouts.base')
@section('title', 'Home - All Movies')

@section('content')
<div class="container">
  <h2>Film disponibili</h2>
  <form class="form-inline my-2 my-lg-0">
    <a class="btn btn-warning" href="{{route('movies.create')}}" role="button">ricerca</a>
  </form>
  <div class="container_card">
    @forelse($movies as $movie)
    <div class="card" style="width: 18rem;">
      <img src="{{$movie->img}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h3 class="card-title">{{$movie->title}}</h3>
        <h4 class="card-title">Anno: {{$movie->release}}</h4>
        <h4 class="card-title">Genere: {{$movie->genre ? $movie->genre->name : 'n.a.' }}</h4>
        <div class="card-action">
          <a class="btn btn-success" href="#" role="button"> Info</a>
          <a class="btn btn-primary" href="#" role="button">Modifica</a>
          <form method="post" action="#">@method('delete')
            @csrf
            <input type="submit" class="btn btn-danger" value="Delete">
          </form>
        </div>
      </div>
    </div>
    @empty
    <div class="alert alert-danger" role="alert">
      Nessun film disponibile
    </div>
    @endforelse
  </div>
</div>
@endsection
