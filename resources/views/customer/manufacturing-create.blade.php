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
                                        <label class="form-label" for="AddNew-Phone"><b>前一年度營業額</b>（申請計畫使用）</label>
                                        <input type="number" class="form-control" placeholder="前一年度營業額">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="AddNew-Phone"><b>公司工廠登記地址</b>(若有超過一間工廠，請選一間工廠作為標的)</label>
                                    <div class="row twzipcode mb-2">
                                        <select data-role="county" required ></select>
                                        <select data-role="district" required></select>
                                        <select data-role="zipcode" required></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="AddNew-Phone">&nbsp;</label>
                                    <input type="text" class="form-control" name="address" value="" required>
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
                                            <input type="text" class="form-control" name="name" value="" placeholder="請提供機關名稱">
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
                                    <div class="col-11">
                                        <div id="Step1_inputGroupFile01-preview"></div>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="Step1_inputGroupFile01" name="Step1_inputGroupFile01" aria-describedby="inputGroupFileAddon01" aria-label="Upload">
                                            <button class="btn btn-primary" type="button" id="Step1_inputGroupFileAddon01">上傳</button>
                                        </div>
                                    </div>
                                    {{-- <div class="col-1">
                                        <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                    </div> --}}
                                </div>
                                <div class="appendix-container">
                                    <div class="col-md-12 row appendix">
                                        <!-- 這裡放置您原有的附件上傳區塊 HTML 程式碼 -->
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-12">
                                    <input id="add_appendix" class="btn btn-primary" type="button" name="" value="新增附件">
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
                                        <textarea  class="form-control" name="note" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>產品製程圖</b></label>
                                        <div id="Step1_inputGroupFile02-preview"></div>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="Step1_inputGroupFile02"
                                                aria-describedby="Step1_inputGroupFileAddon02" name="Step1_inputGroupFile02" aria-label="Upload">
                                            <button class="btn btn-primary" type="button"
                                                id="Step1_inputGroupFileAddon02">上傳</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>主要客戶與市場</b>(如過往公司有介紹簡報有提到相關內容也可提供)</label>
                                        <textarea  class="form-control" name="note" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="AddNew-Phone"><b>公司產品出口情形/比例</b></label>
                                        <textarea  class="form-control" name="note" rows="4"></textarea>
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
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="norm" placeholder="公司指標客戶1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="norm" placeholder="公司指標客戶2">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="norm" placeholder="公司指標客戶3">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="norm" placeholder="公司指標客戶4">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="norm" placeholder="公司指標客戶5">
                                    </div>
                                </div>
                                {{-- <div class="form-group row mt-3">
                                    <div class="col-12">
                                    <input id="add_norm" class="btn btn-primary" type="button" name="" value="新增筆數">
                                    </div>
                                </div> --}}
                                <hr class="mt-4 mb-4">

                                <div class="col-md-12">
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-1">公司對外的網站或社群網址-若有不只一個，請都附上。若無，請寫「無」即可</h5>
                                    <div class="row">
                                        <div class="col-md-12">
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
                                                    <select class="form-select"  id="create_scope_id" name="scope_id" required >
                                                        <option value="" selected>選擇年度</option>
                                                        <option value="">2023</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-select"  id="create_scope_id" name="scope_id" required >
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
                                    <label class="form-label" for="AddNew-Username"><b>專長/經歷</b></label>
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
                                <div class="col-md-4 mt-3">
                                    <label class="form-label" for="AddNew-Username"><b>信箱</b></label>
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
                                    <label class="form-label" for="AddNew-Username"><b>專長/經歷</b></label>
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
                                <div class="col-md-4 mt-3">
                                    <label class="form-label" for="AddNew-Username"><b>信箱</b></label>
                                    <input type="text" class="form-control" name="name" value="">
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
                                                                <input id="pay_price-{{ $i }}" class="mobile form-control" type="text" name="pay_price[]" value="" required>
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
                                                            <th>汰換排序</th>
                                                            <th>簡述內容<span class="text-danger">*</span></th>
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
                                                                    <button class="mobile btn btn-danger del-row" alt="{{ $i }}" type="button" name="button" onclick="del_row(this)">刪除</button>
                                                                </td>
                                                            </tr>
                                                    @endfor
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
                                                     @for ($i = 0; $i < 1; $i++)
                                                        <tr id="row-{{ $i }}" >
                                                            <td>
                                                                <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                            </td>
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
                                                     @for ($i = 0; $i < 1; $i++)
                                                        <tr id="row-{{ $i }}" >
                                                            <td>
                                                                <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                            </td>
                                                            <td>
                                                                <input id="pay_date-{{ $i }}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                                            </td>
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
                                        </div>
                                        </div> <!-- end .table-responsive -->
                                        <div class="form-group row mb-4">
                                            <div class="col-12">
                                            <input id="add_device_expected" class="btn btn-primary" type="button" name="" value="新增筆數">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h2>檢附資料</h2>
                                <p class="font-size-18">申請計畫使用</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="alert alert-primary" role="alert">
                                        <label class="form-label" for="AddNew-Username"><b>上傳連結：
                                            <a href="#" target="_blank">
                                                請點擊我
                                            </a></b>
                                        </label>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap align-middle mb-0">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">蒐集個人資料告知事項暨個人資料提供同意書(所有計畫人員皆需簽名)</a></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">建議迴避之人員清單(若無者請於表格中姓名欄中填【無】，另下方處需加蓋公司大小章。)</a></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">基本資料暨同意聲明(計畫需求)</a></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">公司變更登記表</a></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">111年度營所稅申報書</a></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">111年度資產負債表</a></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">111年度損益表</a></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">如有申請公司銀行貸款，請提供銀行營運計畫書</a></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">工廠登記證明文件(以確認工廠登記證明)</a></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">碳盤查報告(計劃書需要)</a><br>
                                                            <li class="mt-2 text-danger" id="carbon_need_text">否 - 油(柴油、汽油)、電(要注意一般用電或是其他用電)、水、天然氣費帳單是 - 碳盤查報告書</li>
                                                        </h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                                            <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="javascript: void(0);"
                                                                class="text-dark">財產清冊(需確認設備資料)</a><br></h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                    css: ["twzipcode-select", "twzipcode-select" , "twzipcode-select"], // 自訂 "城市"、"地區" class 名稱 
                    countyName: "county", // 自訂城市 select 標籤的 name 值
                    districtName: "district", // 自訂地區 select 標籤的 name 值
                    zipcodeName: "zipcode", // 自訂地區 select 標籤的 name 值
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
                    var newRow = `<tr id="row-${needRowCount}">
                                    <td>
                                        ${needRowCount}
                                    </td>
                                    <td>
                                        <input id="pay_date-${needRowCount}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
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
                            <select class="form-select" name="scope_id" required>
                                <option value="" selected>選擇年度</option>
                                <option value="">2023</option>
                            </select>
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
                                        <input id="pay_date-${addDeviceRowCount}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="department-${addDeviceRowCount}" class="mobile form-control" type="text" name="department[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="title-${addDeviceRowCount}" class="mobile form-control" type="text" name="title[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="pay_date-${addDeviceRowCount}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="department-${addDeviceRowCount}" class="mobile form-control" type="text" name="department[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="title-${addDeviceRowCount}" class="mobile form-control" type="text" name="title[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="work_content-${addDeviceRowCount}" class="mobile form-control" type="text" name="work_content[]" value="" required>
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
                                        <input id="pay_date-${expectedDeviceRowCount}" class="mobile form-control" type="text" name="pay_data_date[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="department-${expectedDeviceRowCount}" class="mobile form-control" type="text" name="department[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="title-${expectedDeviceRowCount}" class="mobile form-control" type="text" name="title[]" value="" required>
                                    </td>
                                    <td>
                                        <input id="work_content-${expectedDeviceRowCount}" class="mobile form-control" type="text" name="work_content[]" value="" required>
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
