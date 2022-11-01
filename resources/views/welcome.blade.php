@extends('layout.main')
@section('title', 'Canais')

@section('content')
{{--colocar na view welcome todos os regitos da BD--}}
<div id='search-container' class="col-md-12">
    <h1>Procure por um Canal</h1>
    <form action="/" method="GET">
        <input type="text" name="search" id="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Pesquisando por: {{$search}}...</h2>
    @else
        <h2>Todos os Canais</h2>
    @endif
    <div id="cards-container" class="row">
        @foreach($canais as $canal)
        <div class="card col-md-3">
            <img src="/imgs/eventos/{{$canal->imagem}}" alt="Imagem do evento">
            <div class="card-body">
                <p class="card-date">{{date('d/M/Y', strtotime($canal->created_at))}}</p>
                <h5 class="card-title">{{$canal->nome}}</h5>
                <p class="card-participants">X Participantes</p>
                <a href="/canal/detalhes/{{$canal->id}}" class="btn btn-primary">Mais detalhes</a>
            </div>
        </div>
        @endforeach
        @if(count($canais) == 0 && $search)
            <p>
                Não foi encontado nenhum canal {{$search}}
                <a href="/">Ver todos os canais...</a>
            </p>
            @elseif(count($canais) == 0)
                <p><strong>Não há canais disponíveis!</strong></p>
        @endif
    </div>
</div>
</div>
@endsection