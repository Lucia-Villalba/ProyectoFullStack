@extends('layouts.plantilla')
    
    @section('linkStyle')
    <link rel="stylesheet" href="{{asset('css/header-nav.css')}} ">
    <link rel="stylesheet" href="{{asset('css/faq.css')}}">
    <link rel="stylesheet" href="/css/footer.css">
    @endsection

    @section('title', 'Preguntas frecuentes')

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

    <section>
        <h4>Preguntas Frecuentes</h4>
        <ul class="list-group list-group-flush accordion" class="" id="accordionExample">


            <li class="list-group-item">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        ¿Cuáles son las formas de pago disponibles?
                    </button>
                </h2>
            </li>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    MERCADO PAGO<br>
                    Tarjeta de crédito (Mercado pago) <a href="https://www.mercadopago.com/mla/cuotas" class="badge badge-dark">Ver
                        promociones</a><br>
                    Una vez que tu pago fue acreditado, recibirás un correo electrónico de confirmación de pago e
                    iniciaremos el proceso de facturación y despacho.
                </div>
            </div>


            <li class="list-group-item">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Cuál es el costo de envío?
                    </button>
                </h2>
            </li>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    En compras superiores a $1499 el envío es bonificado de acuerdo a la zona de entrega<br>
                    LOCAL (AMBA): envío gratis en compras superiores a $2000<br>
                    REGIONAL: envío gratis en compras superiores a $2500<br>
                    NACIONAL 1: envío gratis en compras superiores a $3000<br>
                    NACIONAL 2: envío gratis en compras superiores a $4000
                </div>
            </div>


            <li class="list-group-item">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        ¿Cuánto demora la entrega del pedido?
                    </button>
                </h2>
            </li>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    A partir de la fecha de facturación (ésta demora hasta 7 días hábiles), la entrega tiene un plazo
                    entre 5 y 12 días hábiles dependiendo la localidad de entrega.
                </div>
            </div>


            <li class="list-group-item">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        ¿Qué sucede si nadie recibe mi pedido?
                    </button>
                </h2>
            </li>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    Se volverá a envíar una segunda vez. Si luego de la segunda visita nadie recibe el pedido, este se
                    encontrará por 72 horas en la sucursal de correo que se detalle en el registro de visita.
                </div>
            </div>


            <li class="list-group-item">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        ¿Cuál es la garantía de los productos?
                    </button>
                </h2>
            </li>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    Nuestros productos cuentan con 180 días de garantía una vez efectuada la compra. Sólo cubre un
                    desperfecto del producto relacionado a la fabricación del mismo. En caso de ser productos
                    discontinuados o de oferta no tienen garantía. Para hacer el reclamo por falla del producto,
                    escribir a ecommerce@norules.com.ar indicando número de pedido, nombre del producto y detalle de la
                    falla del mismo.
                </div>
            </div>

            <li class="list-group-item">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        ¿Cómo puedo realizar el cambio de un producto?
                    </button>
                </h2>
            </li>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body">
                    Si desea cambiar el producto recibido debe mantenerlo en perfectas condiciones, con su embalaje
                    original, etiquetas y ticket de compra. Dentro de los 30 días de efectuada la compra puede dirigirse
                    a cualquier sucursal NoRules (sujeto a disponibilidad de stock) o mandar un email a
                    ecommerce@norules.com.ar indicando el número de pedido. El costo del envío a domicilio por cambio
                    corre por cuenta y orden el cliente.
                </div>
            </div>
        </ul>
    </section>

    @endsection

    @section('footer')
        @include('layouts.footer')
    @endsection