@extends('layouts.master')
@section('title')
碳盤模擬流程
@endsection
@section('page-title')
    碳盤模擬流程
@endsection
@section('css')
    <!-- quill css -->
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@endsection
@section('body')
    <body data-layout="horizontal">
    @endsection
    @section('content')
    <form action="{{ route('simulation-inspection.step2.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="card-body mt-5">
                        <div class="row">
                             <!----大標題------>
                            <div class="col-md-2">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical" style="background: white;">
                                    <a class="nav-link mb-2 " id="v-pills-home-tab" 
                                    href="{{ route('simulation-inspection.step1') }}">盤查企業設定</a>
                                    <a class="nav-link mb-2 active" id="v-pills-home-tab" 
                                    href="{{ route('simulation-inspection.step2') }}">盤查基本設定</a>
                                    <a class="nav-link mb-2 " id="v-pills-profile-tab" 
                                        href="{{ route('simulation-inspection.step3') }}"
                                        aria-selected="false">排放源鑑別</a>
                                    <a class="nav-link" id="v-pills-settings-tab"
                                        href="{{ route('simulation-inspection.step4') }}"
                                        aria-selected="false">統計報表</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab"
                                        href="{{ route('simulation-inspection.step5') }}"
                                        aria-selected="false">盤查清冊產生</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab"
                                        href="{{ route('simulation-inspection.step6') }}"
                                        aria-selected="false">減排計畫</a>
                                </div>
                            </div><!-- end col -->

                            <div class="col-md-10" style="background: white;" id="card">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <!-- Step1 start -->
                                    <div class="tab-pane fade show active" id="v-pills-step1" role="tabpanel"
                                        aria-labelledby="v-pills-step1-tab">
                                            <div class="row p-3">
                                                    <label class="form-label mb-3" for="#" style="font-size: 20pt;font-weight:1000;">盤查基本設定</label>
                                                    @if(session('error'))
                                                        <div class="alert alert-danger">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="year">盤查年度</label>
                                                            <select class="form-select"  id="year" name="year" required >
                                                                    <option value="" selected>請選擇...</option>
                                                                    @foreach($years as $year)
                                                                        <option value="{{ $year}}">{{ $year }}年</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="reason">盤查原因</label>
                                                        <select class="form-select" name="reason" required>
                                                                <option value="0" selected>自主盤查</option>
                                                                <option value="1">依法申報</option>
                                                                <option value="2">其他</option>
                                                            </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="verification_agency">查證機構</label>
                                                        <input type="text" class="form-control" name="verification_agency" value="" required >
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="norm">規範使用</label>
                                                            <select class="form-select" name="norm" required>
                                                                <option value="" selected>請選擇</option>
                                                                <option value="0">使用ISO14064-1標準</option>
                                                                <option value="1">使用環保署標準</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="ipcc_id">GWP版本</label>
                                                            <select class="form-select" name="ipcc_id" required>
                                                                    <option value="" selected>請選擇</option>
                                                                    <option value="1">IPCC AR6（2021）</option>
                                                                </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="base_year">基準年</label>
                                                            <select class="form-select" name="base_year" required>
                                                                    <option value="" selected>請選擇</option>
                                                                    <option value="0">是</option>
                                                                    <option value="1">否</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4 mb-2">
                                                        <div class="col text-end">
                                                            <button class="btn btn-danger" onclick="history.go(-1)"><i class="bx bx-x me-1"></i> 取消 </button>
                                                            <button class="btn btn-success" type="submit"><i class=" bx bx-file me-1"></i> 保存 </button>
                                                        </div>
                                                    </div> 
                                            </div>
                                    </div>
                                    <!-- Step1 end -->
                        </div><!-- end row -->
                    </form>

                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>

        <style>
            .nav{
                border-radius: 15px;
            }
            .nav-link {
                font-size: 1.2em;
                line-height: 40px;
            }

            #card{
                /* box-shadow: 2px 2px 8px 2px rgba(0, 0, 0, 0.07); */
                /* border: 0.5pt solid #28b765; */
                border-radius: 15px;
            }

            .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                color: var(--bs-nav-pills-link-active-color);
                background-color: #28b765;
            }
            .font-control{
                text-align: center;
            }

            .main-content{
                min-height: 100vh;
                background-color: #f5f5f5;
            }
        </style>
    @endsection
    @section('scripts')
        <script>
            $(document).ready(function () {
                $('#year').select2();
            });
        </script>
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> --}}
        <script src="{{ URL::asset('build/libs/select2/select2.min.js') }}"></script>
        
        <!-- apexcharts -->
        <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    @endsection