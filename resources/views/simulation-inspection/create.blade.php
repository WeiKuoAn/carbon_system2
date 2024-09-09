@extends('layouts.master')
@section('title')
碳盤模擬流程
@endsection
@section('page-title')
    碳盤模擬流程
@endsection
@section('css')
    <!-- quill css -->
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('body')
    <body data-layout="horizontal">
    @endsection
    @section('content')
        <div class="row">
            <div class="card-body mt-5">
                        <div class="row">
                             <!----大標題------>
                             <div class="col-md-2">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical" style="background: white;">
                                    <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        href="#v-pills-step1" role="tab" aria-controls="v-pills-home"
                                        aria-selected="true">盤查基本設定</a>
                                    <a class="nav-link mb-2" id="v-pills-home-tab" data-bs-toggle="pill"
                                        href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                        aria-selected="true">盤查邊界設定</a>
                                    <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false">排放源鑑別與計算</a>
                                    {{-- <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill"
                                        href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                        aria-selected="false">排放數據計算</a> --}}
                                    <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                        href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false">統計報表</a>
                                    <a class="nav-link" id="v-pills-scope3-tab" data-bs-toggle="pill"
                                        href="#v-pills-scope3" role="tab" aria-controls="v-pills-scope3"
                                        aria-selected="false">內外部查證</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab" data-bs-toggle="pill"
                                        href="#v-pills-carbonbooks" role="tab" aria-controls="v-pills-carbonbooks"
                                        aria-selected="false">盤查清冊產生</a>
                                    <a class="nav-link" id="v-pills-carbonbooks-tab" data-bs-toggle="pill"
                                        href="#v-pills-carbonbooks" role="tab" aria-controls="v-pills-carbonbooks"
                                        aria-selected="false">減徘報告</a>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-10" style="background: white;" id="card">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <!-- Step1 start -->
                                    <div class="tab-pane fade show active" id="v-pills-step1" role="tabpanel"
                                        aria-labelledby="v-pills-step1-tab">
                                            <div class="row p-3">
                                                    <label class="form-label mb-3" for="#" style="font-size: 20pt;font-weight:1000;">盤查基本設定</label>
                                                    <hr>
                                                    <div class="col-md-12 mt-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="AddNew-Username">盤查年度</label>
                                                            <input type="date" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="AddNew-Username">盤查原因</label>
                                                        <select class="form-select">
                                                                <option selected>自主盤查</option>
                                                                <option>依法申報</option>
                                                                <option>其他</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="AddNew-Username">規範使用</label>
                                                        <select class="form-select">
                                                                <option selected>請選擇</option>
                                                                <option>使用ISO14064-1標準</option>
                                                                <option>使用環保署標準</option>
                                                            </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="AddNew-Username">GWP版本</label>
                                                        <select class="form-select">
                                                                <option selected>請選擇</option>
                                                                <option>IPCC AR6（2021）</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 mb-2">
                                                    <div class="col text-end">
                                                        <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                                class=" bx bx-file me-1"></i> 保存 </a>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row-->
                                            </div>
                                    </div>
                                    <!-- Step1 end -->
                                    <div class="tab-pane fade " id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="row p-3">
                                            <label class="form-label" for="#" style="font-size: 20pt;font-weight:1000;">盤查邊界設定</label>
                                            <hr>
                                                <div class="col-md-6 mt-3">
                                                   
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Username">客戶名稱</label>
                                                    <input type="text" class="form-control" placeholder="請輸入客戶名稱"
                                                        id="AddNew-Username">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Username">分行名稱</label>
                                                    <input type="text" class="form-control" placeholder="請輸入分行名稱"
                                                        id="AddNew-Username">
                                                </div>
                                                
                            
                                            </div>
                                           <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="AddNew-Email">客戶地址</label>
                                                <input type="text" class="form-control" placeholder="請輸入客戶地址"
                                                    id="AddNew-Email">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="AddNew-Email">分行地址</label>
                                                <input type="text" class="form-control" placeholder="請輸入分行地址"
                                                    id="AddNew-Email">
                                            </div>
                                            
                                           </div>
                                           <div class="col-md-12">
                                            <label class="form-label">公司所屬行業別</label>
                                            <div class="mb-3">
                                                <select class="form-select">
                                                    <option selected>-選擇-</option>
                                                    <option>Full Stack Developer</option>
                                                    <option>Frontend Developer</option>
                                                    <option>UI/UX Designer</option>
                                                    <option>Backend Developer</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="AddNew-Email">專案聯絡人</label>
                                                <input type="text" class="form-control" placeholder="請輸入專案聯絡人"
                                                    id="AddNew-Email">
                                            </div>
                                           </div>
                                           
                                            
                                            <div class="mb-3">
                                                <label class="form-label" for="AddNew-Email">職稱</label>
                                                <input type="text" class="form-control" placeholder="請輸入職稱"
                                                    id="AddNew-Email">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="AddNew-Email">聯絡E-Mail</label>
                                                <input type="text" class="form-control" placeholder="請輸入E-Mail"
                                                    id="AddNew-Email">
                                            </div>
                                        
                                        
                                        </div>
                                        <div class="row mt-4 mb-2">
                                            <div class="col text-end">
                                                <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                        class=" bx bx-file me-1"></i> 保存 </a>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                       
                                    </div>






                                    
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div class="row p-3">
                                            <label class="form-label" for="#" style="font-size: 20pt;font-weight:1000;">排放源鑑別與計算</label>
                                            <hr>
                                            <div class="col-md-12">
                                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                                    <div>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target=".add-new" class="btn btn-success"><i
                                                                class="bx bx-plus me-1"></i>新增排放源</a>
                                                    </div>
                                                    {{-- <div class="dropdown">
                                                        <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#"
                                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                        </ul>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="table-responsive mt-3 mb-3">
                                                <table class="table align-middle mb-0 table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th colspan="8"><h5>類別一：直接溫室氣體排放與移除</h5></th>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center">
                                                        <th>編號</th>
                                                        <th>活動/設備</th>
                                                        <th>排放源型式</th>
                                                        <th>ISO14064排放源類別</th>
                                                        <th>GHG Protocol排放源類別</th>
                                                        <th>排放量單位</th>
                                                        <th>列入計算</th>
                                                        <th>操作</th>
                                                    </tr>
                                                    <tbody>
                                                        <tr align="center">
                                                            <th>1</th>
                                                            <td>備用發電機</td>
                                                            <td>能源（E）</td>
                                                            <td>category1</td>
                                                            <td>scope 1 a</td>
                                                            <td>kg</td>
                                                            <td>是</td>
                                                            <td>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Edit"
                                                                            class="px-2 text-primary"><i
                                                                                class="bx bx-pencil font-size-18"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Delete"
                                                                            class="px-2 text-danger"><i
                                                                                class="bx bx-trash-alt font-size-18"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr align="center">
                                                            <th>2</th>
                                                            <td>備用發電機</td>
                                                            <td>能源（E）</td>
                                                            <td>category1</td>
                                                            <td>scope 1 a</td>
                                                            <td>kg</td>
                                                            <td>是</td>
                                                            <td>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Edit"
                                                                            class="px-2 text-primary"><i
                                                                                class="bx bx-pencil font-size-18"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Delete"
                                                                            class="px-2 text-danger"><i
                                                                                class="bx bx-trash-alt font-size-18"></i></a>
                                                                    </li>
                                                                    {{-- <li class="list-inline-item dropdown">
                                                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#"
                                                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </a>
                    
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div> --}}
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                    
                                                    </tbody>
                                                </table>
                                            </div>
                                           
                                            <div class="table-responsive mt-5 mb-3">
                                                <table class="table align-middle mb-0 table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th colspan="8"><h5>類別二：輸入能源之間間接溫室氣體排放</h5></th>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center">
                                                        <th>編號</th>
                                                        <th>活動/設備</th>
                                                        <th>排放源型式</th>
                                                        <th>ISO14064排放源類別</th>
                                                        <th>GHG Protocol排放源類別</th>
                                                        <th>排放量單位</th>
                                                        <th>列入計算</th>
                                                        <th>操作</th>
                                                    </tr>
                                                    <tbody>
                                                        <tr align="center">
                                                            <th>1</th>
                                                            <td>備用發電機</td>
                                                            <td>能源（E）</td>
                                                            <td>category1</td>
                                                            <td>scope 1 a</td>
                                                            <td>kg</td>
                                                            <td>是</td>
                                                            <td>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Edit"
                                                                            class="px-2 text-primary"><i
                                                                                class="bx bx-pencil font-size-18"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Delete"
                                                                            class="px-2 text-danger"><i
                                                                                class="bx bx-trash-alt font-size-18"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr align="center">
                                                            <th>2</th>
                                                            <td>備用發電機</td>
                                                            <td>能源（E）</td>
                                                            <td>category1</td>
                                                            <td>scope 1 a</td>
                                                            <td>kg</td>
                                                            <td>是</td>
                                                            <td>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Edit"
                                                                            class="px-2 text-primary"><i
                                                                                class="bx bx-pencil font-size-18"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Delete"
                                                                            class="px-2 text-danger"><i
                                                                                class="bx bx-trash-alt font-size-18"></i></a>
                                                                    </li>
                                                                    {{-- <li class="list-inline-item dropdown">
                                                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#"
                                                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </a>
                    
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div> --}}
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                    
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="table-responsive mt-5">
                                                <table class="table align-middle mb-0 table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th colspan="8"><h5>類別三：運輸之間間接溫室氣體排放</h5></th>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center">
                                                        <th>編號</th>
                                                        <th>活動/設備</th>
                                                        <th>排放源型式</th>
                                                        <th>ISO14064排放源類別</th>
                                                        <th>GHG Protocol排放源類別</th>
                                                        <th>排放量單位</th>
                                                        <th>列入計算</th>
                                                        <th>操作</th>
                                                    </tr>
                                                    <tbody>
                                                        <tr align="center">
                                                            <th>1</th>
                                                            <td>備用發電機</td>
                                                            <td>能源（E）</td>
                                                            <td>category1</td>
                                                            <td>scope 1 a</td>
                                                            <td>kg</td>
                                                            <td>是</td>
                                                            <td>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Edit"
                                                                            class="px-2 text-primary"><i
                                                                                class="bx bx-pencil font-size-18"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Delete"
                                                                            class="px-2 text-danger"><i
                                                                                class="bx bx-trash-alt font-size-18"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr align="center">
                                                            <th>2</th>
                                                            <td>備用發電機</td>
                                                            <td>能源（E）</td>
                                                            <td>category1</td>
                                                            <td>scope 1 a</td>
                                                            <td>kg</td>
                                                            <td>是</td>
                                                            <td>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Edit"
                                                                            class="px-2 text-primary"><i
                                                                                class="bx bx-pencil font-size-18"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Delete"
                                                                            class="px-2 text-danger"><i
                                                                                class="bx bx-trash-alt font-size-18"></i></a>
                                                                    </li>
                                                                    {{-- <li class="list-inline-item dropdown">
                                                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#"
                                                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </a>
                    
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div> --}}
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mt-4 mb-2">
                                            <div class="col text-end">
                                                <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                        class=" bx bx-file me-1"></i> 保存 </a>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div>





                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                        aria-labelledby="v-pills-messages-tab">
                                        <div class="row p-3">
                                            <label class="form-label" for="#" style="font-size: 20pt;font-weight:1000;">活動數據設定 - 範疇一</label>
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <td>排放源</td>
                                                <td>燃料類型</td>
                                                <td>年度使用量(單位)</td>
                                                <td>排放因子(碳排放每單位燃料)</td>
                                                <td>排放量(CO2e)</td>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <input type="text" name="" id="" class="form-control">
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                
                                            </tbody>
                                            <tbody>
                                                <td>
                                                    <input type="text" name="" id="" class="form-control">
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                
                                            </tbody>
                                            <tbody>
                                                <td>
                                                    <input type="text" name="" id="" class="form-control">
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                
                                            </tbody>
                                        </table>
                                        <div class="row mt-4 mb-2">
                                            <div class="col text-end">
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                    class=" bx bx-file me-1"></i> 保存</a>
                                                <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                                
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div>






                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                        aria-labelledby="v-pills-settings">
                                        <div class="row p-3">
                                            <label class="form-label" for="#" style="font-size: 20pt;font-weight:1000;">活動數據設定 - 範疇二</label>
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <td>排放源</td>
                                                <td>燃料類型</td>
                                                <td>年度使用量(單位)</td>
                                                <td>排放因子(碳排放每單位燃料)</td>
                                                <td>排放量(CO2e)</td>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <input type="text" name="" id="" class="form-control">
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                
                                            </tbody>
                                            <tbody>
                                                <td>
                                                    <input type="text" name="" id="" class="form-control">
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                
                                            </tbody>
                                            <tbody>
                                                <td>
                                                    <input type="text" name="" id="" class="form-control">
                                                </td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                <td><input type="text" name="" id="" class="form-control"></td>
                                                
                                            </tbody>
                                        </table>
                                        <div class="row mt-4 mb-2">
                                            <div class="col text-end">
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                    class=" bx bx-file me-1"></i> 保存</a>
                                                <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                                
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div>



                                    <div class="tab-pane fade" id="v-pills-scope3" role="tabpanel"
                                    aria-labelledby="v-pills-scope3">
                                    <div class="row p-3">
                                        <label class="form-label" for="#" style="font-size: 20pt;font-weight:1000;">活動數據設定 - 範疇三</label>
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <td>排放源</td>
                                            <td>燃料類型</td>
                                            <td>年度使用量(單位)</td>
                                            <td>排放因子(碳排放每單位燃料)</td>
                                            <td>排放量(CO2e)</td>
                                        </thead>
                                        <tbody>
                                            <td>
                                                <input type="text" name="" id="" class="form-control">
                                            </td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            
                                        </tbody>
                                        <tbody>
                                            <td>
                                                <input type="text" name="" id="" class="form-control">
                                            </td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            
                                        </tbody>
                                        <tbody>
                                            <td>
                                                <input type="text" name="" id="" class="form-control">
                                            </td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            <td><input type="text" name="" id="" class="form-control"></td>
                                            
                                        </tbody>
                                    </table>
                                    <div class="row mt-4 mb-2">
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                class=" bx bx-file me-1"></i> 保存</a>
                                            <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                            
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </div>


                                <div class="tab-pane fade" id="v-pills-carbonbooks" role="tabpanel"
                                aria-labelledby="v-pills-carbonbooks">
                                <div class="row p-3">
                                    <label class="form-label" for="#" style="font-size: 20pt;font-weight:1000;">盤查清冊</label>
                                </div>

                                </div>
                            
                                </div>
                            </div><!--  end col -->
                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>

        <style>
            .nav{
                border-radius: 15px;
            }
            .nav-link {
                font-size: 1.2em;
                line-height: 40px;
            }

            #card{
                /* box-shadow: 2px 2px 8px 2px rgba(0, 0, 0, 0.07); */
                /* border: 0.5pt solid #28b765; */
                border-radius: 15px;
            }

            .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                color: var(--bs-nav-pills-link-active-color);
                background-color: #28b765;
            }
            .font-control{
                text-align: center;
            }

            .main-content{
                min-height: 100vh;
                background-color: #f5f5f5;
            }
        </style>
    @endsection
    @section('scripts')
        <!-- apexcharts -->
        <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    @endsection