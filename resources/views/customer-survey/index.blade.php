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
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">問卷名稱</th>
                                        <th scope="col">問卷類別</th>
                                        <th scope="col">問卷描述</th>
                                        <th scope="col">問卷面向</th>
                                        <th scope="col">結束時間</th>
                                        <th scope="col">狀態</th>
                                        <th scope="col">得分</th>
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
                                        <td>{{ $data->end_date }}</td>
                                        <td>
                                            @if($data->response_data()->where('customer_id', $customer_id)->first())
                                                已完成
                                            @else
                                                未完成
                                            @endif
                                        </td>
                                        <td>{{ $data->response_data()->where('customer_id', $customer_id)->value('score'); }}</td>
                                        <td>
                                            @if($data->response_data()->where('customer_id', $customer_id)->first())
                                                <a href="{{ route('cust.surveys.edit',['id'=>$customer_id , 'survey_id'=>$data->id]) }}">
                                                    <button class="btn btn-danger">更新</button>
                                                </a>
                                            @else
                                                <a href="{{ route('cust.surveys.create',['id'=>$customer_id , 'survey_id'=>$data->id]) }}">
                                                    <button class="btn btn-primary">填寫</button>
                                                </a>
                                            @endif
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
