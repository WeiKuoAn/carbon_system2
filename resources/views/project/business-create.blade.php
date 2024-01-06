@extends('layouts.master')
@section('title')
    商業服務類-新增內容
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    商業服務類-新增內容
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
                    <h4 class="mt-3">新增商業服務類資料成功！</h4>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <form action="{{ route('project.business.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h2>廠商基本資料</h2>
                                </div>
                                <div class="row">'
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="AddNew-Username"><b>廠商名稱</b></label>
                                            <input type="text" class="form-control required-input" value="{{ $project->user_data->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="AddNew-Phone"><b>公司簡介</b>（EX.經營理念、旗下品牌、主要/知名產品、專業技術、得獎紀錄）</label>
                                            <textarea  class="form-control required-input" name="introduce" rows="4">@if(isset($cust_data)){{ $cust_data->introduce }}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="AddNew-Phone"><b>公司資本額（單位：元/新台幣）</b></label>
                                            <input type="number" class="form-control required-input" name="capital" @if(isset($cust_data)) value="{{ $cust_data->capital }}" @else value="0" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="AddNew-Phone"><b>去年整年度營業額（單位：元/新台幣）</b></label>
                                            <input type="number" class="form-control required-input" name="last_year_revenue" @if(isset($project)) value="{{ $project->last_year_revenue }}" @else value="0" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="AddNew-Phone"><b>近一年平均投保人數</b>（申請計畫使用）</label>
                                            <input type="number" class="form-control required-input" name="Insured_employees" placeholder="近一年平均投保人數" @if(isset($project)) value="{{ $project->insured_employees }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="AddNew-Phone"><b>最近一期勞保投保人數</b>（申請計畫使用）</label>
                                            <input type="number" class="form-control required-input" name="insurance_male" id="insurance_male"  placeholder="男生投保人數" @if(isset($project)) value="{{ $project->insurance_male }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="AddNew-Phone"><b>&nbsp;</b></label>
                                            <input type="number" class="form-control required-input" name="insurance_female" id="insurance_female" placeholder="女生投保人數" @if(isset($project)) value="{{ $project->insurance_female }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label class="form-label" for="AddNew-Phone"><b>&nbsp;</b></label>
                                            <input type="number" class="form-control required-input" placeholder="總投保人數" name="insurance_total"  id="insurance_total" @if(isset($project)) value="{{ $project->insurance_total }}" @endif readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="AddNew-Username"><b>公司主要聯繫窗口</b>（用於與錚典對接）</label>
                                        <div class="mb-4">
                                            <input type="text" class="form-control required-input" name="main_contact_name" placeholder="姓名"  @if(isset($project)) value="{{ $project->contact_name }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                        <div class="mb-4">
                                            <input type="email" class="form-control required-input" name="main_contact_email" placeholder="信箱"  @if(isset($project)) value="{{ $project->contact_email }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                        <div class="mb-4">
                                            <input type="text" class="form-control required-input" name="main_contact_phone" placeholder="電話"  @if(isset($project)) value="{{ $project->contact_phone }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-1">公司對外的網站或社群網址-若有不只一個，請都附上。若無，請寫「無」即可</h5>
                                                <div class="table-responsive mt-1">
                                                    <table id="socail" class="table socail-list">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>編號</th>
                                                                <th>類別<span class="text-danger">*</span></th>
                                                                <th>網址<span class="text-danger">*</span></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody valign="center" align="center">
                                                            @if(count($project->socail_datas)>0)
                                                                @foreach ($project->socail_datas as $key=>$socail_data)
                                                                    <tr id="row-{{ $key }}" >
                                                                        <td>{{$key+1}}</td>
                                                                        <td>
                                                                            <select id="gdpaper_id" alt="{{ $key }}" class="mobile form-select" name="socail_types[]">
                                                                                <option value="" selected>請選擇...</option>
                                                                                <option value="0" @if($socail_data->type == '0') selected @endif>網站</option>
                                                                                <option value="1" @if($socail_data->type == '1') selected @endif>社群</option>
                                                                                <option value="2" @if($socail_data->type == '2') selected @endif>其他</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="socail_contexts[]" value="{{ $socail_data->context }}">
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
                                                                            <select id="gdpaper_id" alt="{{ $i }}" class="mobile form-select" name="socail_types[]">
                                                                                <option value="" selected>請選擇...</option>
                                                                                <option value="0">網站</option>
                                                                                <option value="1">社群</option>
                                                                                <option value="2">其他</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="socail_contexts[]" value="">
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
                                                    <input id="add_socail" class="btn btn-primary" type="button" name="" value="新增筆數">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row mt-3 appendix">
                                        <label for="example-search-input" class="col-form-label"><b>附件上傳</b>（EX：公司介紹、產品簡報）</label>
                                        <div class="pl-5">
                                            <div class="alert alert-primary" role="alert">
                                                上傳網址： <a href="{{ $project->nas_link }}" target="_blank" class="alert-link">請點擊我</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
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

                                    <hr class="mt-4 mb-4">

                                    <div class="col-md-12 mt-3">
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">人事名單（不含主持人及聯絡人，需再提供5-7位）</h5>
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
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody valign="center" align="center">
                                                            @if(count($project->personnel_datas)>0)
                                                                @foreach ($project->personnel_datas as $key=>$personnel_data)
                                                                    <tr id="row-{{ $key }}" >
                                                                        <td>{{$key+1}}</td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="personnel_names[]" value="{{ $personnel_data->name }}">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h2>五家被帶動的企業</h2>
                                    <p class="font-size-18">申請計畫使用</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">企業名單(需至少提供5家被帶動企業)</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="branch" class="table branch-list">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>編號</th>
                                                                <th>名稱<span class="text-danger">*</span></th>
                                                                <th>統一編號<span class="text-danger">*</span></th>
                                                                <th>負責人<span class="text-danger">*</span></th>
                                                                <th>員工數<span class="text-danger">*</span></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody valign="center" align="center">
                                                            @if(count($project->drive_datas)>0)
                                                                @foreach ($project->drive_datas as $key=>$drive_data)
                                                                    <tr id="row-{{ $key }}" >
                                                                        <td>{{$key+1}}</td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_names[]" value="{{ $drive_data->name }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_numbers[]" value="{{ $drive_data->numbers }}">
                                                                        </td>
                                                                        <td>
                                                                        <input id="pay_price-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_principals[]" value="{{ $drive_data->principal }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $key }}" class="mobile form-control required-input" type="text" name="drive_employeecounts[]" value="{{ $drive_data->employeecount }}">
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
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_names[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_numbers[]" value="">
                                                                        </td>
                                                                        <td>
                                                                        <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_principals[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_price-{{ $i }}" class="mobile form-control required-input" type="text" name="drive_employeecounts[]" value="">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h2>現況</h2>
                                    <p class="font-size-18">申請計畫使用</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="alert alert-danger" role="alert">
                                            公司現在原有的系統有哪些？請簡述系統及購入廠商（ex：採購系統、電商平台等）
                                        </div>
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">現況列表</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="situation" class="table situation-list">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>簡述內容<span class="text-danger">*</span></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody valign="center" align="center">
                                                            @if(count($project->situation_datas)>0)
                                                                @foreach ($project->situation_datas as $key=>$situation_data)
                                                                    <tr id="row-{{ $key }}" valign="middle">
                                                                        <td width="90%">
                                                                            <textarea  class="form-control required-input" name="situation_contexts[]" rows="2">{{ $situation_data->context }}</textarea>
                                                                        </td>
                                                                        <td>
                                                                            <button class="mobile btn btn-danger del-row" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                @for ($i = 0; $i < 1; $i++)
                                                                    <tr id="row-{{ $i }}" valign="middle">
                                                                        <td width="90%">
                                                                            <textarea  class="form-control required-input" name="situation_contexts[]" rows="2"></textarea>
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
                                                    <input id="add_situation" class="btn btn-primary" type="button" name="" value="新增筆數">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h2>需求</h2>
                                    <p class="font-size-18">申請計畫使用</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="alert alert-danger" role="alert">
                                            此次預計導入的系統有哪些？請簡述系統及預計購入廠商
                                            （ex：採購系統、電商平台等）
                                            並請針對想更新或汰換的系統或設備進行排序
                                        </div>
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">需求列表</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="need" class="table need-list">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>編號</th>
                                                                <th>系統名稱<span class="text-danger">*</span></th>
                                                                <th>購入內容簡述<span class="text-danger">*</span></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody valign="center" align="center">
                                                            @if(count($project->need_datas)>0)
                                                                @foreach ($project->need_datas as $key=>$need_data)
                                                                    <tr id="row-{{ $key }}" >
                                                                        <td>{{$key+1}}</td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="need_names[]" value="{{ $need_data->name }}">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $key }}" class="mobile form-control required-input" type="text" name="need_contexts[]" value="{{ $need_data->context }}">
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
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="need_names[]" value="">
                                                                        </td>
                                                                        <td>
                                                                            <input id="pay_date-{{ $i }}" class="mobile form-control required-input" type="text" name="need_contexts[]" value="">
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
                                                    <input id="add_need" class="btn btn-primary" type="button" name="" value="新增筆數">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-2">
                            <div class="col text-center">
                                <button class="btn btn-danger" onclick="history.go(-1)"><i class="bx bx-x me-1"></i> 取消 </button>
                                <button class="btn btn-success" type="submit" id="btn_storage"><i class="bx bx-file me-1"></i> 暫存 </button>
                                
                                <a href="{{ route('project.business.appendix') }}">
                                    <button class="btn btn-primary" type="button" id="btn_submit"><i class=" bx bx-check me-1"></i> 確認送出 </button>
                                </a>
                            </div> <!-- end col -->
                        </div>

    </form>
    

                        </div> <!-- end row-->  

            </div>

            

            
        </div>

        

    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/twzipcode-1.4.1-min.js') }}"></script>

        <script>
            $(document).ready(function(){
                $(".twzipcode").twzipcode({
                    css: ["twzipcode-select", "twzipcode-select" , "twzipcode-hidden"], // 自訂 "城市"、"地區" class 名稱 
                    countyName: "county", // 自訂城市 select 標籤的 name 值
                    districtName: "district", // 自訂地區 select 標籤的 name 值
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
            });

            var branchRowCount = $('#branch tbody tr').length;

            $('#add_branch').click(function() {
                branchRowCount++;
                var newRow = `<tr id="row-${branchRowCount}">
                                <td>
                                    ${branchRowCount}
                                </td>
                                <td>
                                    <input id="pay_date-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_names[]" value="" required>
                                </td>
                                <td>
                                    <input id="department-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_numbers[]" value="" required>
                                </td>
                                <td>
                                    <input id="title-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_principals[]" value="" required>
                                </td>
                                <td>
                                    <input id="work_content-${branchRowCount}" class="mobile form-control required-input" type="text" name="drive_employeecounts[]" value="" required>
                                </td>
                                <td>
                                    <button class="mobile btn btn-danger del-row" alt="${branchRowCount}" type="button" name="button">刪除</button>
                                </td>
                             </tr>`;
                $('#branch tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#branch').on('click', '.del-row', function() {
                if(branchRowCount < 5){
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
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
