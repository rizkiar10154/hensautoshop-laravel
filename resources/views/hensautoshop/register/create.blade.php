@extends('hensautoshop.layout.template')


@section('main')
<div class="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Brand Partner</a></li>
            <li>Registrasi</li>
        </ul>
    </div>
</div>




<section class="contact-page inner-page">
    <div class="container">
        <div class="row">
            <!-- REGISTER -->
            <div class="col-md-8">

                @include('hensautoshop.layout.flash_mesage')
                @include('hensautoshop.layout.Error')

                <div class="widget">
                    <div class="widget-body">

                        {!!Form::open(['url'=>'register','files'=>true]) !!}

                        <div class="form-group">
                            {!! Form::label('brand_pemilik_nama','Nama Pemilik',['class'=>'control-label']) !!}
                            {!! Form::text('brand_pemilik_nama',null,['class' =>'form-control','placeholder' =>'Nama lengkap pemilik']) !!}
                            <small class="form-text text-muted"></small> </div>
                        <div class="form-group">
                            {!! Form::label('brand_pemilik_email','Email Pemilik',['class'=>'control-label']) !!}
                            {!! Form::email('brand_pemilik_email',null,['class' =>'form-control','placeholder' =>'Alamat email aktif']) !!}
                            <small class="form-text text-muted"></small> </div>
                        <div class="form-group">
                            {!! Form::label('brand_pemilik_phone','Nomor Ponsel',['class'=>'control-label']) !!}
                            {!! Form::text('brand_pemilik_phone',null,['class' =>'form-control','placeholder' =>'contoh : 628126847543x']) !!}
                            <small class="form-text text-muted"></small> </div>


                        {{--<table width="100%" id="dynamic_field">--}}
                        {{--<tr>--}}
                        {{--<td>--}}
                        {{--<div class="panel" >--}}
                        {{--<div class="panel-heading">--}}
                        {{--<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq1" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Outlet </a></h4> </div>--}}
                        {{--<div class="panel-collapse collapse" id="faq1" aria-expanded="false" role="article" style="height: 0px;">--}}
                        {{--<div class="panel-body">--}}
                        {{--New Outlet--}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Brand</label>
                            {!! Form::text('brand_nama',null,['class' =>'form-control','placeholder' =>'contoh : Henautoshop']) !!}
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Ponsel Brand</label>
                            {!! Form::text('brand_phone',null,['class' =>'form-control','placeholder' =>'contoh : 628128563753x']) !!}
                            <small class="form-text text-muted text-danger">Pastikan nomor ini aktif ! Nomor ini digunakan untuk mengakses Aplikasi Brand Partner</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Email Brand</label>
                            {!! Form::email('brand_email',null,['class' =>'form-control','placeholder' =>'Alamat email brand aktif']) !!}
                            <small class="form-text text-muted"></small> </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Alamat Brand</label>
                            {!! Form::textarea('brand_alamat',null,['class' =>'form-control','placeholder' =>'Alamat Lengkap Brand', 'rows'=>'3']) !!}

                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Deskripsi Brand</label>
                            {!! Form::textarea('brand_deskripsi',null,['class' =>'form-control','placeholder' =>'Deskripsi Mengenai Brand', 'rows'=>'3']) !!}

                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Metode Tarif Pengantaran</label>
                            {!! Form::select('brand_delivery', ['gratis' => 'Gratis', 'flat' => 'Flat'],null,['class' =>'form-control','placeholder' => 'Pilih Metode','onchange'=>'yesnoCheck(this);']) !!}
                        </div>

                        <div class="form-group" id="ifYes" style="display: none;">
                            <label for="exampleInputEmail1">Biaya Antar</label>


                            {!! Form::text('brand_delivery_tarif',0,['class' =>'form-control','placeholder' =>'contoh :5000']) !!}
                            <small class="form-text text-muted"></small> </div>

                        <div class="form-group ">
                            <label for="exampleInputEmail1">Jarak Maksimum Pengantaran</label>
                            {!! Form::select('brand_delivery_jarak',['3'=>'3 Km','5'=>'5 Km','8'=>'8 Km','10'=>'10 Km','15'=>'15 Km','17'=>'17 Km','20'=>'20 Km','25'=>'25 Km','27'=>'27 Km','30'=>'30 Km','35'=>'35 Km'],'3',['class' =>'form-control']) !!}
                            <small class="form-text text-muted">Persentase Pajak</small> </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Minimum Pembelian</label>

                            {!! Form::number('brand_delivery_minimum',null,['class' =>'form-control','placeholder' =>'contoh : 20000'],2, ',', '.') !!}
                            <small class="form-text text-muted"></small> </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori Accesories</label><br>
                            {!! Form::select('brand_kategori[]', $kategori,null,['class' =>'select2 select2-multiple form-control', 'style'=>'width:100%','multiple'=>'multiple','data-placeholder' => 'Cari dan Pilih Accesories']) !!}
                        </div>

                        <div class="form-group ">
                            <label for="exampleInputEmail1">Pajak Bangunan 1 (PB1)</label>
                            {!! Form::select('brand_pajak_pb_satu',['0'=>'Tidak Di Pungut Pajak','1'=>'1 %','2'=>'2 %','3'=>'3 %','4'=>'4 %','5'=>'5 %','6'=>'6 %','7'=>'7 %','8'=>'8 %','9'=>'9 %','10'=>'10 %',],'0',['class' =>'form-control']) !!}
                            <small class="form-text text-muted"></small> </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Foto Logo/Brand</label>
                            {!! Form::file('brand_foto',['class' =>'form-control-file']) !!}
                            {{--<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"> <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It"s a bit lighter and easily wraps to a new line.</small> </div>--}}
                        </div>

                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--</td>--}}
                        {{--</tr>--}}
                        {{--</table>--}}

                        {{--<button type="button" name="add" id="add" class="btn btn-success">Tambah Outlet</button>--}}
                        <input class="btn theme-btn" type="submit" value="Submit">
                        {{--<button type="submit" class="btn theme-btn">Submit</button>--}}


                        </form>
                        {!! Form::close() !!}





                    </div>
                </div>
                <!-- end: Widget -->
            </div>
            <!-- /REGISTER -->
            <!-- WHY? -->
            <!-- REGISTER -->





            <div class="col-md-4">
                <h4>Pendaftaran cepat, mudah, dan gratis.</h4>
                <p>Setelah Anda terdaftar, Anda dapat:</p>
                {{--<hr> <img src="http://placehold.it/400x300" alt="" class="img-fluid">--}}
                <ul class="list-check list-unstyled">
                    <li>Menjual brand usaha anda.</li>
                    <li>Notifikasi saat pemesanan.</li>
                    <li>Dapatkan favorit dari konsumen.</li>
                    <li>Lihat informasi Anda dari perangkat mobile mana pun di dunia.</li>
                    <li>Manajemen brand usaha anda.</li>
                </ul>
                <p></p>
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#open1" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Bagaimana Proeses Registrasi?</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="open1" aria-expanded="false" role="article" style="height: 0px;">
                        <div class="panel-body"> Isi seluruh data usaha yang diperlukan pada form disamping, jika berhasil usaha anda akan kami review dalam waktu 5 hari jam kerja. Menyetujui syarat dan ketentuan yang berlaku </div>
                    </div>
                </div>
                <!-- end:panel -->

                <h4 class="m-t-20">Hubungi Dukungan Pelanggan</h4>
                <p> Jika Anda mencari bantuan lebih lanjut atau ingin bertanya, silakan </p>
                <p> <a href="contact.html" class="btn theme-btn m-t-15">Hubungi kami</a> </p>
            </div>
            <!-- /WHY? -->
        </div>
    </div>
</section>
@stop



@section('src')
<script type="text/javascript">
    $(document).ready(function() {

        var postURL = "<?php echo url('addmore'); ?>";

        var i = 1;
        var x = 1;


        $('#add').click(function() {

            i++;
            x++;

            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td> ' +

                '<div class="panel" >' +
                '<div class="panel-heading">' +
                '<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq' + i + '" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Outlet </a></h4> </div>' +
                '<div class="panel-collapse collapse" id="faq' + i + '" aria-expanded="false" role="article" style="height: 0px;">' +
                '<div class="panel-body">' +
                '<div class="form-group">' +
                '<label for="exampleInputEmail1">Nama Brand</label>' +
                '{!! Form::text('
                brand_nama[]
                ',null,['
                class ' =>'
                form - control ','
                placeholder ' =>'
                contoh: RM Mak Icun, KFC Sudirman ']) !!}' +
                '<small class="form-text text-muted"></small>' +
                '</div>' +
                '<div class="form-group">' +
                '   <label for="exampleInputEmail1">Nomor Ponsel Brand</label>' +
                '{!! Form::text('
                brand_phone[]
                ',null,['
                class ' =>'
                form - control ','
                placeholder ' =>'
                contoh: 628126847543 x ']) !!}' +
                '<small class="form-text text-muted text-danger">Pastikan nomor ini aktif ! Nomor ini digunakan untuk mengakses Aplikasi BrandPartner</small>' +
                '</div>' +
                '<div class="form-group">' +
                '   <label for="exampleInputEmail1">Alamat Email Brand</label>' +
                '{!! Form::email('
                brand_email[]
                ',null,['
                class ' =>'
                form - control ','
                placeholder ' =>'
                Alamat email brand aktif ']) !!}' +
                '<small class="form-text text-muted"></small> </div>' +
                '<div class="form-group">' +
                '   <label for="exampleTextarea">Alamat Brand</label>' +
                '{!! Form::textarea('
                brand_alamat[]
                ',null,['
                class ' =>'
                form - control ','
                placeholder ' =>'
                Alamat Lengkap Brand ', '
                rows '=>'
                3 ']) !!}' +

                '</div>' +
                '<div class="form-group">' +
                '   <label for="exampleTextarea">Deskripsi Brand</label>' +
                '{!! Form::textarea('
                brand_deskripsi[]
                ',null,['
                class ' =>'
                form - control ','
                placeholder ' =>'
                Deskripsi Mengenai Brand ', '
                rows '=>'
                3 ']) !!}' +

                '</div>' +

                ' <div class="form-group">' +
                '    <label for="exampleSelect1">Metode Tarif Pengantaran</label>' +
                '{!! Form::select('
                brand_delivery[]
                ', ['
                gratis ' => '
                Gratis ', '
                flat ' => '
                Flat '],null,['
                class ' =>'
                form - control ','
                placeholder ' => '
                Pilih Metode ','
                onchange '=>'
                yesnoCheck(this);
                ']) !!}' +
                '</div>' +

                '<div class="form-group" id="ifYes" style="display: none;">' +
                '   <label for="exampleInputEmail1">Biaya Antar</label>' +
                '{!! Form::text('
                brand_delivery_tarif[]
                ',0,['
                class ' =>'
                form - control ','
                placeholder ' =>'
                contoh: 5000 ']) !!}' +
                '<small class="form-text text-muted"></small> </div>' +

                '<div class="form-group ">' +
                ' <label for="exampleInputEmail1">Jarak Maksimum Pengantaran</label>' +
                '{!! Form::text('
                brand_delivery_jarak[]
                ',null,['
                class ' =>'
                form - control ','
                placeholder ' =>'
                contoh: 2 ']) !!}' +
                '<small class="form-text text-muted">KM</small> </div>' +
                '<div class="form-group">' +
                '<label for="exampleInputEmail1">Minimum Pembelian</label>' +
                '{!! Form::text('
                brand_delivery_minimum[]
                ',null,['
                class ' =>'
                form - control ','
                placeholder ' =>'
                contoh: 20000 ']) !!}' +
                ' <small class="form-text text-muted"></small> </div>' +
                ' <div class="form-group">' +
                '  <label for="exampleInputEmail1">Kategori Accesories</label><br>' +
                '{!! Form::select('
                brand_kategori[][]
                ', $kategori,null,['
                class ' =>'
                select2 select2 - multiple form - control ', '
                style '=>'
                width: 100 % ','
                multiple '=>'
                multiple ','
                data - placeholder ' => '
                Cari dan Pilih Accesories ']) !!}' +
                '</div>' +

                '<div class="form-group">' +
                ' <label for="exampleInputFile">Foto Logo/Brand</label>' +
                '{!! Form::file('
                brand_foto[]
                ',['
                class ' =>'
                form - control - file ']) !!}' +

                '</div>' +

                '</div>' +
                '</div>' +
                '</div>' +

                ' </td>' +

                '</tr>');

        });


        $(document).on('click', '.btn_remove', function() {


            var button_id = $(this).attr("id");
            x--;

            $('#row' + button_id + '').remove();
        });

    });
</script>


<script>
    function yesnoCheck(that) {
        if (that.value == "flat") {
            // alert("check");
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
</script>

@stop