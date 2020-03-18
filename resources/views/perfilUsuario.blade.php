@extends('layouts/plantilla')

@section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/perfilUser.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
@endsection

@section('title', 'Perfil Usuario')

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

@section('h1', 'Perfil del Usuario')

@section('main')

    @if ( session("estado"))
    <div class="alert alert-success">
    {{ session("estado") }}
    </div>
    @endif
 

    <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('Datos Personales') }}</h4>
                        <h4>{{__('Rol:')}} {{auth()->user()->role}}</h4>
                    </div>
                    <div class="col-md-3 border border-dark rounded">
                    <img src="{{asset('img/avatars/'.auth()->user()->imgUser)}}" class="card-img" style="width:100%, heigth:100%" alt="avatar">
                    </div>
                    <div class="card-body">
                    <form method="POST" action="/modificarUser/{{auth()->user()->id}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
    
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ auth()->user()->surname }}" required autocomplete="surname" autofocus>
    
                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
    
                            <div class="form-group row">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>
    
                                <div class="col-md-6">
                                    <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ auth()->user()->fecha }}" required autocomplete="fecha" autofocus>
    
                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}" required autocomplete="email" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="imgUser" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
                                <div class="col-md-6">
                                    <input id="imgUser" type="file" class="form-control @error('imgUser') is-invalid @enderror" name="imgUser" >
                                    @error('imgUser')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
            

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Modificar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                <form method="POST" action={{route('logout')}}>
                    {{ csrf_field() }}
                    <input type='submit' value='Cerrar sesion' class="btn btn-danger btn-block btn-xs">
                </form>
 
            </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection