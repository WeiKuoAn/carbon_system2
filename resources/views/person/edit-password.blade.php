@extends('layouts.master')
@section('title')
    變更密碼
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    變更密碼
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        
        <div class="row">
            <div class="col-xl-6">
                @if ($hint == '1')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        會員密碼修改失敗！請重新再一次
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @if ($hint == '2')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        新密碼與確認密碼輸入不符！請重新再一次
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user-password.data') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">舊密碼<span class="text-danger">*</span></label>
                                    <input type="password" id="projectname" class="form-control" name="password" required>
                                </div>
                            </div> <!-- end col-->
                            
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">新密碼<span class="text-danger">*</span></label>
                                    <input type="password" id="password_new" class="form-control" name="password_new" required>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">確認密碼<span class="text-danger">*</span></label>
                                    <input type="password" id="password_conf" class="form-control" name="password_conf" required>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle me-1"></i>修改</button>
                                <button type="reset" class="btn btn-secondary waves-effect waves-light m-1"><i class="fe-x me-1"></i>回上一頁</button>
                            </div>
                        </div>
                    </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>

        <!--  successfully modal  -->
        <div id="success-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="bx bx-check-circle display-1 text-success"></i>
                            <h4 class="mt-3">User Added Successfully</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--  Extra Large modal example -->
        <div class="modal fade add-new" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">新增用戶</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Username">帳號</label>
                                    <input type="text" class="form-control" placeholder="Enter Username"
                                        id="AddNew-Username" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">職稱</label>
                                    <select class="form-select">
                                        <option selected>Select Position</option>
                                        <option>Full Stack Developer</option>
                                        <option>Frontend Developer</option>
                                        <option>UI/UX Designer</option>
                                        <option>Backend Developer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Email">密碼</label>
                                    <input type="text" class="form-control" placeholder="Enter Email"
                                        id="AddNew-Email" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">電話</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone"
                                        id="AddNew-Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Username">姓名</label>
                                    <input type="text" class="form-control" placeholder="Enter Username"
                                        id="AddNew-Username" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">權限</label>
                                    <select class="form-select">
                                        <option selected>啟用</option>
                                        <option>停用</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i
                                        class="bx bx-x me-1 align-middle"></i> Cancel</button>
                                <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#success-btn" id="btn-save-event"><i
                                        class="bx bx-check me-1 align-middle"></i> Confirm</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
