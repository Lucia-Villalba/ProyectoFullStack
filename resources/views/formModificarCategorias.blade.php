@extends('layouts/plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Modificación de Categorías')

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

        @section('h1', 'Modificación de Categorías')

        @if ( session("estado"))
            <div class="alert alert-success">
            {{ session("estado") }}
            </div>
        @endif

        <div class="card bg-light col-md-7 mt-5 p-3 mx-auto">
        <form action="/modificarCategoria/{{$categoria->idCategoria}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nbCategoria">Nombre de la categoría:</label>
                <input type="text" class="form-control" name="nbCategoria"  value="{{ $categoria -> nbCategoria}}" id="nbCategoria">
                @error('nbCategoria')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark px-4" onclick="return confirm('¿Confirmar cambio?')">
                <i class="far fa-check-circle fa-lg mr-2"></i>
                Aceptar
            </button>
            <a href="/adminCategorias" class="btn btn-outline-info ml-3">
            <i class="fas fa-undo-alt fa-lg mr-2"></i>
                Volver a Categorías
            </a>
        </form>
        </div>

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection