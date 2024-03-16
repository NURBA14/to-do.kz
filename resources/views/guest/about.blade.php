@extends('guest.layouts.layout')


@section('title')
    About Us
@endsection

@section('header')
    About Us
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body text-start">
                                <h4 class="card-title">
                                    <button class="btn btn-danger btn-xl">
                                        IT-company
                                    </button>
                                </h4>
                                <p class="card-text">
                                    Основана в 2007 году в городе Актау, является одной из IT-компаний в Казахстане, которые
                                    на профессиональном уровне занимаются созданием, внедрением и сопровождением
                                    информационных, компьютерных, серверных и других сопутствующих цифровых программных
                                    продуктов.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body text-start">
                                <h4 class="card-title">
                                    <button class="btn btn-info btn-xl">
                                        Цифры
                                    </button>
                                </h4>
                                <p class="card-text">
                                    15 лет опыта, более 35 сотрудников, около 700 разработанных веб-сайтов и мобильных
                                    приложений, 3 собственных облачных веб-платформ, 16 авторских прав и патентов на
                                    программные решения. Более 20 международных и национальных наград за создание лучших
                                    веб-проектов.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body text-start">
                                <h4 class="card-title">
                                    <button class="btn btn-danger btn-xl">
                                        Веб-ресурсы и приложения
                                    </button>
                                </h4>
                                <p class="card-text">
                                    Вы можете доверить нам создание, разработку и сопровождения интернет-ресурса, веб-сайта,
                                    корпоративных программ, мобильных приложений любой сложности. Многолетний опыт в сфере
                                    веб-разработок научил нас подходить к делу профессионально и создать веб-сайты и
                                    мобильные приложения достаточно качественно.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-4 mt-5">
                    <a href="https://ratingruneta.ru/web/kazakhstan/"><img style="width:75%;"
                            src="https://images.cmsmagazine.ru/diff/cms-badges-generated/web_global/11838/9338122cc410c048eca6bdd112804b52_badge_ddbb8f350f98be.png"
                            alt="Казахстан: рейтинг веб-студий"></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
