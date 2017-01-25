@extends('layouts.app')
@section('content')
<div class='container'> 
    <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class='panel-title'>Data Pegawai</h2>
                </div>
                <div class="panel-body">
                    <div class='row'>
                        <div class='col-md-12'>
                            <p><a class='btn btn-primary btn-sm' href='{{url("tambah_pegawai")}}'><i class='fa fa-plus'></i> &nbsp;Tambah Data</a></p>
                        </div>
                        
                    </div>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-hover table-striped'>
                            <thead>
                                <tr>
                                    <th style="text-align:center;">No</th>
                                    <th style="text-align:center;">Nama</th>
                                    <th style="text-align:center;">Jenis Kelamin</th>
                                    <th style="text-align:center;">Tempat Tanggal Lahir</th>
                                    <th style="text-align:center;">Status</th>
                                    <th style="text-align:center;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @forelse($data_pegawai as $pegawai)
                                <tr>
                                    <td align="center">{{$i+1}}</td>
                                    <td align="center">{{$pegawai->nama_lengkap}}</td>
                                    <td align="center">{{$pegawai->jenis_kelamin}}</td>
                                    <td align="center">{{$pegawai->tempat_lahir.', '.date('d-m-Y',strtotime($pegawai->tanggal_lahir))}}</td>
                                    <td align="center">{{$pegawai->status=='pns'?"PNS" : "NON PNS"}}</td>
                                    <td align="center">
                                        <a class='btn btn-primary btn-xs' href='{{url("/view_pegawai")."/".$pegawai->id}}'><i class='fa fa-search'></i></a>
                                        <a class='btn btn-warning btn-xs' href='{{url("update_pegawai")."/".$pegawai->id}}'><i class='fa fa-pencil'></i></a>
                                        <a class='btn btn-danger btn-xs btn-hapus-pegawai' id='{{$pegawai->id}}'><i class='fa fa-trash'></i></a>
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
                        <div style="text-align:center;">{{$data_pegawai->links()}}</div>
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
        $('.btn-hapus-pegawai').on('click', function(){
            var id=$(this).attr('id');
            if(confirm('Apakah anda yakin menghapus data?')){
                $.ajax({
                    url:'/hapus_pegawai',
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
