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
                                                <input type="date" id="project_start" class="form-control required-input" name="project_start" @if(isset($word_data)) value="{{ $word_data->project_start }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>計畫結束</b><span class="-danger">*</span></label>
                                                <input type="date" id="project_end" class="form-control required-input" name="project_end" @if(isset($word_data)) value="{{ $word_data->project_end }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>總經費</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" id="total" name="total" @if(isset($word_data)) value="{{ $word_data->total }}" @endif value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>補助款</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" id="subsidy" name="subsidy" @if(isset($word_data)) value="{{ $word_data->subsidy }}" @endif value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>自籌款</b><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required-input" id="self_funding" name="self_funding" @if(isset($word_data)) value="{{ $word_data->self_funding }}" @endif value="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="AddNew-Username"><b>計畫內容摘要</b><span class="text-danger">*</span></label>
                                            <div class="mb-4">
                                                <textarea class="form-control" id="project_summary" rows="5" name="project_summary">@if(isset($word_data)){{ $word_data->project_summary }}@endif</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="AddNew-Username"><b>委託單位</b><span class="text-danger">*</span></label>
                                                <input type="text" id="partner_summary" class="form-control required-input" name="partner" @if(isset($word_data)) value="{{ $word_data->partner }}"  @endif readonly>
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
                                                <textarea class="form-control" id="growth_face"  rows="8" name="growth_face">@if(isset($word_data)){{ $word_data->growth_face }}@endif</textarea>
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
                                                                        <tr id="question-row-{{ $key }}" >
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">問題{{$key+1}}：</label>
                                                                                    <textarea class="form-control" rows="4" id="questions{{$key}}" name="questions[]">{{ $word_question_data->question }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">導入解方{{$key+1}}：</label>
                                                                                    <textarea class="form-control" rows="4" id="solutions{{$key}}" name="solutions[]">{{ $word_question_data->solution }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">導入解方{{$key+1}}說明：</label>
                                                                                    <textarea class="form-control" rows="4" id="illustrates{{$key}}" name="illustrates[]">{{ $word_question_data->illustrate }}</textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                    @endforeach
                                                                @else
                                                                    @for ($i = 0; $i < 1; $i++)
                                                                            <tr id="question-row-{{ $i }}" >
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">問題{{$i+1}}：</label>
                                                                                    <textarea class="form-control" rows="4" id="questions{{ $i }}" name="questions[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">導入解方{{$i+1}}：</label>
                                                                                    <textarea class="form-control" rows="4" id="solutions{{ $i }}" name="solutions[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <label class="form-label" for="AddNew-Username">導入解方{{$i+1}}說明：</label>
                                                                                    <textarea class="form-control" rows="4" id="illustrates{{ $i }}" name="illustrates[]"></textarea>
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
                                                                        <tr id="plan-row-{{ $key }}" >
                                                                            <td>
                                                                                <textarea class="form-control" rows="10" id="plan_name{{ $key }}" name="plan_name[]">{{ $word_plan_data->name }}</textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="10" id="plan_description{{ $key }}" name="plan_description[]">{{ $word_plan_data->description }}</textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="10" id="plan_reduction_item{{ $key }}" name="plan_reduction_item[]">{{ $word_plan_data->reduction_item }}</textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="10" id="plan_method{{ $key }}" name="plan_method[]">{{ $word_plan_data->method }}</textarea>
                                                                            </td>
                                                                            <td style="vertical-align: middle;">
                                                                                <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    @for ($i = 0; $i < 1; $i++)
                                                                            <tr id="plan-row-{{ $i }}" >
                                                                                <td>
                                                                                    <textarea class="form-control" rows="10" id="plan_name{{ $i }}" name="plan_name[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="10" id="plan_description{{ $i }}" name="plan_description[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="10" id="plan_reduction_item{{ $i }}" name="plan_reduction_item[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="10" id="plan_method{{ $i }}" name="plan_method[]">委外</textarea>
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
                                        <label class="form-label" for="AddNew-Username"><b>新資</b></label>
                                        <input type="text" class="form-control required-input" name="host_salary" @if(isset($project_host_data)) value="{{ $project_host_data->salary }}" @endif >
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
                                        <label class="form-label" for="AddNew-Username"><b>新資</b></label>
                                        <input type="text" class="form-control required-input" name="contact_salary" @if(isset($project_contact_data)) value="{{ $project_contact_data->salary }}" @endif >
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
                                                                            <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="personnel_contexts[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="personnel_salarys[]" value="">
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
                                                                            <input id="partner_name{{ $key }}" class="mobile form-control required-input" type="text" name="partner_names[]" value="{{ $partner_data->name }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="partner_jobs{{ $key }}" class="mobile form-control required-input" type="text" name="partner_jobs[]" value="{{ $partner_data->job_content }}">
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
                                                                            <input id="partner_name{{ $i }}" class="mobile form-control required-input" type="text" name="partner_names[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="partner_jobs{{ $i }}" class="mobile form-control required-input" type="text" name="partner_jobs[]" value="">
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
                                                                                <option value="3" @if($drive_data->type == 3) selected @endif>分店</option>
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
                                                                                <option value="3">分店</option>
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
                                    {{-- //服務擴散及維運做法 --}}
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label" for="AddNew-Username"><b>服務擴散及維運做法 </b><span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="serve" class="table serve-list">
                                                        <thead>
                                                            <tr align="center">
                                                                <th width="20%">項目</th>
                                                                <th width="80%">說明</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody valign="center" align="left">
                                                            @if(count($project->word_serve_datas)>0)
                                                                @foreach ($project->word_serve_datas as $key=>$word_serve_data)
                                                                    <tr id="row-{{ $key }}" >
                                                                        <td>
                                                                            <textarea class="form-control" rows="4" name="serve_item[]">{{ $word_serve_data->item }}</textarea>
                                                                        </td>
                                                                        <td>
                                                                            <textarea class="form-control" rows="4" name="serve_context[]">{{ $word_serve_data->context }}</textarea>
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
                                                                                <textarea class="form-control" rows="4" name="serve_item[]"></textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="4" name="serve_context[]"></textarea>
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
                                                    <input id="add_serve" class="btn btn-primary" type="button" name="" value="新增服務">
                                                    </div>
                                                </div>
                                            </div>
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
                                                                        @for($i=0; $i<6;$i++)
                                                                            <tr id="row-{{ $i }}" >
                                                                                <td width="90%">
                                                                                    <textarea class="form-control" rows="2" id="planned_item_{{ $i }}" name="planned_item[]">@if(isset($project->word_planned_datas[$i]->item)){{ $project->word_planned_datas[$i]->item }}@endif</textarea>
                                                                                </td>
                                                                            </tr>
                                                                        @endfor
                                                                    @else
                                                                        <tr id="row" >
                                                                            <td width="90%">
                                                                                <textarea class="form-control" rows="2" name="planned_item[]" id="planned_item_0">「XXX」</textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="row" >
                                                                            <td width="90%">
                                                                                <textarea class="form-control" rows="2" name="planned_item[]" id="planned_item_1">1.「XXX」的規劃及導入</textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="row" >
                                                                            <td width="90%">
                                                                                <textarea class="form-control" rows="2" name="planned_item[]" id="planned_item_2">2.驗證「XXX」的使用情形</textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="row" >
                                                                            <td width="90%">
                                                                                <textarea class="form-control" rows="2" name="planned_item[]" id="planned_item_3">「XXX」</textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="row" >
                                                                            <td width="90%">
                                                                                <textarea class="form-control" rows="2" name="planned_item[]" id="planned_item_4">1.「XXX」的規劃及導入</textarea>
                                                                            </td>
                                                                        </tr><tr id="row" >
                                                                            <td width="90%">
                                                                                <textarea class="form-control" rows="2" name="planned_item[]" id="planned_item_5">2.驗證「XXX」的使用情形</textarea>
                                                                            </td>
                                                                        </tr>
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
                                                            <table id="check" class="table check-list">
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
                                                                                    <textarea class="form-control" rows="4" id="check_item{{$key}}" name="check_item[]">{{  $word_check_data->item }}</textarea>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_estimated{{$key}}" name="check_estimated[]">{{ $word_check_data->estimated }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_midterm_checkpoint{{$key}}" name="check_midterm_checkpoint[]">{{ $word_check_data->midterm_checkpoint }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_final_checkpoint{{$key}}" name="check_final_checkpoint[]">{{ $word_check_data->final_checkpoint }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_proportion{{$key}}" name="check_proportion[]">{{ $word_check_data->proportion }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_audit_data" name="check_audit_data[]">{{ $word_check_data->audit_data }}</textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        @for($i=0; $i<4; $i++)
                                                                            <tr id="row" style="vertical-align: middle;" align="center">
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_item{{$i}}" name="check_item[]">{{ $checks[$i] }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_estimated{{$i}}" name="check_estimated[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_midterm_checkpoint{{$i}}" name="check_midterm_checkpoint[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_final_checkpoint{{$i}}" name="check_final_checkpoint[]"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_proportion{{$i}}" name="check_proportion[]">{{ $proportions[$i] }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="4" id="check_audit_data{{$i}}" name="check_audit_data[]"></textarea>
                                                                                </td>
                                                                            </tr>
                                                                        @endfor
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end .table-responsive -->
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                            <input id="add_check" class="btn btn-primary" type="button" name="" value="新增核點">
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
                                                                            <tr id="row-{{ $key }}" >
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="effectiveness_kpis[]">{{ $project->word_effectiveness_datas[0]->kpi }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" id="people_count" name="effectiveness_goals[]">{{ $project->word_effectiveness_datas[0]->goal }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="effectiveness_definitions[]">{{ $project->word_effectiveness_datas[0]->definition }}</textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                            <tr id="row-{{ $key }}" >
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="effectiveness_kpis[]">{{ $project->word_effectiveness_datas[1]->kpi }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8"  id="reduce_carbon" name="effectiveness_goals[]">{{ $project->word_effectiveness_datas[1]->goal }}</textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <textarea class="form-control" rows="8" name="effectiveness_definitions[]">{{ $project->word_effectiveness_datas[1]->definition }}</textarea>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="mobile btn btn-danger del-row mt-4" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                                </td>
                                                                            </tr>
                                                                    @else
                                                                        <tr id="row" >
                                                                            <td>
                                                                                <textarea class="form-control" rows="8" name="effectiveness_kpis[]">帶動體驗人次
（單位：人次）</textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" id="people_count" rows="8" name="effectiveness_goals[]"></textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="8" name="effectiveness_definitions[]"></textarea>
                                                                            </td>
                                                                            <td style="vertical-align: middle;">
                                                                                <button class="mobile btn btn-danger del-row" alt="" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="row" >
                                                                            <td>
                                                                                <textarea class="form-control" rows="8" name="effectiveness_kpis[]">降低碳排量
（單位：公噸）</textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" id="reduce_carbon" rows="8" name="effectiveness_goals[]"></textarea>
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" rows="8" name="effectiveness_definitions[]"></textarea>
                                                                            </td>
                                                                            <td style="vertical-align: middle;">
                                                                                <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                            </td>
                                                                        </tr>
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
                                                            <table class="table question-list" border="1" cellpadding="5" cellspacing="0">
                                                                <thead>
                                                                    <tr align="center">
                                                                        <th colspan="2">會計科目</th>
                                                                        <th>補助款</th>
                                                                        <th>自籌款</th>
                                                                        <th>合計</th>
                                                                        <th>各科目佔<br>總經費之比例%</th>
                                                                        <th>備註</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">1. 人事費</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_1" name="fund_1" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_1 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_2" name="fund_2" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_2 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_3" name="fund_3" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_3 }}" @else value="0"  @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_4" name="fund_4" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_4 }}" @else value="0"  @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="remark1" name="remark1" @if(isset($project->fund_data)) value="{{ $project->fund_data->remark1 }}" @else value=""  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">2. 消耗性器材及原材料費</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_5" name="fund_5" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_5 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_6" name="fund_6" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_6 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_7" name="fund_7" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_7 }}" @else value="0"  @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_8" name="fund_8" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_8 }}" @else value="0"  @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="remark2" name="remark2" @if(isset($project->fund_data)) value="{{ $project->fund_data->remark2 }}" @else value=""  @endif></td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">3. 設備及軟體使用費</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_9" name="fund_9" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_9 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_10" name="fund_10" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_10 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_11" name="fund_11" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_11 }}" @else value="0"  @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_12" name="fund_12" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_12 }}" @else value="0"  @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="remark3" name="remark3" @if(isset($project->fund_data)) value="{{ $project->fund_data->remark3 }}" @else value=""  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">4. 設備維護費</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_13" name="fund_13" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_13 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_14" name="fund_14" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_14 }}" @else value="0"  @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_15" name="fund_15" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_15 }}" @else value="0"  @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_16" name="fund_16" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_16 }}" @else value="0"  @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="remark4" name="remark4" @if(isset($project->fund_data)) value="{{ $project->fund_data->remark4 }}" @else value=""  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td rowspan="4" >5. 技術移轉費</td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>(1) 技術或智慧財產權購買費</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_17" name="fund_17" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_17 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_18" name="fund_18" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_18 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_19" name="fund_19" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_19 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_20" name="fund_20" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_20 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="remark5" name="remark5" @if(isset($project->fund_data)) value="{{ $project->fund_data->remark5 }}" @else value=""  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>(2) 委託研究費</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_21" name="fund_21" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_21 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_22" name="fund_22" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_22 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_23" name="fund_23" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_23 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_24" name="fund_24" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_24 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="remark6" name="remark6" @if(isset($project->fund_data)) value="{{ $project->fund_data->remark6 }}" @else value=""  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>(3) 委託勞務費</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_25" name="fund_25" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_25 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_26" name="fund_26" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_26 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_27" name="fund_27" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_27 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_28" name="fund_28" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_28 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="remark7" name="remark7" @if(isset($project->fund_data)) value="{{ $project->fund_data->remark7 }}" @else value=""  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td>小計</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_29" name="fund_29" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_29 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_30" name="fund_30" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_30 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_31" name="fund_31" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_31 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_32" name="fund_32" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_32 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="remark8" name="remark8" @if(isset($project->fund_data)) value="{{ $project->fund_data->remark8 }}" @else value=""  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">6. 差旅費</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_33" name="fund_33" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_33 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_34" name="fund_34" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_34 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_35" name="fund_35" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_35 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_36" name="fund_36" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_36 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="remark9" name="remark9" @if(isset($project->fund_data)) value="{{ $project->fund_data->remark9 }}" @else value=""  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">7. 市場驗證費</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_37" name="fund_37" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_37 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_38" name="fund_38" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_38 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_39" name="fund_39" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_39 }}" @else value="0" @endif></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_40" name="fund_40" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_40 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="remark10" name="remark10" @if(isset($project->fund_data)) value="{{ $project->fund_data->remark10 }}" @else value=""  @endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">合計</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_41" name="fund_41" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_41 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_42" name="fund_42" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_42 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_43" name="fund_43" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_43 }}" @else value="0" @endif readonly></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">百分比</td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_44" name="fund_44" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_44 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_45" name="fund_45" @if(isset($project->fund_data)) value="{{ $project->fund_data->fund_45 }}" @else value="0" @endif readonly></td>
                                                                        <td><input type="text" class="form-control required-input" id="fund_46" name="fund_46" value="100" readonly></td>
                                                                        <td></td>
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
                                <button class="btn btn-primary" type="button" id="btn_submit"><i class=" bx bx-check me-1"></i> 匯出Word </button>
                            </a>
                            {{-- <a href="{{ route('exportPtt',$cust_data->user_id) }}">
                                <button class="btn btn-primary" type="button" id="btn_submit"><i class=" bx bx-check me-1"></i> 匯出Word </button>
                            </a> --}}
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
                //待精進/成長之面向 = 計畫內容摘要
                $("#growth_face").on("change keyup", function() {
                    $("#project_summary").val($(this).val());
                });

                //相關帶入數值與計算
                $("#project_start").on("change", function() {
                    var start = $(this).val();
                    var startDate = new Date(start);
                    
                    // 增加 6 個月
                    startDate.setMonth(startDate.getMonth() + 6);
                    // 減去 1 天
                    startDate.setDate(startDate.getDate() - 1);
                    // 格式化日期為 YYYY-MM-DD 格式
                    var year = startDate.getFullYear();
                    var month = ("0" + (startDate.getMonth() + 1)).slice(-2); // 月份從 0 開始，所以需要 +1
                    var day = ("0" + startDate.getDate()).slice(-2);
                    
                    var endDate = year + "-" + month + "-" + day;
                    
                    // 設置 project_end 的 min 值和預設值
                    $("#project_end").attr("min", start).val(endDate);
                });

                //新資*人月開始------------------------------------------------
                // 監聽所有相關欄位的變化
                // 定義所有的輸入框對應關係
                var pairs = [
                    ["#fund_1", "#fund_2", "#fund_3"],
                    ["#fund_5", "#fund_6", "#fund_7"],
                    ["#fund_9", "#fund_10", "#fund_11"],
                    ["#fund_13", "#fund_14", "#fund_15"],
                    ["#fund_17", "#fund_18", "#fund_19"],
                    ["#fund_21", "#fund_22", "#fund_23"],
                    ["#fund_25", "#fund_26", "#fund_27"],
                    ["#fund_33", "#fund_34", "#fund_35"],
                    ["#fund_37", "#fund_38", "#fund_39"]
                ];

                // 定義所有需要計算百分比的對應關係
                var percentPairs = [
                    ["#fund_3", "#fund_4"],
                    ["#fund_7", "#fund_8"],
                    ["#fund_11", "#fund_12"],
                    ["#fund_15", "#fund_16"],
                    ["#fund_19", "#fund_20"],
                    ["#fund_23", "#fund_24"],
                    ["#fund_27", "#fund_28"],
                    ["#fund_35", "#fund_36"],
                    ["#fund_39", "#fund_40"]
                ];
                updateTotals()
                // 監聽所有相關欄位的變化並觸發 updateTotals
                $('input[name="host_salary"], input[name="host_month"], input[name="contact_salary"], input[name="contact_month"], input[name="personnel_salarys[]"], input[name="personnel_months[]"], input').on('input change keyup', function() {
                    updateTotals();
                });

                // 更新總和、百分比計算
                function updateTotals() {
                    // Step 1: 計算 #fund_02 的總和
                    var hostSalary = parseFloat($('input[name="host_salary"]').val()) || 0;
                    var hostMonth = parseFloat($('input[name="host_month"]').val()) || 0;
                    var contactSalary = parseFloat($('input[name="contact_salary"]').val()) || 0;
                    var contactMonth = parseFloat($('input[name="contact_month"]').val()) || 0;

                    // 計算 host 和 contact 的總額 (新資 * 人月)
                    var hostTotal = hostSalary * hostMonth;
                    var contactTotal = contactSalary * contactMonth;

                    // 計算所有 personnel 的總額
                    var personnelTotal = 0;
                    var personnelSalaries = $('input[name="personnel_salarys[]"]');
                    var personnelMonths = $('input[name="personnel_months[]"]');

                    personnelSalaries.each(function(index) {
                        var salary = parseFloat($(this).val()) || 0;
                        var month = parseFloat(personnelMonths.eq(index).val()) || 0;
                        personnelTotal += salary * month;
                    });

                    // 計算 #fund_02 的總和
                    var totalFund02 = hostTotal + contactTotal + personnelTotal;
                    $('#fund_2').val(totalFund02.toFixed(0)); // 更新 #fund_02 的值，保留0位小數

                    // Step 2: 計算 pairs 中的總和
                    var val1Total = 0;
                    var val2Total = 0;

                    pairs.forEach(function(pair) {
                        var val1 = parseFloat($(pair[0]).val()) || 0;
                        var val2 = parseFloat($(pair[1]).val()) || 0;
                        val1Total += val1;
                        val2Total += val2;
                        // 更新每組的第三個欄位 (val1 + val2)
                        var sum = val1 + val2;
                        $(pair[2]).val(sum.toFixed(0)); // 更新第三個欄位的值
                    });

                    // 更新 fund_41 和 fund_42 的值
                    $("#fund_41").val(val1Total);
                    $("#subsidy").val(val1Total);
                    $("#fund_42").val(val2Total);
                    $("#self_funding").val(val2Total);

                    // 更新 fund_43 的值（fund_41 + fund_42）
                    var totalFund43 = val1Total + val2Total;
                    $("#fund_43").val(totalFund43);
                    $("#total").val(totalFund43);

                    // Step 3: 計算 percentPairs 中的百分比
                    percentPairs.forEach(function(pair) {
                        var numerator = parseFloat($(pair[0]).val()) || 0;
                        var percentage = totalFund43 ? (numerator / totalFund43) * 100 : 0;
                        $(pair[1]).val(Math.round(percentage)); // 更新到對應的百分比欄位
                    });

                    // 計算 fund_44 和 fund_45 的百分比（相對於 fund_43）
                    var fund44 = totalFund43 ? (val1Total / totalFund43) * 100 : 0;
                    var fund45 = totalFund43 ? (val2Total / totalFund43) * 100 : 0;

                    $("#fund_44").val(Math.round(fund44) + '%');
                    $("#fund_45").val(Math.round(fund45) + '%');
                    updateSpecialFields();
                }

                // 初始化時調用一次 updateTotals 來設置初始值
                updateTotals();


                // 更新特定值的輸入框
                function updateSpecialFields() {
                    $("#fund_29").val($("#fund_25").val());
                    $("#fund_30").val($("#fund_26").val());
                    $("#fund_31").val($("#fund_27").val());
                    $("#fund_32").val($("#fund_28").val());
                }


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
                
                // 新增問題和計劃
                syncValues();

                // 新增 question 和 plan 行時
                $('#add_question').click(function() {
                    questionRowCount++;

                    var newQuestionRow = `<tr id="question-row-${questionRowCount}">
                                            <td>
                                                <label class="form-label" for="AddNew-Username">問題${questionRowCount}：</label>
                                                <textarea class="form-control" rows="4" id="questions${questionRowCount}" name="questions[]"></textarea>
                                            </td>
                                            <td>
                                                <label class="form-label" for="AddNew-Username">導入解方${questionRowCount}：</label>
                                                <textarea class="form-control" rows="4" id="solutions${questionRowCount}" name="solutions[]"></textarea>
                                            </td>
                                            <td>
                                                <label class="form-label" for="AddNew-Username">導入解方${questionRowCount}說明：</label>
                                                <textarea class="form-control" rows="4" id="illustrates${questionRowCount}" name="illustrates[]"></textarea>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <button class="mobile btn btn-danger del-row mt-4" alt="${questionRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                            </td>
                                        </tr>`;
                    $('#question tbody').append(newQuestionRow);

                    var newPlanRow = `<tr id="plan-row-${questionRowCount}">
                                        <td>
                                            <textarea class="form-control" rows="10" id="plan_name${questionRowCount}" name="plan_name[]"></textarea>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="10" id="plan_description${questionRowCount}" name="plan_description[]"></textarea>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="10" id="plan_reduction_item${questionRowCount}" name="plan_reduction_item[]"></textarea>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="10" id="plan_method${questionRowCount}" name="plan_method[]">委外</textarea>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <button class="mobile btn btn-danger del-plan-row" alt="${questionRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                        </td>
                                    </tr>`;
                    $('#plan tbody').append(newPlanRow);

                    // 新增後再次綁定事件
                    syncValues();
                    reindexRows();
                    processSolutions();
                });

                // 刪除行時同步刪除對應的行
                $('#question').on('click', '.del-row', function() {
                    var rowId = $(this).closest('tr').attr('id').replace('question-row-', '');
                    $(this).closest('tr').remove();
                    questionRowCount--;

                    // 刪除對應的 plan 行
                    $('#plan tbody').find(`#plan-row-${rowId}`).remove();

                    reindexRows();
                    processSolutions();
                });

                // 同步刪除計劃行時刪除對應的問題行
                $('#plan').on('click', '.del-plan-row', function() {
                    var rowId = $(this).closest('tr').attr('id').replace('plan-row-', '');
                    $(this).closest('tr').remove();

                    $('#question tbody').find(`#question-row-${rowId}`).remove();
                    questionRowCount--;

                    reindexRows();
                    processSolutions();
                });

                // 重新排列行數
                function reindexRows() {
                    $('#question tbody tr').each(function(index) {
                        $(this).attr('id', 'question-row-' + (index + 1));
                        // $(this).find('label[for="AddNew-Username"]').text('問題' + (index + 1) + '：');
                    });

                    $('#plan tbody tr').each(function(index) {
                        $(this).attr('id', 'plan-row-' + (index + 1));
                    });
                    questionRowCount = $('#question tbody tr').length;
                    $('#check_estimated0, #check_midterm_checkpoint0 , #check_final_checkpoint0').val(questionRowCount+'項');
                    
                }



                // 綁定事件來同步 values
                function syncValues() {
                    // 綁定所有 solutions 和 plan_name 的同步
                    $('textarea[id^="solutions"]').off('input').on('input', function() {
                        var idSuffix = $(this).attr('id').replace('solutions', '');
                        $('#plan_name' + idSuffix).val($(this).val());
                        processSolutions();
                    });

                    // 綁定所有 illustrates 和 plan_description 的同步
                    $('textarea[id^="illustrates"]').off('input').on('input', function() {
                        var idSuffix = $(this).attr('id').replace('illustrates', '');
                        $('#plan_description' + idSuffix).val($(this).val());
                    });

                }

                // 初始時綁定所有現有欄位的同步
                syncValues();

                function processSolutions() {
                    // 取得所有 solutions[] 的值，作為一個數組
                    var solutionsArray = $('textarea[name="solutions[]"]').map(function() {
                        return $(this).val(); // 獲取每個 solutions[] 的值
                    }).get(); // 將 jQuery 物件轉換為 JavaScript 數組
                    var formattedTextArray = []; // 用來存儲格式化後的每個部分
                    var formattedReductionTextArray = []; // 用來存儲格式化後的每個部分
                    var subIndex = 0;
                    var rub1Index = 0;
                    // 迭代 solutionsArray 中的每個值進行處理
                    //導入智慧減碳應用服務
                    solutionsArray.forEach(function(solution, index) {
                        // 將每個 solution 內容按換行符號拆分成多行
                        var splitText = solution.split('\n');
                        // 將每行文字格式化，並加入 formattedTextArray
                        splitText.forEach(function(text) {
                            subIndex = subIndex+1;
                            formattedTextArray.push(`${subIndex}.${text}\n【X】${subIndex}：系統驗收單`);
                            formattedReductionTextArray.push(`${subIndex}.${text}\n【X】2&【X】3後台結帳訂單筆數`);
                        });
                    });
                    var finalFormattedText = formattedTextArray.join('\n');
                    // 最終將所有格式化的內容用空格連接起來
                    var finalFormattedReductionText = formattedReductionTextArray.join('\n');
                    console.log(finalFormattedReductionText); // 輸出最終的串接結果

                    // 將結果放到指定的輸入框中
                    $('#check_audit_data0').val(finalFormattedText);
                    $('#check_audit_data1').val(finalFormattedReductionText);

                    $("#planned_item_0").val('(一)'+solutionsArray[0]);
                    $("#planned_item_1").val('1.「'+solutionsArray[0]+'」的規劃及導入');
                    $("#planned_item_2").val('2.驗證「'+solutionsArray[0]+'」的使用情形');

                    $("#planned_item_3").val('(二)'+solutionsArray[1]);
                    $("#planned_item_4").val('1.「'+solutionsArray[1]+'」的規劃及導入');
                    $("#planned_item_5").val('2.驗證「'+solutionsArray[1]+'」的使用情形');
                }

                // 調用函數處理 solutions[] 的內容
                processSolutions();



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
                                        <textarea class="form-control" rows="3" name="plan_method[]">委外</textarea>
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
                    $('input[name="host_salary"], input[name="host_month"], input[name="contact_salary"], input[name="contact_month"], input[name="personnel_salarys[]"], input[name="personnel_months[]"], input').on('input change keyup', function() {
                        updateTotals();
                    });

                });

                // Event delegation for dynamically added elements
                $('#preson').on('click', '.del-row', function() {
                    $(this).closest('tr').remove();
                    presonRowCount--;
                    updateTotals()
                });

                
                //夥伴
                // 初始化監聽所有 partner_name 的變化
                function updatePartnerSummary() {
                    var allPartnerNames = $('input[name="partner_names[]"]').map(function() {
                        return $(this).val();
                    }).get().join('、 ');
                    $('#partner_summary').val(allPartnerNames);
                }

                // 初始時更新摘要
                updatePartnerSummary();

                var partnerRowCount = $('#partner tbody tr').length;
                $('#add_partner').click(function() {
                    partnerRowCount++;
                    var newRow = `<tr id="row-${partnerRowCount}" >
                                    <td>${partnerRowCount}</td>
                                    <td>
                                        <input id="partner_name${partnerRowCount}" class="mobile form-control required-input" type="text" name="partner_names[]" value="">
                                    </td>
                                    <td>
                                        <input id="partner_jobs${partnerRowCount}" class="mobile form-control required-input" type="text" name="partner_jobs[]" value="">
                                    </td>
                                    <td>
                                        <button class="mobile btn btn-danger del-row" alt="${partnerRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                    </td>
                                </tr>`;
                    $('#partner tbody').append(newRow);
                    // 監聽新的 partner_name 欄位變化
                    $('input[name="partner_names[]"]').off('input').on('input', updatePartnerSummary);
                });

                // Event delegation for dynamically added elements
                $('#partner').on('click', '.del-row', function() {
                    $(this).closest('tr').remove();
                    partnerRowCount--;
                    updatePartnerSummary();
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
             // 初始時監聽所有 reduction_difference[] 欄位的變化
             syncReductionDifference();

            // 當新增一行 reduction 時
            $('#add_reduction').click(function() {
                // 新增一行 reduction 的樣板代碼
                var newRow = `<tr>
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
                                    <button class="mobile btn btn-danger del-row" type="button" name="button" onclick="del_row(this)">刪除</button>
                                </td>
                            </tr>`;
                $('#reduction tbody').append(newRow);

                // 新增行後，重新綁定所有 reduction_difference[] 欄位的事件
                syncReductionDifference();
            });

            // 監聽刪除行的事件
            $('#reduction').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                updateReduceCarbonField(); // 刪除行後重新計算 reduction_difference[] 的值
            });

            // 綁定所有 reduction_difference[] 欄位的變化事件
            function syncReductionDifference() {
                $('textarea[name="reduction_difference[]"]').off('input').on('input', function() {
                    updateReduceCarbonField();
                });
            }

            // 更新 reduce_carbon 欄位的值
            function updateReduceCarbonField() {
                var total = 0; // 記錄總和
                var allDifferences = $('textarea[name="reduction_difference[]"]').map(function() {
                    var value = $(this).val().trim(); // 獲取值並移除首尾空格
                    if ($.isNumeric(value)) { // 確保是數字
                        total += parseFloat(value); // 將值加到總和中
                        return value; // 返回值作為串接的一部分
                    }
                    return null;
                }).get().filter(function(value) {
                    return value !== null; // 過濾掉非數字的 null 值
                }).join('+'); // 使用頓號連接

                // 更新 reduce_carbon 的值，格式為 "總和 (數字1、數字2、...)"
                var resultText = total + '\n' +(allDifferences ? ` （${allDifferences}）` : '');
                $('#reduce_carbon').val(resultText);
                $('#check_estimated1 , #check_final_checkpoint1').val(total+'噸');
                var checkpoint1Count = Math.ceil(total*0.3 * 1000) / 1000;
                console.log(checkpoint1Count);
                $("#check_midterm_checkpoint1").val(checkpoint1Count+'噸');
            }

            // 初始時更新 reduce_carbon 欄位的值
            updateReduceCarbonField();

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
            var serveRowCount = $('#serve tbody tr').length;
            $('#add_serve').click(function() {
                serveRowCount++;
                var newRow = `<tr id="row-${serveRowCount}" >
                                <td>
                                    <textarea class="form-control" rows="4" name="serve_item[]"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="4" name="serve_context[]"></textarea>
                                </td>
                                <td style="vertical-align: middle;">
                                    <button class="mobile btn btn-danger del-row" alt="${serveRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                </td>
                            </tr>`;
                $('#serve tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#serve').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                serveRowCount--;
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
            reindexBranchRows();
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
                                        <option value="3">分店</option>
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
                reindexBranchRows();
            });

            // Event delegation for dynamically added elements
            $('#branch').on('click', '.del-row', function() {
                if(branchRowCount > 5){
                    $(this).closest('tr').remove();
                    branchRowCount--;
                }else{
                    alert('需至少提供5家被帶動企業');
                }
                reindexBranchRows();
            });

            // 重新排列行數
            function reindexBranchRows() {
                branchRowCount = $('#branch tbody tr').length;
                console.log(branchRowCount);
                $('#check_estimated2 , #check_midterm_checkpoint2 , #check_final_checkpoint2').val(branchRowCount+'家');
                $("#check_audit_data2").val('帶動企業之合作意向書');
            }

            $("#people_count").on('input change keyup', function() {
                var peopleCount = parseInt($(this).val()) || 0;
                var formattedCount = peopleCount.toLocaleString();
                $('#check_estimated3 , #check_final_checkpoint3').val(formattedCount+'人次');

                var check_estimated3_Count = peopleCount * 0.3; // 計算 30%
                var formatcheckpoint3 = check_estimated3_Count.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 2 }); // 格式化，保留最多 2 位小數
                $('#check_midterm_checkpoint3').val(formatcheckpoint3+'人次'); // 更新格式化後的值
            });


            //查點需求
            var checkRowCount = $('#check tbody tr').length;
            $('#add_check').click(function() {
                    checkRowCount++;
                    var newRow = `<tr id="row-${checkRowCount}">
                                    <td>
                                        <textarea class="form-control" rows="2" name="check_item[]"></textarea>
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
                                    <td style="vertical-align: middle;">
                                        <button class="mobile btn btn-danger del-row" alt="${checkRowCount}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                    </td>
                                </tr>`;
                    $('#check tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#check').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                checkRowCount--;
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
