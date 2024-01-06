@extends('layouts.master')
@section('title')
    新增廠商-製造業
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    新增廠商-製造業
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
    <form action="{{ route('project.Manufacturing.store') }}" method="POST">
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
                                        <label class="form-label" for="AddNew-Phone"><b>去年整年度營業額（單位：元/新台幣）</b></label>
                                        <input type="number" class="form-control required-input" name="last_year_revenue" @if(isset($project)) value="{{ $project->last_year_revenue }}" @else value="0" @endif>
                                    </div>
                                </div>
                                {{-- {{ dd($project->cust_data)}} --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="AddNew-Phone"><b>公司工廠登記地址</b>(若有超過一間工廠，請選一間工廠作為標的)</label>
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
                                <hr>
                                <div class="col-md-12 font-size-18">
                                    <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                    <input type="checkbox" class="form-check-input" name="customCheck1" id="customCheck1" value="1">
                                    <label class="form-check-label" for="customCheck1"><span class="text-danger">有</span>申請其他政府機關之研發或升級轉型補助</label>
                                </div>
                                <div class="col-md-8 px-5 mb-4" id="customCheck1_div">
                                    <div class="customCheck1_data row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="name" value="" placeholder="請提供年份">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="name" value="" placeholder="請提供計畫名稱">
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
                                        <input id="add_customCheck1" class="btn btn-primary" type="button" name="" value="新增附件">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 font-size-18">
                                    <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                    <input type="checkbox" class="form-check-input" name="customCheck2" id="customCheck2" value="0">
                                    <label class="form-check-label" for="customCheck2"><span class="text-danger">有</span>須於審查階段迴避之人員</label>
                                </div>
                                <div class="row px-5" id="customCheck2_div">
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="name" value=""  placeholder="單位">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="name" value="" placeholder="職稱" >
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="name" value="" placeholder="姓名">
                                    </div>
                                </div>

                                <hr class="mt-3">
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
                                <h2>公司簡介</h2>
                                <p class="font-size-18">申請計畫使用</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>公司基本介紹</b></label>
                                        <textarea  class="form-control required-input" name="introduce" rows="4">@if(isset($cust_data)){{ $cust_data->introduce }}@endif</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>產品製程圖</b></label>
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
                                        <label class="form-label" for="AddNew-Phone"><b>主要客戶與市場</b>(如過往公司有介紹簡報有提到相關內容也可提供)</label>
                                        <textarea  class="form-control required-input" name="clients_market" rows="4">{{ $project->clients_market }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>公司產品出口情形/比例</b></label>
                                        <textarea  class="form-control required-input" name="export_status" rows="4">{{ $project->export_status }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Phone"><b>前三年營收</b></label>
                                    <input type="number" class="form-control" name="name" value="" placeholder="2021">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Username"><b>&nbsp;</b></label>
                                    <input type="number" class="form-control" name="name" value="" placeholder="2022">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Username"><b>&nbsp;</b></label>
                                    <input type="number" class="form-control" name="name" value="" placeholder="2023" >
                                </div>

                                <hr class="mt-4 mb-4">
                                <label class="form-label" for="AddNew-Username"><b>公司指標客戶（請列舉3-5家）</b></label>
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
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="norm_context[]" value="{{ $manufacture_norm_data->context }}">
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
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="norm_context[]" value="">
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

                                <hr class="mt-4 mb-4">

                                <div class="col-md-12 font-size-18">
                                    <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                    <input type="checkbox" class="form-check-input" name="carbonCheck" id="carbonCheck" value="1">
                                    <label class="form-check-label" for="carbonCheck">是否做過碳盤查？</label>
                                    <span class="text-danger" id="carbonCheck_text">※否，請提供最近一年度全年度的油(柴油、汽油)、電(要注意一般用電或是契約用電)、水、天然氣費帳單</span>
                                </div>

                                <div class="col-md-12 font-size-18">
                                    <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                    <input type="checkbox" class="form-check-input" name="checkIso" id="checkIso" value="0">
                                    <label class="form-check-label" for="checkIso">是否有已申請過的ISO或是目前正在申請的ISO資訊？</label>
                                </div>
                                    <div class="checkIso_div">
                                        @for ($i = 0; $i < 1; $i++)
                                            <div class="row px-5 mt-2" >
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="name" value=""  placeholder="ISO名稱">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="name" value=""  placeholder="年份">
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-select"  id="create_scope_id" name="scope_id" >
                                                        <option value="" selected>選擇狀態</option>
                                                        <option value="">已通過</option>
                                                        <option value="">申請中</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="mobile btn btn-danger del-row" alt="" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                </div>
                                            </div>
                                        @endfor
                                        <div class="form-group row mt-3 px-5">
                                            <div class="col-12">
                                                <input id="add_iso" class="btn btn-primary" type="button" name="" value="新增筆數">
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
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">計畫主持人資料</h5>
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
                                    <label class="form-label" for="AddNew-Username"><b>專長/經歷</b></label>
                                    <input type="text" class="form-control required-input" name="host_experience" @if(isset($project_host_data)) value="{{ $project_host_data->experience }}" @endif >
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
                                    <label class="form-label" for="AddNew-Username"><b>專長/經歷</b></label>
                                    <input type="text" class="form-control required-input" name="contact_experience" @if(isset($project_contact_data)) value="{{ $project_contact_data->experience }}" @endif >
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
                                    <input type="text" class="form-control required-input" name="contact_email" @if(isset($project_contact_data)) value="{{ $project_contact_data->email }}" @endif >
                                </div>

                                <hr class="mt-4 mb-4">

                                <div class="col-md-12 mt-3">
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">人事名單（約4-6位-皆須在勞保投保明細中）</h5>
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
                                                            <th>專長經歷<span class="text-danger">*</span></th>
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
                                                                        <input id="pay_price-{{ $key }}" class="mobile form-control required-input" type="text" name="personnel_experiences[]" value="{{ $personnel_data->experience }}">
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
                                                                        <input id="pay_price-{{ $key }}" class="mobile form-control required-input" type="text" name="personnel_s[]" value="">
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
                                <h2>需求</h2>
                                <p class="font-size-18">申請計畫使用</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-1">
                                    <div class="alert alert-danger text-center" role="alert">
                                        公司現在原有的系統或設備（有在財產清冊裡的設備即可）有哪些？哪一些設備已使用10-15年？當初向哪家廠商購入請簡述
                                        （ex：空壓機、冷凍機、採購系統、ERP企業資源計劃系統、MES執行系統...等）<br>
                                        📌並請針對想更新或汰換的系統或設備進行排序
                                    </div>
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">需求列表</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="need" class="table need-list">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>簡述內容<span class="text-danger">*</span></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  align="center">
                                                        @if(count($project->manufacture_need_datas)>0)
                                                            @foreach ($project->manufacture_need_datas as $key=>$manufacture_need_data)
                                                                <tr id="row-{{ $key }}" valign="middle" >
                                                                    <td width="90%">
                                                                        <textarea  class="form-control" name="need_contexts[]" rows="2">{{ $manufacture_need_data->context }}</textarea>
                                                                    </td>
                                                                    <td>
                                                                          <button class="mobile btn btn-danger del-row" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                     </td>
                                                                  </tr>
                                                             @endforeach
                                                        @else
                                                            @for ($i = 0; $i < 1; $i++)
                                                                <tr id="row-{{ $i }}" valign="middle" >
                                                                    <td width="90%">
                                                                        <textarea  class="form-control" name="need_contexts[]" rows="2"></textarea>
                                                                    </td>
                                                                    <td valign="center">
                                                                        <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                    </td>
                                                                </tr>
                                                            @endfor
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div> <!-- end .table-responsive -->
                                            <div class="form-group row mb-4">
                                                <div class="col-12">
                                                <input id="add_need" class="btn btn-primary" type="button" name="" value="新增筆數">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <h5 class="text-uppercase bg-light p-2 mt-4 mb-3">預計購買新設備等設備資訊列表</h5>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="need-device" class="table need-device-list">
                                                <thead>
                                                    <tr align="center">
                                                        <th>設備名稱</th>
                                                        <th>設備品牌</th>
                                                        <th>設備型號</th>
                                                        <th>用途/規格</th>
                                                        <th>費用</th>
                                                        <th>採購對象</th>
                                                        <th>產地</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody valign="center" align="center">
                                                    @if(count($project->manufacture_expected_datas)>0)
                                                        @foreach ($project->manufacture_expected_datas as $key=>$manufacture_expected_data)
                                                            <tr id="row-{{ $key }}" valign="middle" >
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="expected_names[]" value="{{ $manufacture_expected_data->name }}">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="expected_brands[]" value="{{ $manufacture_expected_data->brand }}">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="expected_models[]" value="{{ $manufacture_expected_data->model }}">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="expected_purposes[]" value="{{ $manufacture_expected_data->purpose }}">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="expected_costs[]" value="{{ $manufacture_expected_data->cost }}">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="expected_procurements[]" value="{{ $manufacture_expected_data->procurement }}">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="expected_origins[]" value="{{ $manufacture_expected_data->origin }}">
                                                                </td>
                                                                <td>
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        @for ($i = 0; $i < 1; $i++)
                                                            <tr id="row-{{ $i }}" >
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="expected_names[]" value="">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="expected_brands[]" value="">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="expected_models[]" value="">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="expected_purposes[]" value="">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="expected_costs[]" value="">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="expected_procurements[]" value="">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="expected_origins[]" value="">
                                                                </td>
                                                                <td>
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        </div> <!-- end .table-responsive -->
                                        <div class="form-group row mb-4">
                                            <div class="col-12">
                                            <input id="add_device_need" class="btn btn-primary" type="button" name="" value="新增筆數">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                <h5 class="text-uppercase bg-light p-2 mt-4 mb-3">預計改善設備等設備資訊</h5>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="expected-device" class="table expected-device-list">
                                                <thead>
                                                    <tr align="center">
                                                        <th>設備名稱</th>
                                                        <th>改善重點</th>
                                                        <th>費用</th>
                                                        <th>委託對象</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody valign="center" align="center">
                                                    @if(count($project->manufacture_improve_datas)>0)
                                                        @foreach ($project->manufacture_improve_datas as $key=>$manufacture_improve_data)
                                                            <tr id="row-{{ $key }}" >
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="improve_names[]" value="{{ $manufacture_improve_data->name }}">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="improve_focuss[]" value="{{ $manufacture_improve_data->focus }}">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="improve_costs[]" value="{{ $manufacture_improve_data->cost }}">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $key }}" class="mobile form-control" type="text" name="improve_delegate_objects[]" value="{{ $manufacture_improve_data->delegate_object }}">
                                                                </td>
                                                                <td>
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $key }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        @for ($i = 0; $i < 1; $i++)
                                                            <tr id="row-{{ $i }}" >
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="improve_names[]" value="">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="improve_focuss[]" value="">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="improve_costs[]" value="">
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="improve_delegate_objects[]" value="">
                                                                </td>
                                                                <td>
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        </div> <!-- end .table-responsive -->
                                        <div class="form-group row mb-4">
                                            <div class="col-12">
                                            <input id="add_device_expected" class="btn btn-primary" type="button" name="" value="新增筆數">
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
                        
                            </div>
                        </div>
                    </div>
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
                                            <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="norm_names[]" value="" required>
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

                $('#add_appendix').click(function() {
                    var appendixCount = $('.appendix').length;
                    var newAppendix = `
                        <div class="col-md-12 row mt-3 appendix">
                            <div class="col-11">
                                <div id="Step1_inputGroupFile0${appendixCount+1}-preview"></div>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="Step1_inputGroupFile0${appendixCount+1}" name="Step1_inputGroupFile0${appendixCount+1}" aria-describedby="inputGroupFileAddon0${appendixCount+1}" aria-label="Upload">
                                    <button class="btn btn-primary" type="button" id="Step1_inputGroupFileAddon0${appendixCount+1}">上傳</button>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="mobile btn btn-danger del-row" type="button" name="button">刪除</button>
                            </div>
                        </div>`;
                    $('.appendix-container').append(newAppendix);
                });

                // 刪除附件的功能
                $(document).on('click', '.del-row', function() {
                    $(this).closest('.appendix').remove();
                });

                //新增計劃案
                $('#add_customCheck1').click(function() {
                    var newCustomCheck = `
                        <div class="customCheck1_data row mt-2">
                            <div class="col-4">
                                <input type="text" class="form-control" name="name" value="" placeholder="請提供年份">
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" name="name" value="" placeholder="請提供機關名稱">
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

                var presonRowCount = $('#preson tbody tr').length;

                $('#add_preson').click(function() {
                    if (presonRowCount < 6) {
                        presonRowCount++;
                        var newRow = `<tr id="row-${presonRowCount}">
                                        <td>
                                            ${presonRowCount}
                                        </td>
                                        <td>
                                            <input id="pay_date-${presonRowCount}" class="mobile form-control" type="text" name="personnel_names[]" value="" required>
                                        </td>
                                        <td>
                                            <input id="department-${presonRowCount}" class="mobile form-control" type="text" name="personnel_departments[]" value="" required>
                                        </td>
                                        <td>
                                            <input id="title-${presonRowCount}" class="mobile form-control" type="text" name="personnel_jobs[]" value="" required>
                                        </td>
                                        <td>
                                            <input id="title-${presonRowCount}" class="mobile form-control" type="text" name="personnel_contexts[]" value="" required>
                                        </td>
                                        <td>
                                            <input id="title-${presonRowCount}" class="mobile form-control" type="text" name="personnel_experiences[]" value="" required>
                                        </td>
                                        <td>
                                            <button class="mobile btn btn-danger del-row" alt="${presonRowCount}" type="button" name="button">刪除</button>
                                        </td>
                                    </tr>`;
                        $('#preson tbody').append(newRow);
                    } else {
                        alert('已達8筆最高新增上限');
                    }
                });

                // Event delegation for dynamically added elements
                $('#preson').on('click', '.del-row', function() {
                    $(this).closest('tr').remove();
                    presonRowCount--;
                });
            });

            var branchRowCount = $('#branch tbody tr').length;

            $('#add_branch').click(function() {
                if (branchRowCount < 5) {
                    branchRowCount++;
                    var newRow = `<tr id="row-${branchRowCount}">
                                    <td>
                                        ${branchRowCount}
                                    </td>
                                    <td>
                                        <input id="pay_date-${branchRowCount}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="department-${branchRowCount}" class="mobile form-control" type="text" name="department[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="title-${branchRowCount}" class="mobile form-control" type="text" name="title[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="work_content-${branchRowCount}" class="mobile form-control" type="text" name="work_content[]" value="" required>
                                    </td>
                                    <td>
                                        <button class="mobile btn btn-danger del-row" alt="${branchRowCount}" type="button" name="button">刪除</button>
                                    </td>
                                </tr>`;
                    $('#branch tbody').append(newRow);
                } else {
                    alert('已達5筆最高新增上限');
                }
            });

            // Event delegation for dynamically added elements
            $('#branch').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                branchRowCount--;
            });

            var needRowCount = $('#need tbody tr').length;

            $('#add_need').click(function() {
                    needRowCount++;
                    var newRow = `<tr id="row-${needRowCount}" valign="middle">
                                    <td width="90%">
                                        <textarea  class="form-control" name="need_contexts[]" rows="2"></textarea>
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

            $("#customCheck1_div").hide();
            $("#customCheck2_div").hide();
            $(".checkIso_div").hide();
            $("#CheckNeed_div").hide();
            
            $("#customCheck1").on("change", function() {
                if ($(this).is(':checked')) {
                    $("#customCheck1_div").show(300);
                    $(this).val(1);
                }
                else {
                    $("#customCheck1_div").hide(300);
                }
            });

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
                    $("#carbonCheck_text").html('※否，請提供最近一年度全年度的油(柴油、汽油)、電(要注意一般用電或是契約用電)、水、天然氣費帳單');
                    $("#carbon_need_text").html('否 - 油(柴油、汽油)、電(要注意一般用電或是其他用電)、水、天然氣費帳單是 - 碳盤查報告書');
                }
            });

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
                    <div class="row px-5 mt-2">
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="name" value=""  placeholder="ISO名稱">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="name" value=""  placeholder="年份">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="status_id" required>
                                <option value="" selected>選擇狀態</option>
                                <option value="">已通過</option>
                                <option value="">申請中</option>
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

            $("#CheckNeed").on("change", function() {
                if ($(this).is(':checked')) {
                    $("#CheckNeed_div").show(300);
                    $(this).val(1);
                }
                else {
                    $("#CheckNeed_div").hide(300);
                }
            });

            var addDeviceRowCount = $('#need-device tbody tr').length;
            $('#add_device_need').click(function() {
                if (addDeviceRowCount < 5) {
                    addDeviceRowCount++;
                    var newRow = `<tr id="row-${addDeviceRowCount}">
                        <td>
                                                                <input id="pay_date-${addDeviceRowCount}" class="mobile form-control" type="text" name="expected_names[]" value="">
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-${addDeviceRowCount}" class="mobile form-control" type="text" name="expected_brands[]" value="">
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-${addDeviceRowCount}" class="mobile form-control" type="text" name="expected_models[]" value="">
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-${addDeviceRowCount}" class="mobile form-control" type="text" name="expected_purposes[]" value="">
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-${addDeviceRowCount}" class="mobile form-control" type="text" name="expected_costs[]" value="">
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-${addDeviceRowCount}" class="mobile form-control" type="text" name="expected_procurements[]" value="">
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-${addDeviceRowCount}" class="mobile form-control" type="text" name="expected_origins[]" value="">
                                                            </td>
                                    <td>
                                        <button class="mobile btn btn-danger del-row" alt="${addDeviceRowCount}" type="button" name="button">刪除</button>
                                    </td>
                                </tr>`;
                    $('#need-device tbody').append(newRow);
                } else {
                    alert('已達5筆最高新增上限');
                }
            });

            // Event delegation for dynamically added elements
            $('#need-device').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                addDeviceRowCount--;
            });


            var expectedDeviceRowCount = $('#expected-device tbody tr').length;
            $('#add_device_expected').click(function() {
                if (expectedDeviceRowCount < 5) {
                    expectedDeviceRowCount++;
                    var newRow = `<tr id="row-${expectedDeviceRowCount}">
                                    <td>
                                        <input id="pay_date-${expectedDeviceRowCount}" class="mobile form-control" type="text" name="improve_names[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="department-${expectedDeviceRowCount}" class="mobile form-control" type="text" name="improve_focuss[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="title-${expectedDeviceRowCount}" class="mobile form-control" type="text" name="improve_costs[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="work_content-${expectedDeviceRowCount}" class="mobile form-control" type="text" name="improve_delegate_objects[]" value="" required>
                                    </td>
                                    <td>
                                        <button class="mobile btn btn-danger del-row" alt="${expectedDeviceRowCount}" type="button" name="button">刪除</button>
                                    </td>
                                </tr>`;
                    $('#expected-device tbody').append(newRow);
                } else {
                    alert('已達5筆最高新增上限');
                }
            });

            // Event delegation for dynamically added elements
            $('#expected-device').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                expectedDeviceRowCount--;
            });

            // var normcount = 1; // 用于跟踪当前添加的输入组数量

            // $('#add_norm').click(function(){
            //     if(normcount < 5) { // 检查是否已经添加了五个输入组
            //         normcount++; // 增加计数器
            //         var newInputGroup = $('<div class="col-md-2">' +
            //                             '    <div class="input-group">' +
            //                             '        <input type="text" class="form-control" id="norm' + normcount + ' " placeholder="公司指標客戶'+normcount+'">' +
            //                             '        <button class="btn btn-sm btn-secondary norm_del" type="button">－</button>' +
            //                             '    </div>' +
            //                             '</div>');
            //         $(this).closest('.form-group').before(newInputGroup); // 在当前元素之前添加新输入组
            //     }
            // });

            // // 使用事件委托处理动态添加的元素
            // $(document).on('click', '.norm_del', function(){
            //     $(this).closest('.col-md-2').remove(); // 移除最近的.col-md-2元素
            //     normcount--; // 减少计数器
            // });

            
        </script>


        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
