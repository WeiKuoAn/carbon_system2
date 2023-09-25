@extends('layouts.master')
@section('title')
製成類別設定
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
製成類別設定
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')

    <div class="row">
        <div class="col-xl-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">系統提示</h6>
                </div>
                <div class="card-body">
                   <h2>此筆資料刪除成功....</h2>
                   <a href="{{route('process.create')}}">
                    <button class="btn btn-danger">Back</button>
                   </a>
                   
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
