@extends('layouts.master')
@section('title')
    企業健檢管理列表
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    企業健檢管理列表
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
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">年度</th>
                                        <th scope="col">主要聯絡人</th>
                                        <th scope="col">聯絡人電話</th>
                                        <th scope="col">公司縣市</th>
                                        <th scope="col">公司規模</th>
                                        <th scope="col">上市櫃狀態</th>
                                        <th scope="col">銷售方向</th>
                                        <th scope="col">權限</th>
                                        <th scope="col" style="width: 200px;">操作</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($datas as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->year }}年</td>
                                        <td>{{ $data->branch_data->name }}</td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('process_emission.data',['id'=>$customer_id,'process_emission_id'=>$data->id]) }}" data-bs-placement="top" title="Edit"
                                                        class="px-2 text-primary edit_emission"><i class="mdi mdi-eye font-size-20"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" data-bs-placement="top" title="data"
                                                        class="px-2 text-danger edit_data"><i class="mdi mdi-chart-bar font-size-20"></i>減碳設定</a>
                                                </li>
                                                {{-- <li class="list-inline-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit"
                                                        class="px-2 text-primary"><i
                                                            class="bx bx-pencil font-size-18"></i></a>
                                                </li> --}}
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
