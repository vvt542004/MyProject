document.querySelectorAll('.menu-title').forEach(title => {
    title.addEventListener('click', () => {
        const parent = title.parentElement;
        parent.classList.toggle('active');
    });
});
// xem, xóa đơn hàng 
document.addEventListener("click", function (e) {
    // Đóng tất cả dropdown
    document.querySelectorAll(".order-dropdown").forEach(menu => {
        menu.style.display = "none";
    });

    // Nếu click vào icon ...
    if (e.target.classList.contains("action-btn")) {
        const dropdown = e.target.nextElementSibling;
        dropdown.style.display = "block";
        e.stopPropagation();
    }
});
