<ul class="admin-right-header_one">
    <li><i class="ri-align-justify"></i></li>

    <li>
        <i class="ri-search-line"></i>
        <input type="text" placeholder="Nhập người cần tìm ?...">
    </li>

    <li><i class="ri-moon-clear-line"></i></li>
    <li><i class="ri-notification-3-line"></i></li>

    <li class="admin-avatar">
        @if(Auth::user()->avatar)
            <img
                src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}"
                alt="Admin"
            >
        @else
            <img
                src="{{ asset('backend/admin/img/default-avatar.png') }}"
                alt="Admin"
            >
        @endif
    </li>
</ul>
