@extends('layouts/plantilla')

@section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Alta de Categorías')

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

        @section('h1', 'Alta Categorías')

        @if ( session("estado"))
            <div class="alert alert-success">
            {{ session("estado") }}
            </div>
        @endif

        <div class="card bg-light col-md-7 mt-5 p-3 mx-auto">
        <form action="/agregarCategoria" method="post" >
            @csrf

            <div class="form-group">
                <label for="nbCategoria">Categoría:</label>
                <input type="text" class="form-control" name="nbCategoria"  value="{{ old('nbCategoria') }}" id="nbCategoria" placeholder="Nombre de la Categoria">
                @error('nbCategoria')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark px-4">
                <i class="far fa-plus-square fa-lg mr-2"></i>
                Agregar Categoría
            </button>
            <a href="/adminCategorias" class="btn btn-outline-info ml-3">
            <i class="fas fa-undo-alt fa-lg mr-2"></i>
                Volver al panel de categorías
            </a>

        </form>
        </div>

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection
