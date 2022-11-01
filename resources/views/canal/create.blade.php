@extends('layout.main')
@section('title', 'Criar Canal')

@section('content')
    <div class="create-container col-md-6 offset-md-3">
        <h1>Crie o Seu Canal Aqui</h1>
        <form action="/canais" method="POST" enctype="multipart/form-data">
            @csrf {{--permite mandar o formulario a partir do post para as--}}
            <div class="form-group mt-2">
                <label for="imagem">Imagem do Canal:</label>
                <input type="file" name="imagem" id="imagem" class="form-control-file">
            </div>
            <div class="form-group mt-2">
                <label for="nome">Canal:</label>
                <input type="text" name="nome" id="titulo" class="form-control" placeholder="Nome do canal">
            </div>
            <div class="form-group mt-2">
                <label for="descricao">Descricao:</label>
                <textarea name="descricao" id="descricao" class="form-control"></textarea>
            </div>
            <div class="form-group mt-2">
                <input type="submit" value="Criar Canal" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection