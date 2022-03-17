@extends('dashboard.master')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Home</h1>
            <div class="row">
                <div id="container" class="mt-5"></div>
            </div>
    </div>
</main>
@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: ' Chart Produk Terlaris'
    },
    subtitle: {
        text: 'The Clinick Beautylosophi'
    },
    xAxis: {
        categories: {!! json_encode($nama) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Terjual'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Terjual',
        data: {!! json_encode($jual) !!}

    }]
});
</script>

@endsection