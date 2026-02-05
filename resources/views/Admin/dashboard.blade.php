@extends('admin.master')

@section('main')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .content-wrapper { background-color: #0f172a !important; }
    
    .small-box {
        border-radius: 15px !important;
        border: none !important;
        transition: all 0.3s ease-in-out;
    }
    .small-box:hover { transform: translateY(-8px); box-shadow: 0 10px 20px rgba(0,0,0,0.4); }

    .premium-card {
        background: #1e293b !important;
        border-radius: 20px;
        padding: 25px;
        border: 1px solid rgba(255,255,255,0.1);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .btn-quick {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white !important;
        border-radius: 10px;
        padding: 10px 18px;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }
    .btn-quick:hover { background: #3b82f6; transform: translateY(-3px); }
</style>

<div class="app-content-header pt-4">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="text-white fw-bold m-0">ServiceFlow Dashboard</h2>
                <p id="live-time" class="text-info fw-bold small mt-1"></p>
            </div>
            <div class="col-md-6 text-md-end mt-2">
                <a href="{{ route('courier.create') }}" class="btn-quick me-2"><i class="bi bi-plus-circle"></i> New Booking</a>
                <a href="{{ route('report.download') }}" class="btn-quick"><i class="bi bi-file-earmark-pdf"></i> Reports</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content mt-3">
    <div class="container-fluid">
        
        <div class="row g-3">
            <div class="col-lg-2 col-6">
                <div class="small-box bg-info shadow"><div class="inner text-white"><h3>{{ $totalUsers }}</h3><p>Customers</p></div><div class="icon"><i class="bi bi-people-fill"></i></div></div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="small-box bg-primary shadow"><div class="inner text-white"><h3>{{ $totalCouriers }}</h3><p>Bookings</p></div><div class="icon"><i class="bi bi-box-seam"></i></div></div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning shadow"><div class="inner text-dark"><h3>{{ $pendingCouriers }}</h3><p>Pending Delivery</p></div><div class="icon"><i class="bi bi-truck"></i></div></div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success shadow"><div class="inner text-white"><h3>{{ $deliveredCouriers }}</h3><p>Delivered</p></div><div class="icon"><i class="bi bi-check-circle-fill"></i></div></div>
            </div>
            <div class="col-lg-2 col-12">
                <div class="small-box bg-danger shadow"><div class="inner text-white"><h3>{{ $totalAgents }}</h3><p>Agents</p></div><div class="icon"><i class="bi bi-person-badge"></i></div></div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="premium-card">
                    <h5 class="text-white mb-4 fw-bold"><i class="bi bi-bar-chart-fill text-warning me-2"></i> Business Performance Check</h5>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="d-flex justify-content-between text-white mb-2 small">
                                <span><i class="bi bi-check2-circle text-success me-1"></i> **Delivery Success Rate:** Percentage of completed tasks</span>
                                <span class="badge bg-success">{{ $totalCouriers > 0 ? round(($deliveredCouriers / $totalCouriers) * 100) : 0 }}%</span>
                            </div>
                            <div class="progress" style="height: 12px; background: rgba(255,255,255,0.1); border-radius: 10px;">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" 
                                     style="width: {{ $totalCouriers > 0 ? ($deliveredCouriers / $totalCouriers) * 100 : 0 }}%;"></div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex justify-content-between text-white mb-2 small">
                                <span><i class="bi bi-clock-history text-warning me-1"></i> **Active Workload:** Percentage of shipments in progress</span>
                                <span class="badge bg-warning text-dark">{{ $totalCouriers > 0 ? round(($pendingCouriers / $totalCouriers) * 100) : 0 }}%</span>
                            </div>
                            <div class="progress" style="height: 12px; background: rgba(255,255,255,0.1); border-radius: 10px;">
                                <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" 
                                     style="width: {{ $totalCouriers > 0 ? ($pendingCouriers / $totalCouriers) * 100 : 0 }}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 g-4">
            <div class="col-lg-8">
                <div class="premium-card" style="height: 350px;">
                    <h5 class="text-white mb-4">Activity Trend</h5>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="premium-card" style="height: 350px;">
                    <h5 class="text-white mb-4">Success Ratio</h5>
                    <canvas id="donutChart"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
// Live Clock
function updateClock() {
    const now = new Date();
    document.getElementById('live-time').innerHTML = '<i class="bi bi-calendar3 me-2"></i>' + now.toLocaleString();
}
setInterval(updateClock, 1000);
updateClock();

// Graphs Logic
document.addEventListener("DOMContentLoaded", function() {
    const ctxLine = document.getElementById('lineChart').getContext('2d');
    new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Today'],
            datasets: [{
                label: 'Bookings',
                data: [5, 12, 8, {{ $totalCouriers }}],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: { maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { ticks: { color: "#94a3b8" } }, x: { ticks: { color: "#94a3b8" } } } }
    });

    const ctxDonut = document.getElementById('donutChart').getContext('2d');
    new Chart(ctxDonut, {
        type: 'doughnut',
        data: {
            labels: ['Delivered', 'Pending'],
            datasets: [{
                data: [{{ $deliveredCouriers }}, {{ $pendingCouriers }}],
                backgroundColor: ['#198754', '#ffc107'],
                borderWidth: 0
            }]
        },
        options: { maintainAspectRatio: false, cutout: '70%', plugins: { legend: { position: 'bottom', labels: { color: '#fff' } } } }
    });
});
</script>
@endsection