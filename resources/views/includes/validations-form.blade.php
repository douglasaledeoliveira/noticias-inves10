@if ($errors->any())
    <div class="alert alert-secondary">
         @foreach ($errors->all() as $error)
            {{ $error }} <br />
        @endforeach
    </div>
@endif