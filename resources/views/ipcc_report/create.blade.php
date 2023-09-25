@extends('layouts.master')
@section('title')
IPCC評估報告設定
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
新增IPCC評估報告
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')

    <div class="row">
        <div class="col-xl-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">請填寫IPCC評估報告</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('ipcc_report.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="NewCustomers-Username"><span style="color: red; font-weight: bolder;">* </span>年</label>
                                    <input type="text" class="form-control" placeholder="請輸入年"
                                        id="year" name="year" required >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="NewCustomers-Email">報告書名稱</label>
                                    <select  id="" class="form-select" name="name" >
                                        <option value="0" selected>請選擇</option>
                                        <option value="1">IPCC第六次評估報告（2021）</option>
                                        <option value="2">IPCC第五次評估報告（2014）</option>
                                        <option value="3">IPCC第四次評估報告（2007）</option>
                                        <option value="4">IPCC第三次評估報告（2001）</option>
                                        <option value="5">IPCC第二次評估報告（1995）</option>
                                        <option value="6">IPCC第一次評估報告（????）</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="NewCustomers-Phone"><span style="color: red; font-weight: bolder;">* </span>引用</label>
                                    <input type="text" class="form-control" placeholder="輸入引用資料"
                                        id="carbon_annual_avg" name="quote" required>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="NewCustomers-Email">原燃物料代碼</label>
                                    <input type="text" class="form-control" name="code" placeholder="請輸入原然物料代碼">
                                 
                                </div>
                                <div class="mb-3">
                                   
                                    <label class="form-label" for="NewCustomers-Email">溫室氣體化學式</label>
                                    <input type="text" class="form-control" name="co2name" placeholder="請輸入溫室氣體化學式">
                                    
                                </div>
                                <div class="mb-3">
                                   
                                    <label class="form-label" for="NewCustomers-Email">GWP值</label>
                                    <input type="text" class="form-control" name="values" placeholder="請輸入GWP值">
                                </div>
                                
                            </div>

                        </div>
                    
                        <div class="col-12 text-end mt-3">
                             <button type="button" class="btn btn-danger me-1" onclick="history.go(-1)"><i
                                    class="bx bx-x me-1"></i> Back</button>
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                ><i class="bx bx-check me-1"></i>
                                Save</button>
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
                            <h4 class="mt-3">Successful !!</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    @endsection
    @section('scripts')
        <script src="{{ URL::asset('build/js/twzipcode-1.4.1-min.js') }}"></script>

        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
