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
                                    href="{{ route('simulation-inspection-edit.step1.show',$inventory->id) }}">盤查企業設定</a>
                                    <a class="nav-link mb-2 " id="v-pills-home-tab" 
                                    href="{{ route('simulation-inspection-edit.step2.show',$inventory->id) }}">盤查基本設定</a>
                                    <a class="nav-link mb-2 " id="v-pills-profile-tab" 
                                        href="{{ route('simulation-inspection-edit.step3.show',$inventory->id) }}"
                                        aria-selected="false">排放源鑑別</a>
                                    <a class="nav-link active" id="v-pills-settings-tab"
                                        href="{{ route('simulation-inspection-edit.step4.show',$inventory->id) }}"
                                        aria-selected="false">統計報表</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab"
                                        href="{{ route('simulation-inspection-edit.step5.show',$inventory->id) }}"
                                        aria-selected="false">盤查清冊產生</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab"
                                        href="{{ route('simulation-inspection-edit.step6.show',$inventory->id) }}"
                                        aria-selected="false">減排計畫</a>
                                </div>
                            </div><!-- end col -->

                            <div class="col-md-10" style="background: white;" id="card">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <!-- Step1 start -->
                                    <div class="tab-pane fade show active" id="v-pills-step1" role="tabpanel"
                                        aria-labelledby="v-pills-step1-tab">
                                            <div class="row p-3">
                                                    <label class="form-label mb-3" for="#" style="font-size: 20pt;font-weight:1000;">排放熱點分析</label>
                                                    <div class="card-body">
                                                        <div class="tab-pane" id="messages1" role="tabpanel">
                                                            <div class="row mb-5">
                                                                <div class="col-6 text-center mt-5">
                                                                    <h4>活動設備</h4>
                                                                    <canvas id="myPieChart"></canvas>
                                                                </div>
                                                                <div class="col-6 text-center mt-5">
                                                                    <h4>原燃料物</h4>
                                                                    <canvas id="myPieChart1"></canvas>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-5">
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0" >
                                                                        <thead>
                                                                            <tr align="center">
                                                                                <th>#</th>
                                                                                <th>製程</th>
                                                                                <th>設備</th>
                                                                                <th>原燃料物</th>
                                                                                <th>排放形式</th>
                                                                                <th>活動數據</th>
                                                                                <th>排放氣體類型</th>
                                                                                <th>排量源當量小計</th>
                                                                                <th>單一排放源總佔比</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($datas as $key => $data)
                                                                            <tr align="center"  valign="middle">
                                                                                <th>{{ $key+1 }}</th>
                                                                                <th>
                                                                                    @if(isset($data->process_data))
                                                                                        {{ $data->process_data->description }}
                                                                                    @endif
                                                                                </th>
                                                                                <td>{{ $data->device_data->name }}</td>
                                                                                <td>{{ $data->fuel }}</td>
                                                                                <td>{{ $data->source_data->name }}</td>
                                                                                <td>{{ $data->fuel }}</td>
                                                                                <td>CO2</td>
                                                                                <td>
                                                                                    @if(isset($data->emission_data))
                                                                                        {{ $data->emission_data->value }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    @if(isset($data->emission_data))
                                                                                        {{ number_format((float)$data->emission_data->value / $total * 100, 2, '.', '') }}%
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div><!-- end card-body -->
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
        <script>
            // 定義一個 JavaScript 陣列，用於存儲從 PHP 變數轉換的數據
            var items = @json($items);

            // 創建一個陣列，用於存儲標籤和數據
            var fuels = [];
            var process = [];
            var data = [];
            var backgroundColor = [];

            // 遍歷前五大的 items 並將數據添加到對應的陣列中
            for (var i = 0; i < Math.min(3, items.length); i++) {
                fuels.push(items[i].fuel); 
                process.push(items[i].description); // 假設 emission_name 包含標籤名稱
                data.push(items[i].emission_value); 
                backgroundColor.push(items[i].background_color); 
            }

            // 創建 Chart.js 圖表
            var ctx = document.getElementById('myPieChart').getContext('2d');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: process,
                    datasets: [{
                        data: data,
                        backgroundColor: ["#339300", "#99DDC8", "#1A5E63"]
                    }]
                }
            });

            var ctx1 = document.getElementById('myPieChart1').getContext('2d');
            var myPieChart = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: fuels,
                    datasets: [{
                        data: data,
                        backgroundColor: ["#339300", "#99DDC8", "#1A5E63"]
                    }]
                }
            });
        </script>
    
        <!-- tui charts plugins -->
        <script src="{{ URL::asset('build/libs/tui-chart/tui-chart-all.min.js') }}"></script>

        <!-- tui charts map -->
        <script src="{{ URL::asset('build/libs/tui-chart/maps/usa.js') }}"></script>

        <!-- tui charts plugins -->
        <script src="{{ URL::asset('build/js/pages/tui-charts.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection