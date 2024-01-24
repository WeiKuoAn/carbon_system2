@extends('layouts.master')
@section('title')
    商業服務業-附件
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    商業服務業-附件
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')

    <div id="success-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <i class="bx bx-check-circle display-1 text-success"></i>
                        <h4 class="mt-3">新增商業服務業附件成功！</h4>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
                                            <a href="{{ $cust_data->nas_link }}" target="_blank">
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
                                                            <input class="form-check-input" type="checkbox" id="b_appendix01" name="b_appendix01">
                                                            <label class="form-check-label" for="b_appendix01">
                                                                <h5 class="font-size-16 m-0">1.依法設立登記之證明</h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="b_appendix02" name="b_appendix02">
                                                            <label class="form-check-label" for="b_appendix02"><h5 class="font-size-16 m-0">2.最新的投保單位被保險人名冊</h5></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="b_appendix03" name="b_appendix03">
                                                            <label class="form-check-label" for="b_appendix03"><h5 class="font-size-16 m-0">3.最近一年度資產負債表</h5></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="b_appendix04" name="b_appendix04">
                                                            <label class="form-check-label" for="b_appendix04"><h5 class="font-size-16 m-0">4.最近一年度損益表</h5></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="b_appendix05" name="b_appendix05">
                                                            <label class="form-check-label" for="b_appendix05"><h5 class="font-size-16 m-0">5.最近一年度稅務申報書</h5></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="b_appendix06" name="b_appendix06">
                                                            <label class="form-check-label" for="b_appendix06"><h5 class="font-size-16 m-0">6.地方稅為無違章欠稅</h5></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="b_appendix07" name="b_appendix07">
                                                            <label class="form-check-label" for="b_appendix07"><h5 class="font-size-16 m-0">7.國稅為無違章欠稅</h5></label>
                                                        </div>
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
                                            <a href="{{ $cust_data->nas_link }}" target="_blank">
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
                                                            <input class="form-check-input" type="checkbox" id="b_two_appendix01" name="b_two_appendix01">
                                                            <label class="form-check-label" for="b_two_appendix01">
                                                                <h5 class="font-size-16 m-0">
                                                                    1.切結聲明書
                                                                    <a href="https://zhengdian.tw6.quickconnect.to/d/s/wape0yiRKeEH7v2ZSgEKqoAJpHmYrZB4/webapi/entry.cgi/%E9%99%84%E4%BB%B6%E4%BA%8C%E3%80%81%E5%88%87%E7%B5%90%E8%81%B2%E6%98%8E%E6%9B%B8(%E8%B3%87%E6%96%99%E4%BB%A5%E8%A3%9C%E3%80%8C%E7%84%A1%E3%80%8D).pdf?api=SYNO.SynologyDrive.Files&method=download&version=2&files=%5B%22id%3A798033598331533470%22%5D&force_download=false&sharing_token=%22h.5x1xKl.q23_xFcyhtTNwzmVldJyMEyK3jImo6rIKyWNk_sx1ggoiv9CIagebQh65X9Dm_GWEVbt2x4pOEOnTdrWdATwIkRnc4UybXEZf214KbbekOCyyzadgJMWLeY2EN0XZ5mrymTh62AWtPdEJXxWdz0_7tPKWnPhyBLXE9VJ6VQ7X67szjJK2FI8bGW95LaddS6H9lMpD8HNk9ogRDVl.8OsCZfSbid5_s_qGI22O.9hUA7fp8A%22&_dc=1706067558910" target="_blank">
                                                                        （請點擊我下載空白文件）
                                                                    </a>
                                                                </h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="b_two_appendix02" name="b_two_appendix02">
                                                            <label class="form-check-label" for="b_two_appendix02">
                                                                <h5 class="text-truncate font-size-16 m-0">
                                                                    2.蒐集個人資料告知事項暨個人資料提供同意書<span class="text-danger">（一式兩份並正本簽名）</span>
                                                                    <a href="https://zhengdian.tw6.quickconnect.to/d/s/whRxAQPVmwonrrf8z2PRE9qSOeoD3zJd/webapi/entry.cgi/%E7%B6%93%E6%BF%9F%E9%83%A8%E5%95%86%E6%A5%AD%E6%9C%8D%E5%8B%99%E6%A5%AD%E6%99%BA%E6%85%A7%E6%B8%9B%E7%A2%B3%E8%A3%9C%E5%8A%A9%E8%A8%88%E7%95%AB-%E9%99%84%E4%BB%B6%204%E3%80%81%E8%92%90%E9%9B%86%E5%80%8B%E4%BA%BA%E8%B3%87%E6%96%99%E5%91%8A%E7%9F%A5%E4%BA%8B%E9%A0%85%E6%9A%A8%E5%80%8B%E4%BA%BA%E8%B3%87%E6%96%99%E6%8F%90%E4%BE%9B%E5%90%8C%E6%84%8F%E6%9B%B8.pdf?api=SYNO.SynologyDrive.Files&method=download&version=2&files=%5B%22id%3A794638180375640220%22%5D&force_download=false&sharing_token=%22seKqa_5a4Wlv9XBo1OTUMGNpAADUAcVpVpkbiBrRivPCGRnlfSEE7ZYUFcC83BNh1GO3MZETCtqsrg5W2OyTCWmdYDSWYtzOX0hLpRmKDvqbX8aOYq38S575nL0zB8V1Xye7uNYIU.ROnJaWvzB3RkesURUatwQqMAYh8sYA45MfPWEUklCJcjprVu1i0ZFPUpBxC24jf2ZKMq9wbpg.hSmtdSWRpxjEKrmoAeHzJAyST.HhuK0VtWbK%22&_dc=1705324300581" target="_blank">
                                                                        （請點擊我下載空白文件）
                                                                    </a>
                                                                </h5>
                                                                <h5 class="text-truncate font-size-16 m-0">備註：主提案商所有參與人員、被帶動企業負責人都要簽名</h5>
                                                            </label>
                                                        </div>
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
    
    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/twzipcode-1.4.1-min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.form-check-input').change(function() {
                    var checkboxId = $(this).attr('id');
                    var isChecked = $(this).is(':checked') ? 1 : 0;

                    $.ajax({
                        url: '{{ route('appendix-status') }}', // Laravel 路由 URL
                        type: 'POST',
                        data: {
                            id: checkboxId,
                            status: isChecked,
                            _token: '{{ csrf_token() }}' // CSRF token
                        },
                        success: function(response) {
                            console.log('Checkbox status updated successfully.');
                        },
                        error: function(error) {
                            console.error('Error updating checkbox status.');
                        }
                    });
                });

                var checkboxesStatus = {!! $checkboxesStatus !!}; // 轉換為 JavaScript 變數

                $.each(checkboxesStatus, function(key, value) {
                    if(value === "1") {
                        $('#' + key).prop('checked', true);
                    } else {
                        $('#' + key).prop('checked', false);
                    }
                });
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
