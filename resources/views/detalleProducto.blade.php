@extends('layouts.plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/detalleProducto.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Detalle del producto')

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

    <div class="container text-center">

        <div class="row">
            <div class="col-md-6">
                <div class="bloque-producto">
                    <img src="{{asset('img/productos/'.$producto->imgProducto)}}" alt="Img del producto seleccionado">
                </div>
            </div>


            <div class="col-md-6">
                <div class="bloque-detalle">
                    <h3>{{ $producto -> nbProducto }}</h3><hr>               
                    <div class="info-producto panel">
                        <p>{{ $producto -> dtlProducto }}</p>
                        <h3><span class="label label-success">Precio: ${{ $producto -> precioProducto }}</span></h3>

                        <form action="">
                            <div class="cant">
                                <label for="numero">Cantidad:</label>
                                <input type="number" name="numero" id="num" min=1>
                            </div>
                        </form>

                        <p>
                            <a href="{{route('carrito-agregar', $producto -> idProducto)}}" class="btn btn-warning btn-block"><i class="fas fa-cart-plus"></i> Agregar a mi carrito</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <article id="R-side">


        </article>
    </div>

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection