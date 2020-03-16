@extends('layouts/plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/detalleProducto.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Detalle')

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
        <div class="page-header">
            <h1><i class="fa fa-shopping-cart"></i>Detalles del pedido</h1>
        </div>

        <div class="page">
            <div class="table-responsive">
                <h3>Datos del usuario</h3>
                <table class="table table-striped table-hover table-bordered">
                    <tr><td>Nombre y Apellido:</td><td>{{ Auth::user()->name . " " . Auth::user()->surname }}</td></tr>
                    <tr><td>Email:</td><td>{{ Auth::user()->email }}</td></tr>
                </table>
            </div>
            <div class="table-responsive">
                <h3>Datos del pedido</h3>
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                    @foreach($carrito as $item)
                        <tr>
                            <td>{{ $item -> nbProducto }}</td>
                            <td>${{ number_format($item -> precioProducto,2) }}</td>
                            <td>{{ $item -> cantidad }}</td>
                            <td>${{ number_format($item -> precioProducto * $item -> cantidad,2) }}</td>
                        </tr>
                    @endforeach
                </table>
                <hr><h3>
                    <span class="label labe-success">
                        Total: ${{ number_format($total,2) }}
                    </span>
                </h3><hr>
                    <p>
                        <a href="{{ route('carrito-ver') }}" class="btn btn-primary">
                            <i class="fa fa-chevron-circle-left"></i> Regresar
                        </a>

                        <a href="{{ route('carrito-comprar')}}" class="btn btn-warning">
                            Pagar con <i class="fa fa-paypal"></i>
                        </a>
                    </p>
            </div>
        </div>
    </div>






    
    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection