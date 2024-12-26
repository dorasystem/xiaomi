<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Xiaomi</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <!-- Favicon  -->
    <link rel="shortcut icon" href="https://xiaomistore.md/media/site_settings/logo/Logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- for map -->
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
</head>

<body>
    <x-page.header></x-page.header>

    @yield('content')

    <x-page.footer></x-page.footer>
    <nav class="navbar navbar-white bg-white text-grey fixed-bottom d-lg-none">
        <div class="container-fluid">
            <ul class="navbar-nav d-flex flex-row justify-content-around w-100 align-items-end">
                <a href="tel:+998772820080" class="d-flex flex-column align-items-center nav-link text-center nav-item">
                    <div class="icon position-relative p-0 mb-1">
                        <img src="/assets/icons/phone.svg" alt="Phone icon" />
                    </div>
                    <small class="text-lowercase">позванить</small>
                </a>

                <li class="d-flex flex-column align-items-center nav-link text-center nav-item">
                    <a href="{{ route('cart') }}" class="icon position-relative p-0">
                        <svg width="26" height="25" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.375 26.3672C10.4105 26.3672 11.25 25.5802 11.25 24.6094C11.25 23.6386 10.4105 22.8516 9.375 22.8516C8.33947 22.8516 7.5 23.6386 7.5 24.6094C7.5 25.5802 8.33947 26.3672 9.375 26.3672Z"
                                fill="#000"
                            />
                            <path
                                d="M22.5 26.3672C23.5355 26.3672 24.375 25.5802 24.375 24.6094C24.375 23.6386 23.5355 22.8516 22.5 22.8516C21.4645 22.8516 20.625 23.6386 20.625 24.6094C20.625 25.5802 21.4645 26.3672 22.5 26.3672Z"
                                fill="#000"
                            />
                            <path
                                d="M26.25 6.15228H5.45625L4.6875 2.46087C4.64367 2.25936 4.52585 2.07864 4.35455 1.95016C4.18326 1.82169 3.96932 1.7536 3.75 1.75775H0V3.51556H2.98125L6.5625 20.3906C6.60633 20.5921 6.72415 20.7728 6.89545 20.9013C7.06674 21.0297 7.28068 21.0978 7.5 21.0937H24.375V19.3359H8.26875L7.5 15.8202H24.375C24.5917 15.8252 24.8036 15.7596 24.9745 15.6346C25.1454 15.5096 25.2649 15.333 25.3125 15.1347L27.1875 7.22454C27.2189 7.09414 27.2182 6.95873 27.1854 6.82863C27.1525 6.69852 27.0885 6.57715 26.9981 6.47376C26.9077 6.37036 26.7933 6.28766 26.6637 6.23195C26.534 6.17624 26.3926 6.14899 26.25 6.15228ZM23.625 14.0624H7.14375L5.83125 7.91009H25.0781L23.625 14.0624Z"
                                fill="#000"
                            />
                        </svg>

                        <span class="badge badge-pill badge-danger badge-position rounded-circle">1</span>
                    </a>
                    <small class="text-lowercase">Корзина</small>
                </li>
                <li class="d-flex flex-column align-items-center nav-link text-center nav-item">
                    <a href="/favorites" class="icon position-relative p-0">
                        <i class="fa-regular fa-heart text-black"></i>
                        <span class="badge badge-pill badge-danger badge-position rounded-circle">2</span>
                    </a>
                    <small class="text-lowercase">Избранное</small>
                </li>
            </ul>
        </div>
    </nav>
    {{--    modal product--}}
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content px-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="largeModalLabel">Instant Purchase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body application_modal row">
                    <!-- Form for user details -->
                    <form method="POST" action="{{ route('orders.store') }}" class="col-lg-4 order-lg-1 order-2">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full name*</label>
                            <input type="text" class="form-control focus_none" id="name" name="first_name" placeholder="Enter your name" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Phone number*</label>
                            <input type="text" class="form-control focus_none" id="email" name="phone" placeholder="+998 (90) 123-45-67" />
                        </div>
                        <input type="hidden" name="product_id" id="product_id">
                        <input type="hidden" name="product_name" id="product_name">
                        <input type="hidden" name="product_price" id="product_price">
                        <input type="hidden" name="product_image" id="product_image">
                        <button type="submit" class="btn-orange rounded w-100 mb-3">Send</button>
                    </form>

                    <!-- Product details for modal -->
                    <div class="col-lg-8 order-lg-2 order-1">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="d-flex align-items-start gap-3">
                                <img class="rounded fit-cover product-image" src="" alt="" />
                                <div class="d-flex flex-column">
                                    <h6 class="product-name">Product Name</h6>
                                    <div class="product-price">0 UZS</div>
                                </div>
                                <div class="d-sm-block d-none">1X</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('largeModal');

            modal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget; // Button that triggered the modal
                const productName = button.getAttribute('data-product-name');
                const productPrice = button.getAttribute('data-product-price');
                const productImage = button.getAttribute('data-product-image');
                const productId = button.getAttribute('data-product-id'); // Assuming the product ID is passed

                // Update the modal content dynamically
                modal.querySelector('.modal-title').textContent = 'Instant Purchase: ' + productName;
                modal.querySelector('.modal-body .product-name').textContent = productName;
                modal.querySelector('.modal-body .product-price').textContent = productPrice + ' UZS';
                modal.querySelector('.modal-body .product-image').setAttribute('src', productImage);

                // Set hidden form fields with product data
                document.getElementById('product_name').value = productName;
                document.getElementById('product_price').value = productPrice;
                document.getElementById('product_image').value = productImage;
                document.getElementById('product_id').value = productId; // Set the product ID
            });
        });
    </script>

    <div id="overlay"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="/assets/script.js"></script>
    <script src="/assets/range.js"></script>

</body>
</html>
