@extends('layouts.master')
@section('title')
    新增廠商資料
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    新增廠商資料
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
                    <h4 class="mt-3">新增製造類資料成功！</h4>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <form action="{{ route('cust.introduce.store') }}" method="POST">
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
                                        <label class="form-label" for="AddNew-Username"><b>廠商名稱</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required-input" value="{{ $project->user_data->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>去年整年度營業額（單位：元/新台幣）</b><span class="text-danger">*</span></label>
                                        <input type="number" class="form-control required-input" name="last_year_revenue" @if(isset($project)) value="{{ $project->last_year_revenue }}" @else value="0" @endif>
                                    </div>
                                </div>
                                {{-- {{ dd($project->cust_data)}} --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="AddNew-Phone"><b>公司工廠登記地址</b>(若有超過一間工廠，請選一間工廠作為標的)<span class="text-danger">*</span></label>
                                    <div class="row twzipcode mb-2">
                                        <select data-role="county" data-value="{{ $project->cust_data->county }}" selected></select>
                                        <select data-role="district"  data-value="{{ $project->cust_data->district }}"></select>
                                        <select data-role="zipcode"  data-value="{{ $project->cust_data->zipcode }}"></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="AddNew-Phone">&nbsp;</label>
                                    <input type="text" class="form-control" name="address" value="{{ $project->cust_data->address }}" >
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>近一年平均投保人數</b>（申請計畫使用）<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control required-input" name="Insured_employees" placeholder="近一年平均投保人數" @if(isset($project)) value="{{ $project->insured_employees }}" @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>最近一期勞保投保人數</b>（申請計畫使用）<span class="text-danger">*</span></label>
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
                                    <label class="form-label" for="AddNew-Username"><b>公司主要聯繫窗口</b>（用於與錚典對接）<span class="text-danger">*</span></label>
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
                                <hr>
                                <div class="col-md-12 font-size-18">
                                    <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                    <input type="checkbox" class="form-check-input" name="customCheck1" id="customCheck1" value="{{ $project->subsidy == '1' ? '1' : '0' }}" {{ $project->subsidy == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="customCheck1"><span class="text-danger">有</span>申請其他政府機關之研發或升級轉型補助</label>
                                </div>
                                <div class="col-md-8 px-5 mb-4" id="customCheck1_div">
                                    @if($project->subsidy == '1')
                                        @if(count($project->manufacture_subsidy_datas) > 0)
                                            @foreach($project->manufacture_subsidy_datas as $project->manufacture_subsidy_data)
                                            <div class="customCheck1_data row mt-2">
                                                <div class="col-4">
                                                    <input type="text" class="form-control" name="subsidy_years[]" value="{{ $project->manufacture_subsidy_data->year }}" placeholder="請提供年份">
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" class="form-control" name="subsidy_names[]" value="{{ $project->manufacture_subsidy_data->name }}" placeholder="請提供計畫名稱">
                                                </div>
                                                <div class="col-2">
                                                    <button class="mobile btn btn-danger del-row" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="customCheck1_container ">
                                                <!-- 這裡放置您原有的自定義檢查項目 HTML 程式碼 -->
                                            </div>
                                            <div class="form-group row mt-3">
                                                <div class="col-12">
                                                <input id="add_customCheck1" class="btn btn-primary" type="button" name="" value="新增筆數">
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="customCheck1_data row">
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="subsidy_years[]" value="" placeholder="請提供年份">
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="subsidy_names[]" value="" placeholder="請提供計畫名稱">
                                            </div>
                                            <div class="col-2">
                                                <button class="mobile btn btn-danger del-row" type="button" name="button" onclick="del_row(this)">刪除</button>
                                            </div>
                                        </div>
                                        <div class="customCheck1_container ">
                                             <!-- 這裡放置您原有的自定義檢查項目 HTML 程式碼 -->
                                        </div>
                                        <div class="form-group row mt-3">
                                            <div class="col-12">
                                            <input id="add_customCheck1" class="btn btn-primary" type="button" name="" value="新增筆數">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                

                                <div class="col-md-12 font-size-18">
                                    <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                    <input type="checkbox" class="form-check-input" name="customCheck2" id="customCheck2" value="{{ $project->avoid == '1' ? '1' : '0' }}" {{ $project->avoid == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="customCheck2"><span class="text-danger">有</span>須於審查階段迴避之人員</label>
                                </div>
                                <div class="row px-5" id="customCheck2_div">
                                    @if($project->avoid == '1')
                                        @if(isset($project->manufacture_avoid_data))
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="avoid_department" value="{{$project->manufacture_avoid_data->department}}"  placeholder="單位">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="avoid_job" value="{{$project->manufacture_avoid_data->job}}" placeholder="職稱" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="avoid_name" value="{{$project->manufacture_avoid_data->name}}" placeholder="姓名">
                                            </div>
                                        @endif
                                    @else
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="avoid_department" value=""  placeholder="單位">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="avoid_job" value="" placeholder="職稱" >
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="avoid_name" value="" placeholder="姓名">
                                        </div>
                                    @endif
                                </div>

                                <hr class="mt-3">
                                <div class="col-md-12 row mt-3 appendix">
                                    <label for="example-search-input" class="col-form-label"><b>附件上傳</b>（EX：公司介紹、產品簡報）<span class="text-danger">*</span></label>
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
                                <h2>公司簡介</h2>
                                <p class="font-size-18">申請計畫使用<span class="text-danger">*</span></p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>公司基本介紹</b><span class="text-danger">*</span></label>
                                        <textarea  class="form-control required-input" name="introduce" rows="4">@if(isset($cust_data)){{ $cust_data->introduce }}@endif</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>產品製程圖</b><span class="text-danger">*</span></label>
                                        <div class="col-md-12 appendix">
                                            <div class="pl-5">
                                                <div class="alert alert-primary" role="alert">
                                                    上傳網址： <a href="{{ $project->nas_link }}" target="_blank" class="alert-link">請點擊我</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>主要客戶與市場</b>(如過往公司有介紹簡報有提到相關內容也可提供)<span class="text-danger">*</span></label>
                                        <textarea  class="form-control required-input" name="clients_market" rows="4">{{ $project->clients_market }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>公司產品出口情形/比例</b><span class="text-danger">*</span></label>
                                        <textarea  class="form-control required-input" name="export_status" rows="4">{{ $project->export_status }}</textarea>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="AddNew-Phone"><b>前三年營收</b><span class="text-danger">*</span></label>
                                </div>
                                @if(count($project->manufacture_income_datas) > 0)
                                    @foreach($project->manufacture_income_datas as $project->manufacture_income_data)
                                        <div class="col-md-4">
                                            <label class="form-label" for="AddNew-Phone"><b>{{$project->manufacture_income_data->year}}年度</b><span class="text-danger">*</span></label>
                                            <input type="hidden" class="form-control" name="three_years[]" value="{{$project->manufacture_income_data->year}}">
                                            <input type="number" class="form-control" name="three_incomes[]" value="{{$project->manufacture_income_data->income}}">
                                        </div>
                                    @endforeach
                                @else
                                    @foreach($years as $year)
                                        <div class="col-md-4">
                                            <label class="form-label" for="AddNew-Phone"><b>{{$year}}年度</b><span class="text-danger">*</span></label>
                                            <input type="hidden" class="form-control" name="three_years[]" value="{{$year}}">
                                            <input type="number" class="form-control" name="three_incomes[]" value="" placeholder="{{$year}}年">
                                        </div>
                                    @endforeach
                                @endif


                                <hr class="mt-4 mb-4">
                                <label class="form-label" for="AddNew-Username"><b>公司指標客戶（請列舉3-5家）</b><span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive mt-1">
                                            <table id="customer" class="table customer-list">
                                                <thead>
                                                    <tr align="center">
                                                        <th>編號</th>
                                                        <th>公司指標客戶<span class="text-danger">*</span></th>
                                                        <th>指標客戶服務<span class="text-danger">*</span></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody valign="center" align="center">
                                                    @if(count($project->manufacture_norm_datas)>0)
                                                            @foreach ($project->manufacture_norm_datas as $key=>$manufacture_norm_data)
                                                            <tr id="row-{{ $key }}" valign="middle" >
                                                                <td>{{$key+1}}</td>
                                                                <td width="30%">
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="norm_names[]" value="{{ $manufacture_norm_data->name }}">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="norm_contexts[]" value="{{ $manufacture_norm_data->context }}">
                                                                </td>
                                                                <td>
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                    @else
                                                        @for ($i = 0; $i < 1; $i++)
                                                            <tr id="row-{{ $i }}" valign="middle" >
                                                                <td>{{$i+1}}</td>
                                                                <td width="30%">
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="norm_names[]" value="">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="norm_contexts[]" value="">
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
                                            <input id="add_customer" class="btn btn-primary" type="button" name="" value="新增筆數">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group row mt-3">
                                    <div class="col-12">
                                    <input id="add_norm" class="btn btn-primary" type="button" name="" value="新增筆數">
                                    </div>
                                </div> --}}
                                <hr class="mt-4 mb-4">

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-1">公司對外的網站或社群網址-若有不只一個，請都附上。若無，請寫「無」即可<span class="text-danger">*</span></h5>
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

                                <hr class="mt-4 mb-4">

                                <div class="col-md-12 font-size-18">
                                    <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                    <input type="checkbox" class="form-check-input" name="carbonCheck" id="carbonCheck" value="{{ $project->carbon_done == '1' ? '1' : '0' }}" {{ $project->carbon_done == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="carbonCheck">是否做過碳盤查？</label>
                                    @if($project->carbon_done == '0')
                                        <span class="text-danger" id="carbonCheck_text">※否，請提供最近一年度全年度的油(柴油、汽油)、電(要注意一般用電或是契約用電)、水、天然氣費帳單</span>
                                    @elseif($project->carbon_done == '1')
                                    <span class="text-danger" id="carbonCheck_text">※是，請提供碳排查報告</span>
                                    @endif
                                </div>

                                <div class="col-md-12 font-size-18">
                                    <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                    <input type="checkbox" class="form-check-input" name="checkIso" id="checkIso"  value="{{ $project->carbon_iso == '1' ? '1' : '0' }}" {{ $project->carbon_iso == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkIso">是否有已申請過的ISO或是目前正在申請的ISO資訊？</label>
                                </div>
                                    <div class="checkIso_div px-5">
                                        @if($project->carbon_iso == '1')
                                            @if(count($project->manufacture_iso_datas) > 0)
                                                @foreach($project->manufacture_iso_datas as $manufacture_iso_data)
                                                    <div class="row  mt-2" >
                                                        <div class="col-md-2">
                                                            <input type="text" class="form-control" name="iso_names[]" value="{{ $manufacture_iso_data->name }}"  placeholder="ISO名稱">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" class="form-control" name="iso_years[]" value="{{ $manufacture_iso_data->year }}"  placeholder="年份">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select class="form-select" name="iso_status[]" >
                                                                <option value="" selected>選擇狀態</option>
                                                                <option value="0" @if($manufacture_iso_data->status = '0') selected @endif>已通過</option>
                                                                <option value="1" @if($manufacture_iso_data->status = '1') selected @endif>申請中</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="mobile btn btn-danger del-row" alt="" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @else
                                            @for ($i = 0; $i < 1; $i++)
                                                <div class="row  mt-2" >
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" name="iso_names[]" value=""  placeholder="ISO名稱">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" name="iso_years[]" value=""  placeholder="年份">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select class="form-select" name="iso_status[]" >
                                                            <option value="" selected>選擇狀態</option>
                                                            <option value="0">已通過</option>
                                                            <option value="1">申請中</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="mobile btn btn-danger del-row" alt="" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                    </div>
                                                </div>
                                            @endfor 
                                        @endif
                                        
                                        <div class="form-group row mt-3">
                                            <div class="col-12">
                                                <input id="add_iso" class="btn btn-primary" type="button" name="" value="新增筆數">
                                            </div>
                                        </div>
                                    </div>    
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 mb-2">
                        <div class="col text-center">
                            <button class="btn btn-success" type="submit" id="btn_storage"><i class="bx bx-file me-1"></i> 暫存 </button>
                            <a href="{{ route('project.business.appendix') }}">
                                <button class="btn btn-primary" type="button" id="btn_submit"><i class=" bx bx-check me-1"></i> 確認送出 </button>
                            </a>
                        </div> <!-- end col -->
                    </div>
                </form>
                </div>


        </div>

        
    </div>


    @endsection
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
                    'countySel': '{{ $project->cust_data->county }}',
                    'districtSel': '{{ $project->cust_data->district }}',
                    'zipcodeSel': '{{ $project->cust_data->zipcode }}'
                });

                
                @if(session('success'))
                    $('#success-btn').modal('show');
                @endif
            });

            $(document).ready(function() {

                var customerRowCount = $('#customer tbody tr').length;

                $('#add_customer').click(function() {
                        customerRowCount++;
                        var newRow = `<tr id="row-${customerRowCount}">
                                        <td>
                                            ${customerRowCount}
                                        </td>
                                        <td width="30%">
                                            <input id="pay_date-${customerRowCount}" class="mobile form-control" type="text" name="norm_names[]" value="" required>
                                        </td>
                                        <td>
                                            <input id="department-${customerRowCount}" class="mobile form-control" type="text" name="norm_contexts[]" value="" required>
                                        </td>
                                        <td>
                                            <button class="mobile btn btn-danger del-row" alt="${customerRowCount}" type="button" name="button">刪除</button>
                                        </td>
                                    </tr>`;
                        $('#customer tbody').append(newRow);
                });

                // Event delegation for dynamically added elements
                $('#customer').on('click', '.del-row', function() {
                    $(this).closest('tr').remove();
                    customerRowCount--;
                });

                var socailRowCount = $('#socail tbody tr').length;

                $('#add_socail').click(function() {
                        socailRowCount++;
                        var newRow = `<tr id="row-${socailRowCount}">
                                        <td>
                                            ${socailRowCount}
                                        </td>
                                        <td>
                                            <select id="gdpaper_id_${socailRowCount}" alt="${socailRowCount}" class="mobile form-select" name="gdpaper_ids[]">
                                                <option value="" selected>請選擇...</option>
                                                <option value="0">網站</option>
                                                <option value="1">社群</option>
                                                <option value="2">其他</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input id="department-${socailRowCount}" class="mobile form-control" type="text" name="department[]" value="" required>
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

                

                //新增計劃案
                $('#add_customCheck1').click(function() {
                    var newCustomCheck = `
                        <div class="customCheck1_data row mt-2">
                            <div class="col-4">
                                <input type="text" class="form-control" name="subsidy_years[]" value="" placeholder="請提供年份">
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" name="subsidy_names[]" value="" placeholder="請提供機關名稱">
                            </div>
                            <div class="col-2">
                                <button class="mobile btn btn-danger del-row" type="button" name="button">刪除</button>
                            </div>
                        </div>`;
                    $('.customCheck1_container').append(newCustomCheck);
                });

                // 刪除自定義檢查項目的功能
                $(document).on('click', '.del-row', function() {
                    $(this).closest('.customCheck1_data').remove();
                });

                

                // Event delegation for dynamically added elements
                $('#preson').on('click', '.del-row', function() {
                    $(this).closest('tr').remove();
                    presonRowCount--;
                });
            });

            

           
            $("#customCheck1_div").hide();
            $("#customCheck2_div").hide();
            $(".checkIso_div").hide();
            $("#CheckNeed_div").hide();
            

            if ($("#customCheck1").is(':checked')) {
                // 如果被選中，顯示 #customCheck1_div
                $("#customCheck1_div").show(300);
            } else {
                // 否則隱藏 #customCheck1_div
                $("#customCheck1_div").hide();
            }

            $("#customCheck1").on("change", function() {
                // 首先，將 checkbox 的值設置為 0
                $("#customCheck1").val(0);

                // 檢查 checkbox 是否被選中
                if ($("#customCheck1").is(':checked')) {
                    // 如果被選中，顯示相關的 HTML 元素並將值改為 1
                    $("#customCheck1_div").show(300);
                    $("#customCheck1").val(1);
                } else {
                    // 如果未被選中，隱藏相關的 HTML 元素
                    $("#customCheck1_div").hide(300);
                }
            });



            if ($("#customCheck2").is(':checked')) {
                // 如果被選中，顯示 #customCheck1_div
                $("#customCheck2_div").show(300);
            } else {
                // 否則隱藏 #customCheck1_div
                $("#customCheck2_div").hide();
            }

            $("#customCheck2").on("change", function() {
                if ($(this).is(':checked')) {
                    $("#customCheck2_div").show(300);
                    $(this).val(1);
                }
                else {
                    $("#customCheck2_div").hide(300);
                }
            });

            $("#carbonCheck").on("change", function() {
                if ($(this).is(':checked')) {
                    $("#carbonCheck_text").html('※是，請提供碳排查報告');
                    $("#carbon_need_text").html('是 - 碳盤查報告書');
                    $(this).val(1);
                }
                else {
                    $(this).val(0);
                    $("#carbonCheck_text").html('※否，請提供最近一年度全年度的油(柴油、汽油)、電(要注意一般用電或是契約用電)、水、天然氣費帳單');
                    $("#carbon_need_text").html('否 - 油(柴油、汽油)、電(要注意一般用電或是其他用電)、水、天然氣費帳單是 - 碳盤查報告書');
                }
                console.log($(this).val());
            });

            if ($("#checkIso").is(':checked')) {
                // 如果被選中，顯示 #customCheck1_div
                $(".checkIso_div").show(300);
            } else {
                // 否則隱藏 #customCheck1_div
                $(".checkIso_div").hide();
            }

            $("#checkIso").on("change", function() {
                if ($(this).is(':checked')) {
                    $(".checkIso_div").show(300);
                    $(this).val(1);
                }
                else {
                    $(".checkIso_div").hide(300);
                }
            });

            $(".checkIso_div").on("click", ".del-row", function() {
                $(this).closest('.row').remove();
            });

            // 新增按鈕的事件處理器
            $("#add_iso").click(function() {
                // 使用模板來創建新行
                var newRow = `
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="iso_names[]" value=""  placeholder="ISO名稱">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="iso_years[]" value=""  placeholder="年份">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="iso_status[]">
                                <option value="" selected>選擇狀態</option>
                                <option value="0">已通過</option>
                                <option value="1">申請中</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="mobile btn btn-danger del-row" type="button" name="button">刪除</button>
                        </div>
                    </div>
                `;
                // 將新行插入到表單中
                $(".checkIso_div .form-group").before(newRow);
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
