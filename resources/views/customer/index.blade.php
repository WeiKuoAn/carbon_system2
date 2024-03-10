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
    
    <form action="{{ route('customer.index') }}"  method="GET">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            @csrf
                            <div class="col-md-3">
                                <label class="form-label">公司名稱</label>
                                <input type="text" class="form-control" name="name" value="{{ $request->name }}">
                            </div>
                             <div class="col-md-1">
                                <label class="form-label">申請類別</label>
                                <select class="form-select" name="type" onchange="this.form.submit()">
                                    <option value="null" @if(!isset($request->type) && $request->type=='null') selected @endif>不限</option>
                                    <option value="0" @if($request->type == '0') selected @endif>商業服務業</option>
                                    <option value="1" @if($request->type == '1') selected @endif>製造業</option>
                                </select>
                             </div>
                            <div class="col-md-1">
                               <label class="form-label">送件狀態</label>
                               <select class="form-select" name="check_status" onchange="this.form.submit()">
                                <option value="0" @if(!isset($request->check_status) &&$request->check_status == '0') selected @endif>未結案</option>
                                <option value="1" @if($request->check_status == '1') selected @endif>已結案</option>
                                <option value="2" @if($request->check_status == '2') selected @endif>再開案</option>
                               </select>
                            </div>
                            <div class="col-md-1">
                                 <label class="form-label">狀態</label>
                                 <select class="form-select" name="status" onchange="this.form.submit()">
                                    <option value="0" @if(!isset($request->status) && $request->status=='0') selected @endif>開通</option>
                                    <option value="1" @if($request->status == '1') selected @endif>關閉</option>
                                 </select>
                             </div>
                             <div class="col-md-2">
                                  <button type="submit"
                                     class="btn btn-danger btn-rounded waves-effect waves-light mt-4 me-2">
                                     <i class="mdi mdi-search-web me-1"></i>
                                      查詢</button>
                             </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2  mt-4">
                                    <div>
                                        <a  href="{{ route('customer.create') }}">
                                            <button type="button"
                                                class="btn btn-success btn-rounded waves-effect waves-light  me-2">
                                                <i class="mdi mdi-plus me-1"></i>
                                                新增廠商</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">廠商名稱</th>
                                        <th scope="col">負責人</th>
                                        <th scope="col">統編</th>
                                        <th scope="col">商業服務業</th>
                                        <th scope="col">製造業</th>
                                        <th scope="col">主要聯絡人</th>
                                        <th scope="col">聯絡人職稱</th>
                                        <th scope="col">聯絡人電話</th>
                                        <th scope="col">聯絡人信箱</th>
                                        <th scope="col">公司登記地址</th>
                                        <th scope="col">nas連結</th>
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
                                        <td align="center">
                                            @if(!empty($types) && $types[$data->user_id]['type']==0)
                                                <i class="font-size-26 bx bx bx-check text-danger"></i>
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if(!empty($types) && $types[$data->user_id]['type']==1)
                                                <i class="font-size-26 bx bx bx-check text-danger"></i>
                                            @endif
                                        </td>
                                        <td>{{ $data->contact_name  }}</td>
                                        <td>{{ $data->contact_job }}</td>
                                        <td>{{ $data->contact_phone  }}</td>
                                        <td>{{ $data->contact_email  }}</td>
                                        <td>{{ $data->county.$data->district.$data->address  }}</td>
                                        <td>
                                            <a href="{{ $data->nas_link }}" target="_blank">
                                                <button type="button"
                                                            class="btn btn-sm btn-link text-dark text-decoration-none font-size-20"><i
                                                                class="bx bx-link"></i></button>
                                            </a>
                                        </td>
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
                                                        {{-- @if(Auth::user()->level !=2) --}}
                                                            <a class="dropdown-item" href="{{ route('customer.edit',$data->user_id) }}">編輯廠商帳戶資料</a>
                                                            <a class="dropdown-item" href="{{ route('user.introduce.edit',$data->user_id) }}">編輯廠商基本資料</a>
                                                        {{-- @endif --}}
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
