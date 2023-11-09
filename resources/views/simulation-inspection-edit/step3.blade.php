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
                                    href="{{ route('simulation-inspection-edit.step1.show',$inventory->id) }}">盤查企業設定</a>
                                    <a class="nav-link mb-2 " id="v-pills-home-tab" 
                                    href="{{ route('simulation-inspection-edit.step2.show',$inventory->id) }}">盤查基本設定</a>
                                    <a class="nav-link mb-2 active" id="v-pills-profile-tab" 
                                        href="{{ route('simulation-inspection-edit.step3.show',$inventory->id) }}"
                                        aria-selected="false">排放源鑑別</a>
                                    <a class="nav-link" id="v-pills-settings-tab"
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
                                            @foreach($datas as $key=>$data)
                                            <div class="table-responsive mt-4 mb-3">
                                                <table class="table align-middle mb-0 table-nowrap mb-0" id="emissionTable-{{ $key }}" alt="{{ $key }}">
                                                    <thead class="table-light" >
                                                        <tr>
                                                            <th colspan="8"><h5>{{ $data['name'] }}</h5></th>
                                                        </tr>
                                                    </thead>
                                                    <thead class="table-light" >
                                                        <tr align="center">
                                                            <th>編號</th>
                                                            <th>活動/設備</th>
                                                            <th>排放源/燃料物</th>
                                                            <th>排放源型式</th>
                                                            <th>ISO14064排放源類別</th>
                                                            <th>GHG Protocol排放源類別</th>
                                                            <th>列入計算</th>
                                                            <th>操作</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($data['emission_datas'] as $key=>$emission_data)
                                                            <tr align="center" data-row-id="{{ $emission_data->id }}">
                                                                <th>{{ $key+1 }}</th>
                                                                <td data-field="device" width="20%">{{ $emission_data->device_data->name }}</td>
                                                                <td data-field="fuel">{{ $emission_data->fuel }}</td>
                                                                <td data-field="source">{{ $emission_data->source_data->name }}</td>
                                                                <td data-field="iso14064">{{ $emission_data->iso14064_data->name }}</td>
                                                                <td data-field="ghg">{{ $emission_data->ghg_data->name }}</td>
                                                                <td data-field="included">是</td>
                                                                <td>
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item">
                                                                            <a href="#" alt="{{ $emission_data->id }}" data-bs-toggle="modal" data-bs-target=".edit-source" data-bs-placement="top" title="Edit"
                                                                                class="px-2 text-primary edit_emission"><i class="mdi mdi-pencil font-size-20"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="#" alt="{{ $emission_data->id }}" data-bs-toggle="modal" data-bs-target=".create-data" data-bs-placement="top" title="data"
                                                                                class="px-2 text-danger edit_data"><i class="mdi mdi-chart-bar font-size-20"></i></a>
                                                                        </li>
                                                                        {{-- <li class="list-inline-item">
                                                                            <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Edit"
                                                                                class="px-2 text-primary"><i
                                                                                    class="bx bx-pencil font-size-18"></i></a>
                                                                        </li> --}}
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endforeach
                                        
                                        </div>
                                        {{-- <div class="row mt-4 mb-2">
                                            <div class="col text-end">
                                                <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                        class=" bx bx-file me-1"></i> 保存 </a>
                                            </div> <!-- end col -->
                                        </div> <!-- end row--> --}}
                                    </div>
                            </div><!--  end col -->
                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>

        <!--新增排放源-->
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
                                    <input type="hidden" class="form-control" id="basic_inventory_id" name="basic_inventory_id" value="{{ $inventory->id }}">
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
                                            @foreach($proces as $procss)
                                                <option value="{{ $procss->id }}">{{ $procss->description }}</option>
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
                                        <select class="form-select"  id="create_scope_id" name="scope_id" required >
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
                                        <select class="form-select"  id="create_iso16064_id" name="iso16064_id" required >
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
                                        <select class="form-select"  id="create_ghg_id" name="ghg_id" required >
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
                                            @foreach($sources as $source)
                                                <option value="{{ $source->id }}">{{ $source->name }}</option>
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
                                <div class="col-md-6 scope2_div">
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
                                <div class="col-md-6 scope2_div">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Team-Member"><b>電力來源</b></label>
                                        <input type="text" class="form-control" id="electricity_source" name="electricity_source" value="台灣電力公司">
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
        <!--新增排放源 end-->

        <!--修改排放源-->
        <form id="emissionFormEdit">
            @csrf
            <div class="modal fade edit-source" id="edit-source" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myExtraLargeModalLabel">修改排放源</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" id="basic_inventory_id" name="basic_inventory_id" value="{{ $inventory->id }}">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Task-Name"><b>活動/設備</b></label>
                                        <select class="form-select" id="edit_device_id" name="device_id" required >
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
                                        <select class="form-select" id="edit_process_id" name="process_id" required >
                                            <option selected>請選擇...</option>
                                            @foreach($proces as $procss)
                                                <option value="{{ $procss->id }}">{{ $procss->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"><b>排放源/燃料物</b></label>
                                        <input type="text" class="form-control" id="edit_fuel" name="fuel" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6 scope2_div">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Task-Name"><b>電力類型</b></label>
                                        <select class="form-select"  id="edit_electricity_type" name="electricity_type" required >
                                            <option value="0" selected>火力發電</option>
                                            <option value="1" >水力發電</option>
                                            <option value="2" >潮汐發電</option>
                                            <option value="3" >風力發電</option>
                                            <option value="4" >人力發電</option>
                                            <option value="5" >電瓶發電</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 scope2_div">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Team-Member"><b>電力來源</b></label>
                                        <input type="text" class="form-control" id="edit_electricity_source" name="electricity_source" value="台灣電力公司">
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
                                        <select class="form-select"  id="edit_scope_id" name="scope_id" required >
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
                                        <select class="form-select"  id="edit_iso16064_id" name="iso16064_id" required >
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
                                        <select class="form-select"  id="edit_ghg_id" name="ghg_id" required >
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
                                        <select class="form-select"  id="edit_source_id" name="source_id" required >
                                            <option value="" selected>請選擇...</option>
                                            @foreach($sources as $source)
                                                <option value="{{ $source->id }}">{{ $source->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="CreateTask-Category"><b>列入計算</b></label>
                                        <select class="form-select"  id="edit_calculate" name="calculate" required >
                                            <option value="0" selected>是</option>
                                            <option value="1">否</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="CreateTask-Task Description">備註</label>
                                    <textarea class="form-control" id="edit_text" rows="3" name="text" ></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i
                                            class="bx bx-x me-1 align-middle"></i>取消</button>
                                    <button type="button" class="btn btn-success" id="btn_edit">
                                        <i class="bx bx-check me-1 align-middle"></i>修改
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
        <!--修改排放源 end-->

        <!--新增排放源-->
        <form id="emissionData">
            @csrf
            <div class="modal fade create-data" id="create-data" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myExtraLargeModalLabel">新增排放源數據</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mt-5 mt-lg-0">
                                        <div class="card">
                                            <div class="card-header bg-transparent border-bottom py-3 px-4">
                                                <h5 class="font-size-16 mb-0">排放源鑑別</h5>
                                            </div>                                            
                                            <div class="card-body p-4 pt-2">
                                                <div class="table-responsive">
                                                    <input class="form-control" type="hidden" id="emission_id" name="emission_id" value="1">
                                                    <table class="table mb-0 font-size-16">
                                                        <tbody>
                                                            <tr align="left">
                                                                <td><b>活動/設備：</b></td>
                                                                <td id="data_device_id"></td>
                                                                <td><b>製程名稱：</b></td>
                                                                <td id="data_process_id"></td>
                                                            </tr>
                                                            <tr align="left">
                                                                <td><b>排放源/燃料物：</b></td>
                                                                <td id="data_fuel"></td>
                                                                <td><b>排放源形式：</b></td>
                                                                <td id="data_source_id"></td>
                                                            </tr>
                                                            <tr align="left">
                                                                <td><b>電力類型：</b></td>
                                                                <td id="data_electricity_type"></td>
                                                                <td><b>電力來源：</b></td>
                                                                <td>台灣電力公司</td>
                                                            </tr>
                                                            <tr align="left">
                                                                <td><b>範疇：</b></td>
                                                                <td id="data_scope_id"></td>
                                                                <td><b>ISO14064排放源類別：</b></td>
                                                                <td id="data_iso16064_id"></td>
                                                            </tr>
                                                            <tr align="left">
                                                                <td><b>GHG Protocol排放源類別：</b></td>
                                                                <td id="data_ghg_id"></td>
                                                                <td><b>備註：</b></td>
                                                                <td id="data_text"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- end table-responsive -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table align-middle mb-0 mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>期間</th>
                                                            <th>排放源</th>
                                                            <th>活動數據種類</th>
                                                            <th>活動數據</th>
                                                            <th>單位</th>
                                                            <th>排放當量</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1年</td>
                                                            <td>
                                                                <div>
                                                                    <h5 class="text-truncate font-size-16" id="data_device_item"></h5>
                    
                                                                    <p class="mb-0 mt-1">排放源/燃料物 : <span class="fw-medium" id="data_fuel_item"></span></p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <select class="form-select"  id="value_type" name="value_type" required >
                                                                    <option value="1" selected>自動連續量測</option>
                                                                    <option value="2">間接量測</option>
                                                                    <option value="3">自行量測</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <input class="form-control" type="number" name="value" value="0" id="value" required>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <select class="form-select"  id="unit" name="unit" required >
                                                                    <option value="公升" selected>公升</option>
                                                                    <option value="公噸" selected>公噸</option>
                                                                </select>
                                                            </td>
                                                            <td><input class="form-control" type="text" name="emission_value" value="" id="emission_value" readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                    
                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i
                                            class="bx bx-x me-1 align-middle"></i>取消</button>
                                    <button type="sumbit" class="btn btn-success" id="btn_create_data">
                                        <i class="bx bx-check me-1 align-middle"></i>儲存
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

                var scopes = @json($scopes);
                var devices = @json($devices);
                var iso14064s = @json($iso14064s);
                var proces = @json($proces);
                var sources = @json($sources);
                var ghgProtocols = @json($ghgProtocols);

                $('#btn_create').on('click', function(e) {
                    e.preventDefault();

                    // 初始化变量，以跟踪是否有任何空的 required 字段
                    var isValid = true;

                    // 检查所有 required 属性的输入字段是否已填写
                    $('#emissionForm input, #emissionForm select').each(function() {
                        if ($(this).prop('required') && !$(this).val()) {
                            alert('请填寫所有必填字段！');
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
                    $('#emissionForm').serializeArray().map(function(item) {
                        formData[item.name] = item.value;
                    });


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
                            content += '<a href="#" alt="'+ data.id +'" data-bs-toggle="modal" data-bs-target=".create-data" data-bs-placement="top" title="data" class="px-2 text-danger edit_data"><i class="mdi mdi-chart-bar font-size-20"></i></a>';
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

                // 将 #btn_edit 的点击事件监听器移动到外部
                $(document).on('click', '.edit_emission', function(e) {
                    e.preventDefault();

                    // 获取存储在按钮data-id属性中的编辑项ID
                    var editId = $(this).attr('alt');
                    console.log(editId);
                    // 使用editId进行后续操作
                    $('#edit_ghg_id').attr('id', 'edit_ghg_id'+editId);;
                    $("#edit_device_id").attr('id', 'edit_device_id'+editId);
                    $("#edit_process_id").attr('id', 'edit_process_id'+editId);
                    $("#edit_fuel").attr('id', 'edit_fuel'+editId);
                    $("#edit_electricity_type").attr('id', 'edit_electricity_type'+editId);
                    $("#edit_electricity_source").attr('id', 'edit_electricity_source'+editId);
                    $("#edit_scope_id").attr('id', 'edit_scope_id'+editId);
                    $("#edit_iso16064_id").attr('id', 'edit_iso16064_id'+editId);
                    $("#edit_source_id").attr('id', 'edit_source_id'+editId);
                    $("#edit_text").attr('id', 'edit_text'+editId);

                    // 构建动态URL
                    var url = "{{ route('emission.edit', ':id') }}";
                    url = url.replace(':id', editId);

                    $.ajax({
                        type: 'GET', // 一般来说，编辑操作通常是GET请求，而不是POST
                        url: url,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            console.log(data);
                            $("#edit_device_id"+editId).val(data.device_id);
                            $("#edit_process_id"+editId).val(data.process_id);
                            $("#edit_fuel"+editId).val(data.fuel);
                            $("#edit_electricity_type"+editId).val(data.electricity_type);
                            $("#edit_electricity_source"+editId).val(data.electricity_source);
                            $("#edit_scope_id"+editId).val(data.scope_id);
                            $("#edit_iso16064_id"+editId).val(data.iso16064_id);
                            $("#edit_ghg_id"+editId).val(data.ghg_id);
                            $("#edit_source_id"+editId).val(data.source_id);
                            $("#edit_text"+editId).val(data.text);
                            old_scope_id = data.scope_id;

                            // console.log($("#edit_scope_id"+editId).val());

                            if($("#edit_scope_id"+editId).val() == 2){
                                $(".scope2_div").show(300);
                            }else{
                                $(".scope2_div").hide(300);
                            }

                            $("#edit_scope_id"+editId).change(function() {
                                var scope_editId = $(this).val();
                                if(scope_editId == 2){
                                    $(".scope2_div").show(300);
                                }else{
                                    $(".scope2_div").hide(300);
                                }
                                $.ajax({
                                    type: 'GET',  // 请求方法
                                    url: "{{ route('iso14064.datas') }}",  // 请求 URL
                                    data: {'scope_id': scope_editId},
                                    // 要发送的数据
                                    success: function(data) {
                                        // 请求成功时的处理
                                        $("#edit_iso16064_id"+editId).html(data);
                                        $("#edit_iso16064_id"+editId).trigger('change');
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        // 请求失败时的处理
                                        console.error('Error:', textStatus, errorThrown);
                                    }
                                });
                            });

                            $("#edit_iso16064_id"+editId).change(function() {
                                var iso16064_id = $(this).val();
                                console.log(iso16064_id+'111');
                                $.ajax({
                                    type: 'GET',  // 请求方法
                                    url: "{{ route('ghg.datas') }}",  // 请求 URL
                                    data: {'iso16064_id': iso16064_id},
                                    // 要发送的数据
                                    success: function(data) {
                                        // 请求成功时的处理
                                        $("#edit_ghg_id"+editId).html(data);
                                        console.log(data);
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        // 请求失败时的处理
                                        console.error('Error:', textStatus, errorThrown);
                                    }
                                });
                            });

                            $('#btn_edit').off('click').on('click', function(e) {

                                $('#edit-source').modal('hide');
                                e.preventDefault();

                                // 收集表单数据
                                var formData = {};
                                $('#emissionFormEdit').serializeArray().map(function(item) {
                                    formData[item.name] = item.value;
                                });

                                // 检查editId和scope_id是否已经定义
                                // ...

                                var url = "{{ route('emission.update', ':id') }}";
                                url = url.replace(':id', editId);

                                // 发送 Ajax 请求来更新数据
                                $.ajax({
                                    type: 'PUT',
                                    url: url,
                                    data: formData,
                                    success: function(data) {

                                        var row = $('#emissionTable-' + data.scope_id + ' tr[data-row-id="' + editId + '"]');
                                        if (old_scope_id != data.scope_id) {
                                            var oldRow = $('#emissionTable-' + old_scope_id + ' tr[data-row-id="' + editId + '"]');
                                        console.log('#emissionTable-' + old_scope_id + ' tr[data-row-id="' + editId + '"]');

                                            oldRow.remove();
                                            
                                            // 在新的scope_id下添加一行
                                            var rowCount = $('#emissionTable-' + data.scope_id + ' tbody tr').length + 1;
                                            var content1 = '';
                                            content1 += '<tr data-row-id="'+ editId +'" align="center">';
                                            content1 += '<th>'+ rowCount +'</th>';
                                            //設備
                                            $.each(devices, function(index, device) {
                                                if (device.id == data.device_id) {
                                                    // 在找到匹配的scope时构建content
                                                    content1 += '<td width="20%">' + device.name + '</td>';
                                                }
                                            });
                                            content1 += '<td>' + data.fuel + '</td>';
                                            //排放源形式
                                            $.each(sources, function(index, source) {
                                                if (source.id == data.source_id) {
                                                    // 在找到匹配的scope时构建content1
                                                    content1 += '<td>' + source.name + '</td>';
                                                }
                                            });
                                            //iso14064
                                            $.each(iso14064s, function(index, iso14064) {
                                                if (iso14064.id == data.iso16064_id) {
                                                    // 在找到匹配的scope时构建content1
                                                    content1 += '<td>' + iso14064.name + '</td>';
                                                }
                                            });
                                            //ghgProtocol
                                            $.each(ghgProtocols, function(index, ghgProtocol) {
                                                if (ghgProtocol.id == data.ghg_id) {
                                                    console.log(ghgProtocol);
                                                    // 在找到匹配的scope时构建content1
                                                    content1 += '<td>' + ghgProtocol.name + '</td>';
                                                }
                                            });
                                            content1 += '<td>是</td>';
                                            content1 += '<td>';
                                            content1 += '<ul class="list-inline mb-0">';
                                            content1 += '<li class="list-inline-item">';
                                            content1 += ' <a href="#" alt="'+ editId +'" data-bs-toggle="modal" data-bs-target=".edit-source" data-bs-placement="top" title="Edit" class="px-2 text-primary edit_emission"><i class="mdi mdi-pencil font-size-20"></i></a>';
                                            content1 += '</li>';
                                            content1 += '<li class="list-inline-item">';
                                            content1 += '<a href="#" alt="'+ editId +'" data-bs-toggle="modal" data-bs-target=".create-data" data-bs-placement="top" title="data" class="px-2 text-danger edit_data"><i class="mdi mdi-chart-bar font-size-20"></i></a>';
                                            content1 += '</li>';
                                            content1 += '</ul>';
                                            content1 += '</td>';
                                            content1 += '</tr>';

                                            $('#emissionTable-' + data.scope_id + ' tbody').append(content1);
                                            
                                            // 重新计算舊所有行的rowcount
                                            $('#emissionTable-' + old_scope_id + ' tbody tr').each(function(index) {
                                                $(this).find('th').first().text(index + 1);
                                            });
                                        } else {
                                            var row = $('#emissionTable-' + data.scope_id + ' tr[data-row-id="' + editId + '"]');
                                            
                                            
                                            $.each(devices, function(index, device) {
                                                if (device.id == data.device_id) {
                                                    if(data.device_id) row.find('td[data-field="device"]').text(device.name);
                                                }
                                            });
                                            $.each(sources, function(index, source) {
                                                if (source.id == data.source_id) {
                                                    if(data.source_id) row.find('td[data-field="source"]').text(source.name);
                                                }
                                            });
                                            //iso14064
                                            $.each(iso14064s, function(index, iso14064) {
                                                if (iso14064.id == data.iso16064_id) {
                                                    if(data.iso16064_id) row.find('td[data-field="iso14064"]').text(iso14064.name);
                                                }
                                            });
                                            //ghgProtocol
                                            $.each(ghgProtocols, function(index, ghgProtocol) {
                                                if (ghgProtocol.id == data.ghg_id) {
                                                    if(data.ghg_id) row.find('td[data-field="ghg"]').text(ghgProtocol.name);
                                                }
                                            });
                                            if(data.fuel) row.find('td[data-field="fuel"]').text(data.fuel);
                                        }
                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                                
                            });
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                    $('#edit-source').on('hide.bs.modal', function (e) {
                        if (e.target === this) {
                            $("#edit_device_id"+editId).attr('id', 'edit_device_id');
                            $("#edit_process_id"+editId).attr('id', 'edit_process_id');
                            $("#edit_fuel"+editId).attr('id', 'edit_fuel');
                            $("#edit_electricity_type"+editId).attr('id', 'edit_electricity_type');
                            $("#edit_electricity_source"+editId).attr('id', 'edit_electricity_source');
                            $("#edit_scope_id"+editId).attr('id', 'edit_scope_id');
                            $("#edit_iso16064_id"+editId).attr('id', 'edit_iso16064_id');
                            $("#edit_ghg_id"+editId).attr('id', 'edit_ghg_id');
                        }
                    });
                });

                
                
                $(".scope2_div").hide();

                $("#create_scope_id").change(function() {
                    var scope_id = $(this).val();
                    if(scope_id == 2){
                        $(".scope2_div").show(300);
                    }else{
                        $(".scope2_div").hide(300);
                    }
                    $.ajax({
                        type: 'GET',  // 请求方法
                        url: "{{ route('iso14064.datas') }}",  // 请求 URL
                        data: {'scope_id': scope_id},
                          // 要发送的数据
                        success: function(data) {
                            // 请求成功时的处理
                            $("#create_iso16064_id").html(data);
                            $("#create_iso16064_id").trigger('change');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            // 请求失败时的处理
                            console.error('Error:', textStatus, errorThrown);
                        }
                    });
                });

                $("#create_iso16064_id").change(function() {
                    var iso16064_id = $(this).val();
                    console.log(iso16064_id+'111');
                    $.ajax({
                        type: 'GET',  // 请求方法
                        url: "{{ route('ghg.datas') }}",  // 请求 URL
                        data: {'iso16064_id': iso16064_id},
                        // 要发送的数据
                        success: function(data) {
                            // 请求成功时的处理
                            $("#create_ghg_id").html(data);
                            console.log(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            // 请求失败时的处理
                            console.error('Error:', textStatus, errorThrown);
                        }
                    });
                });

                $(document).on('click', '.edit_data', function(e) {
                    var dataId = $(this).attr('alt');

                    var url = "{{ route('emission.edit', ':id') }}";
                    url = url.replace(':id', dataId);

                    $.ajax({
                        type: 'GET', // 一般来说，编辑操作通常是GET请求，而不是POST
                        url: url,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            $.each(devices, function(index, device) {
                                if (device.id == data.device_id) {
                                    $("#data_device_id").html(device.name);
                                }
                            });
                            $.each(devices, function(index, device) {
                                if (device.id == data.device_id) {
                                    $("#data_device_item").html(device.name);
                                }
                            });
                            $.each(proces, function(index, process) {
                                if (process.id == data.process_id) {
                                    $("#data_process_id").html(process.description);
                                }
                            });
                            $("#data_fuel").html(data.fuel);
                            $("#data_fuel_item").html(data.fuel);
                            $("#emission_id").val(data.id);

                            if(data.electricity_type == 0){
                                electricity_name = "火力發電";
                            }else if(data.electricity_type == 1){
                                electricity_name = "水力發電";
                            }else if(data.electricity_type == 2){
                                electricity_name = "潮汐發電";
                            }else if(data.electricity_type == 3){
                                electricity_name = "風力發電";
                            }else if(data.electricity_type == 4){
                                electricity_name = "人力發電";
                            }else if(data.electricity_type == 5){
                                electricity_name = "電瓶發電";
                            }
                            
                            $("#data_electricity_type").html(electricity_name);
                            $("#data_electricity_source").html(data.electricity_source);
                            $.each(scopes, function(index, scope) {
                                if (scope.id == data.scope_id) {
                                    $("#data_scope_id").html(scope.name);
                                }
                            });
                            $.each(iso14064s, function(index, iso14064) {
                                if (iso14064.id == data.iso16064_id) {
                                    $("#data_iso16064_id").html(iso14064.name);
                                }
                            });
                            $.each(ghgProtocols, function(index, ghgProtocol) {
                                if (ghgProtocol.id == data.ghg_id) {
                                    $("#data_ghg_id").html(ghgProtocol.name);
                                }
                            });
                            $.each(sources, function(index, source) {
                                if (source.id == data.source_id) {
                                    $("#data_source_id").html(source.name);
                                }
                            });
                            $("#data_text").html(data.text);

                            var url = "{{ route('emission_item.edit', ':id') }}";
                            url = url.replace(':id', data.id);
                            $.ajax({
                                type: 'GET',
                                url: url,
                                data:{
                                    'emission_id':data.id,
                                },
                                success: function(data) {
                                    if (Object.keys(data).length > 0) {
                                        // 对象有值（属性）
                                        $("#value_type").val(data.value_type);
                                        $("#value").val(data.value);
                                        $("#unit").val(data.unit);
                                        $("#emission_value").val(data.emission_value);
                                    } else {
                                        $("#value").val(0);
                                        $("#emission_value").val(0);
                                    }
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });         

                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });

                $('#btn_create_data').on('click', function(e) {
                    e.preventDefault();

                    // 初始化变量，以跟踪是否有任何空的 required 字段
                    var isValid = true;
                    
                    // 检查所有 required 属性的输入字段是否已填写
                    $('#emissionData input, #emissionData select').each(function() {
                        if ($(this).prop('required') && !$(this).val()) {
                            alert('请填寫所有必填字段！');
                            isValid = false;
                            return false; // 退出循环
                        }
                    });

                    // 如果有空的 required 字段，则停止提交
                    if (!isValid) {
                        return;
                    }

                    //判斷是否有取的數據
                    //收集表单数据
                    var formData = {};
                    $('#emissionData').serializeArray().map(function(item) {
                        formData[item.name] = item.value;
                    });
                    console.log(formData);

                    var emission_id = $("#emission_id").val();
                    console.log(emission_id);
                    var url = "{{ route('emission_item.update', ':id') }}";
                    url = url.replace(':id', emission_id);
                    // 关闭模态框
                    $.ajax({
                        type: 'PUT',
                        url: url,
                        data:formData,
                        success: function(data) {
                            console.log(data);
                            $('#create-data').modal('hide');
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });           
                });
                
                $("#value").change(function() {
                    var value = $(this).val();
                    $("#emission_value").val(value);
                });

                $("#value").on('input', function() {
                    var value = $(this).val();
                    $("#emission_value").val(value);
                });


            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        });
        </script>

        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    @endsection