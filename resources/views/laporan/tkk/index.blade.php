@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class='row'>
            <div class='col-md-12 '>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class='panel-title'>Data Pegawai TKK</h2>
                    </div>
                    <div class="panel-body" style="font-size:10px;">
                        @include('laporan.header')
                        <center><h4>Daftar Nominatif Pegawai TKK</h4></center>
                        <table class='table table-hover table-bordered'>
                            <em>Data Pertanggal : {{date('d-m-Y')}}</em>
                            <thead>
                                <tr>
                                    <td rowspan="2" style="text-align:center; width:5%;">No</td>
                                    <td rowspan='2' style="text-align:center;">Nama</td>
                                    <td rowspan='2' style="text-align:center;">Tpt/Tgl Lahir</td>
                                    <td rowspan='2' style="text-align:center;">SP TKK <br />Awal</td>
                                    <td rowspan='2' style="text-align:center;">Tanggal SP TKK <br />Awal</td>
                                    <td rowspan='2' style="text-align:center;">NO SP <br />Awal</td>
                                    <td rowspan='2' style="text-align:center;">Tanggal SP<br />Awal</td>
                                    <td rowspan='2' style="text-align:center;">TMT Awal</td>
                                    <td colspan='3' style="text-align:center;">Pendidikan</td>
                                    <td colspan='2'>Masa Kerja</td>
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
                                @forelse ($data_tkk as $tkk)
                                    <tr>
                                        <td align="center">{{$i+1}}</td>
                                        <td align="center">{{$tkk->nama_lengkap}}</td>
                                        <td align="center">{{$tkk->tempat_lahir.', '.date('d-m-Y', strtotime($tkk->tanggal_lahir))}}</td>
                                        <td align="center">{{$tkk->no_sp_tkk_pertama}}</td>
                                        <td align="center">{{date('d-m-Y', strtotime($tkk->tanggal_sp_tkk))}}</td>
                                        <td align="center">{{$tkk->no_sp_pertama}}</td>
                                        <td align="center">{{date('d-m-Y', strtotime($tkk->tanggal_sp))}}</td>
                                        <td align="center">{{date('d-m-Y', strtotime($tkk->tmt))}}</td>
                                        <td align="center">{{strtoupper($tkk->pendidikan)}}</td>
                                        <td align="center">{{strtoupper($tkk->jurusan)}}</td>
                                        <td align="center">{{$tkk->tahun}}</td>
                                        <?php 
                                            $tmt_lama = strtotime($tkk->tmt);
                                            $tahun = 31536000;
                                            $bulan = 2592000;
                                            
                                            
                                            if($tkk->perpanjangan_tkk != null){
                                                $tmt_baru = strtotime($tkk->perpanjangan_tkk->tmt);
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
                         <div class="pull-right">{{$data_tkk->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection