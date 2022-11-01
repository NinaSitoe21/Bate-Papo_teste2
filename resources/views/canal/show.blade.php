@extends('layout.main')
@section('title', $canal->nome)

@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/imgs/canal/{{$canal->imagem}}" class="img-fluid" alt="{{$canal->nome}}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$canal->nome}}</h1>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{$admin['name']}}</p>
                <p class="event-participants"><ion-icon name="people-outline"></ion-icon>X Participantes</p>
                <a href="#" class="btn btn-primary" id="event-submit"><ion-icon name="person-add-outline" class="text-light"></ion-icon>Participar</a>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o Canal:</h3>
                <p class="card-date">{{$canal->created_at}}</p>
                <p class="event-description">{{$canal->descricao}}</p>
            </div>
        </div>
    </div>
@endsection