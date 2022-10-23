@extends('layouts.main')

@section('title', 'Notícias')

@section('content')
    <h1 class="display-6">{{ $artigo->title }}</h1>

    <hr />

    <div class="control-page">
        <div id="image-container" class="col-lg-12">
            <img src="/img/noticias/{{ $artigo->image }}" alt="{{ $artigo->title }}">
        </div>

        <div class="col-lg-12" id="description-container">
            <p class="event-description">{{ $artigo->description }}</p>
        </div>
    </div>

@endsection