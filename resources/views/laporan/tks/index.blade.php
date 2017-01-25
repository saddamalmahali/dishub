@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class='row'>
            <div class='col-md-12'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class='panel-title'>Data Pegawai TKS</h2>
                    </div>
                    <div class="panel-body">
                        
                        @include('laporan.header')
                        <center><h4>Daftar Nominatif Pegawai TKS</h4></center>
                        
                        <table class='table table-hover table-bordered'>
                            <em>Data Per Tanggal {{date('d-m-Y')}}</em>
                            <thead>
                                <tr>
                                    <td rowspan="2" style="text-align:center;">No</td>
                                    <td rowspan='2' style="text-align:center;">Nama</td>
                                    <td rowspan='2' style="text-align:center;">Tpt/Tgl Lahir</td>
                                    <td rowspan='2' style="text-align:center;">No SP</td>
                                    <td rowspan='2' style="text-align:center;">Tanggal SP</td>
                                    <td rowspan='2' style="text-align:center;">TMT</td>
                                    <td colspan='3' style="text-align:center;">Pendidikan</td>
                                    <td colspan='3' style="text-align:center;">Masa Kerja</td>
                                </tr>
                                <tr>
                                    <td  style="text-align:center;">Pendidikan</td>
                                    <td  style="text-align:center;">Jurusan</td>
                                    <td  style="text-align:center;">Tahun</td>
                                    <td  style="text-align:center;">Tahun</td>
                                    <td  style="text-align:center;">Bulan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @forelse ($data_tks as $tks)
                                    <tr>
                                        <td align="center">{{$i+1}}</td>
                                        <td align="center">{{$tks->nama_lengkap}}</td>
                                        <td align="center">{{$tks->tempat_lahir.', '.date('d-m-Y', strtotime($tks->tanggal_lahir))}}</td>
                                        <td align="center">{{$tks->no_sp_pertama}}</td>
                                        <td align="center">{{$tks->tempat_lahir.', '.date('d-m-Y', strtotime($tks->tanggal_sp))}}</td>
                                        <td align="center">{{$tks->tempat_lahir.', '.date('d-m-Y', strtotime($tks->tmt))}}</td>
                                        <td align="center">{{strtoupper($tks->pendidikan)}}</td>
                                        <td align="center">{{strtoupper($tks->jurusan)}}</td>
                                        <td align="center">{{$tks->tahun}}</td>
                                        <?php 
                                            $tmt_lama = strtotime($tks->tmt);
                                            $tahun = 31536000;
                                            $bulan = 2592000;
                                            
                                            
                                            if($tks->perpanjangan_tks != null){
                                                $tmt_baru = strtotime($tks->perpanjangan_tks->tmt);
                                                $selisih = $tmt_baru - $tmt_lama;
                                                
                                                if(($selisih /31536000) > 1){
                                                    $masa_tahun = $selisih /31536000;
                                                    $sisa = $selisih % $tahun;
                                                    $masa_bulan = $sisa / $bulan;
                                        ?>
                                        <td align="center"><?= number_format($masa_tahun) ?></td>
                                        <td align="center"><?= number_format($masa_bulan) ?></td>
                                        <?php
                                                }else if(($selisih / $bulan)>1){
                                                    $masa_bulan = $selisih/$bulan;
                                        ?>
                                        <td align="center"><?= 0 ?></td>
                                        <td align="center"><?= number_format($masa_bulan) ?></td>
                                        <?php
                                                    
                                                }else{
                                        ?>
                                        <td align="center"><?= 0 ?></td>
                                        <td align="center"><?= 0 ?></td>   
                                        <?php
                                                }
                                                
                                            }else{
                                        ?>
                                        <td align="center"><?= 0 ?></td>
                                        <td align="center"><?= 0 ?></td>   
                                        <?php
                                            }
                                        ?>
                                    </tr>
                                    <?php $i++; ?>
                                @empty
                                    
                                @endforelse
                            </tbody>

                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection