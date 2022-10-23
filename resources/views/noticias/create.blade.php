@extends('layouts.main')

@section('title', 'Notícias | Cadastrar')

@section('content')
    <h1 class="display-6">Cadastrar notícias</h1>

    <hr />

    @include('includes.validations-form')

    <div class="control-page">
        <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
            @include('noticias._partials.form')
        </form>
  </div>

@endsection