@extends('layouts.master')
@section('title')
    填寫問卷
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    填寫問卷
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
    <form action="{{ route('cust.surveys.store',[$customer_id,$survey->id]) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xl-12 mt-3">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center mb-5">
                                    <h1>{{ $survey->title }}</h1>
                                    <p class="font-size-20">{{ $survey->description }}</p>
                                </div>
                                <input type="hidden" value="{{ $customer_id }}" name="">
                                @foreach($question_datas as $question_data)
                                    <div class="questionDiv mt-5">
                                    <span class="badge bg-success mb-2 font-size-16">{{ $question_data->face_data() }}</span>
                                        <div class="mb-3 row">
                                            <div class="col-md-12">
                                                <h4>第 {{ $question_data->no }} 題：{{ $question_data->title }}</h4>
                                                <input type="hidden" value="{{ $question_data->no }}" name="nos[]">
                                            </div>
                                        </div>
                                        <div class="col-md-5 font-size-22">
                                            @foreach(json_decode($question_data->options) as $key=>$option)
                                            @php
                                                // 將資料庫中的 JSON 字串解碼為 PHP 陣列
                                                $scores = json_decode($question_data->scores);
                                            @endphp
                                            <div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio" name="formRadios_{{ $question_data->no }}"
                                                        id="formRadios{{ $question_data->no }}_{{ $key }}" value="{{ $scores[$key] }}" required>
                                                    <label class="form-check-label" for="formRadios{{ $question_data->no }}_{{ $key }}">
                                                        {{ $option }}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <div class="row">

        
        <div class="col-12 text-center mt-3">
            <button type="button" class="btn btn-danger me-1" onclick="history.go(-1)"><i
                   class="bx bx-x me-1"></i> 回上一頁</button>
           <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
               ><i class="bx bx-check me-1"></i>
               確認新增</button>
       </div>
   </form>
    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/twzipcode-1.4.1-min.js') }}"></script>

       

        <!-- choices js -->
        <script src="{{ URL::asset('build/libs/select2/select2.min.js')}}"></script>
        <script src="{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

        <!-- color picker js -->
        <script src="{{ URL::asset('build/libs/@simonwep/pickr/pickr.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
