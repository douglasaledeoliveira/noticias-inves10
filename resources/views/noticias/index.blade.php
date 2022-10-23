@extends('layouts.main')

@section('title', 'Notícias | Exibir')

@section('content')
    <h1 class="display-6">Exibir notícias</h1>

    <hr />

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <b>{!! \Session::get('success') !!}</b>
        </div>
    @endif
    
    <div class="control-page">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Subtitulo</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($noticias as $noticia)
                        <tr>
                            <th class="align-middle" scope="row">{{ $loop->index + 1 }}</th>
                            <td class="align-middle">{{ $noticia->title }}</td>
                            <td class="align-middle">{{ $noticia->subtitle }}</td>
                            <td style="width: 25%">
                                <a href="{{route('noticias.edit', $noticia->id)}}" title="Editar: {{ $noticia->title }}" class="btn btn-info btn-sm">Editar</a>
                                
                                <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection