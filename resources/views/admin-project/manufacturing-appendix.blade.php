@extends('layouts.master')
@section('title')
    製造業-附件
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    製造業-附件
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
                                                            <input class="form-check-input" type="checkbox" id="m_appendix01" name="m_appendix01">
                                                            <label class="form-check-label" for="m_appendix01">
                                                                <h5 class="font-size-16 m-0">1.公司變更登記表</h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="m_appendix02" name="m_appendix02">
                                                            <label class="form-check-label" for="m_appendix02">
                                                                <h5 class="font-size-16 m-0">2.最近一年度稅務申報書</h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="m_appendix03" name="m_appendix03">
                                                            <label class="form-check-label" for="m_appendix03">
                                                                <h5 class="font-size-16 m-0">3.最近一年度資產負債表</h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="m_appendix04" name="m_appendix04">
                                                            <label class="form-check-label" for="m_appendix04">
                                                                <h5 class="font-size-16 m-0">4.最近一年度損益表</h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="m_appendix05" name="m_appendix05">
                                                            <label class="form-check-label" for="m_appendix05">
                                                                <h5 class="font-size-16 m-0">5.工廠登記證明文件</h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="m_appendix06" name="m_appendix06">
                                                            <label class="form-check-label" for="m_appendix06">
                                                                <h5 class="font-size-16 m-0">6.財產清冊(需確認設備資料)</h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="m_appendix07" name="m_appendix07">
                                                            <label class="form-check-label" for="m_appendix07">
                                                                <h5 class="font-size-16 m-0">7.最新的投保單位被保險人名冊</h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="m_appendix08" name="m_appendix08">
                                                            <label class="form-check-label" for="m_appendix08">
                                                                <h5 class="font-size-16 m-0">8.碳盤查報告(計劃書需要)<br>
                                                                    <li>否 - 提供最近一年度全年度的油(柴油、汽油)、電(要注意一般用電或是其他用電)、水、天然氣費帳單</li>
                                                                    <li>是 - 碳盤查報告書</li>
                                                                </h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="m_appendix09" name="m_appendix09">
                                                            <label class="form-check-label" for="m_appendix09">
                                                                <h5 class="font-size-16 m-0">9.如有通過ISO請提供ISO相關資料</h5>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="m_appendix10" name="m_appendix10">
                                                            <label class="form-check-label" for="m_appendix10">
                                                                <h5 class="font-size-16 m-0">10.如有申請公司銀行貸款，請提供銀行營運計畫書</h5>
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
                                        <label class="form-label" for="AddNew-Username">
                                            <b>上傳連結：
                                                <a href="{{ $cust_data->nas_link }}" target="_blank">
                                                    請點擊我
                                                </a>'
                                            </b>
                                        </label>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap align-middle mb-0">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 40px;">
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="m_two_appendix01" name="m_two_appendix01">
                                                            <label class="form-check-label" for="m_two_appendix01">
                                                                <h5 class="font-size-16 m-0">
                                                                    1.蒐集個人資料告知事項暨個人資料提供同意書<span class="text-danger">（一式兩份並正本簽名）</span>
                                                                    <a href="https://zhengdian.tw6.quickconnect.to/d/s/wwzzAD69biiHOnEO2rCLk5DmRZYieW4G/webapi/entry.cgi/%E8%A3%BD%E9%80%A0%E6%A5%AD500%E8%90%AC-1.%E5%80%8B%E4%BA%BA%E8%B3%87%E6%96%99%E6%8F%90%E4%BE%9B%E5%90%8C%E6%84%8F%E6%9B%B8.pdf?api=SYNO.SynologyDrive.Files&method=download&version=2&files=%5B%22id%3A798033117534271603%22%5D&force_download=false&sharing_token=%221htLxNBL0Xxf4NYvRup3sfE_HdbnTYMrjMa9J3L0N333lgIme9EpyD2X0h.8_lJWzLLu2nADbdLzb9G_U6L99DsN5U0p7.CkGoYjzOOXtdpbwjJIGVH5gDwK2nWytebl6XxYBPEwcUr17o64APljB0rzhsW1snNKbRVArkDmyTdxRdMFjP8.XKgk39KGuwIuqnh1kILwIy6FBxhpZTxYhL9bpNoGqKeKpdb5O_xR5mCO5gMnb9OdOk13%22&SynoToken=QSrNPjgydysrQ&_dc=1706066936606" target="_blank">
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
                                                            <input class="form-check-input" type="checkbox" id="m_two_appendix02" name="m_two_appendix02">
                                                            <label class="form-check-label" for="m_two_appendix02">
                                                                <h5 class="font-size-16 m-0">2.建議迴避之人員清單（若無者請於表格中姓名欄中填【無】，另下方處需加蓋公司大小章。）
                                                                     <a href="https://zhengdian.tw6.quickconnect.to/d/s/wwzzAD69biiHOnEO2rCLk5DmRZYieW4G/webapi/entry.cgi/%E8%A3%BD%E9%80%A0%E6%A5%AD500%E8%90%AC-2.%E5%85%AC%E8%81%B7%E4%BA%BA%E5%93%A1%E5%8F%8A%E9%97%9C%E4%BF%82%E4%BA%BA%E8%BA%AB%E5%88%86%E9%97%9C%E4%BF%82%E6%8F%AD%E9%9C%B2%E8%A1%A8.pdf?api=SYNO.SynologyDrive.Files&method=download&version=2&files=%5B%22id%3A798033118463309944%22%5D&force_download=false&sharing_token=%221htLxNBL0Xxf4NYvRup3sfE_HdbnTYMrjMa9J3L0N333lgIme9EpyD2X0h.8_lJWzLLu2nADbdLzb9G_U6L99DsN5U0p7.CkGoYjzOOXtdpbwjJIGVH5gDwK2nWytebl6XxYBPEwcUr17o64APljB0rzhsW1snNKbRVArkDmyTdxRdMFjP8.XKgk39KGuwIuqnh1kILwIy6FBxhpZTxYhL9bpNoGqKeKpdb5O_xR5mCO5gMnb9OdOk13%22&SynoToken=QSrNPjgydysrQ&_dc=1706067177117" target="_blank">
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
                                                            <input class="form-check-input" type="checkbox" id="m_two_appendix03" name="m_two_appendix03">
                                                            <label class="form-check-label" for="m_two_appendix03">
                                                                <h5 class="font-size-16 m-0">3.基本資料暨同意聲明
                                                                     <a href="https://zhengdian.tw6.quickconnect.to/d/s/wwzzAD69biiHOnEO2rCLk5DmRZYieW4G/webapi/entry.cgi/%E8%A3%BD%E9%80%A0%E6%A5%AD500%E8%90%AC-%E5%9F%BA%E6%9C%AC%E8%B3%87%E6%96%99%E6%9A%A8%E5%90%8C%E6%84%8F%E8%81%B2%E6%98%8E.pdf?api=SYNO.SynologyDrive.Files&method=download&version=2&files=%5B%22id%3A798033119180535933%22%5D&force_download=false&sharing_token=%221htLxNBL0Xxf4NYvRup3sfE_HdbnTYMrjMa9J3L0N333lgIme9EpyD2X0h.8_lJWzLLu2nADbdLzb9G_U6L99DsN5U0p7.CkGoYjzOOXtdpbwjJIGVH5gDwK2nWytebl6XxYBPEwcUr17o64APljB0rzhsW1snNKbRVArkDmyTdxRdMFjP8.XKgk39KGuwIuqnh1kILwIy6FBxhpZTxYhL9bpNoGqKeKpdb5O_xR5mCO5gMnb9OdOk13%22&SynoToken=QSrNPjgydysrQ&_dc=1706067140482" target="_blank">
                                                                    （請點擊我下載空白文件）
                                                                     </a>
                                                                </h5>
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
                var checkboxesStatus = {!! $checkboxesStatus !!}; // 轉換為 JavaScript 變數
                var project_id = {!!$project->id!!};

                $.each(checkboxesStatus, function(key, value) {
                    if(value === "1") {
                        $('#' + key).prop('checked', true);
                    } else {
                        $('#' + key).prop('checked', false);
                    }
                });

                $('.form-check-input').change(function() {
                    var checkboxId = $(this).attr('id');
                    var isChecked = $(this).is(':checked') ? 1 : 0;

                    $.ajax({
                        url: '{{ route('appendix-status') }}', // Laravel 路由 URL
                        type: 'POST',
                        data: {
                            id: checkboxId,
                            status: isChecked,
                            project_id: project_id,
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
