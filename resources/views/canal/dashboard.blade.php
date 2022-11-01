@extends('layout.main')
@section('title', 'Dashboard')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Canais</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count(canais) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Acções</th>
                </tr>
            </thead>
        </table>
        @else
            <p>Não tem nenhum canal <a href="/canal/create">Criar canal</a></p>
        @endif
    </div>
@endsection
