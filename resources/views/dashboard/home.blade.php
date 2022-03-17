@extends('dashboard.master')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Home</h1>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total Produk Terjual</span>
                        <span class="info-box-number">{{ $penjualan }}
                            <a href="/data_penjualan" class="ml-5">Detail</a>
                        </span>
                    </div>
                  </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-boxes"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Total Produk Masuk</span>
                    <span class="info-box-number">
                      {{ $produk }}

                      <a href="/produk" class="ml-5">Detail</a>
                    </span>
                  </div>
                </div>
             </div>
            
             <div class="col-xl-3 col-md-6">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Total Distributor</span>
                    <span class="info-box-number">
                        {{ $distributor }}

                        <a href="/distributor" class="ml-5">Detail</a>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              
              <div id="container" class="mt-4">

              </div>

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
        text: 'Chart Stok Produk'
    },
    subtitle: {
        text: 'The Clinick Beautylosophi'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Stok'
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
        name: 'Stok',
        data: {!!json_encode($stok)!!}

    }]
});
</script>
@endsection