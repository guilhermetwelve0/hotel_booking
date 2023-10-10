<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
        {{ __('Dashboard') }}<i class="fa-solid fa-gear ps-3"></i>
        </h2>
    </x-slot>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/sample-chart.js') }}"></script>

    <div id="totalFinanceiro" style="display: none;">{{ $totalFinanceiro }}</div>
    <div id="totalPorId" style="display: none;">{{ json_encode($totalPorId) }}</div>

    <div class="container mt-9">
        <div class="row">
            <div class="col-md-6" style="width: 500px; height: 150px;">
                <canvas id="myChart" width="500" height="150"></canvas>
            </div>
            <div class="col-md-6" style="width: 500px; height: 900px;">
                <canvas id="myPieChart" width="300" height="900"></canvas>
            </div>
        </div>
    </div>

</x-app-layout>	</x-app-layout>
