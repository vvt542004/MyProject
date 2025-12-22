const sliderItem = document.querySelectorAll('.slider-item');
const sliderItems = document.querySelector('.slider-items');
const arrowRight = document.querySelector('.ri-arrow-right-wide-line');
const arrowLeft = document.querySelector('.ri-arrow-left-wide-line');
const dotsContainer = document.querySelector('.slider-dots')
let i = 0;

// Đặt vị trí ban đầu cho từng slider item
for (let index = 0; index < sliderItem.length; index++) {
    sliderItem[index].style.left = index * 100 + "%";
}

// Hàm để di chuyển slider
function sliderMove(index) {
    sliderItems.style.left = -index * 100 + "%";
}

// Tạo các chấm 
sliderItem.forEach((_, index) => {
    const dot = document.createElement('div');
    dot.classList.add('dot');
    if (index === 0) dot.classList.add('active');
    dot.addEventListener('click', () => {
        i = index;
        sliderMove();
    });
    dotsContainer.appendChild(dot);
});

// Hàm cập nhật vị trí slider và chấm
function sliderMove() {
    sliderItems.style.left = `-${i * 100}%`;
    updateDots();
}

// Cập nhật dot đang active
function updateDots() {
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === i);
    });
}

arrowRight.addEventListener('click', () => {
    if (i < sliderItem.length - 1) {
        i++;
    } else {
        i = 0;
    }
    sliderMove(i);
});


arrowLeft.addEventListener('click', () => {
    if (i > 0) {
        i--;
    } else {
        i = sliderItem.length - 1;
    }
    sliderMove(i);
});


function autoSlider() {
    if (i < sliderItem.length - 1) {
        i++;
    } else {
        i = 0;
    }
    sliderMove(i);
}

setInterval(autoSlider, 9000);
