@extends('layouts.main')

@section('title', 'Notícias | Home')

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <b>{!! \Session::get('success') !!}</b>
        </div>
    @endif
    
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @if($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else

            @foreach ($noticias as $noticia)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="/img/noticias/{{ $noticia->image }}" alt="{{ $noticia->title }}" title="{{ $noticia->title }}" width="100%" height="225" class="bd-placeholder-img card-img-top" />

                        <h3>{{ $noticia->title }}</h3>

                        <div class="card-body">
                            <p class="card-text">{{ $noticia->subtitle }}</p>
                        </div>

                        <div class="d-grid gap-2 col-8 mx-auto">
                            <a href="{{ route('noticias.show', $noticia->slug) }}" title="{{ $noticia->title }}" target="_blank" class="btn btn-secondary btn-post">Acessar</a>
                        </div>
                    </div>
                </div>
            @endforeach

        @endif
        
    </div>
  </div>
@endsection