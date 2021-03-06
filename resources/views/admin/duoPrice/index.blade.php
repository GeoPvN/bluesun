@extends('layouts.admin')

@section('title')
    Admin Panel - Duo Price
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Duo Price</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Duo Price List (Add/Edit/Delet)
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#duoprice-dialog">Add</button>

                            <button class="btn btn-danger btn-sm" id="delete-duoprice">Delete</button>

                            <button class="btn btn-success btn-sm pull-right" id="duoprice-load-data">Refresh</button>

                            @include('admin.duoPrice.add')

                            @include('admin.duoPrice.edit')

                            @include('admin.duoPrice.viwe')

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

            $('#duoprice-table').DataTable({
                responsive: true
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".modal").on("hidden.bs.modal", function(){
                document.getElementById('duoprice-form').reset();
            });
        });

        //------------ Load Table ----------------
        $('#duoprice-load-data').on('click',function (e) {

            $.get("{{ route('duo_price-load-data') }}", function (data) {
                $('#table-data').empty();
                $.each(data, function (i, value) {

                    var tr = $('<tr/>', {
                        id: value.id
                    });
                    tr.append($('<td/>', {
                        text: value.id
                    })).append($('<td/>', {
                        text: value.now_leagues.name
                    })).append($('<td/>', {
                        text: value.now_divisions.name
                    })).append($('<td/>', {
                        text: value.next_leagues.name
                    })).append($('<td/>', {
                        text: value.next_divisions.name
                    })).append($('<td/>', {
                        text: value.price
                    })).append($('<td/>', {
                        text: value.created_at
                    })).append($('<td/>', {
                        text: value.updated_at
                    })).append($('<td/>', {
                        html: '<input type="checkbox" name="delete" value="' + value.id + '">'
                    }));
                    $('#table-data').append(tr);
                });
            });

        });

        //------------ Add Duo Price ------------------
        $("#duoprice-form").on('submit', function(e){
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
                        $('#duoprice-error ul').empty();
                        $('#duoprice-error').css('display','block');
                        $.each(msg.error, function (i, value) {
                            $('#duoprice-error ul').append("<li>"+value+"</li>") ;
                        })
                        //console.log(msg.error);
                    }
                    else
                    {
                        document.getElementById('duoprice-form').reset();
                        $('#duoprice-dialog').modal('toggle');
                        $('#duoprice-load-data').click();
                    }

                }
            });
        });

        //----------- Update Duo Price ------------------
        $("#duoprice-form-edit").on('submit', function(e){
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
                        $('#duoprice-error-edit ul').empty();
                        $('#duoprice-error-edit').css('display','block');
                        $.each(msg.error, function (i, value) {
                            $('#duoprice-error-edit ul').append("<li>"+value+"</li>") ;
                        });
                    }
                    else
                    {
                        document.getElementById('duoprice-form-edit').reset();
                        $('#duoprice-dialog-edit').modal('toggle');
                        $('#duoprice-load-data').click();
                    }

                }
            });
        });

        //------------ Edit Duo Price Viwe -----------------
        $(document).on('dblclick','#duoprice-table #table-data tr',function (e) {
            var hidden_id = $(this).attr('id');

            $.get("{{ route('duo_price-edit') }}",{id:hidden_id},function (data) {
                $('#duoprice-dialog-edit').modal();
                $('#duoprice-form-edit #hidden_id').val(hidden_id);
                $('#duoprice-form-edit input[name="price"]').val(data.price);
                $('#duoprice-form-edit select[name="now_league_id"] option[value="'+data.now_league_id+'"]').prop('selected', true);
                $('#duoprice-form-edit select[name="now_division_id"] option[value="'+data.now_division_id+'"]').prop('selected', true);
                $('#duoprice-form-edit select[name="next_league_id"] option[value="'+data.next_league_id+'"]').prop('selected', true);
                $('#duoprice-form-edit select[name="next_division_id"] option[value="'+data.next_division_id+'"]').prop('selected', true);

            })
        });

        //------------ Delete Duo Price ----------------------
        $(document).on('click','#delete-duoprice',function (e) {
            if ($('input[name="delete"]').is(':checked')) {
                var sList = [];
                $('input[name=delete]:checked').each(function (e,v) {
                    sList.push(v.value);
                });
                console.log(sList)
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::to('admin/duo_price/delete') }}",
                    data: {id:sList},
                    beforeSend: function(){
                        // $('.submitBtn').attr("disabled","disabled");
                        // $('#fupForm').css("opacity",".5");
                    },
                    success: function(msg){
                        $('#duoprice-load-data').click();
                    }
                });

            }
        });

        $(document).on('change','.now_league_id',function () {
            var now_league_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('division-get') }}",
                data: { league_id: now_league_id},
                success: function(msg){
                    var option = '<option value="">Chosse Current Division</option>';
                    $.each(msg, function (key, val) {
                        option += '<option value="'+val.id+'">'+val.name+'</option>';
                    });

                    $('.now_division_id').html(option);
                },
                error: function (error) {
                }
            });
        });

        $(document).on('change','.next_league_id',function () {
            var now_league_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('division-get') }}",
                data: { league_id: now_league_id},
                success: function(msg){
                    var option = '<option value="">Chosse Current Division</option>';
                    $.each(msg, function (key, val) {
                        option += '<option value="'+val.id+'">'+val.name+'</option>';
                    });

                    $('.next_division_id').html(option);
                },
                error: function (error) {
                }
            });
        });


    </script>

@stop