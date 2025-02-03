<?php
$contact = \App\Models\Contact::first();
$about = \App\Models\About::first();
$mainBanner = \App\Models\MainBanner::first();
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
                <!-- Navigation Header -->
                <li class="nxl-item nxl-caption">
                    <label>Навигация</label>
                </li>

                <!-- Dashboard -->
                <li class="nxl-item">
                    <a @if(auth()->user()->role == '2')
                           href="{{ route('superAdmin.dashboard') }}"
                       @elseif(auth()->user()->role == '1')
                           href="{{ route('admins.dashboard') }}"
                       @endif class="nxl-link">
                        <span class="nxl-micon"><i class="feather-home"></i></span>
                        <span class="nxl-mtext">Панель управления</span>
                    </a>
                </li>

                <!-- About Us -->
                <li class="nxl-item">
                    <a href="{{ route('abouts.edit', $about->id) }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-info"></i></span>
                        <span class="nxl-mtext">О нас</span>
                    </a>
                </li>

                <!-- Products and Categories -->
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="fa-solid fa-boxes"></i></span>
                        <span class="nxl-mtext">Продукты и Категории</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>

                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a href="{{ route('desc-images.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-image"></i></span>
                                <span class="nxl-mtext">Описание телефонов</span>
                            </a>
                        </li>

                        <li class="nxl-item">
                            <a href="{{ route('products.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-box"></i></span>
                                <span class="nxl-mtext">Продукты</span>
                            </a>
                        </li>

                        <li class="nxl-item">
                            <a href="{{ route('categories.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-tag"></i></span>
                                <span class="nxl-mtext">Категории</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- News Section -->
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="fa-solid fa-newspaper"></i></span>
                        <span class="nxl-mtext">Новости</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a href="{{ route('news.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-rss"></i></span>
                                <span class="nxl-mtext">Новости</span>
                            </a>
                        </li>
                        <li class="nxl-item">
                            <a href="{{ route('blogs.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="fa-solid fa-blog"></i></span>
                                <span class="nxl-mtext">Блоги</span>
                            </a>
                        </li>
                        <li class="nxl-item">
                            <a href="{{ route('articles.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-book"></i></span>
                                <span class="nxl-mtext">Полезные статьи</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="fa-solid fa-newspaper"></i></span>
                        <span class="nxl-mtext">Информация</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a href="{{ route('news.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-file-text"></i></span>
                                <span class="nxl-mtext fs-11">Инструкции  Xiaomi</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- History -->
                <li class="nxl-item">
                    <a href="{{ route('histories.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-calendar"></i></span>
                        <span class="nxl-mtext">История</span>
                    </a>
                </li>

                <!-- FAQ -->
                <li class="nxl-item">
                    <a href="{{ route('faqs.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-help-circle"></i></span>
                        <span class="nxl-mtext">Часто задаваемые вопросы</span>
                    </a>
                </li>

                <!-- Contact -->
                <li class="nxl-item">
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-mail"></i></span>
                        <span class="nxl-mtext">Контакт</span>
                    </a>
                </li>

                <!-- Vacancies -->
                <li class="nxl-item">
                    <a href="{{ route('vacancies.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-briefcase"></i></span>
                        <span class="nxl-mtext">Вакансии</span>
                    </a>
                </li>

                <!-- Candidates -->
                <li class="nxl-item">
                    <a href="{{ route('candidants.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span>
                        <span class="nxl-mtext">Кандидаты</span>
                    </a>
                </li>

                <!-- Store Addresses -->
                <li class="nxl-item">
                    <a href="{{ route('stores.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-map-pin"></i></span>
                        <span class="nxl-mtext">Адреса магазинов</span>
                    </a>
                </li>

                <!-- Main Banners -->
                <li class="nxl-item">
                    <a href="{{ route('main_banners.edit', $mainBanner->id) }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-image"></i></span>
                        <span class="nxl-mtext">Главные баннеры</span>
                    </a>
                </li>

                <!-- Orders -->
                <li class="nxl-item">
                    <a href="{{ route('orders.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-shopping-cart"></i></span>
                        <span class="nxl-mtext">Заказы</span>
                    </a>
                </li>


                <!-- Static Keywords -->
                <li class="nxl-item">
                    <a href="{{ route('keywords.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-key"></i></span>
                        <span class="nxl-mtext" style="font-size: 12px">Статические ключевые слова</span>
                    </a>
                </li>
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
