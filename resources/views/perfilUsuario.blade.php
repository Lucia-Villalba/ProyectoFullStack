@extends('layouts/plantilla')

@section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/estilosGenerales.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
@endsection

@section('title', 'Perfil Usuario')

@section('header')
<header>
    @include('layouts.app')
</header>
@endsection

@section('nav')
<nav>
    @include('layouts.nav')
</nav>
@endsection

@section('h1', 'Perfil del Usuario')

@section('main')
    <div class="card">
    <h5 class="card-header">Bienvenid@ {{auth()->user()->nombre_apellido}}</h5>
        <div class="card-body">
        <p class="card-text">email: {{auth()->user()->email}}</p>
        <form method="POST" action={{route('logout')}}>
            {{ csrf_field() }}
            <input type='submit' value='Cerrar sesion' class="btn btn-danger btn-block btn-xs">
        </form>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection