@extends('layouts.plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Administración de Marcas')
    @section('h1', 'Administración de Marcas')

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
                <th>Marca</th>
                <th colspan="2">
                    <a href="/formAgregarMarcas" class="btn btn-dark">
                    <i class="far fa-plus-square fa-lg mr-2"></i>
                    Agregar
                    </a>
                </th>
            </tr>
            </thead>

            <tbody>
            @foreach($marcas as $marca)
                <tr>
                    <td>{{$marca->nbMarca}}</td>

                    <!-- MODIFICAR MARCA -->
                    <td>
                        <a href="/formModificarMarcas/{{$marca->idMarca}}" class="btn btn-outline-info">
                        <i class="far fa-edit fa-lg mr-2"></i>
                            Modificar
                        </a>
                    </td>

                    <!-- ELIMINAR MARCA -->
                    <td>
                    <form action="/eliminarMarca" method="post">
                        {{csrf_field()}}

                        <input type="hidden" name="id" value="{{$marca->idMarca}}">
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Quieres eliminar la marca?')">
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
    
    {{$marcas->links()}}

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection