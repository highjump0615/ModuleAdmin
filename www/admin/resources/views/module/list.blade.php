@extends('layouts.main')

@section('style')
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
                        <strong>Orders</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            {{-- Filter --}}
            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="order_id">Description</label>
                            <input type="text" id="order_id" name="order_id" value="" placeholder="Description" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Date added</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 operation-area m-t-md">
                        <div class="form-group pull-right">
                            <button class="btn btn-primary " type="button"><i class="fa fa-search"></i>&nbsp;&nbsp;Filter</button>
                            <button class="btn btn-success " type="button"><i class="fa fa-upload"></i>&nbsp;&nbsp;Upload</button>
                        </div>
                    </div>
                </div>
            </div>

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
                                    <th>Date added</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        3214
                                    </td>
                                    <td>
                                        Customer example
                                    </td>
                                    <td>
                                        03/04/2015
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">Edit</button>
                                            <button class="btn-white btn btn-xs">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
        });

    </script>
@endsection
