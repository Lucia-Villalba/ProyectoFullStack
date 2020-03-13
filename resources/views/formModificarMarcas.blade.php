@extends('layouts.plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

@section('title', 'Modificación de Marcas')
@section('h1', 'Modificación de Marcas')

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

@section('main')

    @if ( session("estado"))
    <div class="alert alert-success">
    {{ session("estado") }}
    </div>
    @endif
 

    <div class="alert bg-light py-3">
        <form action="/modificarMarca/{{$marca->idMarca}}" method="post">
            @csrf
            Marca:
            <br>
            <input type="text" name="nbMarca" class="form-control" value="{{ $marca -> nbMarca}}" id="nbMarca">
            @error('nbMarca')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <br>
            <button type="submit" class="btn btn-dark px-4" onclick="return confirm('¿Confirmar cambio?')">
                <i class="far fa-check-circle fa-lg mr-2"></i>
                Aceptar
            </button>
            <a href="/adminMarcas" class="btn btn-outline-info ml-3">
            <i class="fas fa-undo-alt fa-lg mr-2"></i>
            Volver a Categorías
            </a>

        </form>
    </div>


@endsection

@section('footer')
    @include('layouts.footer')
@endsection