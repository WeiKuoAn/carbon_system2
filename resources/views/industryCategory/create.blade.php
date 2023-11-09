@extends('layouts.master')
@section('title')
    新增行業類別數據
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    新增行業類別數據
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
                    <form action="{{ route('industry-category.store') }}" method="POST">
                        @csrf
                        {{-- <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="NewCustomers-Username"><span style="color: red; font-weight: bolder;">* </span>行業名稱</label>
                                    <input type="text" class="form-control" placeholder="輸入行業名稱"
                                        id="name" name="name" required >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="NewCustomers-Email">行業描述</label>
                                    <textarea name="text-area" id="description" cols="30" rows="4" placeholder="輸入行業描述" class="form-control" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="NewCustomers-Phone"><span style="color: red; font-weight: bolder;">* </span>年均碳排放量</label>
                                    <input type="number" class="form-control" placeholder="輸入年均碳排放量"
                                        id="carbon_annual_avg" name="carbon_annual_avg" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="NewCustomers-Wallet"><span style="color: red; font-weight: bolder;">*</span> 碳排放的主要來源</label>
                                    <input type="text" class="form-control" placeholder="輸入碳排放的主要來源" id="carbon_source" name="carbon_source" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="NewCustomers-Wallet"><span style="color: red; font-weight: bolder;">* </span>量測碳排放的方法或標準</label>
                                    <input type="text" class="form-control" placeholder="輸入量測碳排放的方法或標準" id="carbon_measurement_method" name="carbon_measurement_method" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="NewCustomers-Address"><span style="color: red; font-weight: bolder;">*</span> 數據最後更新日期</label>
                                    <input type="date" class="form-control" placeholder="數據最後更新日期"
                                        id="carbon_last_updated" name="carbon_last_updated" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-3">
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
