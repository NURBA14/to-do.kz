@extends('guest.layouts.layout')


@section('title')
    Home
@endsection

@section('header')
@endsection

@section('content')
    <div class="container">
        @include("worker.layouts.success")
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/wall.jfif') }}" height="550px" class="rounded-4 d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-center text-dark">
                            Добро пожаловать в нашу IT-компанию!
                        </h1><br>
                        <h5 class="text-dark">Мы рады приветствовать вас на нашем виртуальном пространстве, где технологии и
                            инновации
                            воплощаются в
                            жизнь. Здесь вы окажетесь в кругу единомышленников, где каждый вкладывает свои усилия в создание
                            технологических решений, меняющих мир.</h5><br>
                        <h5 class="text-dark">Наша компания - это не только техническая платформа, но и сообщество, в
                            котором ценится
                            творчество,
                            профессионализм и стремление к постоянному развитию. Мы считаем, что именно взаимодействие и
                            совместные
                            усилия позволяют нам достигать великих результатов.</h5><br>
                        <h5 class="text-dark">
                            Здесь вы найдете не только профессиональные вызовы, но и поддержку со стороны коллег, которые
                            готовы
                            поддержать вас на каждом этапе вашего профессионального пути.
                        </h5><br>
                        <h5 class="text-dark">Добро пожаловать в команду, где каждый может воплотить свои идеи в реальность
                            и оставить след в
                            истории
                            технологий!
                        </h5><br>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-4">
                    <div class="card-header">
                        <h5 class="card-title">Наше местоположение</h5>
                    </div>
                    <div class="card-body">
                        <div class="googlemaps">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5775.209471573828!2d51.1549856!3d43.6355851!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41b43346ac9ae4bb%3A0x6cc9895cbfc20f47!2sMediana%20Services%20Limited!5e0!3m2!1sru!2skz!4v1710512526127!5m2!1sru!2skz"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="rounded-4"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
