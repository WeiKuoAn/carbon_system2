@extends('layouts.master')
@section('title')
    問卷列表
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    問卷列表
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
                                        <a  href="{{ route('survey.create') }}">
                                            <button type="button"
                                                class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                                                <i class="mdi mdi-plus me-1"></i>
                                                新增問卷</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">問卷名稱</th>
                                        <th scope="col">問卷類別</th>
                                        <th scope="col">問卷描述</th>
                                        <th scope="col">問卷面向</th>
                                        <th scope="col">開始時間</th>
                                        <th scope="col">結束時間</th>
                                        <th scope="col">狀態</th>
                                        <th scope="col" style="width: 200px;">操作</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($datas as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td>
                                            @if($data->category == '0')
                                                ESG
                                            @elseif($data->category == '99')
                                                其他
                                            @endif
                                        </td>
                                        <td>{{ $data->description }}</td>
                                        <td>
                                            @if(count($data->face_datas)>0)
                                                @foreach($data->face_datas as $key=>$face_data)
                                                    {{ $face_data->name }}
                                                    @if($key != count($data->face_datas) - 1)
                                                        、
                                                    @endif
                                                @endforeach
                                            @else
                                                無面向
                                            @endif
                                        </td>
                                        <td>{{ $data->start_date }}</td>
                                        <td>{{ $data->end_date }}</td>
                                        <td>
                                            @if($data->status == '0')
                                                開啟
                                            @elseif($data->status == '1')
                                                關閉
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
                                                        <a class="dropdown-item" href="{{ route('survey.questions.preview', ['id' => $data->id]) }}">查看問卷</a>
                                                        <a class="dropdown-item" href="{{ route('survey.questions.index', ['id' => $data->id]) }}">問卷內容</a>
                                                        <a class="dropdown-item" href="{{ route('survey.edit',$data->id) }}">編輯問卷</a>
                                                        <a class="dropdown-item" href="{{ route('survey.questions.default',['id'=>$data->id]) }}">設定問卷回覆</a>
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
