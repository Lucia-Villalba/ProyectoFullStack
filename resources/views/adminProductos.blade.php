@extends('layouts/plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Administración de Productos')
    @section('h1', 'Administración de Productos')

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

    <div class="table-responsive">
        <table class="table table-bordered table-stripped table-hover">
            <thead class="">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Detalle</th>               
                    <th>Imagen</th>
                    <th colspan="2" class="text-center">
                        <a href="/formAgregarProductos" class="btn btn-dark px-4">
                            <i class="far fa-plus-square fa-lg mr-2"></i>
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>


            @foreach($productos as $producto)
                <tr>
                    <td>{{$producto->nbProducto}}</td>
                    <td>{{$producto->precioProducto}}</td>
                    <td>{{$producto->getMarca->nbMarca}}</td>
                    <td>{{$producto->getCategoria->nbCategoria}}</td>
                    <td>{{$producto->dtlProducto}}</td>
                    <td><img src="{{asset('img/productos/'.$producto->imgProducto)}}" class='img-thumbnail' alt=""></td>

                    <!-- MODIFICAR PRODUCTO -->
                    <td>
                        <a href="/formModificarProductos/{{$producto->idProducto}}" class="btn btn-outline-info">
                        <i class="far fa-edit fa-lg mr-2"></i>
                            Modificar
                        </a>
                    </td>

                    <td>
                    <!-- ELIMINAR PRODUCTO -->
                    <form action="/eliminarProducto" method="post">
                        {{csrf_field()}}

                        <input type="hidden" name="id" value="{{$producto->idProducto}}">
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Quieres eliminar el producto?')">
                            <i class="fas fa-trash-alt fa-lg mr-2"></i>
                            Eliminar
                        </button>

                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$productos->links()}}

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection