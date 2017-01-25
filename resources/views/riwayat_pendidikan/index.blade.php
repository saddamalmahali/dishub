@extends('layouts.app')
@section('content')
<div class='container'> 
    <div class='row'>
        <div class='col-md-10 col-md-offset-1'>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class='panel-title'>Riwayat Pendidikan</h2>
                </div>
                <div class="panel-body">
                    <div class='row'>
                        <div class='col-md-12'>
                            <p><a class='btn btn-primary btn-sm' href='{{url("/riwayat_pendidikan/tambah")}}'><i class='fa fa-plus'></i> &nbsp;Tambah Data</a></p>
                        </div>
                        
                    </div>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-hover table-striped'>
                            <thead>
                                <tr>
                                    <th style="text-align:center;">No</th>
                                    <th style="text-align:center;">Nama</th>
                                    <th style="text-align:center;">NIP</th>
                                    <th style="text-align:center;">Angkatan</th>
                                    <th  style="text-align:center;">Jurusan</th>
                                    <th  style="text-align:center;">Tahun</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @forelse ($data_pegawai as $pegawai)
                                    <?php $p = $pegawai; ?>
                                   
                                    
                                    @if($pegawai->data_riwayat_pendidikan != null)
                                        @foreach($pegawai->data_riwayat_pendidikan as $dr)
                                            
                                            <tr>
                                                
                                                <td align='center'>{{$i+1}}</td>
                                                <td align='center'>{{$pegawai->nip}}</td>                                                
                                                <td align='center'>{{$pegawai->nama_lengkap}}</td>                                                 
                                                <td align='center'>{{$dr->tingkat}}</td>
                                                <td align='center'>{{$dr->jurusan}}</td>
                                                <td align='center'>{{$dr->angkatan}}</td>
                                                
                                                <?php
                                                    if($p != $pegawai){
                                                        $p=$pegawai;
                                                    }
                                                ?>
                                            </tr>
                                        <?php $i++; ?>    
                                        @endforeach
                                    @endif
                                    
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
