@extends('layouts.app')
@section('content')
<div class='container'> 
    <div class='row'>
        <div class='col-md-10 col-md-offset-1'>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class='panel-title'>Data Pangkat & Golongan</h2>
                </div>
                <div class="panel-body">
                    <div class='row'>
                        <div class='col-md-12'>
                            <p><a class='btn btn-primary btn-sm' href='{{url("kepegawaian/pangkat_golongan/tambah")}}'><i class='fa fa-plus'></i> &nbsp;Tambah Data</a></p>
                        </div>
                        
                    </div>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-hover table-striped'>
                            <thead>
                                <tr>
                                    <th style="text-align:center; width:5%;">No</th>
                                    <th style="text-align:center; width:30%;">Nama</th>
                                    <th style="text-align:center;">No SK</th>
                                    <th style="text-align:center; width:10%;">Tanggal SK</th>
                                    <th style="text-align:center;">Golongan</th>
                                    <th style="text-align:center; width:10%;">TMT</th>
                                    <th style="text-align:center;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @forelse ($data_pangkat as $pangkat)
                                    <tr>
                                        <td align="center">{{$i+1}}</td>
                                        <td align="center">{{$pangkat->pegawai->nama_lengkap}}</td>
                                        <td align="center">{{$pangkat->no_sk}}</td>
                                        <td align="center">{{date('d/m/Y', strtotime($pangkat->tanggal_sk))}}</td>
                                        <td align="center">{{$pangkat->golongan->nama_pangkat.' | '.$pangkat->golongan->golongan.'/'.$pangkat->golongan->ruang}}</td>
                                        <td align="center">{{date('d/m/Y', strtotime($pangkat->tmt))}}</td>
                                        <td align="center">
                                            <a class="btn btn-primary btn-xs" href="{{url('/kepegawaian/pangkat_golongan/edit').'/'.$pangkat->id}}"><i class="fa fa-pencil"></i></a> 
                                            <a class="btn btn-danger btn-xs btn-hapus-pangkat-golongan" id="{{$pangkat->id}}"><i class="fa fa-trash"></i></a>
                                        </td>
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
</div>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.btn-hapus-pangkat-golongan').on('click', function(){
            var id=$(this).attr('id');
            if(confirm('Apakah anda yakin menghapus data?')){
                $.ajax({
                    url:'/kepegawaian/pangkat_golongan/hapus',
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
