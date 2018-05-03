@extends('layouts.admin')

@section('title')
    Admin Panel - Services
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Services</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Service List (Add/Edit/Delet)
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#service-dialog">Add</button>

                            <button class="btn btn-danger btn-sm" id="delete-service">Delete</button>

                            <button class="btn btn-success btn-sm pull-right" id="service-load-data">Refresh</button>

                            @include('admin.news.add')

                            @include('admin.news.edit')

                            @include('admin.news.viwe')

                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop

@section('script')

    <!-- DataTables JavaScript -->
    <script src="{{ asset('js/lib/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/lib/dataTables/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#service-table').DataTable({
                responsive: true
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".modal").on("hidden.bs.modal", function(){
                document.getElementById('service-form').reset();
            });
        });

        //------------ Load Table ----------------
        $('#service-load-data').on('click',function (e) {

            $.get("{{ route('news-load-data') }}", function (data) {
                if (data[0].id)
                {
                    $('#table-data').empty();
                    $.each(data, function (i, value) {

                        if (value.p_name != null) {
                            img_url = '{{ URL::to('images') .'/' }}' + value.p_name;
                        } else {
                            img_url = 'http://placehold.it/400x400';
                        }
                        var img = '<img height="50" src="' + img_url + '" alt="img">';
                        var tr = $('<tr/>', {
                            id: value.id
                        });
                        tr.append($('<td/>', {
                            text: value.id
                        })).append($('<td/>', {
                            html: img
                        })).append($('<td/>', {
                            text: value.name
                        })).append($('<td/>', {
                            text: value.created_at
                        })).append($('<td/>', {
                            text: value.updated_at
                        })).append($('<td/>', {
                            html: '<input type="checkbox" name="delete" value="' + value.id + '">'
                        }));
                        $('#table-data').append(tr);
                    })
                }
            });

        });

        //------------ Add Service ------------------
        $("#service-form").on('submit', function(e){
            e.preventDefault();
            var url = $(this).attr('action');
            var post = $(this).attr('method');
            $.ajax({
                type: post,
                url: url,
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    // $('.submitBtn').attr("disabled","disabled");
                    // $('#fupForm').css("opacity",".5");
                },
                success: function(msg){
                    if(msg.error)
                    {
                        $('#service-error ul').empty();
                        $('#service-error').css('display','block');
                        $.each(msg.error, function (i, value) {
                            $('#service-error ul').append("<li>"+value+"</li>") ;
                        })
                        //console.log(msg.error);
                    }
                    else
                    {
                        document.getElementById('service-form').reset();
                        $('#service-dialog').modal('toggle');
                        $('#service-load-data').click();
                    }

                }
            });
        });

        //----------- Update Service ------------------
        $("#service-form-edit").on('submit', function(e){
            e.preventDefault();
            var url = $(this).attr('action');
            var post = $(this).attr('method');
            $.ajax({
                type: post,
                url: url,
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    // $('.submitBtn').attr("disabled","disabled");
                    // $('#fupForm').css("opacity",".5");
                },
                success: function(msg){
                    if(msg.error)
                    {
                        $('#service-error-edit ul').empty();
                        $('#service-error-edit').css('display','block');
                        $.each(msg.error, function (i, value) {
                            $('#service-error-edit ul').append("<li>"+value+"</li>") ;
                        });
                    }
                    else
                    {
                        document.getElementById('service-form-edit').reset();
                        $('#service-dialog-edit').modal('toggle');
                        $('#service-load-data').click();
                    }

                }
            });
        });

        //file type validation
        $('input[name="photo_id"]').change(function() {
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                alert('Please select a valid image file (JPEG/JPG/PNG).');
                $('input[name="photo_id"]').val('');
                return false;
            }
        });

        //------------ Edit Service Viwe -----------------
        $(document).on('dblclick','#service-table #table-data tr',function (e) {
            var hidden_id = $(this).attr('id');

            $.get("{{ route('news-edit') }}",{id:hidden_id},function (data) {
                $('#service-dialog-edit').modal();
                $('#service-form-edit #hidden_id').val(hidden_id);
                $('#service-form-edit input[name="name"]').val(data.name);
                if(data.p_name != null)
                {
                    $('#service-form-edit img[name="p_name"]').attr('src','{{ URL::to('images') .'/' }}' + data.p_name);
                }
                else
                {
                    $('#service-form-edit img[name="p_name"]').attr('src','{{ URL::to('images') .'/' }}400x400.png');
                }

            })
        });

        //------------ Delete Service ----------------------
        $(document).on('click','#delete-service',function (e) {
            if ($('input[name="delete"]').is(':checked')) {
                var sList = [];
                $('input[name=delete]:checked').each(function (e,v) {
                    sList.push(v.value);
                });
                console.log(sList)
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::to('admin/news/delete') }}",
                    data: {id:sList},
                    beforeSend: function(){
                        // $('.submitBtn').attr("disabled","disabled");
                        // $('#fupForm').css("opacity",".5");
                    },
                    success: function(msg){
                        $('#service-load-data').click();
                    }
                });

            }
        });


    </script>

@stop