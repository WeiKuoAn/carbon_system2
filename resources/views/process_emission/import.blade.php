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
        <h2>上傳盤查熱點清冊</h2>
    
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <form action="{{ route('process_emission.import.data',$customer_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- {{ $customer_id }} --}}
            <div class="form-group mb-3">
                <label for="branch_id">分公司</label>
                <select class="form-select" name="branch_id" required>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="year">盤查年度</label>
                <select class="form-select" name="year" required>
                    <option selected>請選擇...</option>
                    @foreach($years as $year)
                        <option value="{{ $year}}">{{ $year }}年</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="excel">選擇檔案</label>
                <input type="file" name="excel" id="excel" class="form-control" required>
            </div>
            <button type="submit" class="mt-4 btn btn-primary">Import</button>
        </form>
    </div>

    @endsection
    @section('scripts')
        <script>
            $(document).ready(function () {
                $('#year').select2();
            });
        </script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <script src="{{ URL::asset('build/libs/select2/select2.min.js') }}"></script>
        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>

        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/ecommerce-customers.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
