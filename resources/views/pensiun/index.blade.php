@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class='row'>
            <div class='col-md-10 col-md-offset-1'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class='panel-title'>Data Pegawai Pensiun</h2>
                    </div>
                    <div class="panel-body">
                        
                        <div class='table-responsive'>
                            <div class="pull-right" style="padding:20px;">
                                <a href="{{url('/pensiun/tambah')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                            </div>
                            <table class='table table-hover table-bordered'>
                                <thead>
                                    <tr>
                                        <th style="text-align:center; width:5%;">No</th>
                                        <th style="text-align:center; width:10%;">No SKPN</th>
                                        <th style="text-align:center; width:10%;">NIP</th>
                                        <th style="text-align:center; width:15%;">Nama</th>
                                        <th style="text-align:center; width:13%">No SK Awal</th>
                                        <th style="text-align:center;">Tanggal SK Awal</th>
                                        <th style="text-align:center;">TMT Awal</th>
                                        <th style="text-align:center;">TMT Pensiun</th>
                                        <th style="text-align:center; width:10%;">Opsi</th>
                                    </tr>                                
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @forelse ($data_pensiun as $pensiun)
                                        <tr>
                                            <td align="center">{{$i+1}}</td>
                                            <td align="center">{{$pensiun->no_skpn }}</td>
                                            <td align="center">{{$pensiun->pegawai->nip}}</td>
                                            <td align="center">{{$pensiun->pegawai->nama_lengkap}}</td>
                                            <td align="center">{{$pensiun->pegawai->no_sk}}</td>
                                            <td align="center">{{date('d-m-Y', strtotime($pensiun->pegawai->tanggal_sk))}}</td>
                                            <td align="center">{{date('d-m-Y', strtotime($pensiun->pegawai->tmt))}}</td>
                                            <td align="center">{{date('d-m-Y', strtotime($pensiun->tmtp))}}</td>
                                            <td align="center" style="vertical-align:middle;">
                                                <a class="btn btn-primary btn-xs" href="{{url('/pensiun/edit').'/'.$pensiun->id}}"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger btn-xs btn-hapus-pensiun" id="{{$pensiun->id}}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @empty
                                        <tr>
                                            <td colspan="9" align="center">Tidak Ada Data</td>
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
    <script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.btn-hapus-pensiun', function(e){
            var id = $(this).attr('id');
            if(confirm('Apakah anda yakin menghapus data?')){
                $.ajax({
                    url:'/pensiun/hapus',
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