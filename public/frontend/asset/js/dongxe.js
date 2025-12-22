/*Su kien click cua dong xe */

function toggleFilter() {
    var content = document.getElementById("car-dx-text-seach");
    content.classList.toggle("open");
}

/*them so luong */
function increaseQuantity() {
    let qty = document.getElementById('quantity');
    qty.value = parseInt(qty.value) + 1;
}

function decreaseQuantity() {
    let qty = document.getElementById('quantity');
    if (qty.value > 1) {
        qty.value = parseInt(qty.value) - 1;
    }
}
// cart 
document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("success-popup");

    if (popup) {
        setTimeout(() => {
            popup.style.opacity = "0";
            popup.style.transform = "translateX(30px)";
            popup.style.transition = "all 0.5s ease";

            setTimeout(() => {
                popup.remove();
            }, 500);
        }, 3000);
    }
});
