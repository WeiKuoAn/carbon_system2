@extends('layouts.master')
@section('title')
    新增廠商
@endsection
@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
IPCC評估報告設定
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')

    <div class="row">
        <div class="col-xl-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">IPCC評估報告清單</h6>
                    
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <a href="{{route('ipcc_report.create')}}"><button class="btn btn-primary">Create New</button></a>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">年</th>
                                    <th scope="col">名稱</th>
                                    <th scope="col">引用</th>
                                    <th scope="col" style="width: 200px;">資料操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                <tr>
                                    
                                    {{-- <td>@if(isset($data->description)){{ $data->description }}@else 無 @endif</td> --}}
                                    <td>{{ $data->year }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->quote }}</td>
                                    
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit" class="px-2 text-primary"><i
                                                        class="bx bx-pencil font-size-18"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete" class="px-2 text-danger"><i
                                                        class="bx bx-trash-alt font-size-18"></i></a>
                                            </li>
                                        </ul>
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
        </div> <!-- end col -->
    </div>

    @endsection
    @section('scripts')
        


        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @endsection
