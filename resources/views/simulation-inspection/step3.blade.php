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
                                    {{-- <a class="nav-link mb-2" id="v-pills-home-tab"
                                        href="{{ route('simulation-inspection.step2') }}"
                                        aria-selected="true">盤查邊界設定</a> --}}
                                    <a class="nav-link mb-2 active" id="v-pills-profile-tab" 
                                        href="{{ route('simulation-inspection.step3') }}"
                                        aria-selected="false">排放源鑑別</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                        href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false">統計報表</a>
                                    <a class="nav-link" id="v-pills-scope3-tab" data-bs-toggle="pill"
                                        href="#v-pills-scope3" role="tab" aria-controls="v-pills-scope3"
                                        aria-selected="false">內外部查證</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab" data-bs-toggle="pill"
                                        href="#v-pills-carbonbooks" role="tab" aria-controls="v-pills-carbonbooks"
                                        aria-selected="false">盤查清冊產生</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab" data-bs-toggle="pill"
                                        href="#v-pills-carbonbooks" role="tab" aria-controls="v-pills-carbonbooks"
                                        aria-selected="false">減徘報告</a>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-10" style="background: white;" id="card">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <div class="tab-pane fade  show active" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div class="row p-3">
                                            <label class="form-label" for="#" style="font-size: 20pt;font-weight:1000;">排放源鑑別與計算</label>
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
                                            @foreach($scopes as $scope)
                                            <div class="table-responsive mt-4 mb-3">
                                                <table class="table align-middle mb-0 table-nowrap mb-0" id="emissionTable">
                                                    <thead class="table-light" >
                                                        <tr>
                                                            <th colspan="8"><h5>{{ $scope->name }}</h5></th>
                                                        </tr>
                                                    </thead>
                                                    <thead class="table-light" >
                                                        <tr align="center">
                                                            <th>編號</th>
                                                            <th>活動/設備</th>
                                                            <th>排放源型式</th>
                                                            <th>ISO14064排放源類別</th>
                                                            <th>GHG Protocol排放源類別</th>
                                                            <th>排放量單位</th>
                                                            <th>列入計算</th>
                                                            <th>操作</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($scope->emission_datas as $key=>$emission_data)
                                                            <tr align="center">
                                                                <th>{{ $key+1 }}</th>
                                                                <td>備用發電機</td>
                                                                <td>能源（E）</td>
                                                                <td>category1</td>
                                                                <td>scope 1 a</td>
                                                                <td>kg</td>
                                                                <td>是</td>
                                                                <td>
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item">
                                                                            <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Edit"
                                                                                class="px-2 text-primary"><i
                                                                                    class="bx bx-pencil font-size-18"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Delete"
                                                                                class="px-2 text-danger"><i
                                                                                    class="bx bx-trash-alt font-size-18"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endforeach
                                        
                                        </div>
                                        <div class="row mt-4 mb-2">
                                            <div class="col text-end">
                                                <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                        class=" bx bx-file me-1"></i> 保存 </a>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div>
                            </div><!--  end col -->
                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>

        <form id="emissionForm">
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
                                    <input type="text" class="form-control" id="basic_inventory_id" name="basic_inventory_id" value="1">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Task-Name"><b>活動/設備</b></label>
                                        <select class="form-select" id="device_id" name="device_id" required >
                                            <option selected>請選擇...</option>
                                            @foreach($devices as $device)
                                                <option value="{{ $device->id }}">{{ $device->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Task-Name"><b>製程名稱</b></label>
                                        <select class="form-select" id="process_id" name="process_id" required >
                                            <option selected>請選擇...</option>
                                            @foreach($devices as $device)
                                                <option value="{{ $device->id }}">{{ $device->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"><b>排放源/燃料物</b></label>
                                        <input type="text" class="form-control" id="fuel" name="fuel" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Task-Name"><b>電力類型</b></label>
                                        <select class="form-select"  id="electricity_type" name="electricity_type" required >
                                            <option value="0" selected>火力發電</option>
                                            <option value="1" >水力發電</option>
                                            <option value="2" >潮汐發電</option>
                                            <option value="3" >風力發電</option>
                                            <option value="4" >人力發電</option>
                                            <option value="5" >電瓶發電</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Team-Member"><b>電力來源</b></label>
                                        <input type="text" class="form-control" id="electricity_source" name="electricity_source" value="台灣電力公司">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><b>地區</b></label>
                                        <select class="form-select" id="area" name="area" required >
                                            <option value="0" selected>台灣</option>
                                            <option value="1" >全球</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Task-Name"><b>範疇類別</b></label>
                                        <select class="form-select"  id="scope_id" name="scope_id" required >
                                            <option value="" selected>請選擇...</option>
                                            @foreach($scopes as $scope)
                                                <option value="{{ $scope->id }}">{{ $scope->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Team-Member"><b>ISO14064排放源類別</b></label>
                                        <select class="form-select"  id="iso16064_id" name="iso16064_id" required >
                                            <option selected>請選擇...</option>
                                            @foreach($iso14064s as $iso14064)
                                                <option value="{{ $iso14064->id }}">{{ $iso14064->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><b>GHG Protocol排放源類別</b></label>
                                        <select class="form-select"  id="ghg_id" name="ghg_id" required >
                                            <option value="" selected>請選擇...</option>
                                            @foreach($ghgProtocols as $ghgProtocol)
                                                <option value="{{ $ghgProtocol->id }}">{{ $ghgProtocol->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Category"><b>排放源形式</b></label>
                                        <select class="form-select"  id="source_id" name="source_id" required >
                                            <option value="" selected>請選擇...</option>
                                            @foreach($ghgProtocols as $ghgProtocol)
                                                <option value="{{ $ghgProtocol->id }}">{{ $ghgProtocol->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Category"><b>列入計算</b></label>
                                        <select class="form-select"  id="calculate" name="calculate" required >
                                            <option value="0" selected>是</option>
                                            <option value="1">否</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="CreateTask-Task Description">備註</label>
                                    <textarea class="form-control" id="projectdesc" rows="3" name="text" ></textarea>
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


        <!--  successfully modal  -->
        <div id="success-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="bx bx-check-circle display-1 text-success"></i>
                            <h4 class="mt-3">Task Completed Successfully</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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
                $("#device_id").select2();

                    $('#btn_create').on('click', function(e) {
                        e.preventDefault();

                        // 初始化变量，以跟踪是否有任何空的 required 字段
                        var isValid = true;

                        // 检查所有 required 属性的输入字段是否已填写
                        $('form input, form select, form textarea').each(function() {
                            if ($(this).prop('required') && !$(this).val()) {
                                alert('请填写所有必填字段！');
                                isValid = false;
                                return false; // 退出循环
                            }
                        });

                        // 如果有空的 required 字段，则停止提交
                        if (!isValid) {
                            return;
                        }

                        // 收集表单数据
                        var formData = {};
                        $('form').serializeArray().map(function(item) {
                            formData[item.name] = item.value;
                        });

                        
                        // 发送 Ajax 请求
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('emission.store') }}",
                            data: formData,
                            success: function(data) {
                                console.log(data);

                                // 插入新行到表格
                                $('#emissionTable tbody').append('<tr><td>' + "{{ $scope->name }}" + '</td><td>' + data.device_id + '</td><!-- 其他字段... --></tr>');

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