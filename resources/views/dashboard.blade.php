@extends('layout.main')
@section('title', 'Dashboard')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Canais</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count(canais) > 0)
        @else
            <p>Não tem nenhum canal <a href="/canal/create">Criar canal</a></p>
        @endif
    </div>
@endsection
