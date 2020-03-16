@extends('layouts/plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/carrito.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Shopping Cart')

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

      <h4>Shopping Cart</h4>

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
                    <td class="precioP">${{ number_format($item -> precioProducto,2) }}</td>
                    <td>
                      <input 
                          type="number" min="1" max="10" 
                          value="{{ $item -> cantidad }}" id="producto_{{ $item -> id }}" class="cantidadP">
                    </td>
                    <td class="precioTotal">${{ number_format($item -> precioProducto * $item -> cantidad,2) }}</td>
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
            <i class="fa fa-chevron-circle-left"></i>Seguir comprando
          </a>

          <a href="{{ route('detalles-del-pedido') }}" class="btn btn-primary">
            Continuar<i class="fa fa-chevron-circle-right"></i>
          </a>
        </p>
      </div>


<!--     <script src="/js/main.js"></script>  
  <section>
        
        <article class="items">
          <div class="img">
            <img src="img/producto1.jpg" alt="Zapatilla Nike" />
          </div>
          <div class="txt">
            <h2>Zapatillas Nike</h2>
            <h2>Talle:</h2>
            <h3>$****</h3>
            <div class="cant">
              <label for="numero">Cantidad:</label>
              <input type="number" name="numero" id="num" min="1" />
            </div>
            <h2>Subtotal:</h2>
            <h3>$****</h3>
          </div>
        </article>
        
        <article id="pago">
          <div>
            <button>Seguir Comprando</button>
            <button>Vaciar Carrito</button>
          </div>
          <h2>Total:</h2>
          <h3>$****</h3>
          <button>Pagar</button>
        </article>
      </section> -->

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection