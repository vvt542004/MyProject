<!DOCTYPE html>
<html lang="en">
<head>
    @include('Admin.parts.head')
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        <main style="padding:30px;">
            <h1 class = "Tke">📊 Thống kê hệ thống</h1>
            <div style="margin-top:30px;">
    <div style="background:white;padding:25px;border-radius:14px;
                box-shadow:0 10px 25px rgba(0,0,0,0.08); margin-bottom:20px;">
        <canvas id="revenueChart" height="100"></canvas>
    </div>
</div>
            <div class="dashboard-grid">

                <div class="stat-card">
                    <h3>Tổng đơn hàng</h3>
                    <p>{{ $totalOrders }}</p>
                </div>

                <div class="stat-card pending">
                    <h3>Đơn chờ duyệt</h3>
                    <p>{{ $pendingOrders }}</p>
                </div>

                <div class="stat-card approved">
                    <h3>Đơn đã duyệt</h3>
                    <p>{{ $approvedOrders }}</p>
                </div>

                <div class="stat-card revenue">
                    <h3>Tổng doanh thu</h3>
                    <p>{{ number_format($totalRevenue,0,',','.') }} VNĐ</p>
                </div>

                <div class="stat-card users">
                    <h3>Người dùng</h3>
                    <p>{{ $totalUsers }}</p>
                </div>

                <div class="stat-card today">
                    <h3>Đơn hôm nay</h3>
                    <p>{{ $todayOrders }}</p>
                </div>

            </div>
        </main>

    </div>
</div>
</section>
</body>
</html>
<script src="{{ asset('backend/admin/js/style.js') }}"></script>
<script>
const ctx = document.getElementById('revenueChart').getContext('2d');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($months) !!},
        datasets: [{
            label: 'Doanh thu (VNĐ)',
            data: {!! json_encode($revenues) !!},
            borderWidth: 3,
            borderColor: '#2563eb',
            backgroundColor: 'rgba(37,99,235,0.15)',
            fill: true,
            tension: 0.4,
            pointRadius: 5,
            pointBackgroundColor: '#2563eb'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        },
        scales: {
            y: {
                ticks: {
                    callback: function(value) {
                        return value.toLocaleString() + ' VNĐ';
                    }
                }
            }
        }
    }
});
</script>
