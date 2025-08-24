@extends('Admin.Master.master')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4 text-center" style="color: #ff99b6;">ThriftMe Dashboard</h1>

        {{-- Charts --}}
        <div class="row mt-3 justify-content-center">

            <div class="col-md-6 mb-4">
                <div class="card graph">
                    <div class="card-header" style="background-color: #ff99b6; color: white;"><b>Rental Products</b></div>
                    <div class="card-body">
                        <canvas id="rentalChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card graph">
                    <div class="card-header" style="background-color: #ff99b6; color: white;"><b>Thrift Products</b></div>
                    <div class="card-body">
                        <canvas id="thriftChart"></canvas>
                    </div>
                </div>
            </div>

        </div>

        {{-- Info Panels --}}
        <div class="row mb-4 justify-content-center">

            <div class="col-md-3">
                <div class="info-panel p-4 text-center rounded" style="background-color: #ff99b6;">
                    <div class="info-icon mb-3">
                       <i class="fa-solid fa-boxes-packing fa-3x" style="color: #af99ff;"></i>

                    </div>
                    <div class="info-content">
                        <h5 class="info-title mb-2" style="color: white;">Total Rentals</h5>
                        <h2 class="info-number" style="color: white;">{{ $totalRentals }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-panel p-4 text-center rounded" style="background-color: #ff99b6;">
                    <div class="info-icon mb-3">
                        <i class="fas fa-shopping-bag fa-3x" style="color: #af99ff;"></i>
                    </div>
                    <div class="info-content">
                        <h5 class="info-title mb-2" style="color: white;">Total Thrifts</h5>
                        <h2 class="info-number" style="color: white;">{{ $totalThrifts }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-panel p-4 text-center rounded" style="background-color: #ff99b6;">
                    <div class="info-icon mb-3">
                        <i class="fas fa-shopping-cart fa-3x" style="color: #af99ff;"></i>
                    </div>
                    <div class="info-content">
                        <h5 class="info-title mb-2" style="color: white;">Book Orders</h5>
                        <h2 class="info-number" style="color: white;">{{ $totalBookOrders }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-panel p-4 text-center rounded" style="background-color: #ff99b6;">
                    <div class="info-icon mb-3">
                        <i class="fas fa-tags fa-3x" style="color: #af99ff;"></i>
                    </div>
                    <div class="info-content">
                        <h5 class="info-title mb-2" style="color: white;">Sold Orders</h5>
                        <h2 class="info-number" style="color: white;">{{ $totalSoldOrders }}</h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection

@section('script')

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    const rentalCtx = document.getElementById('rentalChart').getContext('2d');
    new Chart(rentalCtx, {
        type: 'bar',
        data: {
            labels: ['Rentals'],
            datasets: [{
                label: 'Total Rentals',
                data: [{{ $totalRentals }}],
                backgroundColor: '#ff99b6',
                borderColor: '#af99ff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
        }
    });

    const thriftCtx = document.getElementById('thriftChart').getContext('2d');
    new Chart(thriftCtx, {
        type: 'bar',
        data: {
            labels: ['Thrifts'],
            datasets: [{
                label: 'Total Thrifts',
                data: [{{ $totalThrifts }}],
                backgroundColor: '#ff99b6',
                borderColor: '#af99ff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
        }
    });

</script>

@endsection
