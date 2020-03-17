@extends('layouts/plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Alta de un nuevo Producto')

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

        @section('h1', 'Alta de un nuevo producto')

        @if ( session("estado"))
            <div class="alert alert-success">
            {{ session("estado") }}
            </div>
        @endif

        <div class="card bg-light col-md-7 mt-5 p-3 mx-auto">
            <form action="/agregarProducto" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nbProducto">Nombre del Producto:</label>
                    <input type="text" class="form-control" name="nbProducto"  value="{{old('nbProducto')}}" id="nbProducto" placeholder="Nombre del Producto">
                    @error('nbProducto')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="precioProducto">Precio:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <input type="number" name="precioProducto" value="{{ old('precioProducto') }}" class="form-control" id="precioProducto" placeholder="0" min="0" step="0">
                    </div>
                     @error('precioProducto')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                </div>

                <div class="form-group">
                <label>Marca:</label>
                <select name="MARCAS_idMarca" class="form-control">
                    <option value="">Seleccione una marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->idMarca }}">{{ $marca->nbMarca }}</option>
                @endforeach
                </select>
                @error('MARCAS_idMarca')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                <label>Categoría:</label>
                <select name="CATEGORIAS_idCategoria" class="form-control">
                    <option value="">Seleccione una Categoría</option>
                @foreach ( $categorias as $categoria)
                    <option value="{{ $categoria->idCategoria }}">{{ $categoria->nbCategoria}}</option>
                @endforeach
                </select>
                @error('CATEGORIAS_idCategoria')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                <label for="dtlproducto">Detalle:</label>
                <textarea name="dtlProducto" class="form-control" id="dtlProducto">{{ old('dtlProducto') }}</textarea>
                @error('dtlProducto')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
                </div>

                Imagen: <br>
                <input type="file" name="imgProducto" class="form-control">
                @error('imgProducto')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <button type="submit" class="btn btn-dark px-4">
                    <i class="far fa-plus-square fa-lg mr-2"></i>
                    Agregar Producto
                </button>
                <a href="/adminProductos" class="btn btn-outline-info ml-3">
                <i class="fas fa-undo-alt fa-lg mr-2"></i>
                    Volver al panel de productos
                </a>


            </form>
        </div>

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection