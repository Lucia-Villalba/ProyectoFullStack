@extends('layouts.plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/productos.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Productos')
    
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

    @section('h1', 'Productos')


<div id="container">

    <section id="productos">
        <div class="row">

            @foreach($listadoProductos as $producto)
            

            <article class="col-12 col-md-6 col-lg-3">
                <a href="/detalleProducto/{{ $producto -> idProducto }}"> 
                    <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/productos/'.$producto->imgProducto)}}" class="card-img-top" alt="producto">
                        <div class="card-body">
                            <h4 class="card-title">{{$producto->nbProducto}}</h4>
                            <p class="card-text">$ {{$producto->precioProducto}}<p>                                       
                        </div>
                    </div> 
                </a>
            </article>
           
            @endforeach
        </div>

    </section>
</div>

{{$listadoProductos->links()}}

    @endsection

@section('footer')
    @include('layouts.footer')
@endsection