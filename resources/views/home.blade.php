@extends('layouts.app')

@section('content')
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js'></script>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Jumlah Pegawai TKK</h2>
                </div>
                <div class="panel-body">
                    <h1>{{$data_tkk['jumlah_tkk']}} Orang</h1>
                    <small>Jumlah Pegawai</small>
                    <div class='primary pull-right text-success'>{{number_format($data_tkk['persentase_tkk']),2}}%</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Jumlah Pegawai TKS</h2>
                </div>
                <div class="panel-body">
                    <h1>{{$data_tks['jumlah_tks']}} Orang</h1>
                    <small>Jumlah Pegawai</small>
                    <div class='primary pull-right text-success'>{{number_format($data_tks['persentase_tks'],2)}}%</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Jumlah Pegawai PNS</h2>
                </div>
                <div class="panel-body">
                    <h1>{{$data_pns['jumlah_pns']}} Orang</h1>
                    <small>Jumlah Pegawai</small>
                    <div class='primary pull-right text-success'>{{number_format($data_pns['persentase_pns'],2)}}%</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Jumlah Pegawai Pensiun</h2>
                </div>
                <div class="panel-body">
                    <h1>{{$data_ps['jumlah_ps']}} Orang</h1>
                    <small>Jumlah Pegawai</small>
                    <div class='primary pull-right text-success'>{{number_format($data_ps['persentase_ps'],2)}}%</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <canvas id="myChart" width="400" height="150"></canvas>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-hover">
                                <tbody>
                                    <tr class='warning'>
                                        <th colspan='2'>Data Pegawai Pensiun</th>
                                    </tr>
                                    <?php $i=0; ?>
                                    @forelse ($data_pensiun as $pensiun)
                                        <tr>
                                            <td><span class="label label-primary">{{$i+1}}</span></td>
                                            <td>{{$pensiun->nama_lengkap}}</td>
                                        </tr>    
                                        <?php $i++; ?>
                                    @empty
                                        <tr>
                                            <td colspan="2" align='center'>Tidak Ada Data</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["PNS", "TKK", "TKS", "Pensiun"],
            datasets: [{
                label: '# Jumlah Pegawai',
                data: [
                    @foreach($data_chart as $chart)
                        "{{$chart}}",
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
@endsection
