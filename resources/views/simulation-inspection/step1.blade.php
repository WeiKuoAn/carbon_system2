@extends('layouts.master')
@section('title')
碳盤模擬流程
@endsection
@section('page-title')
    碳盤模擬流程
@endsection
@section('css')
    <!-- quill css -->
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@endsection
@section('body')
    <body data-layout="horizontal">
    @endsection
    @section('content')
    <form action="{{ route('simulation-inspection.step1.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="card-body mt-5">
                        <div class="row">
                             <!----大標題------>
                             <div class="col-md-2">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical" style="background: white;">
                                    <a class="nav-link mb-2 active" id="v-pills-home-tab" 
                                    href="{{ route('simulation-inspection.step1') }}">盤查企業設定</a>
                                    <a class="nav-link mb-2 " id="v-pills-home-tab" 
                                    href="{{ route('simulation-inspection.step2') }}">盤查基本設定</a>
                                    <a class="nav-link mb-2 " id="v-pills-profile-tab" 
                                        href="{{ route('simulation-inspection.step3') }}"
                                        aria-selected="false">排放源鑑別</a>
                                    <a class="nav-link" id="v-pills-settings-tab"
                                        href="{{ route('simulation-inspection.step4') }}"
                                        aria-selected="false">統計報表</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab"
                                        href="{{ route('simulation-inspection.step5') }}"
                                        aria-selected="false">盤查清冊產生</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab"
                                        href="{{ route('simulation-inspection.step6') }}"
                                        aria-selected="false">減排計畫</a>
                                </div>
                            </div><!-- end col -->

                            <div class="col-md-10" style="background: white;" id="card">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <!-- Step1 start -->
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="row p-3">
                                            <label class="form-label" for="#" style="font-size: 20pt;font-weight:1000;">盤查企業設定</label>
                                                <div class="col-md-6 mt-3">
                                                   
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Username">廠商名稱</label>
                                                    <select class="form-select"  id="customer_id" name="customer_id" required >
                                                        <option value="" selected>請選擇...</option>
                                                        @foreach($customers as $customer)
                                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Username">分行名稱</label>
                                                    <select class="form-select" id="branch_id" name="branch_id" required >
                                                        <option selected>請選擇...</option>
                                                    </select>
                                                </div>
                            
                                            </div>
                                           <div class="col-md-6 mt-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="AddNew-Email">廠商地址</label>
                                                <input type="text" class="form-control" placeholder="請輸入廠商地址" id="customer_address" value="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="AddNew-Email">分行地址</label>
                                                <input type="text" class="form-control" placeholder="請輸入分行地址" id="branch_address" value="">
                                            </div>
                                            
                                           </div>
                                           <div class="col-md-12">

                                            <div class="mb-3">
                                                <label class="form-label" for="AddNew-Email">專案聯絡人</label>
                                                <input type="text" class="form-control" placeholder="請輸入專案聯絡人" id="contact_name" value="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="AddNew-Email">聯絡電話</label>
                                                <input type="text" class="form-control" placeholder="請輸入E-Mail" id="contact_phone"  value="">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="AddNew-Email">聯絡E-Mail</label>
                                                <input type="text" class="form-control" placeholder="請輸入E-Mail" id="contact_email"  value="">
                                            </div>
                                            
                                           </div>

                                           
                                        
                                        
                                        </div>
                                        <div class="row mt-4 mb-2">
                                            <div class="col text-end">
                                                <button class="btn btn-danger" onclick="history.go(-1)"><i class="bx bx-x me-1"></i> 取消 </button>
                                                <button class="btn btn-success" type="submit"><i class=" bx bx-file me-1"></i> 保存 </button>
                                            </div>
                                        </div> 
                                       
                                    </div>
                                </div>
                            </div><!--  end col -->
                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
    </form>

        <style>
            .nav{
                border-radius: 15px;
            }
            .nav-link {
                font-size: 1.2em;
                line-height: 40px;
            }

            #card{
                /* box-shadow: 2px 2px 8px 2px rgba(0, 0, 0, 0.07); */
                /* border: 0.5pt solid #28b765; */
                border-radius: 15px;
            }

            .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                color: var(--bs-nav-pills-link-active-color);
                background-color: #28b765;
            }
            .font-control{
                text-align: center;
            }

            .main-content{
                min-height: 100vh;
                background-color: #f5f5f5;
            }
        </style>
    @endsection
    @section('scripts')
        <script>
            $(document).ready(function () {
                $('#customer_id').select2();
                $('#branch_id').select2();
                $("#customer_id").change(function() {
                    var value = $(this).val();
                    $.ajax({
                        type : 'get',
                        url : '{{ route('customer.data') }}',
                        data: {'cust_id': value},
                        success: function(data){
                            $('#customer_address').val(data['county']+data['district']+data['address']);
                            $.ajax({
                                type : 'get',
                                url : '{{ route('branch.datas') }}',
                                data: {'cust_id': value},
                                success: function(data){
                                    $('#branch_id').html(data);
                                    var branch_id = $("#branch_id").val();
                                    $.ajax({
                                        type : 'get',
                                        url : '{{ route('branch.data') }}',
                                        data: {'branch_id': branch_id},
                                        success: function(data){
                                        console.log(data);
                                            $('#branch_address').val(data['address']);
                                            $('#contact_name').val(data['contact_name']);
                                            $('#contact_phone').val(data['contact_phone']);
                                            $('#contact_email').val(data['contact_email']);
                                        }
                                    });
                                }
                            });
                        }
                    });
                });

                $("#branch_id").change(function() {
                    var branch_id = $("#branch_id").val();
                    $.ajax({
                        type : 'get',
                        url : '{{ route('branch.data') }}',
                        data: {'branch_id': branch_id},
                        success: function(data){
                        console.log(data);
                            $('#branch_address').val(data['address']);
                            $('#contact_name').val(data['contact_name']);
                            $('#contact_phone').val(data['contact_phone']);
                            $('#contact_email').val(data['contact_email']);
                        }
                    });
                });
                $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            });
            
        </script>
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> --}}
        <script src="{{ URL::asset('build/libs/select2/select2.min.js') }}"></script>
        <!-- apexcharts -->
        <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    @endsection