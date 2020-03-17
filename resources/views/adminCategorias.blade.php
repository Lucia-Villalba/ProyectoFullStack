@extends('layouts.plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Administración de Categorías')
    @section('h1', 'Administración de Categorías')

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
        <table class="table table-bordered table-hover table-striped">

            <thead class="">
                <tr>
                    <th class="columna">Categoría</th>
                    <th colspan="2">
                        <a href="/formAgregarCategorias" class="btn btn-dark">
                        <i class="far fa-plus-square fa-lg mr-2"></i>
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{$categoria->nbCategoria}}</td>

                    <!-- MODIFICAR CATEGORIA -->
                    <td>
                        <a href="/formModificarCategorias/{{$categoria->idCategoria}}" class="btn btn-outline-info">
                        <i class="far fa-edit fa-lg mr-2"></i>
                            Modificar
                        </a>
                    </td>

                    <!-- ELIMINAR CATEGORIA -->
                    <td>
                        <form action="/eliminarCategoria" method="post">
                            {{csrf_field()}}

                            <input type="hidden" name="id" value="{{$categoria->idCategoria}}">
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Quieres eliminar la categoría?')">
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

    {{$categorias->links()}}

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection