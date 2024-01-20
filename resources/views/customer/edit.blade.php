@extends('layouts.master')
@section('title')
    編輯廠商帳戶資料
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    編輯廠商帳戶資料
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
    
    <form  id="myForm" action="{{ route('customer.update',$data->user_id) }}"  method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xl-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">請填寫廠商資料</h6>
                </div>
                <div class="card-body">
                    
                        {{-- <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Username">廠商名稱</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="name" value="{{ $data->user_data->name }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Username">廠商帳號</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="email" value="{{ $data->user_data->email }}" readonly required>
                                </div>
                            </div>

                            
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">Nas連結</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="nas_link" @if(isset($data)) value="{{ $data->nas_link }}" @endif required>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <label class="form-label" for="AddNew-Username">廠商密碼</label><span class="text-danger">*</span>
                                <div class="mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control me-auto" type="password" name="password" value="{{ $data->user_data->password }}" readonly placeholder="請產生密碼" required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">公司負責人</label>
                                    <input type="text" class="form-control" name="principal_name" value="{{ $data->principal_name }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">計劃案申報類別</label><span class="text-danger">*</span>
                                <div class="row font-size-16 mt-2">
                                    <div class="col-md-3">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input type" type="checkbox" name="type[]" id="formCheck1"  @if($data->user_project->type == 0) value="0" checked @endif value="off">
                                            <label class="form-check-label" for="formCheck1">
                                                商業服務
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input type" type="checkbox" name="type[]" id="formCheck2"  @if($data->user_project->type == 1) value="1" checked @endif value="off">
                                            <label class="form-check-label" for="formCheck2">
                                                製造類
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">公司統編</label>
                                    <input type="text" class="form-control" name="registration_no" value="{{ $data->registration_no }}" required>
                                </div>
                            </div>

                        </div>
                </div>
                
            </div>
            <!-- end card -->
            <div class="col-12 mb-5 text-center">
                <a href="{{ route('customer.index') }}">
                 <button type="button" class="btn btn-danger me-1"><i
                        class="bx bx-x me-1"></i> 回上一頁</button></a>
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    ><i class="bx bx-check me-1"></i>
                    確認編輯</button>
            </div>
        </form>
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
                            <h4 class="mt-3">編輯廠商帳戶資料資料成功！</h4>
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

            

            $('#myForm').submit(function() {
                var isChecked = $('.type:checked').length > 0;

                if (!isChecked) {
                    alert('計劃案申報類別請至少勾選一個類別');
                    return false;
                }

                return true;
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
