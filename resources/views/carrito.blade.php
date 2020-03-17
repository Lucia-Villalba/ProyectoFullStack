@extends('layouts/plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/carrito.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Tu carrito')

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
      <div>
        <h1><i class="fa fa-shopping-cart"></i> Tu carrito</h1>
      </div>

      <div class="table-cart">
        @if(count($carrito))

        <p>
          <a href="{{ route('carrito-vaciar')}}" class="btn btn-danger">
            Vaciar carrito <i class="fa fa-trash"></i>
          </a>
        </p>

            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered">
                <thead>

                  <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Quitar</th>
                  </tr>

                </thead>
                <tbody>

                  @foreach($carrito as $item)
                  <tr>
                    <td><img src="{{asset('img/productos/'.$item->imgProducto)}}"></td>
                    <td>{{ $item -> nbProducto }}</td>
                    <td class="precioP">${{ $item -> precioProducto }}</td>
                    <td>
                      <input 
                          type="number" min="1" max="10" 
                          value="{{ $item -> cantidad }}" class="cantidadP">
                    </td>
                    <td class="precioTotal">${{ $item -> precioProducto * $item -> cantidad }}</td>
                    <td>
                      <a href="{{ route('carrito-quitar', $item -> idProducto)}}" class="btn btn-danger">
                        <i class="fa fa-remove"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
              <hr>
              <h3>
                <span class="label label-success">
                  Total: ${{ number_format($total,2) }}
                </span>
              </h3>
            </div>
        
        @else
            <h3><span class="label label-warning">No hay productos en el carrito</span></h3>
        @endif

        <hr>
        <p>
          <a href="/productos" class="btn btn-primary">
            <i class="fa fa-chevron-circle-left"></i> Seguir comprando
          </a>

          <a href="{{ route('detalles-del-pedido') }}" class="btn btn-primary">
            Continuar <i class="fa fa-chevron-circle-right"></i>
          </a>
        </p>
      </div>

    </div>

      <script src="/js/subtotalCarrito.js"></script>

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection