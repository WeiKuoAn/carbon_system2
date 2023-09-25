@extends('layouts.master')
@section('title')
    製成類別設定
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
製成類別設定
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')

    <div class="row">
        <div class="col-xl-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">編輯製成類別</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('process.update',$data->id)}}" method="POST">
                        @csrf
                        {{-- <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div> --}}
                        <div class="row">
                            
                            

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">請輸入製成代碼</label>
                                    <input type="text" name="code" id="" class="form-control" value="{{$data->code}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">請輸入製成名稱</label>
                                    <input type="text" name="description" id="" class="form-control" value="{{$data->description}}">
                                </div>
                            </div>

                            {{-- <div class="card-body">
                                <div id="liveAlertPlaceholder"></div>
                                <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button>
                            </div><!-- end card-body -->
                        <!-- end card --> --}}
                            
                        </div>

                        <div class="col-12 text-end">
                             
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                ><i class="bx bx-check me-1"></i>
                                保存設定</button>
                                <a href="{{route('process.create')}}">
                                    <button class="btn btn-danger" data-bs-toggle="modal">回上一頁</button>

                                </a>
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
                            <h4 class="mt-3">排放源設定成功！</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    @endsection
    @section('scripts')
        
        

    {{-- <script src="{{ URL::asset('build/js/pages/alert.init.js') }}"></script> --}}
        
    <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
