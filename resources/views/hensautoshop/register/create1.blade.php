@extends('marketresto.layout.template')


@section('main')
<div class="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Search results</a></li>
            <li>Profile</li>
        </ul>
    </div>
</div>
<section class="contact-page inner-page">
    <div class="container">
        <div class="row">
            <!-- REGISTER -->
            <div class="col-md-8">
                <div class="widget">
                    <div class="widget-body">
                        <form action="{{url('register')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pemilik</label>
                                <input class="form-control" type="text"  id="restoran_pemilik_nama"  name="restoran_pemilik_nama" placeholder="Nama Pemilik"> <small id="emailHelp" class="form-text text-muted" placeholder="Nama Pemilik"></small> </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat Email</label>
                                <input type="email" class="form-control" id="restoran_pemilik_email" name="restoran_pemilik_email" aria-describedby="emailHelp" placeholder="Alamat Email"> <small class="form-text text-muted"></small> </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Ponsel</label>
                                <input class="form-control" type="tel" name="restoran_pemilik_phone" id="example-tel-input"> <small class="form-text text-muted"></small> </div>



                                <table width="100%" id="dynamic_field">

                                    <tr>

                                        <td>

                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq1" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Outlet </a></h4> </div>
                                                <div class="panel-collapse collapse" id="faq1" aria-expanded="false" role="article" style="height: 0px;">
                                                    <div class="panel-body">
                                                        {{--New Outlet--}}

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nama Restoran</label>
                                                            <input class="form-control" id="restoran_nama" name="restoran_nama[]" placeholder="contoh : KFC Sudirman, RM Sederhana 1"> <small class="form-text text-muted"></small> </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Ponsel Restoran</label>
                                                            <input class="form-control"  type="tel" id="restoran_phone" name="restoran_phone[]" placeholder="contoh : 628126847543x"> <small class="form-text text-muted"></small> </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Alamat Email Restoran</label>
                                                            <input type="email" class="form-control" id="restoran_email" name="restoran_email[]" aria-describedby="emailHelp" placeholder="Alamat Email Restoran"> <small class="form-text text-muted"></small> </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextarea">Alamat Restoran</label>
                                                            <textarea class="form-control" id="restoran_alamar" name="restoran_alamat[]" rows="3"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextarea">Deskripsi Restoran</label>
                                                            <textarea class="form-control" id="restoran_deskripsi" name="restoran_deskripsi[]" rows="3"></textarea>
                                                        </div>
                                                        {{--<div class="form-group">--}}
                                                        {{--<label for="exampleInputFile">File input</label>--}}
                                                        {{--<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"> <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It"s a bit lighter and easily wraps to a new line.</small> </div>--}}





                                                    </div>
                                                </div>
                                            </div>



                                        </td>



                                    </tr>

                                </table>












                            <button type="button" name="add" id="add" class="btn btn-success">Tambah Outlet</button>
                                <input class="btn theme-btn" type="submit" value="Submit">
                                {{--<button type="submit" class="btn theme-btn">Submit</button>--}}


                        </form>





                    </div>
                </div>
<!-- end: Widget -->
            </div>
            <!-- /REGISTER -->
            <!-- WHY? -->
            <!-- REGISTER -->













            <div class="col-md-4">
                <h4>Registration is fast, easy, and free.</h4>
                <p>Once you"re registered, you can:</p>
                <hr> <img src="http://placehold.it/400x300" alt="" class="img-fluid">
                <p></p>
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#open1" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Can I viverra sit amet quam eget lacinia?</a></h4> </div>
                    <div class="panel-collapse collapse" id="open1" aria-expanded="false" role="article" style="height: 0px;">
                        <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id. </div>
                    </div>
                </div>
                <!-- end:panel -->
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="open2" aria-expanded="true"><i class="ti-info-alt" aria-hidden="true"></i>Can I viverra sit amet quam eget lacinia?</a></h4> </div>
                    <div class="panel-collapse collapse" id="open2" aria-expanded="true" role="article">
                        <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id. </div>
                    </div>
                </div>
                <!-- end:Panel -->
                <h4 class="m-t-20">Contact Customer Support</h4>
                <p> If you"re looking for more help or have a question to ask, please </p>
                <p> <a href="contact.html" class="btn theme-btn m-t-15">contact us</a> </p>
            </div>
            <!-- /WHY? -->
        </div>
    </div>
</section>
@stop


@section('src')


    <script type="text/javascript">



        $(document).ready(function(){

            var postURL = "<?php echo url('addmore'); ?>";

            var i=1;
            var x = 1;


            $('#add').click(function(){

                i++;
                x++;


               // $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td width="10px"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td> ' +

                    '<div class="panel">'+
                        '<div class="panel-heading"> '+


                '      <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq'+i+'" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Outlet </a><button type="button" name="remove" id="'+i+'" class="  btn_remove pull-right">X</button></h4></div> '+
                '               <div class="panel-collapse collapse" id="faq'+i+'" aria-expanded="false" role="article" style="height: 0px;">'+
                '                   <div class="panel-body">'+
                            '                        <div class="form-group">'+
                '               <label for="exampleInputEmail1">Nama Restoran</label>'+
                '                               <input class="form-control" id="restoran_nama" name="restoran_nama[]" placeholder="contoh : KFC Sudirman, RM Sederhana 1"> <small class="form-text text-muted"></small> </div>'+
                '                               <div class="form-group">'+
                '                                   <label for="exampleInputEmail1">Ponsel Restoran</label>'+
                '                               <input class="form-control"  type="tel" id="restoran_phone" name="restoran_phone[]" placeholder="contoh : 628126847543x"> <small class="form-text text-muted"></small> </div>'+
                '                               <div class="form-group">'+
                '                                   <label for="exampleInputEmail1">Alamat Email Restoran</label>'+
                '                               <input type="email" class="form-control" id="restoran_email" name="restoran_email[]" aria-describedby="emailHelp" placeholder="Alamat Email Restoran"> <small class="form-text text-muted"></small> </div>'+
                '                               <div class="form-group">'+
                '                                   <label for="exampleTextarea">Alamat Restoran</label>'+
                '                               <textarea class="form-control" id="restoran_alamar" name="restoran_alamat[]" rows="3"></textarea>'+
                '                                   </div>'+
                '                                   <div class="form-group">'+
                '                                   <label for="exampleTextarea">Deskripsi Restoran</label>'+
                '                               <textarea class="form-control" id="restoran_deskripsi" name="restoran_deskripsi[]" rows="3"></textarea>'+
                '                                   </div>'+
                '     </div>'+
                '                       </div>'+
                                                  '</div>'+



                ' </td>'+

                '</tr>');




            });


            $(document).on('click', '.btn_remove', function(){


                var button_id = $(this).attr("id");
                x--;

                $('#row'+button_id+'').remove();




            });


            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });





        });

    </script>
    @stop
