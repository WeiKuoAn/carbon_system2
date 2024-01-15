@extends('layouts.master')
@section('title')
    商業服務類-附件
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    商業服務類-附件
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
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="text-center mb-3">
                                        <h2>第一階段檢附資料</h2>
                                    </div>
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
                                                                class="text-dark">1.依法設立登記之證明</a></h5>
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
                                                                class="text-dark">2.最新的投保單位被保險人名冊</a></h5>
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
                                                                class="text-dark">3.最近一年度資產負債表</a></h5>
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
                                                                class="text-dark">4.最近一年度損益表</a></h5>
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
                                                                class="text-dark">5.最近一年度稅務申報書</a></h5>
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
                                                                class="text-dark">6.地方稅為無違章欠稅</a></h5>
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
                                                                class="text-dark">7.國稅為無違章欠稅</a></h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="text-center mb-3">
                                        <h2>第二階段檢附資料(送件前須檢附完成)</h2>
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                        <label class="form-label" for="AddNew-Username"><b>上傳連結：
                                            <a href="https://zhengdian.quickconnect.to/d/f/uNkTt67EpBH3d8DwUDDnefFds9KD1T93" target="_blank">
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
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="https://zhengdian.tw6.quickconnect.to/d/s/whRxAQPVmwonrrf8z2PRE9qSOeoD3zJd/webapi/entry.cgi/%E7%B6%93%E6%BF%9F%E9%83%A8%E5%95%86%E6%A5%AD%E6%9C%8D%E5%8B%99%E6%A5%AD%E6%99%BA%E6%85%A7%E6%B8%9B%E7%A2%B3%E8%A3%9C%E5%8A%A9%E8%A8%88%E7%95%AB-%E9%99%84%E4%BB%B6%202%E3%80%81%E5%88%87%E7%B5%90%E8%81%B2%E6%98%8E%E6%9B%B8.pdf?api=SYNO.SynologyDrive.Files&method=download&version=2&files=%5B%22id%3A794638178936993941%22%5D&force_download=false&sharing_token=%22seKqa_5a4Wlv9XBo1OTUMGNpAADUAcVpVpkbiBrRivPCGRnlfSEE7ZYUFcC83BNh1GO3MZETCtqsrg5W2OyTCWmdYDSWYtzOX0hLpRmKDvqbX8aOYq38S575nL0zB8V1Xye7uNYIU.ROnJaWvzB3RkesURUatwQqMAYh8sYA45MfPWEUklCJcjprVu1i0ZFPUpBxC24jf2ZKMq9wbpg.hSmtdSWRpxjEKrmoAeHzJAyST.HhuK0VtWbK%22&_dc=1705324137194" target="_blank"
                                                                class="text-dark">1.切結聲明書(請點擊我下載空白文件)</a></h5>
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
                                                        <h5 class="text-truncate font-size-16 m-0"><a href="https://zhengdian.tw6.quickconnect.to/d/s/whRxAQPVmwonrrf8z2PRE9qSOeoD3zJd/webapi/entry.cgi/%E7%B6%93%E6%BF%9F%E9%83%A8%E5%95%86%E6%A5%AD%E6%9C%8D%E5%8B%99%E6%A5%AD%E6%99%BA%E6%85%A7%E6%B8%9B%E7%A2%B3%E8%A3%9C%E5%8A%A9%E8%A8%88%E7%95%AB-%E9%99%84%E4%BB%B6%204%E3%80%81%E8%92%90%E9%9B%86%E5%80%8B%E4%BA%BA%E8%B3%87%E6%96%99%E5%91%8A%E7%9F%A5%E4%BA%8B%E9%A0%85%E6%9A%A8%E5%80%8B%E4%BA%BA%E8%B3%87%E6%96%99%E6%8F%90%E4%BE%9B%E5%90%8C%E6%84%8F%E6%9B%B8.pdf?api=SYNO.SynologyDrive.Files&method=download&version=2&files=%5B%22id%3A794638180375640220%22%5D&force_download=false&sharing_token=%22seKqa_5a4Wlv9XBo1OTUMGNpAADUAcVpVpkbiBrRivPCGRnlfSEE7ZYUFcC83BNh1GO3MZETCtqsrg5W2OyTCWmdYDSWYtzOX0hLpRmKDvqbX8aOYq38S575nL0zB8V1Xye7uNYIU.ROnJaWvzB3RkesURUatwQqMAYh8sYA45MfPWEUklCJcjprVu1i0ZFPUpBxC24jf2ZKMq9wbpg.hSmtdSWRpxjEKrmoAeHzJAyST.HhuK0VtWbK%22&_dc=1705324300581" target="_blank"
                                                                class="text-dark">2.蒐集個人資料告知事項暨個人資料提供同意書(請點擊我下載空白文件)</a></h5>
                                                        <h5 class="text-truncate font-size-16 m-0">備註：主提案商所有參與人員、被帶動企業負責人都要簽名</h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 mb-2">
                        <div class="col text-center">
                            <button class="btn btn-success" type="submit" id="btn_submit"><i class=" bx bx-file me-1"></i> 保存 </button>
                        </div> <!-- end col -->
                    </div> <!-- end row-->  
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
                    if (presonRowCount < 8) {
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
        </script>


        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
