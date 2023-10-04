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
                                    <a class="nav-link mb-2 " id="v-pills-home-tab" 
                                    href="{{ route('simulation-inspection.step2') }}">盤查基本設定</a>
                                    <a class="nav-link mb-2" id="v-pills-profile-tab" 
                                        href="{{ route('simulation-inspection.step3') }}"
                                        aria-selected="false">排放源鑑別</a>
                                    <a class="nav-link" id="v-pills-settings-tab"
                                        href="{{ route('simulation-inspection.step4') }}"
                                        aria-selected="false">統計報表</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab"
                                        href="{{ route('simulation-inspection.step5') }}"
                                        aria-selected="false">盤查清冊產生</a>
                                    <a class="nav-link active" id="v-pills-carbonbooks-tab"
                                        href="{{ route('simulation-inspection.step6') }}"
                                        aria-selected="false">減排報告</a>
                                </div>
                            </div><!-- end col -->

                            <div class="col-md-10" style="background: white;" id="card">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <!-- Step1 start -->
                                    <div class="tab-pane fade show active" id="v-pills-step1" role="tabpanel"
                                        aria-labelledby="v-pills-step1-tab">
                                            <div class="row p-3">
                                                    <label class="form-label mb-3" for="#" style="font-size: 20pt;font-weight:1000;">減排報告</label>
                                                    <div class="col-md-12">
                                                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                                            <div>
                                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target=".create-source" >
                                                                    <i class="bx bx-plus me-1"></i>新增減排</a>
                                                            </div>
                                                            {{-- <div class="dropdown">
                                                                <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#"
                                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                                </ul>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table mb-0" >
                                                            <thead>
                                                                <tr align="center">
                                                                    <th>日期</th>
                                                                    <th>碳排放量 (公噸CO₂e)</th>
                                                                    <th>減排措施</th>
                                                                    <th>備註</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr align="center">
                                                                    <td>2023-10-01</td>
                                                                    <td>100</td>
                                                                    <td>開始碳減排計劃</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>2023-11-01</td>
                                                                    <td>95</td>
                                                                    <td>能源效率改善</td>
                                                                    <td>換裝節能燈泡</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>2023-12-01</td>
                                                                    <td>90</td>
                                                                    <td>再生能源利用</td>
                                                                    <td>安裝太陽能板</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>2024-01-01</td>
                                                                    <td>85</td>
                                                                    <td>廢物減量</td>
                                                                    <td>實施循環利用計劃</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- Step1 end -->
                        </div><!-- end row -->

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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <script src="{{ URL::asset('build/libs/select2/select2.min.js') }}"></script>
        
        <!-- apexcharts -->
        <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    @endsection