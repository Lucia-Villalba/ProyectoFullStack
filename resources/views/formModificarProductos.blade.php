@extends('layouts/plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Modificación de Productos')

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

        @section('h1', 'Modificación de Productos')

        @if ( session("estado"))
            <div class="alert alert-success">
            {{ session("estado") }}
            </div>
        @endif

        <div class="card bg-light col-md-7 mt-5 p-3 mx-auto">
            <form action="/modificarProducto/{{$producto->idProducto}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-2">
                    <label for="nbProducto">Nombre:</label>
                    <div class='input-group mb-2'>
                            <input type="text" class="form-control" name="nbProducto" value="{{ $producto -> nbProducto}}" id="nbProducto">
                    </div>
                       @error('nbProducto')
                    <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>
                 
                <div class="form-group mb-2">
                    <label for="precioProducto">Precio:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <input type="number" name="precioProducto" value="{{ $producto -> precioProducto}}" lang='es' step='0.001' class="form-control" id="precioProducto" min="0" step="0" width="20px">
                        
                    </div>
                    @error('precioProducto')
                        <small class="alert alert-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="form-group">
                <label>Marca:</label>
                <select name="MARCAS_idMarca" class="form-control">
                <option value={{$producto -> getMarca -> idMarca}}>{{$producto -> getMarca -> nbMarca}}</option>
                {{--  Aca, no modificar nada  --}}
                @foreach ($marcas as $marca)
                    @if($producto -> getMarca -> nbMarca != $marca -> nbMarca) 
                        <option value={{$marca -> idMarca}}>{{$marca -> nbMarca}}</option> 
                    @endif
                @endforeach
                {{--  a partir de aca, hace lo que quieras  --}}
                </select>
                @error('MARCAS_idMarca')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                <label>Categoría:</label>
                <select name="CATEGORIAS_idCategoria" class="form-control">
                    <option value={{$producto -> getCategoria -> idCategoria}}>{{$producto -> getCategoria -> nbCategoria}}</option>
                @foreach ($categorias as $categoria)
                    @if($producto -> getCategoria -> nbCategoria != $categoria -> nbCategoria)
                        <option value={{$categoria -> idCategoria}}>{{$categoria -> nbCategoria}}</option>
                    @endif 
                @endforeach
                </select>
                @error('CATEGORIAS_idCategoria')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                <label for="dtlproducto">Detalle:</label>
                <textarea name="dtlProducto" class="form-control" id="dtlProducto">{{ $producto -> dtlProducto }}</textarea>
                @error('dtlProducto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                <label for="talleProducto">Talle:</label>
                <input type="text" name="talleProducto" value="{{ $producto -> talleProducto}}" class="form-control" id="talleProducto">
                @error('talleProducto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>


                <div class="form-group">
                <label for="stockProducto">Stock:</label>
                <input type="number" name="stockProducto" value="{{ $producto -> stockProducto}}" class="form-control" id="stockProducto" min="0" step="1">
                @error('stockProducto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                <div>
                <label for="imgProducto">Imagen:</label>
                <br>
                <img src="{{asset('img/productos/'.$producto->imgProducto)}}" class='img-thumbnail' alt="" width="200">
                <input type="file" name="imgProducto" class="form-control">
                                @error('imgProducto')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                </div>


                <button type="submit" class="btn btn-dark px-4" onclick="return confirm('¿Confirmar cambios?')">
                    <i class="far fa-check-circle fa-lg mr-2"></i>
                    Aceptar
                </button>
                <a href="/adminProductos" class="btn btn-outline-info ml-3">
                <i class="fas fa-undo-alt fa-lg mr-2"></i>
                    Volver Productos
                </a>


            </form>
        </div>

    @endsection

    @section('footer')
    @include('layouts.footer')
    @endsection