@extends('layouts.master')
@section('title')
    廠商列表
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    廠商列表
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-6">
                                {{-- <div class="mb-3">
                                    <h5 class="card-title">Contact List <span class="text-muted fw-normal ms-2">(834)</span></h5>
                                </div> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                    <div>
                                        <a  href="{{ route('customer.create') }}">
                                            <button type="button"
                                                class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                                                <i class="mdi mdi-plus me-1"></i>
                                                新增廠商</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">廠商名稱</th>
                                        <th scope="col">負責人</th>
                                        <th scope="col">統編</th>
                                        <th scope="col">主要聯絡人</th>
                                        <th scope="col">聯絡人職稱</th>
                                        <th scope="col">聯絡人電話</th>
                                        <th scope="col">聯絡人信箱</th>
                                        <th scope="col">公司登記地址</th>
                                        <th scope="col">權限</th>
                                        <th scope="col" style="width: 200px;">操作</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($datas as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <a href="#" class="text-body">{{ $data->name }}</a>
                                        </td>
                                        <td>{{ $data->principal_name  }}</td>
                                        <td>{{ $data->registration_no }}</td>
                                        <td>{{ $data->contact_name  }}</td>
                                        <td>{{ $data->contact_job }}</td>
                                        <td>{{ $data->contact_phone  }}</td>
                                        <td>{{ $data->contact_email  }}</td>
                                        <td>{{ $data->county.$data->district.$data->address  }}</td>
                                        <td>
                                            {{-- {{ dd($data) }} --}}
                                            @if($data->status == 0)
                                                啟動
                                            @elseif($data->status == 1)
                                                <span class="text-danger"><b>關閉</b></span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item dropdown">
                                                    <a class="table-action-btn dropdown-toggle arrow-none btn btn-outline-dark waves-effect" href="#"
                                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true">動作
                                                        <i class="bx bxs-down-arrow"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        @if(Auth::user()->level !=2)
                                                            <a class="dropdown-item" href="{{ route('customer.edit',$data->user_id) }}">編輯廠商帳戶資料</a>
                                                            <a class="dropdown-item" href="{{ route('user.introduce.edit',$data->user_id) }}">編輯廠商基本資料</a>
                                                        @endif
                                                        <a class="dropdown-item" href="{{ route('user.project.index',$data->user_id) }}">查看專案資料</a>
                                                        {{-- <a class="dropdown-item" href="{{ route('user.project.business.create',$data->user_id) }}">查看專案</a> --}}
                                                        {{-- <a class="dropdown-item" href="{{ route('cust.surveys.index',$data->id) }}">問卷查看</a>
                                                        <a class="dropdown-item" href="#">盤查紀錄</a>
                                                        <a class="dropdown-item" href="{{ route('process_emission.index',$data->id) }}">盤查熱點分析</a>
                                                        <a class="dropdown-item" href="#">盤查健檢管理</a> --}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $datas->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
   
        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>

        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/ecommerce-customers.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
