new Swiper(".productSale", {
    slidesPerView: 4,
    spaceBetween: 15,
    loop: true,
    navigation: {
        nextEl: "#products-next",
        prevEl: "#products-prev",
    },
    breakpoints: {
        1500: { slidesPerView: 4 },
        1024: { slidesPerView: 3 },
        768: { slidesPerView: 2 },
        524: { slidesPerView: 2 },
        480: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
    },
});
new Swiper(".seenProducts", {
    slidesPerView: 4,
    spaceBetween: 15,
    loop: true,
    navigation: {
        nextEl: "#product-next",
        prevEl: "#product-prev",
    },
    breakpoints: {
        1500: { slidesPerView: 4 },
        1024: { slidesPerView: 3 },
        768: { slidesPerView: 2 },
        524: { slidesPerView: 2 },
        480: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
    },
});
new Swiper(".similarProducts", {
    slidesPerView: 4,
    spaceBetween: 15,
    loop: true,
    navigation: {
        nextEl: "#product-next",
        prevEl: "#product-prev",
    },
    breakpoints: {
        1500: { slidesPerView: 4 },
        1024: { slidesPerView: 3 },
        768: { slidesPerView: 2 },
        524: { slidesPerView: 2 },
        480: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
    },
});
new Swiper(".newProducts", {
    slidesPerView: 4,
    spaceBetween: 15,
    loop: true,
    navigation: {
        nextEl: "#products-next",
        prevEl: "#products-prev",
    },
    breakpoints: {
        1500: { slidesPerView: 4 },
        1024: { slidesPerView: 3 },
        768: { slidesPerView: 2 },
        524: { slidesPerView: 2 },
        480: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
    },
});
new Swiper(".xitProducts", {
    slidesPerView: 4,
    spaceBetween: 15,
    loop: true,
    navigation: {
        nextEl: "#products-next",
        prevEl: "#products-prev",
    },
    breakpoints: {
        1500: { slidesPerView: 4 },
        1024: { slidesPerView: 3 },
        768: { slidesPerView: 2 },
        524: { slidesPerView: 2 },
        480: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
    },
});
new Swiper(".news", {
    slidesPerView: 3,
    spaceBetween: 15,
    loop: true,
    navigation: {
        nextEl: "#products-next",
        prevEl: "#products-prev",
    },
    breakpoints: {
        1024: { slidesPerView: 3 },
        768: { slidesPerView: 2 },
        524: { slidesPerView: 2 },
        480: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
    },
});

// single blog slider
new Swiper(".blogimages", {
    effect: "fade",
    fadeEffect: {
        crossFade: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    loop: true,
});
// shopping cart
function increment(button) {
    const countSpan = button.parentElement.querySelector(".count");
    let value = parseInt(countSpan.getAttribute("data-value"));
    value++;
    countSpan.setAttribute("data-value", value);
    countSpan.innerText = value;
}

function decrement(button) {
    const countSpan = button.parentElement.querySelector(".count");
    let value = parseInt(countSpan.getAttribute("data-value"));
    if (value > 0) {
        value--;
        countSpan.setAttribute("data-value", value);
        countSpan.innerText = value;
    }
}
// katalog ochilish va yopilishi
const toggleButtons = document.querySelectorAll(".toggleButton");
const katalog = document.getElementById("Katalog");
const overlay = document.getElementById("overlay");
const nav = document.querySelector(".navbar-custom");
const navform = document.querySelector(".nav_form");
const lines = document.querySelectorAll(".line");

const searchInput = document.getElementById("searchInput");
const searchProduct = document.getElementById("searchProduct");

toggleButtons.forEach((toggleButton) => {
    toggleButton.addEventListener("click", function (event) {
        if (katalog.style.display === "block") {
            katalog.style.display = "none";
            nav.style.borderRadius = "10px";
            overlay.style.display = "none";
            document.body.style.overflow = "auto";
        } else {
            navform.classList.remove("active");
            katalog.style.display = "block";
            nav.style.borderRadius = "10px 10px 0 0";
            overlay.style.display = "block";
            document.body.style.overflow = "hidden";
            searchProduct.style.display = "none";
            searchInput.value = "";
        }

        lines.forEach((line) => line.classList.toggle("open"));
        event.stopPropagation();
    });
});

katalog.addEventListener("click", (event) => {
    event.stopPropagation(); 
});


searchInput.addEventListener("click", () => {
    katalog.style.display = "none";
    lines.forEach((line) => line.classList.remove("open"));
    searchProduct.style.display = "block";
    navform.classList.add("active");
    overlay.style.display = "block";
    document.body.style.overflow = "hidden";
    nav.style.borderRadius = "10px";
});

document.addEventListener("click", function (event) {
    if (!searchProduct.contains(event.target) && !searchInput.contains(event.target)) {
        searchProduct.style.display = "none";
        searchInput.value = "";
        navform.classList.remove("active");
        overlay.style.display = "none";
        document.body.style.overflow = "auto";
    }
});

// Tashqi joyga bosilganda Katalogni yopish
document.addEventListener("click", function (event) {
    if (katalog.style.display === "block" && !katalog.contains(event.target) && !overlay.contains(event.target)) {
        katalog.style.display = "none";
        overlay.style.display = "none";
        document.body.style.overflow = "auto";
        const lines = document.querySelectorAll(".line");
        lines.forEach((line) => line.classList.remove("open"));
    }
});

// Overlay bosilganda Katalogni yopish
overlay.addEventListener("click", function () {
    katalog.style.display = "none";
    overlay.style.display = "none";
    document.body.style.overflow = "auto";
    const lines = document.querySelectorAll(".line");
    lines.forEach((line) => line.classList.remove("open"));
});

// Hover effectini qo'llash (Katalog)
const hoverItems = document.querySelectorAll(".hover-content");
const contentChange = document.querySelectorAll(".content-change");

hoverItems.forEach((item) => {
    item.addEventListener("mouseover", function () {
        const targetId = item.getAttribute("data-target");

        hoverItems.forEach((hoverItem) => hoverItem.classList.remove("hover-catalog"));
        item.classList.add("hover-catalog");

        contentChange.forEach((content) => {
            if (content.id === targetId) {
                content.classList.remove("hide");
                content.classList.add("default");
            } else {
                content.classList.remove("default");
                content.classList.add("hide");
            }
        });
    });
});

// for map
const mapConfigs = [
    {
        container: "map1",
        coordinates: [55.751244, 37.618423], // Moskva
        zoom: 10,
        markerImage: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
    },
    {
        container: "map2",
        coordinates: [41.2995, 69.2401], // Toshkent
        zoom: 12,
        markerImage: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
    },
    {
        container: "map3",
        coordinates: [40.712776, -74.005974], // Nyu-York
        zoom: 13,
        markerImage: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
    },
    {
        container: "map4",
        coordinates: [41.2995, 69.225], // Toshkent
        zoom: 14,
        markerImage: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
    },
    {
        container: "map5",
        coordinates: [48.8566, 2.3522], // Paris
        zoom: 11,
        markerImage: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
    },
    {
        container: "map6",
        coordinates: [34.0522, -118.2437], // Los Angeles
        zoom: 12,
        markerImage: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
    },
];

// Har bir xaritani yaratish
ymaps.ready(() => {
    mapConfigs.forEach((config) => {
        const map = new ymaps.Map(config.container, {
            center: config.coordinates,
            zoom: config.zoom,
        });

        const customPlacemark = new ymaps.Placemark(
            config.coordinates,
            {},
            {
                iconLayout: "default#image",
                iconImageHref: config.markerImage,
                iconImageSize: [40, 40],
                iconImageOffset: [-20, -20],
            }
        );

        map.geoObjects.add(customPlacemark);
    });
});

// for video banner
const videoBanner = document.querySelector(".videoBanner");
const video = document.querySelector(".video");
const ratio = document.querySelector(".ratio");

video &&
    video.addEventListener("click", function () {
        videoBanner.classList.add("d-none");

        ratio.classList.remove("d-none");
        ratio.classList.add("d-block");
    });

// Navbar uchun
const navbar2 = document.querySelector(".navbar-2");
const compareProdName = document.querySelector(".compareProdName");
const orderSum = document.querySelector(".orderSum");
const main = document.querySelector("main");
const navbar2OffsetTop = navbar2.offsetTop;

let lastScrollTop = 0;

window.addEventListener("scroll", () => {
    const scrollTop = window.scrollY;

    // Sticky navbar logic
    if (scrollTop >= navbar2OffsetTop) {
        navbar2.classList.add("sticky");
        main.style.marginTop = `${navbar2.offsetHeight}px`; // Dynamic margin-top based on navbar height
        katalog.style.top = "85px";
        if (compareProdName) compareProdName.style.top = "90px";
        if (orderSum) orderSum.style.top = "100px";

        if (window.innerWidth < 576) {
            nav.style.borderRadius = "0px";
        } else {
            nav.style.borderRadius = "0 0 10px 10px";
        }
    } else {
        navbar2.classList.remove("sticky");
        main.style.marginTop = "0px";
        katalog.style.top = "120px";

        if (window.innerWidth < 576) {
            nav.style.borderRadius = "0px";
        } else {
            nav.style.borderRadius = "10px";
        }
    }

    // Navbar hide and show on scroll
    if (scrollTop > lastScrollTop && scrollTop > navbar2OffsetTop + navbar2.offsetHeight) {
        // Scroll down: hide navbar
        navbar2.style.transform = "translateY(-100%)";
    } else if (scrollTop < lastScrollTop || scrollTop <= navbar2OffsetTop) {
        // Scroll up or above sticky point: show navbar
        navbar2.style.transform = "translateY(0)";
    }

    lastScrollTop = scrollTop;
});

// single product

// for carousel
const carousel = document.querySelector("#productCarousel");
const carouselItems = document.querySelectorAll(".carousel-item");
const thumbnailImages = document.querySelectorAll(".thumbnail-images button");
const thumbnailImgs = document.querySelectorAll(".thumbnail-images img");

thumbnailImages.forEach((button, index) => {
    button.addEventListener("click", () => {
        const carouselInstance = new bootstrap.Carousel(carousel);
        carouselInstance.to(index);

        thumbnailImgs.forEach((img) => img.classList.remove("little_active"));
        thumbnailImgs[index].classList.add("little_active");
    });
});

carousel &&
    carousel.addEventListener("slide.bs.carousel", (event) => {
        const index = event.to; // Yangi active element indeksi

        thumbnailImgs.forEach((img) => img.classList.remove("little_active"));
        thumbnailImgs[index].classList.add("little_active");
    });

// for tooltip
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});
