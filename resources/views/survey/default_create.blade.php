@extends('layouts.master')
@section('title')
    設定問卷級距回覆與建議
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    設定問卷級距回覆與建議
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
    <form action="{{ route('survey.questions.default.create',$survey->id) }}" method="POST">
    @csrf
        <div class="row">
            <div class="col-xl-12 mt-3">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <h4>❰{{ $survey->title }}❱分數回覆設定</h4>
                                <div class="col-md-12 mt-3" id="questionnaire">
                                    <div class="hstack gap-3 mb-3">
                                        <div class="col-md-2">
                                            <label class="form-label">上限分數</label>
                                            <input class="form-control me-3" type="text" placeholder="設定級距分數" name="scores[]">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">回覆</label>
                                            <input class="form-control me-3" type="text" placeholder="設定級距回覆" name="replys[]">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">建議</label>
                                            <input class="form-control me-3" type="text" placeholder="設定級距給予建議" name="suggestions[]">
                                        </div>
                                    </div>
                                    <div class="hstack gap-3 mb-3">
                                        <div class="col-md-2">
                                            <input class="form-control me-3" type="text" placeholder="設定級距分數" name="scores[]">
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control me-3" type="text" placeholder="設定級距回覆" name="replys[]">
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control me-3" type="text" placeholder="設定級距給予建議" name="suggestions[]">
                                        </div>
                                    </div>
                                    <div class="hstack gap-3 mb-3">
                                        <div class="col-md-2">
                                            <input class="form-control me-3" type="text" placeholder="設定級距分數" name="scores[]">
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control me-3" type="text" placeholder="設定級距回覆" name="replys[]">
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control me-3" type="text" placeholder="設定級距給予建議" name="suggestions[]">
                                        </div>
                                    </div>
                                    <div class="hstack gap-3 mb-3">
                                        <div class="col-md-2">
                                            <input class="form-control me-3" type="text" placeholder="設定級距分數" name="scores[]">
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control me-3" type="text" placeholder="設定級距回覆" name="replys[]">
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control me-3" type="text" placeholder="設定級距給予建議" name="suggestions[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
        <div class="col-12 text-center mt-3">
            <button type="button" class="btn btn-danger me-1" onclick="history.go(-1)"><i
                   class="bx bx-x me-1"></i> 回上一頁</button>
           <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
               ><i class="bx bx-check me-1"></i>
               確認新增</button>
       </div>
   </form>
    </div>


        {{-- <style>
            .question {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }
        </style> --}}
    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ URL::asset('build/js/twzipcode-1.4.1-min.js') }}"></script>
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
