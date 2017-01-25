@extends('layouts.app')
@section('content')
<div class='container'> 
    <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class='panel-title'>Perpanjang Masa Kerja TKS</h2>
                </div>
                <div class="panel-body">

                    @include('pegawai.header')
                    <center><h4>Data Perpanjang Masa Kerja TKS</h4></center>

                    <div class='row'>
                        <div class='col-md-12'>
                            <p><a class='btn btn-primary btn-sm' href='{{url("/kepegawaian/tambah_perpanjang_tks")}}'><i class='fa fa-plus'></i> &nbsp;Tambah Data</a></p>
                        </div>                        
                    </div>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-hover table-striped'>
                            <em class="pull-right">Data Pertanggal : {{date('d-m-Y')}}</em>
                            <thead>
                                <tr>
                                    <th style="text-align:center; width:10%;">No</th>
                                    <th style="text-align:center; width:20%;">Nama Pegawai</th>
                                    <th style="text-align:center; width:15%;">No SP Baru</th>
                                    <th style="text-align:center;">Tanggal SP Baru</th>
                                    <th style="text-align:center; width:15%;">TMT</th>
                                    <th style="text-align:center;  width:10%;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @forelse($data_tks as $tks)
                                <tr>
                                    <td align="center">{{$i+1}}</td>
                                    <td align="center">{{$tks->pegawai->nama_lengkap}}</td>
                                    <td align="center">{{$tks->no_sp}}</td>
                                    <td align="center">{{date('d-m-Y', strtotime($tks->tanggal_sp))}}</td>
                                    <td align="center">{{date('d-m-Y', strtotime($tks->tmt))}}</td>
                                    <td align="center">                                        
                                        <a class='btn btn-warning btn-xs' href='{{url("/kepegawaian/update_perpanjang_tks")."/".$tks->id}}'><i class='fa fa-pencil'></i></a>
                                        <a class='btn btn-danger btn-xs btn-hapus-tks' id='{{$tks->id}}'><i class='fa fa-trash'></i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @empty
                                <tr>
                                    <td colspan='6' align='center'>data kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div style="text-align:center;">{{$data_tks->links()}}</div>
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
        $('.btn-hapus-tks').on('click', function(){
            var id=$(this).attr('id');
            if(confirm('Apakah anda yakin menghapus data?')){
                $.ajax({
                    url:'/kepegawaian/hapus_perpanjangan',
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
