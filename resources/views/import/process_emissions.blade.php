@extends('layouts.master')
@section('title')
    GHG Protocol
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
GHG Protocol
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
    <div class="container mt-5">
        <h2>Import Excel File</h2>
    
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <form action="/import" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="excel">Choose Excel File:</label>
                <input type="file" name="excel" id="excel" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>
    </div>
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
