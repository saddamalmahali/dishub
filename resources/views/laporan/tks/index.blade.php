@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class='row'>
            <div class='col-md-8 col-md-offset-2'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class='panel-title'>Data Pegawai TKS</h2>
                    </div>
                    <div class="panel-body">
                        <table class='table table-hover table-bordered'>
                            <thead>
                                <tr>
                                    <td rowspan="2" style="text-align:center;">No</td>
                                    <td rowspan='2' style="text-align:center;">Nama</td>
                                    <td rowspan='2' style="text-align:center;">Tpt/Tgl Lahir</td>
                                    <td colspan='3' style="text-align:center;">Pendidikan</td>

                                </tr>
                                <tr>
                                    <td  style="text-align:center;">Pendidikan</td>
                                    <td  style="text-align:center;">Jurusan</td>
                                    <td  style="text-align:center;">Tahun</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @forelse ($data_tks as $tks)
                                    <tr>
                                        <td align="center">{{$i+1}}</td>
                                        <td align="center">{{$tks->nama_lengkap}}</td>
                                        <td align="center">{{$tks->tempat_lahir.', '.date('d-m-Y', strtotime($tks->tanggal_lahir))}}</td>
                                        <td align="center">{{strtoupper($tks->pendidikan)}}</td>
                                        <td align="center">{{strtoupper($tks->jurusan)}}</td>
                                        <td align="center">{{$tks->tahun}}</td>
                                    
                                    </tr>
                                    <?php $i++; ?>
                                @empty
                                    
                                @endforelse
                            </tbody>

                        </table>
                        <div class='panel-footer'>
                            <div class='row'>
                                <div class="pull-right" style="margin-right:20px">
                                <a class='btn btn-success btn-sm'>PRINT</a>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection