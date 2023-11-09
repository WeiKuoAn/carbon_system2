@extends('layouts.master')
@section('title')
碳盤模擬流程
@endsection
@section('page-title')
    碳盤模擬流程
@endsection
@section('css')
    <link href="{{ asset('assets/css/select2.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
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
                                    <a class="nav-link mb-2 " id="v-pills-profile-tab" 
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
                                                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target=".create-reduction" >
                                                            <i class="bx bx-plus me-1"></i>新增減徘</a>
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
                                                <table class="table mb-0 align-middle" id="reductionTable">
                                                    <thead>
                                                        <tr>
                                                            <td width="5%"align="center"></td>
                                                            <td width="14%" align="center">預估達成日期</td>
                                                            <td width="25%">減排措施名稱與描述</td>
                                                            <td width="30%" align="center">如何實施</td>
                                                            <td width="8%">預算</td>
                                                            <td width="10%" align="center">進度狀態</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody >
                                                        @foreach($datas as $key=>$data)
                                                            <tr>
                                                                <td align="center">{{ $key+1 }}</td>
                                                                <td align="center">{{ $data->deadline }}</td>
                                                                <td>
                                                                    <div>
                                                                        <h5 class="text-truncate font-size-16">{{ $data->measure() }}</h5>
                                                                        <p class="mb-0 mt-1">描述: <span class="fw-medium">{{ $data->description }}</span></p>
                                                                    </div>
                                                                </td>
                                                                <td ><div style="white-space: pre-line;">{{ $data->implementation }}</div></td>
                                                                <td>{{ $data->budget }}萬</td>
                                                                <td align="center">{{ $data->status() }}</td>
                                                            </tr>
                                                        @endforeach
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
            <div class="modal fade create-reduction" id="create-reduction" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
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
                    var rowCount = $('#reductionTable tbody tr').length + 1;
                    // 发送 Ajax 请求
                    $.ajax({
                        type: "POST",  // 請求類型
                        url: "{{ route('simulation-inspection.step6.store') }}",  // 請替換成實際的 API 端點
                        data: formData,  // 發送的數據
                        dataType: "json",  // 響應數據類型
                        success: function(response) {
                            // 清空表單
                            $("#reductionForm")[0].reset();

                            var type = {
                                '0': '準備中',
                                '1': '執行中',
                                '2': '完成'
                            };

                            var measure = {
                                '0' : '開始碳減排計劃',
                                '1' : '能源效率改進',
                                '2' : '可再生能源',
                                '3' : '供應鏈優化',
                                '4' : '廢物減量和回收',
                                '5' : '員工教育和參與',
                                '6' : '碳抵消',
                                '7' : '遠程工作和虛擬會議',
                                '8' : '綠色建築',
                                '9' : '碳盤查和報告'
                            };

                            // 在表格中新增一列資料
                            var newRow = "<tr>" +
                                            "<td align='center'>" + rowCount + "</td>" +
                                            "<td align='center'>" + response.deadline + "</td>" +
                                            "<td>" + 
                                                "<div>" + 
                                                    "<h5 class='text-truncate font-size-16'>" + measure[response.measure_name] + "</h5>" +
                                                    "<p class='mb-0 mt-1'>描述: <span class='fw-medium'>" + response.description + "</span></p>" +
                                                "</div>" + 
                                            "</td>" + 
                                            "<td><div style='white-space: pre-line;'>" + response.implementation + "</div></td>" +
                                            "<td>" + response.budget + "萬</td>" +
                                            "<td align='center'>" + type[response.progress_status] + "</td>" +
                                        "</tr>"
                            $("#reductionTable tbody").append(newRow);
                            
                            // 關閉模態對話框
                            $("#create-reduction").modal("hide");
                        },
                        error: function(error) {
                            // 處理錯誤
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