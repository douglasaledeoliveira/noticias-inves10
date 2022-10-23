@extends('layouts.main')

@section('title', 'Notícias | Editar')

@section('content')
    <h1 class="display-6">Editar notícias</h1>

    <hr />

    @include('includes.validations-form')

    <div class="control-page">
        <form action="{{ route('noticias.update', $noticia->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('noticias._partials.form')
        </form>
  </div>

@endsection