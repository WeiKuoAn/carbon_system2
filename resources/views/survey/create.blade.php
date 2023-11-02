@extends('layouts.master')
@section('title')
    新增問卷
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    新增問卷
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
    <form action="{{ route('survey.store') }}" method="POST">
    @csrf
        <div class="row">
            <div class="col-xl-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4>基本設定</h4>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="AddNew-Username">問卷類別</label>
                                        <select class="form-control" name="category" required >
                                                <option value="0" selected>ESG</option>
                                                <option value="99">其他</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="AddNew-Username">問卷名稱</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="CreateTask-Task Description">問卷描述</label>
                                            <textarea class="form-control" id="projectdesc" rows="2" name="description" required ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="questionnaire">
                                    <label class="form-label">問卷面向: </label>
                                    <div class="hstack gap-3 mb-3">
                                        <div class="col-md-6">
                                            <input class="form-control me-3" type="text" placeholder="新增面向" name="faces[]">
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control me-3" type="text" placeholder="面向描述" name="face_descs[]">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="addFace">＋</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>

        <div class="row">
            <div class="col-xl-12 mt-3">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <h4>權限設定</h4>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="AddNew-Username">開始時間</label>
                                        <input class="form-control" type="datetime-local" name="start_date" value="" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="AddNew-Username">關閉時間</label>
                                        <input class="form-control" type="datetime-local" name="end_date" value="" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">問卷狀態</label>
                                        <select class="form-select" name="status" required>
                                            <option value="0" selected>啟用</option>
                                            <option value="1" >禁用</option>
                                        </select>
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

        <script>
            $(document).ready(function(){
                var questionCount = 1;

                // 當點擊新增問卷面向按鈕時
                $('#addFace').click(function(){
                    questionCount++;
                    var newQuestion = `
                        <div class="hstack gap-3 mb-3">
                            <div class="col-md-6">
                                <input class="form-control me-3" type="text" placeholder="新增面向" name="faces[]">
                            </div>
                            <div class="col-md-5">
                                <input class="form-control me-3" type="text" placeholder="面向描述" name="face_descs[]">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger waves-effect waves-light" id="removeFace">－</button>
                            </div>
                        </div>
                    `;
                    $('#questionnaire').append(newQuestion); // 將新的問卷面向輸入框添加到 #questionnaire 內
                });

                // 移除問卷面向功能
                $('#questionnaire').on('click', '#removeFace', function(){
                    $(this).closest('.hstack').remove();
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
