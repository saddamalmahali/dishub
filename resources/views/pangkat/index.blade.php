@extends('layouts.app')
@section('content')
    <div class='container'> 
    <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class='panel-title'>Data Pangkat</h2>
                </div>
                <div class="panel-body">
                    <div class='row'>
                        <div class='col-md-12'>
                            <p><a class='btn btn-primary btn-sm' href='{{url("/pangkat/tambah")}}'><i class='fa fa-plus'></i> &nbsp;Tambah Data</a></p>
                        </div>
                        
                    </div>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-hover table-striped'>
                            <thead>
                                <tr>
                                    <th style='text-align:center;'>No</th>
                                    <th style='text-align:center;'>Nama Pangkat</th>
                                    <th style='text-align:center;'>Golongan</th>
                                    <th style='text-align:center;'>Ruang</th>
                                    <th style='text-align:center;'>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @forelse ($data_pangkat as $pangkat)
                                    <tr>
                                        <td align='center'>{{$i+1}}</td>
                                        <td align='center'>{{$pangkat->nama_pangkat}}</td>
                                        <td align='center'>{{$pangkat->golongan}}</td>
                                        <td align='center'>{{$pangkat->ruang}}</td>
                                        <td align='center'>
                                            <a class='btn btn-primary btn-sm' href='{{url("/pangkat/edit")."/".$pangkat->id}}'><i class='fa fa-pencil'></i></a>
                                            <a class='btn btn-danger btn-sm btn-hapus-pangkat' id='{{$pangkat->id}}'><i class='fa fa-trash'></i></a>
                                        </td>
                                    </tr>
                                     <?php $i++; ?>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                        <div>{{$data_pangkat->links()}}</div>
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
        $('.btn-hapus-pangkat').on('click', function(){
            var id=$(this).attr('id');
            if(confirm('Apakah anda yakin menghapus data?')){
                $.ajax({
                    url:'/pangkat/hapus',
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