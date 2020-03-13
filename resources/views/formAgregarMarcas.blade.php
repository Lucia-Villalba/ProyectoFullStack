@extends('layouts.plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

@section('title', 'Alta de Marcas')
@section('h1', 'Alta de Marcas')

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

 {{-- probar si al enviar el formulario redirige al mismo formulario con un mensaje de éxito, la redireccion está en el método store --}}
    @if ( session("estado"))
    <div class="alert alert-success">
    {{ session("estado") }}
    </div>
    @endif
 

    <div class="alert bg-light py-3">
        <form action="/agregarMarca" method="post">
            @csrf
            Marca:
            <br>
            <input type="text" name="nbMarca" class="form-control" value="{{ old('nbMarca') }}" id="nbMarca" placeholder="Nombre de la Marca">
            @error('nbMarca')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <br>
            <button class="btn btn-dark">
              <i class="far fa-plus-square fa-lg mr-2"></i>
              Agregar Marca
            </button>

            </button>
            <a href="/adminMarcas" class="btn btn-outline-info ml-3">
            <i class="fas fa-undo-alt fa-lg mr-2"></i>
                Volver al panel de marcas
            </a>

        </form>
    </div>


@endsection

@section('footer')
        @include('layouts.footer')
@endsection