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
                <h2>App version</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">
                        <strong>Version</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content ecommerce">

            {{-- Add form --}}
            <div class="ibox-content m-b-sm border-bottom">
                <form role="form" action="{{url('/version/save')}}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">Version</label>
                                <input type="text" name="version" placeholder="Version Number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <input type="text" name="description" placeholder="Description" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Url</label>
                                <input type="text" name="url" placeholder="Url" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-2 operation-area m-t-md">
                            <div class="form-group pull-right">
                                <button class="btn btn-primary " type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
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
                            <i class="fa fa-book modal-icon"></i>
                            <h4 class="modal-title">Edit Version</h4>
                        </div>
                        <form role="form" action="{{url('/version/save')}}" method="post" id="form-edit">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                {{--id--}}
                                <input type="hidden" name="id" />
                                {{-- Description --}}
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" placeholder="Enter description for this version" class="form-control"
                                           name="description"
                                           required>
                                </div>
                                {{-- Url --}}
                                <div class="form-group">
                                    <label>Url</label>
                                    <input type="text" placeholder="Enter url for the binary of this version" class="form-control"
                                           name="url"
                                           required>
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
            <form role="form" action="{{url('/version/delete')}}" method="post" id="form-delete">
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
                                    <th>Version</th>
                                    <th>Description</th>
                                    <th>Url</th>
                                    <th>Date added</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (count($versions) > 0)
                                    @for ($i = 0; $i < count($versions); $i++)
                                        <tr data-vid="{{$versions[$i]->id}}">
                                            {{-- No --}}
                                            <td>{{$i + $versions->firstItem()}}</td>
                                            {{-- Version --}}
                                            <td>{{$versions[$i]->version}}</td>
                                            {{-- Description --}}
                                            <td>{{$versions[$i]->description}}</td>
                                            {{-- Url --}}
                                            <td>{{$versions[$i]->url}}</td>
                                            {{-- Created at --}}
                                            <td>{{$versions[$i]->created_at}}</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button class="btn-white btn btn-xs btn-edit"
                                                            data-toggle="modal" data-target="#modalAdd">Edit</button>
                                                    <button class="btn-white btn btn-xs"
                                                            onclick="deleteModule({{$versions[$i]->id}})">Delete</button>
                                                </div>
                                             </td>
                                        </tr>
                                    @endfor
                                @else
                                    <tr>
                                        <td colspan="6"
                                            class="text-center"
                                        >No Versions existing</td>
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

        $(document).ready(function() {
        });

        // Form submission
        $('#form-edit').submit(function (event) {
            // saving animation
            butSubmit.ladda('start');
        });

        // Global vars
        var gnTotalPage = '{{$versions->lastPage()}}';
        var gnCurrentPage = '{{$versions->currentPage()}}';

        gnTotalPage = 1;
        gnCurrentPage = parseInt(gnCurrentPage);

        /**
         * Delete module
         * @param moduleId
         */
        function deleteModule(moduleId) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this action.",
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

        /**
         * Edit version
         */
        $('.btn-edit').click(function() {
            var objTr = $(this).closest('tr');
            var frmAdd = $('#form-edit');

            // id
            frmAdd.find('input[name="id"]').val(objTr.data('vid'));

            // description
            frmAdd.find('input[name="description"]').val(objTr.find('td:nth-child(3)').html());

            // file name
            frmAdd.find('input[name="url"]').val(objTr.find('td:nth-child(4)').html());
        });

    </script>

    <script type="text/javascript" src="<?=asset('/js/plugins/pagination/jquery.twbsPagination.min.js')?>"></script>
    <script type="text/javascript" src="<?=asset('/js/pagination.js')?>"></script>
@endsection
