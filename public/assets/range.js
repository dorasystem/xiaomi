document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('input[name="testimonials"]').forEach((input) => {
        input.addEventListener("change", () => {
            console.log(`Selected testimonials: ${input.value}`);
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('input[name="rating"]').forEach((input) => {
        input.addEventListener("change", () => {
            console.log(`Selected rating: ${input.value}`);
        });
    });
});

const initializeSlider = (rangeMinId, rangeMaxId, minValueId, maxValueId, sliderTrackClass) => {
    const rangeMin = document.getElementById(rangeMinId);
    const rangeMax = document.getElementById(rangeMaxId);
    const minValue = document.getElementById(minValueId);
    const maxValue = document.getElementById(maxValueId);
    const sliderTrack = document.querySelector(`.${sliderTrackClass}`);

    const updateTrack = () => {
        const percent1 = (rangeMin && rangeMin.value / rangeMin.max) * 100;
        const percent2 = (rangeMax && rangeMax.value / rangeMax.max) * 100;
        sliderTrack ? (sliderTrack.style.left = `${percent1}%`) : "";
        sliderTrack ? (sliderTrack.style.width = `${percent2 - percent1}%`) : "";
    };

    const updateInputs = () => {
        if (parseInt(rangeMin.value) >= parseInt(rangeMax.value)) {
            rangeMin.value = parseInt(rangeMax.value) - 1;
        }
        minValue.value = rangeMin.value;
        maxValue.value = rangeMax.value;
        updateTrack();
    };

    const updateRanges = () => {
        if (parseInt(minValue.value) >= parseInt(maxValue.value)) {
            minValue.value = parseInt(maxValue.value) - 1;
        }
        if (parseInt(maxValue.value) <= parseInt(minValue.value)) {
            maxValue.value = parseInt(minValue.value) + 1;
        }
        rangeMin.value = minValue.value;
        rangeMax.value = maxValue.value;
        updateTrack();
    };

    rangeMin && rangeMin.addEventListener("input", updateInputs);
    rangeMax && rangeMax.addEventListener("input", updateInputs);
    minValue && minValue.addEventListener("input", updateRanges);
    maxValue && maxValue.addEventListener("input", updateRanges);

    updateTrack();
};

// Initialize the first slider
initializeSlider("rangeMin", "rangeMax", "minValue", "maxValue", "slider-track");

// Initialize the second slider
initializeSlider("rangeMin2", "rangeMax2", "minValue2", "maxValue2", "slider-track2");

// compare
