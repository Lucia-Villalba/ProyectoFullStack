@extends('layouts.plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'No Rules - Home')
    
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

        @if(session()->has('flash'))
            <div class="alert alert-info">{{ session('flash') }}</div>
        @endif
    
        <div id="banner">
            <img src="img/Banner.png" alt="Banner de la pagina">
        </div>
        <section>
            <div class="diff">
                <article class="outfit">
                    <div class="OHead">
                        <a href="/productos/Calzado Masculino"> 
                            <h2>Calzado Masculino</h2>
                        </div>
                            <div class="ODiv"><img src="{{ asset('img/calzado-hombre.jpg')}}" alt="Calzado Masculino" class="OImg">
                        </a>
                    </div>
                </article>
                <article class="outfit">
                    <div class="OHead">
                    <a href="/productos/Calzado Femenino"> 
                        <h2>Calzado Femenino</h2></div>
                        <div class="ODiv"><img src="img/calzado-mujer.jpg" alt="Calzado Femenino" class="OImg">
                    </a>
                    </div>
                </article>
            </div>
            <div class="diff">
                <article class="outfit">
                    <div class="OHead">
                    <a href="/productos/Indumentaria Masculina"> 
                        <h2>Indumentaria Masculina</h2></div>
                        <div class="ODiv"><img src="img/ropa-hombre.jpg" alt="Indumentaria Masculina" class="OImg">
                    </a>
                    </div>
                </article>
                <article class="outfit">
                    <div class="OHead">
                    <a href="/productos/Indumentaria Femenina"> 
                        <h2>Indumentaria Femenina</h2></div>
                        <div class="ODiv"><img src="img/ropa-mujer.jpg" alt="Indumentaria Femenina" class="OImg">
                    </a>
                </div>
                </article>
            </div>
        </section>

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection