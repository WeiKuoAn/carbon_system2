@extends('layouts.master')
@section('title')
    排放源形式
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
排放源形式
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')

    <div class="row">
        <div class="col-xl-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">排放源編輯</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('source.update',$source->id)}}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">請輸入排放源</label>
                                    <input type="text" name="name" id="" class="form-control" value="{{$source->name}}">
                                </div>
                            </div>

                           
                            
                        </div>

                        <div class="col-12 text-end">
                             
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                ><i class="bx bx-check me-1"></i>
                                保存設定</button>
                                <a href="{{route('source.create')}}">
                                    <button class="btn btn-danger" data-bs-toggle="modal">回上一頁</button>

                                </a>
                            
                        </div>
                    </form>
                </div>

                
            </div>
            <!-- end card -->
            

        </div> <!-- end col -->
    </div>
    
   

        
    @endsection
    @section('scripts')
        
        

    {{-- <script src="{{ URL::asset('build/js/pages/alert.init.js') }}"></script> --}}
        
    <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
