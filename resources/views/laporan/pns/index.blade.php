@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class='row'>
            <div class='col-md-12'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class='panel-title'>Daftar Nominatif Pegawai PNS</h2>
                    </div>
                    <div class="panel-body">
                        <table class='table table-hover table-bordered' style="font-size:8px;">
                            <thead >
                                <tr>
                                    <th rowspan="2" style="text-align:center; width:5%; vertical-align:middle;">No</th>
                                    <th rowspan="2" style="text-align:center; width:10%; vertical-align:middle;">NIP</th>
                                    <th rowspan="2" style="text-align:center; vertical-align:middle;">Nama</th>
                                    <th rowspan="2" style="text-align:center; vertical-align:middle;">Tpt/Tgl Lahir</th>
                                    <th rowspan="2" style="text-align:center; vertical-align:middle;">No SK Awal</th>
                                    <th rowspan="2" style="text-align:center; vertical-align:middle;">Tanggal SK</th>
                                    <th rowspan="2" style="text-align:center; vertical-align:middle;">TMT Awal</th>
                                    <th colspan="2" style="text-align:center; vertical-align:middle;">Golongan</th>
                                    <th colspan="2" style="text-align:center;">Masa <br/> Jabatan</th>
                                    <th rowspan="2" style="text-align:center; vertical-align:middle;">Status</th>
                                </tr>
                                <tr>
                                    <th style="text-align:center;width:10%">Pangkat</th>
                                    <th style="text-align:center;width:5%">Ruang</th>
                                    <th style="text-align:center;width:5%">Tahun</th>
                                    <th style="text-align:center;width:5%">Bulan</th>
                                </tr>
                            </thead>
                            

                            <tbody  >
                                <?php $i = 0; ?>
                                @forelse ($data_pns as $pns)
                                    <tr class="{{$pns->pensiun != null ? 'danger' : ''}}">
                                        <td align="center">{{$i+1}}</td>
                                        <td align="center">{{$pns->nip}}</td>
                                        <td align="center">{{$pns->nama_lengkap}}</td>
                                        <td align="center">{{$pns->tempat_lahir.', '.date('d-m-Y', strtotime($pns->tanggal_lahir))}}</td>
                                        <td align="center">{{$pns->no_sk}}</td>
                                        <td align="center">{{strtoupper($pns->tanggal_sk)}}</td>
                                        <td align="center">{{strtoupper($pns->tmt)}}</td>
                                        <td align="center">{{$pns->golongan != null ? $pns->golongan->golongan->nama_pangkat : '' }}</td>
                                        <td align="center">{{$pns->golongan != null ? $pns->golongan->golongan->golongan.'/'.$pns->golongan->golongan->ruang : ''}}</td>
                                        
                                        <?php 
                                            $tmt_lama = strtotime($pns->tmt);
                                            $tahun = 31536000;
                                            $bulan = 2592000;
                                            if($pns->golongan != null){
                                                $tmt_baru = strtotime($pns->golongan->tmt);
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
                                        
                                        <td align="center">{{$pns->pensiun != null ? 'Pensiun' : 'Aktif'}}</td>
                                    </tr>
                                    <?php 
                                        
                                        $i++;
                                    
                                    ?>
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
        </div>
    </div>
@endsection