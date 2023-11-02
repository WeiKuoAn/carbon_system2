@extends('layouts.master')
@section('title')
    廠商盤查熱點列表
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    廠商盤查熱點列表
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
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
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <td scope="col">#</td>
                                            <td scope="col">排放源型式</td>
                                            <td scope="col">活動/設備</td>
                                            <td scope="col">排放源/燃料物</td>
                                            <td scope="col" align="right" width="15%">活動數據</td>
                                            <td scope="col" align="right" width="15%">活動數據百分比</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($datas as $key=>$data)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $data->process_code }}</td>
                                            <td>{{ $data->equipment_code }}</td>
                                            <td>{{ $data->fuel_name }}</td>
                                            <td align="right">{{ number_format((float)$data->single_source_emission_total, 4, '.', '') }}</td>
                                            <td align="right">{{ number_format((float)$data->single_source_percentage * 100, 2, '.', '') . '%' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
        <script>
            var ctx = document.getElementById('myPieChart').getContext('2d');

            // 初始化一个空数组来存储前三高的值和标签
            var topThreeValues = [];
            var topThreeLabels = [];
            var topThreeFuelNames = [];

            @foreach($datas as $key => $data)
                // 将每个$data->single_source_emission_total 值添加到数组中
                topThreeValues.push({{ $data->single_source_emission_total }});
                // 将每个$data->process_code 添加到标签数组中
                topThreeLabels.push("{{ $data->process_code }}");
                topThreeFuelNames.push("{{ $data->fuel_name }}");
            @endforeach

            // 使用slice方法选择前三高的值
            var topThreeData = topThreeValues.slice(0, 3);
            var topThreeLabel = topThreeLabels.slice(0, 3);
            var topThreeFuelName = topThreeFuelNames.slice(0, 3);

            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: topThreeLabel, // 使用前三高的标签更新标签数组
                    datasets: [{
                        data: topThreeData, // 使用前三高的值更新数据
                        backgroundColor: ["#339300", "#99DDC8", "#1A5E63"]
                    }]
                },
                options: {
                    plugins: {
                        datalabels: {
                            color: 'black', // 标签文本颜色
                            anchor: 'center', // 标签锚点位置
                            align: 'center', // 标签文本对齐方式
                            formatter: function(value, context) {
                                return topThreeLabel[context.dataIndex] + '\n' + topThreeLabel[context.dataIndex] + '\n' + value; // 显示标签、值和燃料名
                            }
                        }
                    }
                }
            });


            var ctx1 = document.getElementById('myPieChart1').getContext('2d');
            var myPieChart = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: topThreeFuelName,
                    datasets: [{
                        data: topThreeData,
                        backgroundColor: ["#339300", "#99DDC8", "#1A5E63"]
                    }]
                }
            });
        </script>
        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>

        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/ecommerce-customers.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
