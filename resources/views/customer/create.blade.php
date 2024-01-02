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
                                    <label class="form-label" for="AddNew-Username">廠商名稱</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">計劃案申報類別</label>
                                    <select class="form-select" name="stock_status" required>
                                        <option value="" selected>請選擇</option>
                                        <option value="0" >商業服務類</option>
                                        <option value="1" >製造類</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Username">廠商帳號</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">公司規模</label>
                                    <select class="form-select" name="company_scale" required>
                                        <option value="" selected>請選擇</option>
                                        <option value="0" >10人以下</option>
                                        <option value="1" >10人已上</option>
                                        <option value="2" >50人以上、100以下</option>
                                        <option value="3" >100人以上</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Username">廠商密碼</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">行業別</label>
                                    <select class="form-select" name="industry_id" required>
                                        <option value="" selected>請選擇</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">上市櫃狀態</label>
                                    <select class="form-select" name="stock_status" required>
                                        <option value="" selected>請選擇</option>
                                        <option value="0" >未上櫃,有以IPO為目標</option>
                                        <option value="1" >未上櫃,未來也無意上櫃</option>
                                        <option value="2" >已上櫃/已上市</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">公司聯絡人姓名</label>
                                    <input type="text" class="form-control" name="primary_contact_name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">銷售方向</label>
                                    <select class="form-select" name="sales_orientation">
                                        <option value="" selected>請選擇</option>
                                        <option value="0">B2B</option>
                                        <option value="1">B2C</option>
                                        <option value="2">B2G</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">公司聯絡人職稱</label>
                                    <input type="text" class="form-control" name="contact_job" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">銷售區域</label>
                                    <input type="text" class="form-control" name="sales_region" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">公司聯絡人電話</label>
                                    <input type="text" class="form-control" name="primary_contact_phone" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">成立日期</label>
                                    <input type="date" class="form-control" name="established_date">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Email">公司聯絡人信箱</label>
                                    <input type="email" class="form-control" name="primary_contact_email" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">營運狀態</label>
                                    <select class="form-select" name="operational_status" required>
                                        <option value="0" selected>正常營運</option>
                                        <option value="1" >暫停營運</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Phone">統一編號</label>
                                    <input type="text" class="form-control" name="business_registration_no" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">檢視權限</label>
                                    <select class="form-select" name="permission_status" required>
                                        <option value="0" selected>啟用</option>
                                        <option value="1" >禁用</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="AddNew-Phone">公司地址</label>
                                <div class="row twzipcode mb-2">
                                    <select data-role="county" required ></select>
                                    <select data-role="district" required></select>
                                </div>
                                <div>
                                    <input type="text" class="form-control" name="address" required>
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
                             <button type="button" class="btn btn-danger me-1" onclick="history.go(-1)"><i
                                    class="bx bx-x me-1"></i> 回上一頁</button>
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
