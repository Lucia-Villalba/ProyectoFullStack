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

    <section>
        <article id="L-side">
            <div><img src="{{asset('img/productos/'.$producto->imgProducto)}}" alt="Imagen del producto seleccionado"></div>
        </article>
        <article id="R-side">
            <h3>{{ $producto -> nbProducto }}</h3>
            <h4>$ {{ $producto -> precioProducto }}</h4>
            <p>
                {{ $producto -> dtlProducto }}
            </p>
            <form action="">
                <h3>Talle:</h3>
                <div class="radio">
                    <label for="38">38</label>
                    <input type="radio" name="38" id="radio">
                    </div>
                <div class="cant">
                    <label for="numero">Cantidad:</label>
                    <input type="number" name="numero" id="num" min=1>
                </div>
                <div class="submit">
                
                <a href="{{route('carrito-agregar', $producto -> idProducto)}}" class="btn btn-outline-info">
                <i class="far fa-edit fa-lg mr-2"></i>
                Agregar al carrito
                </a>

<!--<input type="submit" value="Agregar al carrito" href="{{route('carrito-agregar', $producto -> idProducto)}}">-->

                    <input type="submit" value="Comprar">
                </div>
            </form>
        </article>
    </section>

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection