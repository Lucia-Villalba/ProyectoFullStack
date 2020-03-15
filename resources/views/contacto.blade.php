@extends('layouts.plantilla')

    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/contacto.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Contacto')
    
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
    <section id="contacto">
            <h3>CONTACTO</h3>
            <div id="contenedor">
                <article id="mapa">

                    <h4>Oficina de atención al cliente</h4>
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Av. Belgrano 388, C1092AAP CABA</span>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.672880663756!2d-58.37389498413094!3d-34.61243246546759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a3352ad313e8e3%3A0x5e38e070c4fb3875!2sAv.%20Belgrano%20388%2C%20Buenos%20Aires!5e0!3m2!1ses!2sar!4v1573756762192!5m2!1ses!2sar"
                        width="1120" height="500" frameborder="0" style="border:0;" allowfullscreen=""
                        id="mapa-tamaño"></iframe>

                </article>

                <article id="datos">

                    <h4>Atención al cliente</h4>
                    <i class="far fa-envelope"></i>
                    <a href="mailto:atencionclientes@norules.com"> atencionclientes@norules.com</a>
                    <br>

                    <i class="fas fa-phone"></i>
                    <a href="tel:6262626262"> 626262626</a>
                    <br>

                    <i class="fab fa-whatsapp"></i>
                    <span>6262626263</span>

                </article>

                <article id="mensaje">
                    <h4>Dejanos tu mensaje</h4>

                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombre" placeholder="Su nombre *" required>
                    <br>

                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" placeholder="Su email *" required>
                    <br>

                    <label for="mensaje">Mensaje:</label>
                    <br>
                    <textarea name="mensaje" id="mensaje" cols="50" rows="10" placeholder="Escriba aquí su mensaje *" required></textarea>

                    <button type="submit">ENVIAR</button>

                </article>
            </div>

        </section>

    </div>  

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection