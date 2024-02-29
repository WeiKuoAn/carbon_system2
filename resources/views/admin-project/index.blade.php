@extends('layouts.master')
@section('title')
    廠商歷年專案列表
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    【{{ $cust_data->name }}】廠商歷年專案列表
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
                                    {{-- <div>
                                        <a  href="{{ route('customer.create') }}">
                                            <button type="button"
                                                class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                                                <i class="mdi mdi-plus me-1"></i>
                                                新增廠商</button>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle">
                                <thead class="table-light">
                                    <tr align="center">
                                        <th scope="col">No</th>
                                        <th scope="col">申請年度</th>
                                        <th scope="col">申請類別</th>
                                        <th scope="col">主要聯絡人</th>
                                        <th scope="col">聯絡人職稱</th>
                                        <th scope="col">聯絡人電話</th>
                                        <th scope="col">公司工廠登記地址</th>
                                        <th scope="col">申請政府補助</th>
                                        <th scope="col">迴避人員</th>
                                        <th scope="col">完成碳盤查</th>
                                        <th scope="col">申請ISO資料</th>
                                        <th scope="col" style="width: 200px;">操作</th>
                                    </tr>
                                </thead>

                                <tbody align="center">
                                    @foreach($datas as $key=>$data)
                                    <tr><td>{{ $key+1 }}</td>
                                        <td>{{ $data->year }}年</td>
                                        <td>
                                            @if($data->type == 0) 商業服務業
                                            @elseif($data->type == 1) 製造業
                                            @endif
                                        </td>
                                        <td>@if(isset($data->project_host)){{ $data->project_host->name }}@endif</td>
                                        <td>@if(isset($data->project_host)){{ $data->project_host->job }}@endif</td>
                                        <td>@if(isset($data->project_host)){{ $data->project_host->mobile }}@endif</td>
                                        <td>{{ $data->county.$data->district.$data->address }}</td>
                                        <td>
                                            @if($data->subsidy == '1')
                                                <b>是</b>
                                            @else
                                                否
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->avoid == '1')
                                                <b>是</b>
                                            @else
                                                否
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->carbon_done == '1')
                                                <b>是</b>
                                            @else
                                                否
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->carbon_iso == '1')
                                                <b>是</b>
                                            @else
                                                否
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
                                                            <a class="dropdown-item" 
                                                                @if($data->type == 0)
                                                                    href="{{ route('user.project.business.create',$data->cust_data->user_id) }}"
                                                                @elseif($data->type == 1)
                                                                    href="{{ route('user.project.Manufacturing.create',$data->cust_data->user_id) }}"
                                                                @endif
                                                                >編輯</a>
                                                        <a class="dropdown-item"
                                                        @if($data->type == 0)
                                                            href="{{ route('user.project.business.appendix',$data->user_id) }}"
                                                        @elseif($data->type == 1)
                                                            href="{{ route('user.project.Manufacturing.appendix',$data->user_id) }}"
                                                        @endif
                                                        >附件</a>
                                                        <a class="dropdown-item"
                                                            @if($data->type == 0)
                                                                href="{{ route('user.project.business.preview',$data->user_id) }}"
                                                            @elseif($data->type == 1)
                                                                href="{{ route('user.project.Manufacturing.preview',$data->user_id) }}"
                                                            @endif
                                                        >預覽</a>
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
