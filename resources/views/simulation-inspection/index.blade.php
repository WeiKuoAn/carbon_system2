@extends('layouts.master')
@section('title')
    盤查列表
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
盤查列表
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
                                        <a  href="{{ route('simulation-inspection.step1') }}">
                                            <button type="button"
                                                class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                                                <i class="mdi mdi-plus me-1"></i>
                                                新增盤查</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">編號</th>
                                        <th scope="col">盤查年度</th>
                                        <th scope="col">企業名稱</th>
                                        <th scope="col">企業分行</th>
                                        <th scope="col">盤查原因</th>
                                        <th scope="col">基準年</th>
                                        <th scope="col">狀態</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($datas as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->year }}</td>
                                        <td>{{ $data->cust_data->name }}</td>
                                        <td>{{ $data->branch_data->name }}</td>
                                        <td>{{ $data->reason_data() }}</td>
                                        <td>
                                            @if($data->base_year == '0')
                                            是
                                            @else
                                            否
                                            @endif
                                        </td>
                                        <td>{{ $data->status() }}</td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item dropdown">
                                                    <a class="table-action-btn dropdown-toggle arrow-none btn btn-outline-dark waves-effect" href="#"
                                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true">動作
                                                        <i class="bx bxs-down-arrow"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="{{ route('simulation-inspection.edit',$data->id) }}">編輯</a>
                                                        <a class="dropdown-item" href="#">刪除</a>
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
