@extends('layouts.admin')

@section('title')
    Admin Panel - Positions
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Positions</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Positions List (Add/Edit/Delet)
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#positions-dialog">Add</button>

                            <button class="btn btn-danger btn-sm" id="delete-positions">Delete</button>

                            <button class="btn btn-success btn-sm pull-right" id="positions-load-data">Refresh</button>

                            @include('admin.positions.add')

                            @include('admin.positions.edit')

                            @include('admin.positions.viwe')

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

            $('#positions-table').DataTable({
                responsive: true
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".modal").on("hidden.bs.modal", function(){
                document.getElementById('positions-form').reset();
            });
        });

        //------------ Load Table ----------------
        $('#positions-load-data').on('click',function (e) {

            $.get("{{ route('positions-load-data') }}", function (data) {
                $('#table-data').empty();
                $.each(data, function (i, value) {

                    var tr = $('<tr/>',{
                        id : value.id
                    });
                    tr.append($('<td/>',{
                        text : value.id
                    })).append($('<td/>',{
                        text : value.name
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

        //------------ Add Positions ------------------
        $("#positions-form").on('submit', function(e){
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
                        $('#positions-error ul').empty();
                        $('#positions-error').css('display','block');
                        $.each(msg.error, function (i, value) {
                            $('#positions-error ul').append("<li>"+value+"</li>") ;
                        })
                        //console.log(msg.error);
                    }
                    else
                    {
                        document.getElementById('positions-form').reset();
                        $('#positions-dialog').modal('toggle');
                        $('#positions-load-data').click();
                    }

                }
            });
        });

        //----------- Update Positions ------------------
        $("#positions-form-edit").on('submit', function(e){
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
                        $('#positions-error-edit ul').empty();
                        $('#positions-error-edit').css('display','block');
                        $.each(msg.error, function (i, value) {
                            $('#positions-error-edit ul').append("<li>"+value+"</li>") ;
                        });
                    }
                    else
                    {
                        document.getElementById('positions-form-edit').reset();
                        $('#positions-dialog-edit').modal('toggle');
                        $('#positions-load-data').click();
                    }

                }
            });
        });



        //------------ Edit Positions Viwe -----------------
        $(document).on('dblclick','#table-data tr',function (e) {
            var hidden_id = $(this).attr('id');

            $.get("{{ route('positions-edit') }}",{id:hidden_id},function (data) {
                $('#positions-dialog-edit').modal();
                $('#positions-form-edit #hidden_id').val(hidden_id);
                $('#positions-form-edit input[name="name"]').val(data.name);

            })
        });

        //------------ Delete Positions ----------------------
        $(document).on('click','#delete-positions',function (e) {
            if ($('input[name="delete"]').is(':checked')) {
                var sList = [];
                $('input[name=delete]:checked').each(function (e,v) {
                    sList.push(v.value);
                });
                console.log(sList)
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::to('admin/positions/delete') }}",
                    data: {id:sList},
                    beforeSend: function(){
                        // $('.submitBtn').attr("disabled","disabled");
                        // $('#fupForm').css("opacity",".5");
                    },
                    success: function(msg){
                        $('#positions-load-data').click();
                    }
                });

            }
        });


    </script>

@stop