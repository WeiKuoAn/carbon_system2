@extends('layouts.master')
@section('title')
    商業服務業-編輯內容
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}">
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    商業服務業-編輯內容【{{ $project->user_data->name }}】
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
    <!--  successfully modal  -->
    <div id="success-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
    data-bs-scroll="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <i class="bx bx-check-circle display-1 text-success"></i>
                    <h4 class="mt-3">編輯【{{ $project->user_data->name }}】商業服務業資料成功！</h4>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <form action="{{ route('business-export-word.store',$project->user_id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab">
                                    <span>企業資料</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tabpane2" role="tab">
                                    <span>計畫綱要</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tabpane3" role="tab">
                                    <span>計畫構想</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                                    <span>人事與被帶動企業</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#post" role="tab">
                                    <span>執行時程</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tabpane6" role="tab">
                                    <span>預期效益</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tabpane7" role="tab">
                                    <span>經費需求</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content">
                    <!----客戶基本資料---->
                    <div class="tab-pane active" id="overview" role="tabpanel">
                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h2>客戶基本資料</h2>
                                    </div>
                                    <div class="row">'
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>客戶名稱</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" value="{{ $cust_data->user_data->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>公司統編</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="registration_no" value="{{ $cust_data->registration_no }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>成立日期</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="create_date"  @if(isset($word_data)) value="{{ $word_data->create_date }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>是否為新創</b><span class="text-danger">*</span></label>
                                                <select class="mobile form-select" name="startup">
                                                    <option value="">請選擇...</option>
                                                    <option value="是" @if(isset($word_data)) @if($word_data->startup == "是") selected @endif @endif>是</option>
                                                    <option value="否 "@if(isset($word_data)) @if($word_data->startup == "否") selected @endif @endif>否</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>企業網址</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="website" @if(isset($word_data)) value="{{ $word_data->website }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>企業負責人</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="principal_name" value="{{ $cust_data->principal_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>負責人職稱</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="principal_job" @if(isset($word_data)) value="{{ $word_data->principal_job }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>負責人性別</b><span class="text-danger">*</span></label>
                                                <select class="mobile form-select" name="principal_sex">
                                                    <option value="" >請選擇...</option>
                                                    <option value="男"  @if(isset($word_data)) @if($word_data->principal_sex == "男") selected @endif @endif>男</option>
                                                    <option value="女"  @if(isset($word_data)) @if($word_data->principal_sex == "女") selected @endif @endif>女</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>企業電話</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="mobile"  @if(isset($word_data)) value="{{ $word_data->mobile }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>企業傳真</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="fax" @if(isset($word_data)) value="{{ $word_data->fax }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="AddNew-Phone">員工人數<span class="text-danger">*</span></label>
                                            <div class="mb-4">
                                                <input type="number" class="form-control required-input" placeholder="總投保人數" name="insurance_total"  id="insurance_total"  value="{{ $cust_data->insurance_total }}" >
                                            </div>
                                        </div>
                                        <label class="form-label" for="AddNew-Phone"><b>公司工廠登記地址</b>(若有超過一間工廠，請選一間工廠作為標的)<span class="text-danger">*</span></label>
                                        <div class="col-md-6 mb-3">
                                            <div class="row twzipcode mb-2">
                                                <select data-role="county" data-value="{{ $cust_data->county }}" selected></select>
                                                <select data-role="district"  data-value="{{ $cust_data->district }}"></select>
                                                <select data-role="zipcode"  data-value="{{ $cust_data->zipcode }}"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="address" value="{{ $cust_data->address }}" >
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Phone"><b>主要營業項目</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="business_activities" @if(isset($word_data))  value="{{ $word_data->business_activities }}" @else value="0" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Phone"><b>產業領域別</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="industry_category" @if(isset($word_data))  value="{{ $word_data->industry_category }}" @else value="0" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Phone"><b>去年整年度營業額（單位：元/新台幣）</b><span class="text-danger">*</span></label>
                                                <input type="number" class="form-control required-input" name="last_year_revenue" @if(isset($project)) value="{{ $cust_data->last_year_revenue }}" @else value="0" @endif>
                                            </div>
                                        </div>
                                        
                                        <hr>

                                        <div class="col-md-12">
                                            <label class="form-label" for="AddNew-Username"><b>企業簡介</b><span class="text-danger">*</span></label>
                                            <textarea class="form-control"  rows="5" name="introduction">@if(isset($word_data)){{ $word_data->introduction }}@endif</textarea>
                                            {{-- <textarea id="ckeditor-classic" name="editorContent">@if(isset($word)){{ $word->text }}@endif</textarea> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----客戶基本資料結束---->

                    <!----提案計畫綱要---->
                    <div class="tab-pane" id="tabpane2" role="tabpane1">
                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h2>提案計畫綱要</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>計畫名稱</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="project_name" @if(isset($word_data)) value="{{ $word_data->project_name }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>計畫開始</b><span class="text-danger">*</span></label>
                                                <input type="date" class="form-control required-input" name="project_start" @if(isset($word_data)) value="{{ $word_data->project_start }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>計畫結束</b><span class="-danger">*</span></label>
                                                <input type="date" class="form-control required-input" name="project_end" @if(isset($word_data)) value="{{ $word_data->project_end }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>總經費</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="total" @if(isset($word_data)) value="{{ $word_data->total }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>補助款</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="subsidy" @if(isset($word_data)) value="{{ $word_data->subsidy }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>自籌款</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="self_funding" @if(isset($word_data)) value="{{ $word_data->self_funding }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="AddNew-Username"><b>計畫內容摘要</b><span class="text-danger">*</span></label>
                                            <div class="mb-4">
                                                <textarea class="form-control" rows="5" name="project_summary">@if(isset($word_data)){{ $word_data->project_summary }}@endif</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>委託單位</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" name="partner" @if(isset($word_data)) value="{{ $word_data->partner }}"  @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----提案計畫綱要結束---->

                    <!----計畫構想---->
                    <div class="tab-pane" id="tabpane3" role="tabpane3">
                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h2>計畫構想</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label" for="AddNew-Username"><b>（一）企業面臨問題</b><span class="text-danger">*</span></label>
                                            <div class="mb-4">
                                                <textarea class="form-control"  rows="8" name="face">@if(isset($word_data)){{ $word_data->face }}@endif</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="AddNew-Username"><b>（二）待精進/成長之面向</b><span class="text-danger">*</span></label>
                                            <div class="mb-4">
                                                <textarea class="form-control"  rows="8" name="growth_face">@if(isset($word_data)){{ $word_data->growth_face }}@endif</textarea>
                                            </div>
                                        </div>

                                        <div class="text-center mt-3 mb-3">
                                            <h2>智慧減碳服務應用情境與模式說明</h2>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label" for="AddNew-Username"><b>（一）計畫導入前後服務情境（AS-IS & TO-BE）</b><span class="text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table id="question" class="table question-list">
                                                            <tbody valign="center" align="left">
                                                                @if(count($project->word_question_datas)>0)
                                                                    @foreach ($project->word_question_datas as $key=>$word_question_data)
                                                                        <tr id="row-{{ $key }}" >
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">問題{{$key+1}}：</label>
                                                                                    <textarea class="form-control" rows="4" name="questions[]">{{ $word_question_data->question }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">導入解方{{$key+1}}：</label>
                                                                                    <textarea class="form-control" rows="4" name="solutions[]">{{ $word_question_data->solution }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">導入解方{{$key+1}}說明：</label>
                                                                                    <textarea class="form-control" rows="4" name="illustrates[]">{{ $word_question_data->illustrate }}</textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                    @endforeach
                                                                @else
                                                                    @for ($i = 0; $i < 1; $i++)
                                                                            <tr id="row-{{ $i }}" >
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">問題{{$i+1}}：</label>
                                                                                    <textarea class="form-control" rows="4" name="questions[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">導入解方{{$i+1}}：</label>
                                                                                    <textarea class="form-control" rows="4" name="solutions[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">導入解方{{$i+1}}說明：</label>
                                                                                    <textarea class="form-control" rows="4" name="illustrates[]"></textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endfor
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div> <!-- end .table-responsive -->
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                        <input id="add_question" class="btn btn-primary" type="button" name="" value="新增問題">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label" for="AddNew-Username"><b>（二）智慧應用方案說明</b><span class="text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table id="plan" class="table plan-list">
                                                            <thead>
                                                                <tr align="center">
                                                                    <th width="16%">智慧應用<br>方案項目名稱</th>
                                                                    <th width="52%">功能說明</th>
                                                                    <th width="16%">預計應用<br>之減碳項目</th>
                                                                    <th width="16%">執行方式<br>（自建/委外）</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody valign="center" align="left">
                                                                @if(count($project->word_plan_datas)>0)
                                                                    @foreach ($project->word_plan_datas as $key=>$word_plan_data)
                                                                        <tr id="row-{{ $key }}" >
                                                                            <td>
                                                                                <textarea class="form-control" rows="10" name="plan_name[]">{{ $word_plan_data->name }}</textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="10" name="plan_description[]">{{ $word_plan_data->description }}</textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="10" name="plan_reduction_item[]">{{ $word_plan_data->reduction_item }}</textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="10" name="plan_method[]">{{ $word_plan_data->method }}</textarea>
                                                                            </td>
                                                                            <td style="vertical-align: middle;">
                                                                                <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    @for ($i = 0; $i < 1; $i++)
                                                                            <tr id="row-{{ $i }}" >
                                                                                <td>
                                                                                    <textarea class="form-control" rows="10" name="plan_name[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="10" name="plan_description[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="10" name="plan_reduction_item[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="10" name="plan_method[]"></textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endfor
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div> <!-- end .table-responsive -->
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                        <input id="add_plan" class="btn btn-primary" type="button" name="" value="新增方案">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----計畫構想結束---->
                    <div class="tab-pane" id="messages" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h2>人事資料</h2>
                                    <p class="font-size-20 text-danger">所有人員皆須在勞保投保明細中</p>
                                </div>
                                <div class="row">
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">計畫主持人資料（計畫主持人需在公司為有營運決策權的專任人員）</h5>
                                    <div class="col-md-4">
                                        <label class="form-label" for="AddNew-Phone"><b>姓名</b></label>
                                        <input type="text" class="form-control required-input" name="host_name" @if(isset($project_host_data)) value="{{ $project_host_data->name }}" @endif>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="AddNew-Username"><b>部門</b></label>
                                        <input type="text" class="form-control required-input" name="host_department" @if(isset($project_host_data)) value="{{ $project_host_data->department }}" @endif>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="AddNew-Username"><b>職稱</b></label>
                                        <input type="text" class="form-control required-input" name="host_job" @if(isset($project_host_data)) value="{{ $project_host_data->job }}" @endif >
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>工作內容</b></label>
                                        <input type="text" class="form-control required-input" name="host_context" @if(isset($project_host_data)) value="{{ $project_host_data->context }}" @endif>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>電話(含分機)</b></label>
                                        <input type="text" class="form-control required-input" name="host_mobile" @if(isset($project_host_data)) value="{{ $project_host_data->mobile }}" @endif >
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>手機</b></label>
                                        <input type="text" class="form-control required-input" name="host_phone" @if(isset($project_host_data)) value="{{ $project_host_data->phone }}" @endif>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>信箱</b></label>
                                        <input type="text" class="form-control required-input" name="host_email" @if(isset($project_host_data)) value="{{ $project_host_data->email }}" @endif >
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>人月</b></label>
                                        <input type="text" class="form-control required-input" name="host_month" @if(isset($project_host_data)) value="{{ $project_host_data->month }}" @endif >
                                    </div>
                                    

                                    <hr class="mt-4 mb-4">

                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">計畫聯絡人資料</h5>
                                    <div class="col-md-4">
                                        <label class="form-label" for="AddNew-Phone"><b>姓名</b></label>
                                        <input type="text" class="form-control required-input" name="contact_name" @if(isset($project_contact_data)) value="{{ $project_contact_data->name }}" @endif>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="AddNew-Username"><b>部門</b></label>
                                        <input type="text" class="form-control required-input" name="contact_department" @if(isset($project_contact_data)) value="{{ $project_contact_data->department }}" @endif>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="AddNew-Username"><b>職稱</b></label>
                                        <input type="text" class="form-control required-input" name="contact_job" @if(isset($project_contact_data)) value="{{ $project_contact_data->job }}" @endif >
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>工作內容</b></label>
                                        <input type="text" class="form-control required-input" name="contact_context" @if(isset($project_contact_data)) value="{{ $project_contact_data->context }}" @endif>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>電話(含分機)</b></label>
                                        <input type="text" class="form-control required-input" name="contact_mobile" @if(isset($project_contact_data)) value="{{ $project_contact_data->mobile }}" @endif >
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>手機</b></label>
                                        <input type="text" class="form-control required-input" name="contact_phone" @if(isset($project_contact_data)) value="{{ $project_contact_data->phone }}" @endif>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>信箱</b></label>
                                        <input type="text" class="form-control required-input" name="contact_email" @if(isset($cust_data)) value="{{ $cust_data->receive_email }}" @endif >
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>人月</b></label>
                                        <input type="text" class="form-control required-input" name="contact_month" @if(isset($project_contact_data)) value="{{ $project_contact_data->month }}" @endif >
                                    </div>
                                    <hr class="mt-4 mb-4">

                                    <div class="col-md-12 mt-3">
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">人事名單（不含主持人及聯絡人，需再提供5-7位。因配合計畫申請，故薪資部分不一定會按填寫的實際薪資做編列））</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="preson" class="table preson-list">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>編號</th>
                                                                <th>姓名<span class="text-danger">*</span></th>
                                                                <th>部門<span class="text-danger">*</span></th>
                                                                <th>職稱<span class="text-danger">*</span></th>
                                                                <th>工作內容<span class="text-danger">*</span></th>
                                                                <th>薪資<span class="text-danger">*</span></th>
                                                                <th>人月<span class="text-danger">*</span></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody valign="center" align="center">
                                                            @if(count($project->personnel_datas)>0)
                                                                @foreach ($project->personnel_datas as $key=>$personnel_data)
                                                                    <tr id="row-{{ $key }}" >
                                                                        <td>{{$key+1}}</td>
                                                                        <td>
                                                                            <input class="mobile form-control required-input" type="text" name="personnel_names[]" value="{{ $personnel_data->name }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="personnel_departments[]" value="{{ $personnel_data->department }}">
                                                                        </td>
                                                                        <td>
                                                                        <input id="pay_price-{{ $key }}" class="mobile form-control required-input" type="text" name="personnel_jobs[]" value="{{ $personnel_data->job }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $key }}" class="mobile form-control required-input" type="text" name="personnel_contexts[]" value="{{ $personnel_data->context }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $key }}" class="mobile form-control required-input" type="text" name="personnel_salarys[]" value="{{ $personnel_data->salary }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $key }}" class="mobile form-control required-input" type="text" name="personnel_months[]" value="{{ $personnel_data->month }}">
                                                                        </td>
                                                                        <td>
                                                                            <button class="mobile btn btn-danger del-row" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                @for ($i = 0; $i < 1; $i++)
                                                                    <tr id="row-{{ $i }}" >
                                                                        <td>{{$i+1}}</td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="personnel_names[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="personnel_departments[]" value="">
                                                                        </td>
                                                                        <td>
                                                                        <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="personnel_jobs[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="personnel_salarys[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="personnel_contexts[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="personnel_months[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                        </td>
                                                                    </tr>
                                                                @endfor
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end .table-responsive -->
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                    <input id="add_preson" class="btn btn-primary" type="button" name="" value="新增筆數">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">資服業者</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="partner" class="table partner-list">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>編號</th>
                                                                <th>企業名稱<span class="text-danger">*</span></th>
                                                                <th>主要工作項目<span class="text-danger">*</span></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody valign="center" align="center">
                                                            @if(count($project->word_partner_datas)>0)
                                                                @foreach ($project->word_partner_datas as $key=>$partner_data)
                                                                    <tr id="row-{{ $key }}" >
                                                                        <td>{{$key+1}}</td>
                                                                        <td>
                                                                            <input class="mobile form-control required-input" type="text" name="partner_names[]" value="{{ $partner_data->name }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="partner_jobs[]" value="{{ $partner_data->job_content }}">
                                                                        </td>
                                                                        <td>
                                                                            <button class="mobile btn btn-danger del-row" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                @for ($i = 0; $i < 1; $i++)
                                                                    <tr id="row-{{ $i }}" >
                                                                        <td>{{$i+1}}</td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="partner_names[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="partner_jobs[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                        </td>
                                                                    </tr>
                                                                @endfor
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end .table-responsive -->
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                    <input id="add_partner" class="btn btn-primary" type="button" name="" value="新增筆數">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h2>五家被帶動的企業</h2>
                                    <p class="font-size-18">申請計畫使用</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-3">
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">企業名單(需至少提供5家被帶動企業)</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="branch" class="table branch-list">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>編號</th>
                                                                <th>上游/下游企業<span class="text-danger">*</span></th>
                                                                <th>名稱<span class="text-danger">*</span></th>
                                                                <th>品牌名稱<span class="text-danger">*</span></th>
                                                                <th>負責人<span class="text-danger">*</span></th>
                                                                <th>產業別<span class="text-danger">*</span></th>
                                                                <th>縣市別<span class="text-danger">*</span></th>
                                                                <th>員工數<span class="text-danger">*</span></th>
                                                                <th>統一編號<span class="text-danger">*</span></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody valign="center" align="center">
                                                            @if(count($project->drive_datas)>0)
                                                                @foreach ($project->drive_datas as $key=>$drive_data)
                                                                    <tr id="row-{{ $key }}" >
                                                                        <td>{{$key+1}}</td>
                                                                        <td>
                                                                            <select id="pay_date-{{ $key }}" class="mobile form-select" name="drive_types[]">
                                                                                <option value="NULL"  @if($drive_data->type == "NULL") selected @endif>請選擇...</option>
                                                                                <option value="0" @if($drive_data->type == 0) selected @endif>上游</option>
                                                                                <option value="1" @if($drive_data->type == 1) selected @endif>下游</option>
                                                                                <option value="2" @if($drive_data->type == 2) selected @endif>合作夥伴</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_names[]" value="{{ $drive_data->name }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_brand_names[]" value="{{ $drive_data->brand_name }}">
                                                                        </td>
                                                                        <td>
                                                                        <input id="pay_price-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_principals[]" value="{{ $drive_data->principal }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_industrys[]" value="{{ $drive_data->industry }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_citys[]" value="{{ $drive_data->city }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_employeecounts[]" value="{{ $drive_data->employeecount }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_numbers[]" value="{{ $drive_data->numbers }}">
                                                                        </td>
                                                                        <td>
                                                                            <button class="mobile btn btn-danger del-row" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    <tr id="row-{{ $i }}" >
                                                                        <td>{{$i+1}}</td>
                                                                        <td>
                                                                            <select id="pay_date-{{ $i }}" class="mobile form-select" name="drive_types[]">
                                                                                <option value="" selected>請選擇...</option>
                                                                                <option value="0">上游</option>
                                                                                <option value="1">下游</option>
                                                                                <option value="2">合作夥伴</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_names[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_brand_names[]" value="">
                                                                        </td>
                                                                        <td>
                                                                        <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_principals[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_industrys[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_citys[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_employeecounts[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_numbers[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                        </td>
                                                                    </tr>
                                                                @endfor
                                                            @endif    
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end .table-responsive -->
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                    <input id="add_branch" class="btn btn-primary" type="button" name="" value="新增筆數">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 mb-3">
                                        <label class="form-label" for="AddNew-Username"><b>與提案單位之關係</b></label>
                                        <input type="text" class="form-control required-input" name="organization_relationship" @if(isset($word_data)) value="{{ $word_data->organization_relationship }}" @endif >
                                    </div> --}}
                                    <div class="col-md-12">
                                        <label class="form-label" for="AddNew-Username"><b>導入或運用之智慧應用方案</b></label>
                                        <div class="mb-4">
                                            <textarea class="form-control" col="3" rows="4" name="application_solution">@if(isset($word_data)){{ $word_data->application_solution }}@endif</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----執行時程---->
                    <div class="tab-pane" id="post" role="tabpanel">
                        <div class="tab-pane" id="tabpane3" role="tabpane3">
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <h2>執行時程</h2>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label" for="AddNew-Username"><b>一、預定進度</b><span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="planned" class="table planned-list">
                                                                <tbody valign="center" align="left">
                                                                    @if(count($project->word_planned_datas)>0)
                                                                        @foreach ($project->word_planned_datas as $key=>$word_planned_data)
                                                                            <tr id="row-{{ $key }}" >
                                                                                <td width="90%">
                                                                                    <textarea class="form-control" rows="2" name="planned_item[]">{{ $word_planned_data->item }}</textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        @for ($i = 0; $i < 1; $i++)
                                                                                <tr id="row-{{ $i }}" >
                                                                                    <td width="90%">
                                                                                        <textarea class="form-control" rows="2" name="planned_item[]"></textarea>
                                                                                    </td>
                                                                                    <td style="vertical-align: middle;">
                                                                                        <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endfor
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end .table-responsive -->
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                            <input id="add_planned" class="btn btn-primary" type="button" name="" value="新增進度">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label" for="AddNew-Username"><b>二、預定查核點</b><span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="form-label" for="AddNew-Username"><b>說明：</b><span class="text-danger">*</span></label>
                                                        <div class="mb-4">
                                                            <textarea class="form-control"  rows="4" name="checkpoint">@if(isset($word_data)){{ $word_data->checkpoint }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="plan" class="table plan-list">
                                                                <thead>
                                                                    <tr align="center">
                                                                        <th width="13%">工作項目</th>
                                                                        <th width="13%">全程預計<br>完成數</th>
                                                                        <th width="13%">期中查核點<br>（累計完成）</th>
                                                                        <th width="13%">期末查核點<br>（累計完成）</th>
                                                                        <th width="13%">占比<br>（%）</th>
                                                                        <th width="30%">查核資料</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody valign="center" align="left">
                                                                    @if(count($project->word_check_datas)>0)
                                                                        @foreach ($project->word_check_datas as $key=>$word_check_data)
                                                                            <tr id="row-{{ $key }}" style="vertical-align: middle;" align="center">
                                                                                <td>
                                                                                    <textarea class="form-control" rows="2" name="check_item[]">{{  $word_check_data->item }}</textarea>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="2" name="check_estimated[]">{{ $word_check_data->estimated }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="2" name="check_midterm_checkpoint[]">{{ $word_check_data->midterm_checkpoint }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="2" name="check_final_checkpoint[]">{{ $word_check_data->final_checkpoint }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="2" name="check_proportion[]">{{ $word_check_data->proportion }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="2" name="check_audit_data[]">{{ $word_check_data->audit_data }}</textarea>
                                                                                </td>
                                                                                {{-- <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td> --}}
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        @for ($i = 0; $i < 4; $i++)
                                                                                <tr id="row-{{ $i }}" style="vertical-align: middle;" align="center">
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="2" name="check_item[]">{{ $checks[$key] }}</textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="2" name="check_estimated[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="2" name="check_midterm_checkpoint[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="2" name="check_final_checkpoint[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="2" name="check_proportion[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="2" name="check_audit_data[]"></textarea>
                                                                                    </td>
                                                                                    {{-- <td style="vertical-align: middle;">
                                                                                        <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                    </td> --}}
                                                                                </tr>
                                                                            @endfor
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end .table-responsive -->
                                                        {{-- <div class="form-group row">
                                                            <div class="col-12">
                                                            <input id="add_check" class="btn btn-primary" type="button" name="" value="新增核點">
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!----預期效益---->
                    <div class="tab-pane" id="tabpane6" role="tabpanel">
                        <div class="tab-pane" id="tabpane3" role="tabpane3">
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <h2>預期效益</h2>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label" for="AddNew-Username"><b>（一）執行成效</b><span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="effectiveness" class="table effectiveness-list">
                                                                <thead>
                                                                    <tr align="center">
                                                                        <th width="20%">關鍵績效指標</th>
                                                                        <th width="20%">預期達成目標</th>
                                                                        <th width="60%">指標內涵定義</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody valign="center" align="left">
                                                                    @if(count($project->word_effectiveness_datas)>0)
                                                                        @foreach ($project->word_effectiveness_datas as $key=>$word_effectiveness_data)
                                                                            <tr id="row-{{ $key }}" >
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="effectiveness_kpis[]">{{ $word_effectiveness_data->kpi }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="effectiveness_goals[]">{{ $word_effectiveness_data->goal }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="effectiveness_definitions[]">{{ $word_effectiveness_data->definition }}</textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        @for ($i = 0; $i < 1; $i++)
                                                                                <tr id="row-{{ $i }}" >
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="8" name="effectiveness_kpis[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="8" name="effectiveness_goals[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="8" name="effectiveness_definitions[]"></textarea>
                                                                                    </td>
                                                                                    <td style="vertical-align: middle;">
                                                                                        <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endfor
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end .table-responsive -->
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                            <input id="add_effectiveness" class="btn btn-primary" type="button" name="" value="新增方案">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label" for="AddNew-Username"><b>（二）減碳項目</b><span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="reduction" class="table reduction-list">
                                                                <thead>
                                                                    <tr align="center">
                                                                        <th width="15%">減碳項目</th>
                                                                        <th width="15%">輔導前</th>
                                                                        <th width="15%">輔導後</th>
                                                                        <th width="15%">輔導前後差異</th>
                                                                        <th width="60%">減碳項目與碳排放量之關係</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody valign="center" align="left">
                                                                    @if(count($project->word_reduction_item_datas)>0)
                                                                        @foreach ($project->word_reduction_item_datas as $key=>$word_reduction_item_data)
                                                                            <tr id="row-{{ $key }}" >
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="reduction_item[]">{{ $word_reduction_item_data->item }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="reduction_before_guidance[]">{{ $word_reduction_item_data->before_guidance }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="reduction_after_guidance[]">{{ $word_reduction_item_data->after_guidance }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="reduction_difference[]">{{ $word_reduction_item_data->difference }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="reduction_relationship[]">{{ $word_reduction_item_data->relationship }}</textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        @for ($i = 0; $i < 1; $i++)
                                                                                <tr id="row-{{ $i }}" >
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="8" name="reduction_item[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="8" name="reduction_before_guidance[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="8" name="reduction_after_guidance[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="8" name="reduction_difference[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="8" name="reduction_relationship[]"></textarea>
                                                                                    </td>
                                                                                    <td style="vertical-align: middle;">
                                                                                        <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endfor
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end .table-responsive -->
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                            <input id="add_reduction" class="btn btn-primary" type="button" name="" value="新增方案">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label" for="AddNew-Username"><b>二、自訂績效指標 </b><span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="custom" class="table custom-list">
                                                                <thead>
                                                                    <tr align="center">
                                                                        <th width="15%">績效指標</th>
                                                                        <th width="15%">輔導前</th>
                                                                        <th width="15%">輔導後</th>
                                                                        <th width="60%">指標內涵釋義</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody valign="center" align="left">
                                                                    @if(count($project->word_custom_datas)>0)
                                                                        @foreach ($project->word_custom_datas as $key=>$word_custom_data)
                                                                            <tr id="row-{{ $key }}" >
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="custom_performance[]">{{ $word_custom_data->performance }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="custom_before_guidance[]">{{ $word_custom_data->before_guidance }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="custom_after_guidance[]">{{ $word_custom_data->after_guidance }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="custom_explanation[]">{{ $word_custom_data->explanation }}</textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        @for ($i = 0; $i < 1; $i++)
                                                                                <tr id="row-{{ $i }}" >
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="10" name="custom_performance[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="10" name="custom_before_guidance[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="10" name="custom_after_guidance[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="10" name="custom_explanation[]"></textarea>
                                                                                    </td>
                                                                                    <td style="vertical-align: middle;">
                                                                                        <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endfor
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end .table-responsive -->
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                            <input id="add_custom" class="btn btn-primary" type="button" name="" value="新增方案">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label" for="AddNew-Username"><b>三、其它效益</b><span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="benefit" class="table benefit-list">
                                                                <thead>
                                                                    <tr align="center">
                                                                        <th width="20%">項目</th>
                                                                        <th width="80%">效益</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody valign="center" align="left">
                                                                    @if(count($project->word_benefit_datas)>0)
                                                                        @foreach ($project->word_benefit_datas as $key=>$word_benefit_data)
                                                                            <tr id="row-{{ $key }}" >
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" name="benefit_item[]">{{ $word_benefit_data->item }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" name="benefit_benefit[]">{{ $word_benefit_data->benefit }}</textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        @for ($i = 0; $i < 1; $i++)
                                                                                <tr id="row-{{ $i }}" >
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="4" name="benefit_item[]"></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" rows="4" name="benefit_benefit[]"></textarea>
                                                                                    </td>
                                                                                    <td style="vertical-align: middle;">
                                                                                        <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endfor
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end .table-responsive -->
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                            <input id="add_benefit" class="btn btn-primary" type="button" name="" value="新增方案">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!----經費規劃表---->
                    <div class="tab-pane" id="tabpane7" role="tabpanel">
                        <div class="tab-pane" id="tabpane3" role="tabpane3">
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <h2>經費需求</h2>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label" for="AddNew-Username"><b>一、經費預算表</b><span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="question" class="table question-list" border="1" cellpadding="5" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2">會計科目</th>
                                                                        <th>補助款</th>
                                                                        <th>自籌款</th>
                                                                        <th>合計</th>
                                                                        <th>各科目佔總經費之比例%</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">1. 人事費</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_1" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_1 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_2" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_2 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_3" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_3 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_4" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_4 }}" @else value="0"  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">2. 消耗性器材及原材料費</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_5" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_5 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_6" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_6 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_7" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_7 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_8" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_8 }}" @else value="0"  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">3. 設備及軟體使用費</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_9" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_9 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_10" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_10 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_11" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_11 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_12" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_12 }}" @else value="0"  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">4. 設備維護費</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_13" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_13 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_14" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_14 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_15" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_15 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_16" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_16 }}" @else value="0"  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td rowspan="4" >5. 技術移轉費</td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>(1) 技術或智慧財產權購買費</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_17" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_17 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_18" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_18 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_19" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_19 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_20" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_20 }}" @else value="0" @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>(2) 委託研究費</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_21" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_21 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_22" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_22 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_23" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_23 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_24" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_24 }}" @else value="0" @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>(3) 委託勞務費</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_25" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_25 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_26" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_26 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_27" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_27 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_28" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_28 }}" @else value="0" @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td>小計</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_29" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_29 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_30" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_30 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_31" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_31 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_32" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_32 }}" @else value="0" @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">6. 差旅費</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_33" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_33 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_34" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_34 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_35" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_35 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_36" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_36 }}" @else value="0" @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">7. 市場驗證費</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_37" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_37 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_38" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_38 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_39" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_39 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_40" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_40 }}" @else value="0" @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">合計</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_41" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_41 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_42" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_42 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_43" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_43 }}" @else value="0" @endif></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">百分比</td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_44" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_44 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_45" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_45 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" name="fund_46" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_46 }}" @else value="0" @endif></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end .table-responsive -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="col-md-12">
                                                    <label class="form-label" for="AddNew-Username"><b>經費編列說明：</b><span class="text-danger">*</span></label>
                                                    <div class="mb-4">
                                                        <textarea class="form-control"  rows="4" name="fund_context">@if(isset($project->fund_data)){{ $project->fund_data->context }}@endif</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="row">

                    <div class="row mt-4 mb-2">
                        <div class="col text-center">
                            <a href="{{ route('user.project.index',$cust_data->user_id) }}">
                                <button type="button" class="btn btn-danger me-1" ><i class="bx bx-x me-1"></i> 回上一頁</button>
                            </a>
                            <button class="btn btn-success" type="submit" id="btn_storage"><i class="bx bx-file me-1"></i> 儲存 </button>
                            <a href="{{ route('exportWord',$cust_data->user_id) }}">
                                <button class="btn btn-primary" type="button" id="btn_submit"><i class=" bx bx-check me-1"></i> 匯出 </button>
                            </a>
                        </div> <!-- end col -->
                    </div>
                        

    </form>
    

                        </div> <!-- end row-->  

            </div>

            

            
        </div>

        

    @endsection
    <style>
        textarea {
            white-space: pre;
        }
        textarea.form-control {
            max-width: 100%; /* 限制 textarea 最大寬度 */
            width: 100%; /* 將寬度設置為100%，使其不超過容器的範圍 */
            word-wrap: break-word; /* 在內容過長時自動換行 */
            white-space: pre-wrap; /* 保持空白和換行符的效果 */
        }
    </style>
    
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/twzipcode-1.4.1-min.js') }}"></script>

        <script>
            $(document).ready(function(){
                $(".twzipcode").twzipcode({
                    css: ["twzipcode-select", "twzipcode-select" , "twzipcode-select"], // 自訂 "城市"、"地區" class 名稱 
                    countyName: "county", // 自訂城市 select 標籤的 name 值
                    districtName: "district", // 自訂地區 select 標籤的 name 值
                    zipcodeName: "zipcode", // 自訂地區 select 標籤的 name 值
                    'countySel': '{{ $cust_data->county }}',
                    'districtSel': '{{ $cust_data->district }}',
                    'zipcodeSel': '{{ $cust_data->zipcode }}'
                });
                
                @if(session('success'))
                    $('#success-btn').modal('show');
                @endif
            });

            $(document).ready(function() {
                var socailRowCount = $('#socail tbody tr').length;

                $('#add_socail').click(function() {
                        socailRowCount++;
                        var newRow = `<tr id="row-${socailRowCount}">
                                        <td>
                                            ${socailRowCount}
                                        </td>
                                        <td>
                                            <select id="gdpaper_id_${socailRowCount}" alt="${socailRowCount}" class="mobile form-select" name="socail_types[]">
                                                <option value="" selected>請選擇...</option>
                                                <option value="0">網站</option>
                                                <option value="1">社群</option>
                                                <option value="2">其他</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input id="department-${socailRowCount}" class="mobile form-control required-input" type="text" name="socail_contexts[]" value="" required>
                                        </td>
                                        <td>
                                            <button class="mobile btn btn-danger del-row" alt="${socailRowCount}" type="button" name="button">刪除</button>
                                        </td>
                                    </tr>`;
                        $('#socail tbody').append(newRow);
                });

                // Event delegation for dynamically added elements
                $('#socail').on('click', '.del-row', function() {
                    $(this).closest('tr').remove();
                    socailRowCount--;
                });

                //計畫導入前後服務情境（AS-IS & TO-BE）
                var questionRowCount = $('#question tbody tr').length;
                $('#add_question').click(function() {
                    questionRowCount++;
                    var newRow = `<tr id="row-${questionRowCount}" >
                                    <td>
                                        <label class="form-label" for="AddNew-Username">問題${questionRowCount}：</label>
                                        <textarea class="form-control" rows="4" name="questions[]"></textarea>
                                    </td>
                                    <td>
                                        <label class="form-label" for="AddNew-Username">導入解方${questionRowCount}：</label>
                                        <textarea class="form-control" rows="4" name="solutions[]"></textarea>
                                    </td>
                                    <td>
                                        <label class="form-label" for="AddNew-Username">導入解方${questionRowCount}說明：</label>
                                        <textarea class="form-control" rows="4" name="illustrates[]"></textarea>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <button class="mobile btn btn-danger del-row mt-4" alt="${questionRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                    </td>
                                </tr>`;
                    $('#question tbody').append(newRow);
                });
                $('#question').on('click', '.del-row', function() {
                    $(this).closest('tr').remove();
                    questionRowCount--;
                });

                //智慧應用方案說明
                var planRowCount = $('#plan tbody tr').length;
                $('#add_plan').click(function() {
                    planRowCount++;
                    var newRow = `<tr id="row-${planRowCount}" >
                                    <td>
                                        <textarea class="form-control" rows="3" name="plan_name[]"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="3" name="plan_description[]"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="3" name="plan_reduction_item[]"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="3" name="plan_method[]"></textarea>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <button class="mobile btn btn-danger del-row" alt="${planRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                    </td>
                                `;
                    $('#plan tbody').append(newRow);
                });
                $('#plan').on('click', '.del-row', function() {
                    $(this).closest('tr').remove();
                    planRowCount--;
                });

                var presonRowCount = $('#preson tbody tr').length;
                $('#add_preson').click(function() {
                    presonRowCount++;
                    var newRow = `<tr id="row-${presonRowCount}" >
                                    <td>${presonRowCount}</td>
                                    <td>
                                        <input id="pay_date-${presonRowCount}" class="mobile form-control required-input" type="text" name="personnel_names[]" value="">
                                    </td>
                                    <td>
                                        <input id="pay_date-${presonRowCount}" class="mobile form-control required-input" type="text" name="personnel_departments[]" value="">
                                    </td>
                                    <td>
                                        <input id="pay_price-${presonRowCount}" class="mobile form-control required-input" type="text" name="personnel_jobs[]" value="">
                                    </td>
                                    <td>
                                        <input id="pay_price-${presonRowCount}" class="mobile form-control required-input" type="text" name="personnel_contexts[]" value="">
                                    </td>
                                    <td>
                                        <input id="pay_price-${presonRowCount}" class="mobile form-control required-input" type="text" name="personnel_salarys[]" value="">
                                    </td>
                                    <td>
                                        <input id="pay_price-${presonRowCount}" class="mobile form-control required-input" type="text" name="personnel_months[]" value="">
                                    </td>
                                    <td>
                                        <button class="mobile btn btn-danger del-row" alt="${presonRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                    </td>
                                </tr>`;
                    $('#preson tbody').append(newRow);
                });

                // Event delegation for dynamically added elements
                $('#preson').on('click', '.del-row', function() {
                    $(this).closest('tr').remove();
                    presonRowCount--;
                });

                var partnerRowCount = $('#partner tbody tr').length;
                $('#add_partner').click(function() {
                    partnerRowCount++;
                    var newRow = `<tr id="row-${partnerRowCount}" >
                                    <td>${partnerRowCount}</td>
                                    <td>
                                        <input id="pay_date-${partnerRowCount}" class="mobile form-control required-input" type="text" name="partner_names[]" value="">
                                    </td>
                                    <td>
                                        <input id="pay_price-${partnerRowCount}" class="mobile form-control required-input" type="text" name="partner_jobs[]" value="">
                                    </td>
                                    <td>
                                        <button class="mobile btn btn-danger del-row" alt="${partnerRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                    </td>
                                </tr>`;
                    $('#partner tbody').append(newRow);
                });

                // Event delegation for dynamically added elements
                $('#partner').on('click', '.del-row', function() {
                    $(this).closest('tr').remove();
                    partnerRowCount--;
                });
            });


            //執行成效
            var effectivenessRowCount = $('#effectiveness tbody tr').length;
            $('#add_effectiveness').click(function() {
                effectivenessRowCount++;
                var newRow = `<tr id="row-${effectivenessRowCount}" >
                                <td>
                                    <textarea class="form-control" rows="8" name="effectiveness_kpis[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="8" name="effectiveness_goals[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="8" name="effectiveness_definitions[]"></textarea>
                                </td>
                                <td style="vertical-align: middle;">
                                    <button class="mobile btn btn-danger del-row" alt="${effectivenessRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                </td>
                            </tr>`;
                $('#effectiveness tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#effectiveness').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                effectivenessRowCount--;
            });

            //減碳項目
            var effectivenessRowCount = $('#effectiveness tbody tr').length;
            $('#add_effectiveness').click(function() {
                effectivenessRowCount++;
                var newRow = `<tr id="row-${effectivenessRowCount}" >
                                <td>
                                    <textarea class="form-control" rows="8" name="effectiveness_kpis[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="8" name="effectiveness_goals[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="8" name="effectiveness_definitions[]"></textarea>
                                </td>
                                <td style="vertical-align: middle;">
                                    <button class="mobile btn btn-danger del-row" alt="${effectivenessRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                </td>
                            </tr>`;
                $('#effectiveness tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#effectiveness').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                effectivenessRowCount--;
            });

            //減碳項目
            var reductionRowCount = $('#reduction tbody tr').length;
            $('#add_reduction').click(function() {
                reductionRowCount++;
                var newRow = `<tr id="row-${reductionRowCount}" >
                                <td>
                                    <textarea class="form-control" rows="8" name="reduction_item[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="8" name="reduction_before_guidance[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="8" name="reduction_after_guidance[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="8" name="reduction_difference[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="8" name="reduction_relationship[]"></textarea>
                                </td>
                                <td style="vertical-align: middle;">
                                    <button class="mobile btn btn-danger del-row" alt="${reductionRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                </td>
                            </tr>`;
                $('#reduction tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#reduction').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                reductionRowCount--;
            });

            //自訂績效指標
            var customRowCount = $('#custom tbody tr').length;
            $('#add_custom').click(function() {
                customRowCount++;
                var newRow = `<tr id="row-${customRowCount}" >
                                <td>
                                    <textarea class="form-control" rows="10" name="custom_performance[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="10" name="custom_before_guidance[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="10" name="custom_after_guidance[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="10" name="custom_explanation[]"></textarea>
                                </td>
                                <td style="vertical-align: middle;">
                                    <button class="mobile btn btn-danger del-row" alt="${customRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                </td>
                            </tr>`;
                $('#custom tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#custom').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                customRowCount--;
            });

            //其它效益
            var benefitRowCount = $('#benefit tbody tr').length;
            $('#add_benefit').click(function() {
                benefitRowCount++;
                var newRow = `<tr id="row-${benefitRowCount}" >
                                <td>
                                    <textarea class="form-control" rows="4" name="benefit_item[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="4" name="benefit_benefit[]"></textarea>
                                </td>
                                <td style="vertical-align: middle;">
                                    <button class="mobile btn btn-danger del-row" alt="${benefitRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                </td>
                            </tr>`;
                $('#benefit tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#benefit').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                benefitRowCount--;
            });


            //預定進度
            var plannedRowCount = $('#planned tbody tr').length;
            $('#add_planned').click(function() {
                plannedRowCount++;
                var newRow = `<tr id="row-${plannedRowCount}" >
                                <td width="90%">
                                    <textarea class="form-control" rows="2" name="planned_item[]"></textarea>
                                </td>
                                <td style="vertical-align: middle;">
                                    <button class="mobile btn btn-danger del-row" alt="${plannedRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                </td>
                            </tr>`;
                $('#planned tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#planned').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                plannedRowCount--;
            });

            

            

            var branchRowCount = $('#branch tbody tr').length;
            
            $('#add_branch').click(function() {
                branchRowCount++;
                var newRow = `<tr id="row-${branchRowCount}">
                                <td>
                                    ${branchRowCount}
                                </td>
                                <td>
                                    <select id="pay_date-${branchRowCount}" class="mobile form-select" name="drive_types[]">
                                        <option value="" selected>請選擇...</option>
                                        <option value="0">上游</option>
                                        <option value="1">下游</option>
                                        <option value="2">合作夥伴</option>
                                    </select>
                                </td>
                                <td>
                                    <input id="pay_date-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_names[]" value="">
                                </td>
                                
                                <td>
                                    <input id="pay_date-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_brand_names[]" value="">
                                </td>
                                <td>
                                    <input id="title-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_principals[]" value="">
                                </td>
                                <td>
                                    <input id="title-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_industrys[]" value="">
                                </td>
                                <td>
                                    <input id="title-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_citys[]" value="">
                                </td>
                                <td>
                                    <input id="work_content-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_employeecounts[]" value="">
                                </td>
                                <td>
                                    <input id="department-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_numbers[]" value="">
                                </td>
                                <td>
                                    <button class="mobile btn btn-danger del-row" alt="${branchRowCount}" type="button" name="button">刪除</button>
                                </td>
                             </tr>`;
                $('#branch tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#branch').on('click', '.del-row', function() {
                if(branchRowCount > 5){
                    $(this).closest('tr').remove();
                    branchRowCount--;
                }else{
                    alert('需至少提供5家被帶動企業');
                }
               
            });

            var needRowCount = $('#need tbody tr').length;

            $('#add_need').click(function() {
                    needRowCount++;
                    var newRow = `<tr id="row-${needRowCount}">
                                    <td>
                                        ${needRowCount}
                                    </td>
                                    <td>
                                        <input id="pay_date-${needRowCount}" class="mobile form-control required-input" type="text" name="need_names[]" value="">
                                    </td>
                                    <td>
                                        <input id="department-${needRowCount}" class="mobile form-control required-input" type="text" name="need_contexts[]" value="">
                                    </td>
                                    <td>
                                        <button class="mobile btn btn-danger del-row" alt="${needRowCount}" type="button" name="button">刪除</button>
                                    </td>
                                </tr>`;
                    $('#need tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#need').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                needRowCount--;
            });

            var situationRowCount = $('#situation tbody tr').length;

            $('#add_situation').click(function() {
                    situationRowCount++;
                    var newRow = `<tr id="row-${situationRowCount}" valign="middle">
                                    <td width="90%">
                                        <textarea  class="form-control required-input" name="situation_contexts[]" rows="2"></textarea>
                                    </td>
                                    <td>
                                        <button class="mobile btn btn-danger del-row" alt="${situationRowCount}" type="button" name="button">刪除</button>
                                    </td>
                                </tr>`;
                    $('#situation tbody').append(newRow);
                    checkRequiredFields(); 
            });

            // Event delegation for dynamically added elements
            $('#situation').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                situationRowCount--;
            });

            function updateTotal() {
                var maleCount = parseInt($('#insurance_male').val()) || 0;
                var femaleCount = parseInt($('#insurance_female').val()) || 0;
                $('#insurance_total').val(maleCount + femaleCount);
            }

            // 為 insurance_male 和 insurance_female 欄位添加 change 事件監聽器
            $('#insurance_male, #insurance_female').on('change', function() {
                updateTotal();
            });
        </script>


        <!-- datepicker js -->
         <!-- ckeditor -->
         {{-- <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script> --}}

         <!-- quill js -->
         <script src="{{ URL::asset('build/libs/quill/quill.min.js') }}"></script>
 
         <!-- init js -->
         <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
         <!-- App js -->
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
