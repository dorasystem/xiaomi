<?php
$contact = \App\Models\Contact::first();
$about = \App\Models\About::first();
?>

<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/dashboard" class="b-brand">
                <h3 class="logo logo-lg">XIAOMI</h3>
                <h6 class="logo logo-sm"> </h6>
            </a>
        </div>
        <div class="navbar-content ps">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Навигация</label>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a @if( auth()->user()->role == '2')
                           href="{{ route('superAdmin.dashboard') }}"
                       @elseif( auth()->user()->role == '1')
                           href="{{ route('admins.dashboard') }}"
                       @endif class="nxl-link">
                        <span class="nxl-micon"><i class="feather-home"></i></span> <!-- Dashboard icon -->
                        <span class="nxl-mtext">Панель инструментов</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('abouts.edit', $about->id) }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-info"></i></span> <!-- About icon -->
                        <span class="nxl-mtext">О нас</span>
                    </a>
                </li>
                <li class="nxl-item">
                    <a href="{{ route('histories.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-calendar"></i></span> <!-- Год feed icon for News -->
                        <span class="nxl-mtext">история</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="fa-solid fa-newspaper"></i></span> <!-- Main icon for News -->
                        <span class="nxl-mtext">Новости</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>

                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a href="{{ route('news.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-rss"></i></span> <!-- RSS feed icon for News -->
                                <span class="nxl-mtext">Новости</span>
                            </a>
                        </li>
                        <li class="nxl-item">
                            <a href="{{ route('blogs.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="fa-solid fa-blog"></i></span> <!-- Blog icon -->
                                <span class="nxl-mtext">Блоги</span>
                            </a>
                        </li>
                        <li class="nxl-item">
                            <a href="{{ route('articles.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-book"></i></span> <!-- Book icon for Articles -->
                                <span class="nxl-mtext">Полезные статьи</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('products.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-box"></i></span> <!-- Product icon updated -->
                        <span class="nxl-mtext">Продукты</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('categories.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-tag"></i></span> <!-- Category icon updated -->
                        <span class="nxl-mtext">Категории</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('faqs.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-help-circle"></i></span> <!-- FAQ icon -->
                        <span class="nxl-mtext">Часто задаваемые вопросы</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-mail"></i></span> <!-- Contact icon -->
                        <span class="nxl-mtext">Контакт</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('vacancies.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-briefcase"></i></span> <!-- Briefcase icon for vacancies -->
                        <span class="nxl-mtext">Вакансии</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('candidants.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span> <!-- Users icon for candidates -->
                        <span class="nxl-mtext">Кандидаты</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('desc-images.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span> <!-- Users icon for candidates -->
                        <span class="nxl-mtext"> Телефоны Описание</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('stores.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span> <!-- Users icon for candidates -->
                        <span class="nxl-mtext"> Address</span>
                    </a>
                </li>

                {{--                @can('admins')--}}
{{--                    <li class="nxl-item nxl-hasmenu">--}}
{{--                        <a href="{{ route('news.index') }}" class="nxl-link">--}}
{{--                            <span class="nxl-micon"><i class="feather-users"></i></span> <!-- Admins icon -->--}}
{{--                            <span class="nxl-mtext">News</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 598px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
    </div>
</nav>
