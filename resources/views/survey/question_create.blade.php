@extends('layouts.master')
@section('title')
    新增問卷題目
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    新增問卷題目
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
    <form action="{{ route('survey.questions.store',$survey_id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xl-12 mt-3">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="questionDiv mt-5">
                                    <div class="alert alert-success">
                                        <div class="row align-items-center">
                                            <div class="col-md-6 gap-2">
                                                <h4><span>題號：第1題</span></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                                    
                                                </div>
                                            </div>
                                            <input  class="form-control"  type="hidden" name="ons[]" value="1">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-1 col-form-label">問卷面向：</label>
                                        <div class="col-md-11">
                                            @if(count($faces) > 0)
                                                <select class="form-control" name="face_ids[]" required >
                                                    <option selected>請選擇...</option>
                                                    @foreach($faces as $face)
                                                        <option value="{{ $face->id }}">{{ $face->name }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select class="form-control" name="face_ids[]" required >
                                                    <option value="null">無面向</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-search-input" class="col-md-1 col-form-label">問卷類型：</label>
                                        <div class="col-md-11">
                                            <select  class="form-control"  name="types[]">
                                                <option value="single">單選</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-search-input" class="col-md-1 col-form-label">問卷題目：</label>
                                        <div class="col-md-11">
                                            <input  class="form-control"  type="text" name="titles[]" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row answerOptions">
                                        <label for="example-search-input" class="col-md-1 col-form-label">問卷答案：</label>
                                        <div class="col-md-11">
                                            <div class="hstack gap-3 mb-3">
                                                <div class="col-md-8">
                                                    <input class="form-control me-3" type="text" placeholder="答案" name="options[1][]" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <input class="form-control me-3" type="text" placeholder="分數" name="scores[1][]" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-primary waves-effect waves-light addAnswerOption">＋</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div id="questionnaire"></div>
                                <button type="button" id="addQuestion">新增題目</button>
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
        <script src="{{ URL::asset('build/js/twzipcode-1.4.1-min.js') }}"></script>

        <script>
            $(document).ready(function(){
                var questionNumber = 1; // 初始化題號

                $('#addQuestion').click(function(){
                    questionNumber++; // 題號遞增
                    var newQuestionDiv = `
                        <div class="questionDiv mt-5">
                                    <div class="alert alert-success">
                                        <div class="row align-items-center">
                                            <div class="col-md-6 gap-2">
                                                <h4><span>題號：第${questionNumber}題</span></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-danger btn-rounded waves-effect waves-light me-2 delQuestion">
                                                            刪除題目</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <input  class="form-control"  type="text" name="ons[]" value="${questionNumber}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-1 col-form-label">問卷面向：</label>
                                        <div class="col-md-11">
                                            @if(count($faces) > 0)
                                                <select class="form-control" name="face_ids[]" required >
                                                    <option selected>請選擇...</option>
                                                    @foreach($faces as $face)
                                                        <option value="{{ $face->id }}">{{ $face->name }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select class="form-control" name="face_ids[]" required >
                                                    <option value="null" selected>無面向</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-search-input" class="col-md-1 col-form-label">問卷類型：</label>
                                        <div class="col-md-11">
                                            <select  class="form-control"  name="types[]">
                                                <option value="single">單選</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-search-input" class="col-md-1 col-form-label">問卷題目：</label>
                                        <div class="col-md-11">
                                            <input  class="form-control"  type="text" name="titles[]" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row answerOptions">
                                        <label for="example-search-input" class="col-md-1 col-form-label">問卷答案：</label>
                                        <div class="col-md-11">
                                            <div class="hstack gap-3 mb-3">
                                                <div class="col-md-8">
                                                    <input class="form-control me-3" type="text" placeholder="答案" name="options[${questionNumber}][]" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <input class="form-control me-3" type="text" placeholder="分數" name="scores[${questionNumber}][]" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-primary waves-effect waves-light addAnswerOption">＋</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                    `;
                    $('#questionnaire').append(newQuestionDiv);
                });

                // 使用事件委派來處理新增答案選項
                $('.questionDiv').on('click', '.addAnswerOption', function(){
                    var newAnswerOption = `
                        <div class="hstack gap-3 mb-3">
                            <div class="col-md-8">
                                <input class="form-control me-3" type="text" placeholder="答案" name="options[${questionNumber}][]">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control me-3" type="text" placeholder="分數" name="scores[${questionNumber}][]">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger waves-effect waves-light delAnswerOption">－</button>
                            </div>
                        </div>
                    `;
                    $(this).closest('.answerOptions').find('.col-md-11').append(newAnswerOption);
                });

                $('#questionnaire').on('click', '.addAnswerOption', function(){
                    var newAnswerOption = `
                        <div class="hstack gap-3 mb-3">
                            <div class="col-md-8">
                                <input class="form-control me-3" type="text" placeholder="答案" name="options[${questionNumber}][]">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control me-3" type="text" placeholder="分數" name="scores[${questionNumber}][]">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger waves-effect waves-light delAnswerOption">－</button>
                            </div>
                        </div>
                    `;
                    $(this).closest('.answerOptions').find('.col-md-11').append(newAnswerOption);
                });

                $('.questionDiv').on('click', '.delAnswerOption', function(){
                    $(this).closest('.hstack').remove();
                });

                $('#questionnaire').on('click', '.delQuestion', function(){
                    $(this).closest('.questionDiv').remove();
                });
            });
        </script>

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
