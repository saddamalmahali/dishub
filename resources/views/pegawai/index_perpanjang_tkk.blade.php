@extends('layouts.app')
@section('content')
<div class='container'> 
    <div class='row'>
        <div class='col-md-10 col-md-offset-1'>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class='panel-title'>Perpanjang Masa Kerja TKK</h2>
                </div>
                <div class="panel-body">

                    @include('pegawai.header')
                    <center><h4>Data Perpanjang Masa Kerja TKK</h4></center>

                    <div class='row'>
                        <div class='col-md-12'>
                            <p><a class='btn btn-primary btn-sm' href='{{url("/kepegawaian/tambah_perpanjang_tkk")}}'><i class='fa fa-plus'></i> &nbsp;Tambah Data</a></p>
                        </div>                        
                    </div>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-hover table-striped'>
                            <em class="pull-right">Data Pertanggal : {{date('d-m-Y')}}</em>
                            <thead>
                                <tr>
                                    <th style="text-align:center; width:7%;">No</th>
                                    <th style="text-align:center; width:15%;">Nama Pegawai</th>
                                    <th style="text-align:center;">No SK TKK Baru</th>
                                    <th style="text-align:center; ">Tanggal SK TKK Baru</th>
                                    <th style="text-align:center; ">No SK Baru</th>
                                    <th style="text-align:center;">Tanggal SK Baru</th>
                                    <th style="text-align:center; width:15%;">TMT</th>
                                    <th style="text-align:center;  width:10%;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @forelse($data_tkk as $tkk)
                                <tr>
                                    <td align="center">{{$i+1}}</td>
                                    <td align="center">{{$tkk->pegawai->nama_lengkap}}</td>
                                    <td align="center">{{$tkk->no_sp_tkk}}</td>
                                    <td align="center">{{date('d-m-Y', strtotime($tkk->tanggal_sk_tkk))}}</td>
                                    <td align="center">{{$tkk->no_sp}}</td>
                                    <td align="center">{{date('d-m-Y', strtotime($tkk->tanggal_sk))}}</td>
                                    <td align="center">{{date('d-m-Y', strtotime($tkk->tmt))}}</td>
                                    <td align="center">                                        
                                        <a class='btn btn-warning btn-xs' href='{{url("/kepegawaian/update_perpanjang_tkk")."/".$tkk->id}}'><i class='fa fa-pencil'></i></a>
                                        <a class='btn btn-danger btn-xs btn-hapus-tkk' id='{{$tkk->id}}'><i class='fa fa-trash'></i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @empty
                                <tr>
                                    <td colspan='8' align='center'>data kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div style="text-align:center;">{{$data_tkk->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.btn-hapus-tkk').on('click', function(){
            var id=$(this).attr('id');
            if(confirm('Apakah anda yakin menghapus data?')){
                $.ajax({
                    url:'/kepegawaian/hapus_perpanjangan_tkk',
                    type:'post',
                    data:{id:id},
                    dataType:'script',
                    success:function(data){
                        alert('Sukses menghapus data pegawai!');
                        location.reload();
                    }
                });
                
            }
        });
    });
</script>
@endsection
