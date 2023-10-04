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
                                    <a class="nav-link mb-2 " id="v-pills-profile-tab" 
                                        href="{{ route('simulation-inspection.step3') }}"
                                        aria-selected="false">排放源鑑別</a>
                                    <a class="nav-link active" id="v-pills-settings-tab"
                                        href="{{ route('simulation-inspection.step4') }}"
                                        aria-selected="false">統計報表</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab"
                                        href="{{ route('simulation-inspection.step5') }}"
                                        aria-selected="false">盤查清冊產生</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab"
                                        href="{{ route('simulation-inspection.step6') }}"
                                        aria-selected="false">減徘報告</a>
                                </div>
                            </div><!-- end col -->

                            <div class="col-md-10" style="background: white;" id="card">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <!-- Step1 start -->
                                    <div class="tab-pane fade show active" id="v-pills-step1" role="tabpanel"
                                        aria-labelledby="v-pills-step1-tab">
                                            <div class="row p-3">
                                                    <label class="form-label mb-3" for="#" style="font-size: 20pt;font-weight:1000;">統計報表</label>
                                                    <div class="card-body">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                                    <span class="d-none d-sm-block">排放量統計</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                                    <span class="d-none d-sm-block">排放源統計</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                                    <span class="d-none d-sm-block">排放熱點分析</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                                                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                                    <span class="d-none d-sm-block">ISO排放匯總表</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                
                                                        <!-- Tab panes -->
                                                        <div class="tab-content p-3 text-muted">
                                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                                <div class="card-body mt-3">
                                                                    <h4>七大溫室氣體排放量統計表</h4>
                                                                    <div class="table-responsive mt-3">
                                                                        <table class="table mb-0" >
                                                                            <thead>
                                                                                <tr align="center">
                                                                                    <th></th>
                                                                                    <th>CO2</th>
                                                                                    <th>CH4</th>
                                                                                    <th>N2O</th>
                                                                                    <th>HFCs</th>
                                                                                    <th>PFCs</th>
                                                                                    <th>SF6</th>
                                                                                    <th>FN3</th>
                                                                                    <th>總排放當量</th>
                                                                                    <th>生質排放當量</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr align="center"  valign="middle">
                                                                                    <th scope="row">排放當量<br>(公噸CO2/年)</th>
                                                                                    <td>100</td>
                                                                                    <td>200</td>
                                                                                    <td>300</td>
                                                                                    <td>400</td>
                                                                                    <td>500</td>
                                                                                    <td>600</td>
                                                                                    <td>700</td>
                                                                                    <td>800</td>
                                                                                    <td>900</td>
                                                                                </tr>
                                                                                <tr align="center">
                                                                                    <th scope="row">氣體別佔比（%）</th>
                                                                                    <td>10%</td>
                                                                                    <td>20%</td>
                                                                                    <td>30%</td>
                                                                                    <td>40%</td>
                                                                                    <td>50%</td>
                                                                                    <td>60%</td>
                                                                                    <td>70%</td>
                                                                                    <td>80%</td>
                                                                                    <td>-</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                
                                                            </div>

                                                            <div class="tab-pane" id="profile1" role="tabpanel">
                                                                <div class="card-body mt-3">
                                                                    <h4>排放源盤查統計</h4>
                                                                    <div class="table-responsive mt-3">
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
                                                                                @for($i = 0; $i <= 20;$i++)
                                                                                <tr align="center"  valign="middle">
                                                                                    <th>{{ $i+1 }}</th>
                                                                                    <th>鍋爐蒸氣產生程序</th>
                                                                                    <td>中、大型冷凍、冷藏裝備</td>
                                                                                    <td>蒸氣</td>
                                                                                    <td>固定燃燒源	</td>
                                                                                    <td>400</td>
                                                                                    <td>CO2</td>
                                                                                    <td>400</td>
                                                                                    <td>100%</td>
                                                                                </tr>
                                                                                @endfor
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---3--->
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
                                                                    <h4>排放熱點明細</h4>
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
                                                                                @for($i = 0; $i <= 20;$i++)
                                                                                <tr align="center"  valign="middle">
                                                                                    <th>{{ $i+1 }}</th>
                                                                                    <th>鍋爐蒸氣產生程序</th>
                                                                                    <td>中、大型冷凍、冷藏裝備</td>
                                                                                    <td>蒸氣</td>
                                                                                    <td>固定燃燒源	</td>
                                                                                    <td>400</td>
                                                                                    <td>CO2</td>
                                                                                    <td>400</td>
                                                                                    <td>100%</td>
                                                                                </tr>
                                                                                @endfor
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="tab-pane" id="settings1" role="tabpanel">
                                                                <div class="card-body mt-5">
                                                                    <h4>ISO全廠溫室氣體各類別之排放型式排放量統計表</h4>
                                                                    <div class="table-responsive mt-3">
                                                                        <table class="table mb-0" >
                                                                            <tbody>
                                                                                <tr align="center" valign="middle">
                                                                                    <td rowspan="2">排放當量<br>(公噸CO2/年)</td>
                                                                                    <td colspan="4">類別一</td>
                                                                                    <td>類別二</td>
                                                                                    <td>類別三~六</td>
                                                                                    <td rowspan="2">總排放當量</td>
                                                                                </tr>
                                                                                <tr align="center"  valign="middle">
                                                                                    <td>固定排放</td>
                                                                                    <td>製程排放</td>
                                                                                    <td>移動排放</td>
                                                                                    <td>逸散排放</td>
                                                                                    <td>能源間接排放</td>
                                                                                    <td>其他間接排放</td>
                                                                                </tr>
                                                                                <tr align="center"  valign="middle">
                                                                                    <th scope="row">氣體別佔比</th>
                                                                                    <td>100</td>
                                                                                    <td>200</td>
                                                                                    <td>300</td>
                                                                                    <td>400</td>
                                                                                    <td>500</td>
                                                                                    <td>600</td>
                                                                                    <td>700</td>
                                                                                </tr>
                                                                                <tr align="center">
                                                                                    <th scope="row">氣體別佔比（%）</th>
                                                                                    <td>10%</td>
                                                                                    <td>20%</td>
                                                                                    <td>30%</td>
                                                                                    <td>40%</td>
                                                                                    <td>50%</td>
                                                                                    <td>60%</td>
                                                                                    <td>70%</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
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
            var ctx = document.getElementById('myPieChart').getContext('2d');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["運輸作業車輛", "本廠外購電力", "燃氣鍋爐"],
                    datasets: [{
                        data: [1.29, 48.88 ,47.93],
                        backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"]
                    }]
                }
            });

            var ctx1 = document.getElementById('myPieChart1').getContext('2d');
            var myPieChart = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: ["柴油", "電力(2022)", "天然氣"],
                    datasets: [{
                        data: [1.29, 48.88, 47.93],
                        backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"]
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