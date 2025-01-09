@extends('comics.layouts.user.app-layout')
@section('title')
    CONTACTO
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/comics/user/contacto.css') }}">
@endsection
@section('content')
    <div class="contact-section">
        <div class="session1">
            <h2>Contacto</h2>

            <p>Si tienes alguna pregunta o comentario, no dudes en ponerte en contacto con nosotros</p>
        </div>
        <div class="content">
            <h3>Información de Contacto</h3>
            <p><strong>Teléfono:</strong> +123 456 7890</p>
            <p><strong>Correo Electrónico:</strong> info@tiendadecomics.com</p>
            <p><strong>Dirección:</strong> Calle Siempre Viva 123A, VIVA, MEXICO</p>
            <p><strong>Horario de Atención:</strong> Lunes a Viernes de 10:00 a 18:00</p>

            <div class="redes">
                <h3>Síguenos en Redes Sociales</h3>
                <a href="https://facebook.com/" target="_blanck">
                    <img src="{{ asset('img/comic/sitio/facebook.png') }}" alt="">
                </a>
                <a href="https://instagram.com/" target="_blanck">
                    <img src="{{ asset('img/comic/sitio/Instagram.png') }}" alt="">
                </a>
                <a href="https://twitter.com/" target="_blanck">
                    <img src="{{ asset('img/comic/sitio/twiter.jpg') }}" alt="">
                </a>
            </div>

            <h3 style="text-align: center">Ubicación</h3>
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7465.773748349405!2d-103.35765220642088!3d20.67418090000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1fa62260927%3A0xcc1caafc1fb1c91c!2sFrikiplaza%20Guadalajara!5e0!3m2!1ses-419!2smx!4v1728326657997!5m2!1ses-419!2smx"
                    width="1000" height="450" style="border:2px black solid; border-radius: 20px" allowfullscreen="" loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
@endsection
