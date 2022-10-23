@csrf
<div class="form-group mb-3 bg-form-white">
    <label for="image">Imagem da notícia:</label>
    <input type="file" id="image" name="image" class="from-control-file">
</div>

<div class="form-group mb-3">
    <label for="title">Título:</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $noticia->title ?? old('title') }}" placeholder="Informe o título da notícia">
</div>

<div class="form-group mb-3">
    <label for="title">Subtítulo:</label>
    <input type="text" class="form-control" id="subtitle" name="subtitle" min="15" max="128" value="{{ $noticia->subtitle ?? old('subtitle') }}" placeholder="Informe o subtítulo da notícia">
</div>

<div class="form-group mb-3">
    <label for="title">Descrição:</label>
    <textarea name="description" id="description" class="form-control" rows="20" placeholder="Informe a descrição da notícia">{{ $noticia->description ?? old('description') }}</textarea>
</div>

<input type="submit" class="btn btn-success mb-3" value="Salvar">