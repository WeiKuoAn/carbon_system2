@extends('layouts.master')
@section('title')
    編輯ISO14064
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    編輯ISO14064
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')

    <div class="row">
        <div class="col-xl-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('iso14064.update',$data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Username">範疇名稱</label>
                                    <select class="form-control" name="scope_id" required >
                                            <option selected>請選擇...</option>
                                            @foreach($scopes as $scope)
                                                <option value="{{ $scope->id }}" @if($data->scope_id == $scope->id) selected @endif>{{ $scope->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="AddNew-Username">ISO14064名稱</label>
                                    <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">檢視權限</label>
                                    <select class="form-select" name="permission_status" required>
                                        <option value="0" selected>啟用</option>
                                        <option value="1" >禁用</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-12 text-end mt-3">
                             <button type="button" class="btn btn-danger me-1" onclick="history.go(-1)"><i
                                    class="bx bx-x me-1"></i> 回上一頁</button>
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                ><i class="bx bx-check me-1"></i>
                                確認編輯</button>
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
                            <h4 class="mt-3">編輯廠商資料成功！</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ URL::asset('build/js/twzipcode-1.4.1-min.js') }}"></script>

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

        <!-- choices js -->
        <script src="{{ URL::asset('build/libs/select2/select2.min.js')}}"></script>
        <script src="{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

        <!-- color picker js -->
        <script src="{{ URL::asset('build/libs/@simonwep/pickr/pickr.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
