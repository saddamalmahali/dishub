@extends('layouts.app')
@section('content')
<div class='container'>
    <div class='col-md-8 col-md-offset-2'>
        <div class='panel panel-info'>
            <div class='panel-heading'>
                <h2 class='panel-title'>Form Tambah Pegawai</h2>
            </div>
            <div class='panel-body'>
                <form class='form-horizontal' action='{{url("riwayat_pendidikan/save")}}' method='post'>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="pegawai" class="col-sm-2 control-label">Pegawai</label>
                        <div class="col-sm-10">
                        <select class='form-control' id='pegawai' name="pegawai">
                            <option value='' selected disabled>Pilih Pegawai</option>
                            @forelse ($pegawai as $p)
                                <option value="{{$p->id}}">{{$p->nip.' | '.$p->nama_lengkap}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                        </div>
                    </div>

                    <div class="table-responsive" >
                        <div class="pull-right" style="padding:20px;"><a class="btn btn-primary btn-sm btn-tambah-riwayat"><i class="fa fa-plus"></i>&nbsp;Tambah Riwayat</a></div>
                        <table class='table table_riwayat'>
                            <thead>
                                <tr class='bg-success'>
                                    <th style="text-align:center;">Pendidikan</th>
                                    <th style="text-align:center;">Jurusan</th>
                                    <th style="text-align:center; width:15%;">Tahun</th>
                                    <th style="text-align:center; width:10%;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id='row_detile_riwayat_0'>
                                    <td><input type="text" class="form-control" name='input_riwayat_pendidikan[0][tingkat]' placeholder="Pendidikan"></td>
                                    <td><input type="text" class="form-control" name='input_riwayat_pendidikan[0][jurusan]' placeholder="Jurusan"></td>
                                    <td><input type="number" class="form-control" name='input_riwayat_pendidikan[0][angkatan]' placeholder="Tahun"></td>
                                    <td style="vertical-align:middle; text-align:center;"><a class="primary btn_hapus_riwayat" id='0'><i class="fa fa-minus"></i></a></td>                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="pull-right" style="margin-right:20px">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </div>
                </form>
            </div>

            
        </div>
    </div>
</div>
<script>
    $('#pegawai').select2();
    var tabel_riwayat = $('.table_riwayat');
    var i = 1;
    var count = 1;
    $(document).on('click','.btn-tambah-riwayat', function(e){
        e.preventDefault();
        tabel_riwayat.append(
            "<tr id='row_detile_riwayat_"+i+"'>"+
                "<td><input type='text' class='form-control' name='input_riwayat_pendidikan["+i+"][tingkat]' placeholder='Pendidikan'></td>"+
                "<td><input type='text' class='form-control' name='input_riwayat_pendidikan["+i+"][jurusan]' placeholder='Jurusan'></td>"+
                "<td><input type='number' class='form-control' name='input_riwayat_pendidikan["+i+"][angkatan]' placeholder='Tahun'></td>"+
                "<td style='vertical-align:middle; text-align:center;'><a class='primary btn_hapus_riwayat' id='"+i+"'><i class='fa fa-minus'></i></a></td>"+
            "</tr>"
        );
        i++;
        count++;
    });

    $(document).on('click', '.btn_hapus_riwayat', function(e){
        var id_row = $(this).attr('id');
        if(count < 2){
            console.log('Data Row Telah Minimal');
        }else{
            $('#row_detile_riwayat_'+id_row).remove();
            count--;
        }
    });
</script>
@endsection