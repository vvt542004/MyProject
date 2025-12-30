<!DOCTYPE html>
<html lang="en">

<head>
@include('Admin.parts.head')
</head>

<body>

    <section>
        <div class="admin_all">
            <div class="admin_left">
                @include('Admin.parts.admin_left')
            </div>
            <div class="admin_right">
                <div class="admin-right-header">
                    @include('Admin.parts.admin_right_header')
                </div>
                <main>
                    <div class="admin_right_text">
                        <h1>Danh Sách người dùng</h1>
                    </div>
<div class="admin_right_content">

    @foreach($users as $user)
        <div class="sub_conten_1" style="margin-left: 20px;">

            <ul>
                {{-- Avatar --}}
                <li>
                    @if($user->avatar)
                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="avatar">
                    @else
                        <img src="{{ asset('backend/admin/img/default-user.png') }}" alt="avatar">
                    @endif
                </li>

                {{-- Name --}}
                <li style="font-weight: bold;">
                    {{ $user->name }}
                </li>

                {{-- Email --}}
                <li>{{ $user->email }}</li>

                {{-- Role --}}
                <li>
                    <button
                        style="
                            color: {{ $user->role === 'admin' ? 'red' : 'rgb(52, 225, 52)' }};
                            font-weight: bold;
                        "
                    >
                        {{ strtoupper($user->role) }}
                    </button>
                </li>
            </ul>

            <hr style="margin-top: 24px; color: gray;">

            {{-- Email verify --}}
            <p>
                @if($user->email_verified_at)
                    <i class="ri-circle-fill" style="font-size:10px;color:rgb(54,218,71)"></i>
                    <span>Đã xác thực email</span>
                @else
                    <i class="ri-circle-fill" style="font-size:10px;color:red"></i>
                    <span>Chưa xác thực email</span>
                @endif

                <i class="ri-more-2-line"></i>
            </p>

        </div>
    @endforeach

</div>

                </main>

            </div>
        </div>

    </section>




</body>
<script src="{{asset('backend/admin/js/style.js')}}"></script>
</html>