@extends('layouts.master')
@section('title')
碳盤模擬流程
@endsection
@section('page-title')
    碳盤模擬流程
@endsection
@section('css')
    <link href="{{ URL::asset('build/css/select2.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- quill css -->
    {{-- <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection
@section('body')
    <body data-layout="horizontal">
    @endsection
    @section('content')
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
                                    <a class="nav-link mb-2 active" id="v-pills-profile-tab" 
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
                                    <div class="tab-pane fade  show active" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div class="row p-3">
                                            <label class="form-label" for="#" style="font-size: 20pt;font-weight:1000;">減徘計畫</label>
                                            <hr>
                                            <div class="col-md-12">
                                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                                    <div>
                                                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target=".create-source" >
                                                            <i class="bx bx-plus me-1"></i>新增排放源</a>
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
                                                <table class="table mb-0" id="reductionTable">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>日期</th>
                                                            <th>碳排放量 (公噸CO₂e)</th>
                                                            <th>減排措施</th>
                                                            <th>備註</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody >
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
                            </div><!--  end col -->
                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>

        <!--新增排放源-->
        <form id="reductionForm">
            @csrf
            <div class="modal fade create-source" id="create-source" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myExtraLargeModalLabel">新增排放源</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ $inventory->customer_id }}">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Task-Name"><b>達成期限</b></label>
                                        <input type="date" class="form-control" id="deadline" name="deadline" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"><b>減排措施</b></label>
                                        <select class="form-select"  id="measure_name" name="measure_name" value="" required >
                                            <option value="0" selected>開始碳減排計劃</option>
                                            <option value="1" >能源效率改進</option>
                                            <option value="2" >可再生能源</option>
                                            <option value="3" >供應鏈優化</option>
                                            <option value="4" >廢物減量和回收</option>
                                            <option value="5" >員工教育和參與</option>
                                            <option value="6" >碳抵消</option>
                                            <option value="7" >遠程工作和虛擬會議</option>
                                            <option value="8" >綠色建築</option>
                                            <option value="9" >碳盤查和報告</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Task Description"><b>減排措施描述</b></label>
                                        <input type="text" class="form-control" id="description" name="description" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"><b>預算</b></label>
                                        <input type="text" class="form-control" id="budget" name="budget" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Category"><b>實施計劃</b></label>
                                        <textarea class="form-control" id="implementation" rows="3" name="implementation" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Task-Name"><b>進度狀態</b></label>
                                        <select class="form-select"  id="progress_status" name="progress_status" required >
                                            <option value="0" selected>準備中</option>
                                            <option value="1" >執行中</option>
                                            <option value="2" >完成</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i
                                            class="bx bx-x me-1 align-middle"></i>取消</button>
                                    <button type="button" class="btn btn-success" id="btn_create">
                                        <i class="bx bx-check me-1 align-middle"></i>新增
                                    </button>
                                </div>
                            </div>
                            {{-- data-bs-toggle="modal"
                            data-bs-target="#success-btn" id="btn-save-event" --}}
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </form>
        <!--新增排放源 end-->

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
        <script src="{{ URL::asset('build/libs/select2/select2.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#year').select2();
                $('#btn_create').on('click', function(e) {
                    e.preventDefault();

                    // 初始化变量，以跟踪是否有任何空的 required 字段
                    var isValid = true;

                    // 检查所有 required 属性的输入字段是否已填写
                    // $('#reductionForm input, #reductionForm select').each(function() {
                    //     if ($(this).prop('required') && !$(this).val()) {
                    //         alert('请填寫所有必填字段！');
                    //         isValid = false;
                    //         return false; // 退出循环
                    //     }
                    // });


                    // 如果有空的 required 字段，则停止提交
                    if (!isValid) {
                        return;
                    }

                    // 收集表单数据
                    var formData = {};
                    $('#reductionForm').serializeArray().map(function(item) {
                        formData[item.name] = item.value;
                    });

                    console.log(formData);

                    // 发送 Ajax 请求
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('emission.store') }}",
                        data: formData,
                        success: function (data) {
                            scope_id = $("#create_scope_id").val();
                            console.log(scope_id);
                            var rowCount = $('#emissionTable-'+scope_id+' tbody tr').length + 1;
                            console.log(rowCount);
                            var content = '';
                            content += '<tr data-row-id="'+ data.id +'"align="center">';
                            content += '<th>'+ rowCount +'</th>';
                            //設備
                            $.each(devices, function(index, device) {
                                if (device.id == data.device_id) {
                                    // 在找到匹配的scope时构建content
                                    content += '<td width="20%" data-field="device">' + device.name + '</td>';
                                }
                            });
                            content += '<td data-field="fuel">' + data.fuel + '</td>';
                            //排放源形式
                            $.each(sources, function(index, source) {
                                if (source.id == data.source_id) {
                                    // 在找到匹配的scope时构建content
                                    content += '<td data-field="source">' + source.name + '</td>';
                                }
                            });
                            //iso14064
                            $.each(iso14064s, function(index, iso14064) {
                                if (iso14064.id == data.iso16064_id) {
                                    // 在找到匹配的scope时构建content
                                    content += '<td data-field="iso14064">' + iso14064.name + '</td>';
                                }
                            });
                            //ghgProtocol
                            $.each(ghgProtocols, function(index, ghgProtocol) {
                                if (ghgProtocol.id == data.ghg_id) {
                                    console.log(ghgProtocol);
                                    // 在找到匹配的scope时构建content
                                    content += '<td data-field="ghg">' + ghgProtocol.name + '</td>';
                                }
                            });
                            content += '<td data-field="included">是</td>';
                            content += '<td>';
                            content += '<ul class="list-inline mb-0">';
                            content += '<li class="list-inline-item">';
                            content += ' <a href="#" alt="'+ data.id +'" data-bs-toggle="modal" data-bs-target=".edit-source" data-bs-placement="top" title="Edit" class="px-2 text-primary edit_emission"><i class="mdi mdi-pencil font-size-20"></i></a>';
                            content += '</li>';
                            content += '<li class="list-inline-item">';
                            content += '<a href="#" alt="'+ data.id +'" data-bs-toggle="modal" data-bs-target=".create-data" data-bs-placement="top" title="data" class="px-2 text-danger"><i class="mdi mdi-chart-bar font-size-20"></i></a>';
                            content += '</li>';
                            content += '</ul>';
                            content += '</td>';
                            content += '</tr>';
                            
                             // 插入新行到表格
                             $('#emissionTable-' + scope_id + ' tbody').append(content);
                             console.log( '#emissionTable-' + scope_id + ' tbody');
                             // 关闭模态框
                             $('#create-source').modal('hide');
                         },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        });
        </script>

        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    @endsection