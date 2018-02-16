@extends('layouts.main')

@section('style')
    <!-- Ladda style -->
    <link href="<?=asset('css/plugins/ladda/ladda-themeless.min.css') ?>" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="<?=asset('css/plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet">

    <link href="<?=asset('css/pagination.css') ?>" rel="stylesheet" />

    <style>
    </style>
@endsection


@section('content')

    @include('layouts.sidemenu')

    <div id="page-wrapper" class="gray-bg">

        @include('layouts.header')

        {{-- Title --}}
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Modules</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">
                        <strong>Modules</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content ecommerce">

            {{-- Filter --}}
            <div class="ibox-content m-b-sm border-bottom">
                <form role="form" action="{{url('/')}}" method="get">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="order_id">Description</label>
                                <input type="text" name="desc" value="{{request('desc')}}" placeholder="Description" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="date_added">Date added</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="date" value="{{request('date')}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 operation-area m-t-md">
                            <div class="form-group pull-right">
                                <button class="btn btn-primary " type="submit"><i class="fa fa-search"></i>&nbsp;&nbsp;Filter</button>
                                <button class="btn btn-success " type="button" data-toggle="modal" data-target="#modalAdd">
                                    <i class="fa fa-upload"></i>&nbsp;&nbsp;Upload
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Modal Dialog --}}
            <div class="modal inmodal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-cubes modal-icon"></i>
                            <h4 class="modal-title">Add/Edit Module</h4>
                        </div>
                        <form role="form" action="{{url('/module/save')}}" method="post" id="form-add" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                {{--id--}}
                                <input type="hidden" name="id" />
                                {{-- Description --}}
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" placeholder="Enter description for this module" class="form-control"
                                           name="description"
                                           required>
                                </div>
                                {{-- Moudle File --}}
                                <div class="form-group">
                                    <label>Module</label>
                                    <div class="fbox">
                                    <input type="text" placeholder="File Name" class="form-control"
                                           name="fileName"
                                           required>
                                    <input type="file" name="fileData">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" id="" class="ladda-button btn btn-primary" data-style="slide-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Delete form --}}
            <form role="form" action="{{url('/module/delete')}}" method="post" id="form-delete">
                {{ csrf_field() }}
                <input type="hidden" name="id">
            </form>

            {{-- Table --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Description</th>
                                    <th>File name</th>
                                    <th>Date added</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (count($modules) > 0)
                                    @for ($i = 0; $i < count($modules); $i++)
                                        <tr data-mid="{{$modules[$i]->id}}">
                                            {{-- No --}}
                                            <td>{{$i + $modules->firstItem()}}</td>
                                            {{-- Description --}}
                                            <td>{{$modules[$i]->description}}</td>
                                            {{-- File name --}}
                                            <td>{{$modules[$i]->filePath}}</td>
                                            {{-- Created at --}}
                                            <td>{{$modules[$i]->created_at}}</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button class="btn-white btn btn-xs btn-edit"
                                                            data-toggle="modal" data-target="#modalAdd">Edit</button>
                                                    <button class="btn-white btn btn-xs"
                                                            onclick="deleteModule({{$modules[$i]->id}})">Delete</button>
                                                </div>
                                             </td>
                                        </tr>
                                    @endfor
                                @else
                                    <tr>
                                        <td colspan="4"
                                            class="text-center"
                                        >No modules existing</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>

                            <ul id="pagination_data" class="pagination-sm pull-right"></ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="<?=asset('js/plugins/ladda/spin.min.js') ?>"></script>
    <script src="<?=asset('js/plugins/ladda/ladda.min.js') ?>"></script>
    <script src="<?=asset('js/plugins/ladda/ladda.jquery.min.js') ?>"></script>

    <!-- Sweet alert -->
    <script src="<?=asset('js/plugins/sweetalert/sweetalert.min.js') ?>"></script>

    <script>
        var butSubmit = $('.ladda-button').ladda();
        var objInputName = $('input[name="fileData"]');

        $(document).ready(function() {
            $('.datepicker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
        });

        // Form submission
        $('#form-add').submit(function (event) {
            // saving animation
            butSubmit.ladda('start');
        });

        // Global vars
        var gnTotalPage = '{{$modules->lastPage()}}';
        var gnCurrentPage = '{{$modules->currentPage()}}';

        gnTotalPage = 1;
        gnCurrentPage = parseInt(gnCurrentPage);

        /**
         * Delete module
         * @param moduleId
         */
        function deleteModule(moduleId) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this module.",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                // disable button
                var butConfirm = $('button.confirm');
                butConfirm.addClass('disabled');
                butConfirm.prop("disabled", true);

                // set value
                var frmDelete = $('#form-delete');
                frmDelete.find('[name="id"]').val(moduleId);
                frmDelete.submit();
            });
        }

        $('input[name="fileData"]').change(function(e) {
            // set file name to name box
            $('input[name="fileName"]').val($(this).val().split('\\').pop());
        });

        // disable typing filename
        $('input[name="fileName"]').on('keydown paste', function(e) {
            e.preventDefault();
        });

        /**
         * Edit module
         * @param moduleId
         */
        $('.btn-edit').click(function() {
            var objTr = $(this).closest('tr');
            var frmAdd = $('#form-add');

            // id
            frmAdd.find('input[name="id"]').val(objTr.data('mid'));

            // description
            frmAdd.find('input[name="description"]').val(objTr.find('td:nth-child(2)').html());

            // file name
            frmAdd.find('input[name="fileName"]').val(objTr.find('td:nth-child(3)').html());
        });

    </script>

    <script type="text/javascript" src="<?=asset('/js/plugins/pagination/jquery.twbsPagination.min.js')?>"></script>
    <script type="text/javascript" src="<?=asset('/js/pagination.js')?>"></script>
@endsection
