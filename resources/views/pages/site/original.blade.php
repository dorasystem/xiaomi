@extends('layouts.page')

@section('content')
    <main class="container ">
        <div class="my-4">
            <div class="d-flex align-items-center gap-1">
                <a href="/" class="text-grey fw-bold fs-14">@lang('home.home') / </a>
                <span class="text-dark fw-bold">@lang('home.original')</span>
            </div>
            <hr />
        </div>
        <div class="mb-5">
            <div class="row">
                <x-page.sidebar></x-page.sidebar>

                <div class="col-lg-9">
                    <h3><b>Где найти IMEI смартфона?</b></h3>
                    <div class="row tabs2 mx-0">
                        <div class="card col-md-3 tab2 active" data-content="box">На коробке смартфона</div>
                        <div class="card col-md-3 tab2" data-content="command">По команде *#06#</div>
                        <div class="card col-md-3 tab2" data-content="settings">В настройках телефона</div>
                    </div>

                    <div class="content mt-4">
                        <div id="box" class="tab-content active">
                            <img src="/assets/images/imei.jpg" alt="" class="b-page-info__image">
                            <h3 class="my-3 mt-5"><b>Где найти серийный номер (S/N)?</b></h3>
                            <img src="/assets/images/info-sn.jpg" alt="" class="b-page-info__image">
                            <h3 class="my-3 mt-5"><b>Маркировка EAC</b></h3>
                            <div class="b-page-info__desc">
                                Маркировка EAC (Eurasian Conformity — «Евразийское Соответствие») заменила с 2013 года сертификат Ростест (с
                                маркировкой РСТ). Знак ЕАС присутствует на вашей упаковке товара, что говорит о том, что сертификация товара
                                пройдена.
                            </div>
                            <img src="/assets/images/info-eac.jpg" alt="" class="b-page-info__image">
                        </div>
                        <div id="command" class="tab-content">
                            <div class="row">
                                <div class="col-md-3 text-center  ">
                                    <img src="/assets/images/info-screen-1.jpg" alt="" class="b-page-info__image text-center mx-1 my-1" >
                                </div>
                                <div class="col-md-3  text-center ">
                                    <img src="/assets/images/info-screen-2.jpg" alt="" class="b-page-info__image text-center mx-1 my-1">
                                </div>
                                <div class="col-md-3 text-center ">
                                    <img src="/assets/images/info-screen-3.jpg" alt="" class="b-page-info__image text-center mx-1 my-1">
                                </div>
                                <h3 class="my-3 mt-5"><b>Где найти серийный номер (S/N)?</b></h3>
                                <img src="/assets/images/info-sn.jpg" alt="" class="b-page-info__image">
                                <h3 class="my-3 mt-5"><b>Маркировка EAC</b></h3>
                                <div class="b-page-info__desc">
                                    Маркировка EAC (Eurasian Conformity — «Евразийское Соответствие») заменила с 2013 года сертификат Ростест (с
                                    маркировкой РСТ). Знак ЕАС присутствует на вашей упаковке товара, что говорит о том, что сертификация товара
                                    пройдена.
                                </div>
                                <img src="/assets/images/info-eac.jpg" alt="" class="b-page-info__image">
                            </div>
                        </div>
                        <div id="settings" class="tab-content">
                            <div class="row">
                                <div class="col-md-3 text-center mx-1 my-1">
                                    <img src="/assets/images/info-screen-1.jpg" alt="" >
                                </div>
                                <div class="col-md-3 text-center mx-1 my-1">
                                    <img src="/assets/images/info-screen-5.jpg" alt="" >
                                </div>
                                <div class="col-md-3 text-center  mx-1 my-1">
                                    <img src="/assets/images/info-screen-6.jpg" alt="" >
                                </div>
                                <div class="col-md-3 text-center  mx-1 my-1">
                                    <img src="/assets/images/info-screen-7.jpg" alt="">
                                </div>
                                <div class="col-md-3 text-center mx-1 my-1">
                                    <img src="/assets/images/info-screen-8.jpg" alt="" >
                                </div>

                                <h3 class="my-3 mt-5"><b>Где найти серийный номер (S/N)?</b></h3>
                                <img src="/assets/images/info-sn.jpg" alt="" class="b-page-info__image">
                                <h3 class="my-3 mt-5"><b>Маркировка EAC</b></h3>
                                <div class="b-page-info__desc">
                                    Маркировка EAC (Eurasian Conformity — «Евразийское Соответствие») заменила с 2013 года сертификат Ростест (с
                                    маркировкой РСТ). Знак ЕАС присутствует на вашей упаковке товара, что говорит о том, что сертификация товара
                                    пройдена.
                                </div>
                                <img src="/assets/images/info-eac.jpg" alt="" class="b-page-info__image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .tabs2 {
            display: flex;
            gap: 15px;
        }
        .tab2 {
            padding: 15px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            background-color: white;
            transition: background 0.3s;
        }
        .tab2.active {
            background-color: #e0e0e0;
        }
        .content .tab-content {
            display: none;
            font-size: 18px;
            font-weight: bold;
        }
        .content .tab-content.active {
            display: block;
        }
        .b-page-info__desc {
            font-family: GothamPro, Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
           padding-bottom: 10px;
        }
        .b-page-info__image {
            max-width: 100%;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab2');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    tabs.forEach(t => t.classList.remove('active'));
                    contents.forEach(c => c.classList.remove('active'));

                    this.classList.add('active');
                    document.getElementById(this.getAttribute('data-content')).classList.add('active');
                });
            });
        });
    </script>
@endsection
