@extends('layouts.admin')

@section('title')
    Admin Panel - Team
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Team</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Team List (Add/Edit/Delet)
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#team-dialog">Add</button>

                            <button class="btn btn-danger btn-sm" id="delete-team">Delete</button>

                            <button class="btn btn-success btn-sm pull-right" id="team-load-data">Refresh</button>

                            @include('admin.team.add')

                            @include('admin.team.edit')

                            @include('admin.team.viwe')

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

            $('#team-table').DataTable({
                responsive: true
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".modal").on("hidden.bs.modal", function(){
                document.getElementById('team-form').reset();
            });
        });

        //------------ Load Table ----------------
        $('#team-load-data').on('click',function (e) {

            $.get("{{ route('team-load-data') }}", function (data) {
                $('#table-data').empty();
                $.each(data, function (i, value) {

                    if(value.p_name != null){
                        img_url = '{{ URL::to('images') .'/' }}' + value.p_name;
                    }else{
                        img_url = 'http://placehold.it/400x400';
                    }
                    var img = '<img height="50" src="' + img_url + '" alt="img">';
                    var tr = $('<tr/>',{
                        id : value.id
                    });
                    tr.append($('<td/>',{
                        text : value.id
                    })).append($('<td/>',{
                        html : img
                    })).append($('<td/>',{
                        text : value.name
                    })).append($('<td/>',{
                        text : value.position_name
                    })).append($('<td/>',{
                        text : value.created_at
                    })).append($('<td/>',{
                        text : value.updated_at
                    })).append($('<td/>',{
                        html : '<input type="checkbox" name="delete" value="'+value.id+'">'
                    }));
                    $('#table-data').append(tr);
                })
            });

        });

        //------------ Add Team ------------------
        $("#team-form").on('submit', function(e){
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
                        $('#team-error ul').empty();
                        $('#team-error').css('display','block');
                        $.each(msg.error, function (i, value) {
                            $('#team-error ul').append("<li>"+value+"</li>") ;
                        })
                        //console.log(msg.error);
                    }
                    else
                    {
                        document.getElementById('team-form').reset();
                        $('#team-dialog').modal('toggle');
                        $('#team-load-data').click();
                    }

                }
            });
        });

        //----------- Update Team ------------------
        $("#team-form-edit").on('submit', function(e){
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
                        $('#team-error-edit ul').empty();
                        $('#team-error-edit').css('display','block');
                        $.each(msg.error, function (i, value) {
                            $('#team-error-edit ul').append("<li>"+value+"</li>") ;
                        });
                    }
                    else
                    {
                        document.getElementById('team-form-edit').reset();
                        $('#team-dialog-edit').modal('toggle');
                        $('#team-load-data').click();
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

        //------------ Edit Team Viwe -----------------
        $(document).on('dblclick','#table-data tr',function (e) {
            var hidden_id = $(this).attr('id');

            $.get("{{ route('team-edit') }}",{id:hidden_id},function (data) {
                $('#team-dialog-edit').modal();
                $('#team-form-edit #hidden_id').val(hidden_id);
                $('#team-form-edit select[name="position_id"] option[value="'+data.position_id+'"]').prop('selected', true);
                $('#team-form-edit input[name="name"]').val(data.name);
                if(data.p_name != null)
                {
                    $('#team-form-edit img[name="p_name"]').attr('src','{{ URL::to('images') .'/' }}' + data.p_name);
                }
                else
                {
                    $('#team-form-edit img[name="p_name"]').attr('src','{{ URL::to('images') .'/' }}400x400.png');
                }

            })
        });

        //------------ Delete Team ----------------------
        $(document).on('click','#delete-team',function (e) {
            if ($('input[name="delete"]').is(':checked')) {
                var sList = [];
                $('input[name=delete]:checked').each(function (e,v) {
                    sList.push(v.value);
                });
                console.log(sList)
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::to('admin/team/delete') }}",
                    data: {id:sList},
                    beforeSend: function(){
                        // $('.submitBtn').attr("disabled","disabled");
                        // $('#fupForm').css("opacity",".5");
                    },
                    success: function(msg){
                        $('#team-load-data').click();
                    }
                });

            }
        });


    </script>

@stop