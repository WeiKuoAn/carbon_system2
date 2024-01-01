@extends('layouts.master')
@section('title')
    新增廠商-商業服務類
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    新增廠商-商業服務類
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')

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
                                        <input type="text" class="form-control" name="name" value="錚典科技國際有限公司" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>公司簡介</b>（EX.經營理念、旗下品牌、主要/知名產品、專業技術、得獎紀錄）</label>
                                        <textarea  class="form-control" name="note" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>公司資本額（單位：元/新台幣）</b></label>
                                        <input type="number" class="form-control" value="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>去年整年度營業額（單位：元/新台幣）</b></label>
                                        <input type="number" class="form-control" value="0">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>近一年平均投保人數</b>（申請計畫使用）</label>
                                        <input type="number" class="form-control" placeholder="近一年平均投保人數">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>最近一期勞保投保人數</b>（申請計畫使用）</label>
                                        <input type="number" class="form-control"  placeholder="男生投保人數">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>&nbsp;</b></label>
                                        <input type="number" class="form-control" placeholder="女生投保人數">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>&nbsp;</b></label>
                                        <input type="number" class="form-control" placeholder="總投保人數" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Username"><b>公司主要聯繫窗口</b>（用於與錚典對接）</label>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" name="name" value="" placeholder="姓名">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" name="name" value="" placeholder="信箱">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Username">&nbsp;</label>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" name="name" value="" placeholder="電話">
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
                                                         @for ($i = 0; $i < 1; $i++)
                                                            <tr id="row-{{ $i }}" >
                                                                <td>{{$i+1}}</td>
                                                                <td>
                                                                    <select id="gdpaper_id_${socailRowCount}" alt="{{ $i }}" class="mobile form-select" name="gdpaper_ids[]">
                                                                        <option value="" selected>請選擇...</option>
                                                                        <option value="0">網站</option>
                                                                        <option value="1">社群</option>
                                                                        <option value="2">其他</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                    @endfor
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
                                <div class="col-md-12 mt-3">
                                    <label for="example-search-input" class="col-form-label"><b>附件上傳</b>（EX：公司介紹、產品簡報）</label>
                                    <div class="col-md-12">
                                        <div id="Step1_inputGroupFile01-preview"></div>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="Step1_inputGroupFile01" name="Step1_inputGroupFile01" aria-describedby="inputGroupFileAddon01" aria-label="Upload">
                                            <button class="btn btn-primary" type="button" id="Step1_inputGroupFileAddon01">上傳</button>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-12">
                                        <input id="add_socail" class="btn btn-primary" type="button" name="" value="新增附件">
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
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Username"><b>部門</b></label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Username"><b>職稱</b></label>
                                    <input type="text" class="form-control" name="name" value="" >
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label" for="AddNew-Username"><b>工作內容</b></label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label" for="AddNew-Username"><b>電話(含分機)</b></label>
                                    <input type="text" class="form-control" name="name" value="" >
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label" for="AddNew-Username"><b>手機</b></label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>

                                <hr class="mt-4 mb-4">

                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">計畫聯絡人資料</h5>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Phone"><b>姓名</b></label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Username"><b>部門</b></label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="AddNew-Username"><b>職稱</b></label>
                                    <input type="text" class="form-control" name="name" value="" >
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label" for="AddNew-Username"><b>工作內容</b></label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label" for="AddNew-Username"><b>電話(含分機)</b></label>
                                    <input type="text" class="form-control" name="name" value="" >
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label" for="AddNew-Username"><b>手機</b></label>
                                    <input type="text" class="form-control" name="name" value="">
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
                                                         @for ($i = 0; $i < 5; $i++)
                                                            <tr id="row-{{ $i }}" >
                                                                <td>{{$i+1}}</td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                                </td>
                                                                <td>
                                                                <input id="pay_price-{{ $i }}" class="mobile form-control" type="text" name="pay_price[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <input id="pay_price-{{ $i }}" class="mobile form-control" type="text" name="pay_price[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                    @endfor
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
                                                         @for ($i = 0; $i < 5; $i++)
                                                            <tr id="row-{{ $i }}" >
                                                                <td>{{$i+1}}</td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                                </td>
                                                                <td>
                                                                <input id="pay_price-{{ $i }}" class="mobile form-control" type="text" name="pay_price[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <input id="pay_price-{{ $i }}" class="mobile form-control" type="text" name="pay_price[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                    @endfor
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
                                                            <th>編號</th>
                                                            <th>系統名稱<span class="text-danger">*</span></th>
                                                            <th>購入單位<span class="text-danger">*</span></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody valign="center" align="center">
                                                         @for ($i = 0; $i < 1; $i++)
                                                            <tr id="row-{{ $i }}" >
                                                                <td>{{$i+1}}</td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                    @endfor
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
                                                            <th>購入單位<span class="text-danger">*</span></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody valign="center" align="center">
                                                         @for ($i = 0; $i < 1; $i++)
                                                            <tr id="row-{{ $i }}" >
                                                                <td>{{$i+1}}</td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                                </td>
                                                                <td>
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                    @endfor
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
                </div>
        </div>

        <div class="row mt-4 mb-2">
            <div class="col text-end">
                <button class="btn btn-danger" onclick="history.go(-1)"><i class="bx bx-x me-1"></i> 取消 </button>
                <button class="btn btn-success" type="submit" id="btn_submit"><i class=" bx bx-file me-1"></i> 保存 </button>
            </div> <!-- end col -->
        </div> <!-- end row-->  

        
    </div>

        <!--  successfully modal  -->
        <div id="success-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="bx bx-check-circle display-1 text-success"></i>
                            <h4 class="mt-3">新增廠商資料成功！</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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
                var presonRowCount = $('#preson tbody tr').length;

                $('#add_preson').click(function() {
                    presonRowCount++;
                    var newRow = `<tr id="row-${presonRowCount}">
                                     <td>
                                        ${presonRowCount}
                                    </td>
                                    <td>
                                        <input id="pay_date-${presonRowCount}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="department-${presonRowCount}" class="mobile form-control" type="text" name="department[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="title-${presonRowCount}" class="mobile form-control" type="text" name="title[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="work_content-${presonRowCount}" class="mobile form-control" type="text" name="work_content[]" value="" required>
                                    </td>
                                    <td>
                                        <button class="mobile btn btn-danger del-row" alt="${presonRowCount}" type="button" name="button">刪除</button>
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
                                        <input id="pay_date-${needRowCount}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="department-${needRowCount}" class="mobile form-control" type="text" name="department[]" value="" required>
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
                    var newRow = `<tr id="row-${situationRowCount}">
                                    <td>
                                        ${situationRowCount}
                                    </td>
                                    <td>
                                        <input id="pay_date-${situationRowCount}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="department-${situationRowCount}" class="mobile form-control" type="text" name="department[]" value="" required>
                                    </td>
                                    <td>
                                        <button class="mobile btn btn-danger del-row" alt="${situationRowCount}" type="button" name="button">刪除</button>
                                    </td>
                                </tr>`;
                    $('#situation tbody').append(newRow);
            });

            // Event delegation for dynamically added elements
            $('#situation').on('click', '.del-row', function() {
                $(this).closest('tr').remove();
                situationRowCount--;
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
