@extends('layouts.master')
@section('title')
    新增廠商
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    新增廠商
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')

    <div class="row">
        <div class="col-xl-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">請填寫廠商資料</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.store') }}" method="POST">
                        @csrf
                        {{-- <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Username">廠商名稱</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">公司聯絡人姓名</label>
                                    <input type="text" class="form-control" name="contact_name" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Username">廠商帳號</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">公司聯絡人職稱</label>
                                    <input type="text" class="form-control" name="contact_job" >
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <label class="form-label" for="AddNew-Username">廠商密碼</label><span class="text-danger">*</span>
                                <div class="mb-3 row">
                                    <div class="col-10">
                                        <input class="form-control me-auto" type="text" name="password" placeholder="請產生密碼" required>
                                    </div>
                                    <div class="col-2">
                                        <button type="bytton" id="pwd_create" class="btn btn-outline-danger">生成密碼</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">公司聯絡人電話</label>
                                    <input type="text" class="form-control" name="contact_phone">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">計劃案申報類別</label><span class="text-danger">*</span>
                                    <select class="form-select" name="type" required>
                                        <option value="" selected>請選擇</option>
                                        <option value="0" >商業服務類</option>
                                        <option value="1" >製造類</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Email">公司聯絡人信箱</label>
                                    <input type="email" class="form-control" name="contact_email">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">Nas連結</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="nas_link" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">統一編號</label>
                                    <input type="text" class="form-control" name="registration_no" value="" >
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <label class="form-label">計劃案申報類別</label><span class="text-danger">*</span>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="formCheck1">
                                            <label class="form-check-label" for="formCheck1">
                                                商業服務類
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="formCheck2">
                                            <label class="form-check-label" for="formCheck2">
                                                製造類
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">檢視權限</label>
                                    <select class="form-select" name="status" required>
                                        <option value="0" selected>啟用</option>
                                        <option value="1" >禁用</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="AddNew-Phone">公司地址</label>
                                <div class="row twzipcode mb-2">
                                    <select data-role="county" ></select>
                                    <select data-role="district"></select>
                                </div>
                                <div>
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">備註</label>
                                    <textarea  class="form-control" name="note" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-end">
                            <a href="{{ route('customer.index') }}">
                             <button type="button" class="btn btn-danger me-1"><i
                                    class="bx bx-x me-1"></i> 回上一頁</button></a>
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                ><i class="bx bx-check me-1"></i>
                                確認新增</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>

        <!--  successfully modal  -->
        <div id="success-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="bx bx-check-circle display-1 text-success"></i>
                            <h4 class="mt-3">新增廠商資料成功！</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div id="danger-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="bx bx-error-alt display-1 text-danger"></i>
                            <h4 class="mt-3">廠商帳號已被註冊，請重新更換！</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/twzipcode-1.4.1-min.js') }}"></script>

        <script>
            $(document).ready(function(){
                $(".twzipcode").twzipcode({
                    css: ["twzipcode-select", "twzipcode-select" , "twzipcode-hidden"], // 自訂 "城市"、"地區" class 名稱 
                    countyName: "county", // 自訂城市 select 標籤的 name 值
                    districtName: "district", // 自訂地區 select 標籤的 name 值
                });
                
                @if(session('success'))
                    $('#success-btn').modal('show');
                @endif

                @if(session('hint'))
                    $('#danger-btn').modal('show');
                @endif
            });
            // 密碼生成函數
            function generatePassword() {
                var length = 10,
                    charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()",
                    retVal = "";
                for (var i = 0, n = charset.length; i < length; ++i) {
                    retVal += charset.charAt(Math.floor(Math.random() * n));
                }
                return retVal;
            }

            // 點擊事件處理器
            $("#pwd_create").click(function() {
                var password = generatePassword();
                $("input[name='password']").val(password);
            });
        </script>


        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
