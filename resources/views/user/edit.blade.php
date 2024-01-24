@extends('layouts.master')
@section('title')
    編輯用戶
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    編輯用戶
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        

        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.update',$data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="AddNew-Username">姓名</label>
                                        <input type="text" class="form-control" 
                                            id="AddNew-Username" name="name" value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">權限</label>
                                        <select class="form-select" name="level">
                                            <option value="1" @if($data->level == 1) selected @endif>管理者</option>
                                            <option value="2" @if($data->level == 2) selected @endif>一般使用者</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">群組</label>
                                        <select class="form-select" name="group_id">
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}" @if($data->group_id == $group->id) selected @endif>{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">狀態</label>
                                        <select class="form-select" name="status">
                                            <option value="0" @if($data->status == 0) selected @endif>開通</option>
                                            <option value="1" @if($data->status == 1) selected @endif>停用</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal" onclick="history.go(-1)"><i
                                            class="bx bx-x me-1 align-middle"></i> 回上一頁</button>
                                    <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#success-btn" id="btn-save-event"><i
                                            class="bx bx-check me-1 align-middle"></i> 確認</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


        </div>
        <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
    @section('scripts')
        <!-- apexcharts -->
        <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- Vector map-->
        <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
