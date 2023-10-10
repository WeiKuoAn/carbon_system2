@extends('layouts.master')
@section('title')
    {{ $survey->title }}問卷內容設定
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    {{ $survey->title }}問卷內容設定
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
                                <div class="mb-3">
                                    <h5 class="card-title">{{ $survey->title }}<span class="text-muted fw-normal ms-2">(問卷內容設定)</span></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                    <div>
                                        @if(count($datas)==0)
                                            <a  href="{{ route('survey.questions.create',$survey->id) }}">
                                                <button type="button"
                                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                                                    <i class="mdi mdi-plus me-1"></i>
                                                    新增題目</button></a>
                                        @else
                                            <a  href="{{ route('survey.questions.preview',$survey->id) }}">
                                                <button type="button"
                                                    class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2">
                                                    <i class="mdi mdi-eye me-1"></i>
                                                    預覽問卷</button></a>
                                            <a  href="{{ route('survey.questions.edit',$survey->id) }}">
                                                <button type="button"
                                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                                                    <i class="mdi mdi-plus me-1"></i>
                                                    編輯題目</button></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table  align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">題號</th>
                                        <th scope="col">面向</th>
                                        <th scope="col">類型</th>
                                        <th scope="col" width="50%">題目</th>
                                        <th scope="col" width="10%">選項</th>
                                        <th scope="col" width="10%">分數</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($datas as $data)
                                    <tr>
                                        <td>{{ $data->no }}</td>
                                        <td>
                                            @if(isset($data->face_id))
                                                {{ $data->face_data() }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->type == 'single')
                                                單選題
                                            @endif
                                        </td>
                                        <td >{{ $data->title }}</td>
                                        <td>
                                            @php
                                                // 將資料庫中的 JSON 字串解碼為 PHP 陣列
                                                $options = json_decode($data->options);
                                            @endphp

                                            @foreach($options as $option)
                                                <p>{{ $option }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                // 將資料庫中的 JSON 字串解碼為 PHP 陣列
                                                $scores = json_decode($data->scores);
                                            @endphp

                                            @foreach($scores as $score)
                                                <p>{{ $score }}分</p>
                                            @endforeach
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
