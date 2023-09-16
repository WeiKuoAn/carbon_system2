@extends('layouts.master')
@section('title')
    盤查建檢管理1
@endsection
@section('css')
    <!-- choices css -->
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    盤查建檢管理1
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <div class="row">
            <div class="col-xxl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="user-profile-img">
                            <img src="{{ URL::asset('build/images/pattern-bg.jpg') }}" class="profile-img profile-foreground-img rounded-top"
                                style="height: 120px;" alt="">
                            <div class="overlay-content rounded-top">
                                <div>
                                    <div class="user-nav p-3">
                                        <div class="d-flex justify-content-end">
                                            <div class="dropdown">
                                                <a class="text-muted dropdown-toggle font-size-16" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <i class="bx bx-dots-vertical text-white font-size-20"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end user-profile-img -->


                        <div class="p-4 pt-0">

                            <div class="mt-n5 position-relative text-center border-bottom pb-3">
                                <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt=""
                                    class="avatar-xl rounded-circle img-thumbnail">

                                <div class="mt-3">
                                    <h5 class="mb-1">企業名稱</h5>
                                    {{-- <p class="text-muted mb-0">
                                        <i class="bx bxs-star text-warning font-size-14"></i>
                                        <i class="bx bxs-star text-warning font-size-14"></i>
                                        <i class="bx bxs-star text-warning font-size-14"></i>
                                        <i class="bx bxs-star text-warning font-size-14"></i>
                                        <i class="bx bxs-star-half text-warning font-size-14"></i>
                                    </p> --}}
                                </div>

                            </div>

                            <div class="table-responsive mt-3 border-bottom pb-3">
                                <table
                                    class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                    <tbody>
                                        <tr>
                                            <th class="fw-bold">
                                                聯絡人 :</th>
                                            <td class="text-muted">JJHu</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-bold">聯絡電話 :</th>
                                            <td class="text-muted">+214 5632564</td>
                                        </tr>
                                        <!-- end tr -->

                                        <tr>
                                            <th class="fw-bold">聯絡信箱 :</th>
                                            <td class="text-muted">martingurley52@gmail.com</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th class="fw-bold">
                                                地址 :</th>
                                            <td class="text-muted">New Your City</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th class="fw-bold">
                                                統一編號 :</th>
                                            <td class="text-muted">New Your</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th class="fw-bold">
                                                公司規模 :</th>
                                            <td class="text-muted">1-50人</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th class="fw-bold">
                                                上市櫃狀態 :</th>
                                            <td class="text-muted">上市</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th class="fw-bold">
                                                銷售方向 :</th>
                                            <td class="text-muted">B2B</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th class="fw-bold">
                                                銷售方向 :</th>
                                            <td class="text-muted">國際</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th class="fw-bold">
                                                檢視權限 :</th>
                                            <td class="text-muted">開通</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th class="fw-bold">營運狀態 :</th>
                                            <td class="text-muted">0005485</td>
                                        </tr>
                                        <!-- end tr -->

                                        
                                    </tbody><!-- end tbody -->
                                </table>
                            </div>



                            {{-- <div class="p-3 mt-3">
                                <div class="row text-center">
                                    <div class="col-6 border-end">
                                        <div class="p-1">
                                            <h5 class="mb-1">1,269</h5>
                                            <p class="text-muted mb-0">Products</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-1">
                                            <h5 class="mb-1">5.2k</h5>
                                            <p class="text-muted mb-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-2 text-center border-bottom pb-4">
                                <a href="" class="btn btn-primary waves-effect waves-light btn-sm">Send Message <i
                                        class="bx bx-send ms-1 align-middle"></i></a>
                            </div>

                            <div class="mt-3 pt-1 text-center">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript:void()"
                                            class="social-list-item bg-primary text-white border-primary">
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                                            <i class="bx bxl-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:void()"
                                            class="social-list-item bg-danger text-white border-danger">
                                            <i class="bx bxl-google"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <a href="#addproduct-productinfo-collapse" class="text-dark" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="addproduct-productinfo-collapse">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">01</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">起始</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>

                        <div id="addproduct-productinfo-collapse" class="collapse show"
                            data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top">
                                <form>
                                    <div class="mb-3 row" >
                                        <label for="example-search-input" class="col-md-2 col-form-label">起始會議</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-primary" type="button"
                                                    id="inputGroupFileAddon04">上傳</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-email-input" class="col-md-2 col-form-label">經營者/高階主管共同承諾與承諾日期</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-primary" type="button"
                                                    id="inputGroupFileAddon04">上傳</button>
                                            </div>
                                            <input class="form-control mt-3" type="date" value="bootstrap@example.com"
                                                id="example-email-input">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">推動成立組織</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-primary" type="button"
                                                    id="inputGroupFileAddon04">上傳</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-2">
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                    class=" bx bx-file me-1"></i> 保存 </a>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <a href="#addproduct-img-collapse" class="text-dark collapsed" data-bs-toggle="collapse"
                            aria-haspopup="true" aria-expanded="false" aria-haspopup="true"
                            aria-controls="addproduct-img-collapse">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">02</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">邊界設定</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>

                        <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                                <div class="p-4 border-top">
                                    <form action="#">
                                        <div class="mb-3 row">
                                            <label class="col-md-2 col-form-label">盤查邊界設定</label>
                                            <div class="col-md-10">
                                                <select class="form-select">
                                                    <option>請選擇</option>
                                                    <option>高雄廠</option>
                                                    <option>台南廠</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-2 col-form-label">盤查邊界地址</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" id="example-email-input" placeholder="請輸入地址">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">擬定基準年</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="date" value="5" id="example-email-input">
                                                <input class="form-control mt-3" type="date" value="5" id="example-email-input">
                                            </div>
                                        </div>
                                        <div class="row mt-4 mb-2">
                                            <div class="col text-end">
                                                <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                        class=" bx bx-file me-1"></i> 保存 </a>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </form>
                                </div>
                        </div>
                    </div>

                    <div class="card">
                        <a href="#addproduct-metadata-collapse" class="text-dark collapsed" data-bs-toggle="collapse"
                            aria-haspopup="true" aria-expanded="false" aria-haspopup="true"
                            aria-controls="addproduct-metadata-collapse">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">03</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">排放源鑑定</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>

                        <div id="addproduct-metadata-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top">
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">現場勘查</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" id="example-email-input" placeholder="請輸入盤查事物">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">活動數據</label>
                                        <div class="col-md-10">
                                            <select class="form-select">
                                                <option>請選擇</option>
                                                <option>直接溫室氣體排放-範疇一</option>
                                                <option>間接溫室氣體排放(能源)-範疇二</option>
                                                <option>間接溫室氣體排放(其他)範疇三</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">拍照收集</label>
                                        <div class="col-md-10">
                                            <form action="#" class="dropzone">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                                                    </div>
                
                                                    <h4>Drop files here or click to upload.</h4>
                                                </div>
                                            </form>
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
                    </div>

                    <div class="card">
                        <a href="#addproduct-productinfo-collapse1" class="text-dark" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="addproduct-productinfo-collapse1">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">04</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">系統細算及清冊建立</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>

                        <div id="addproduct-productinfo-collapse1" class="collapse"
                            data-bs-parent="#addproduct-accordion1">
                            <div class="p-4 border-top">
                                <form>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">建立排放量清冊</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-primary" type="button"
                                                    id="inputGroupFileAddon04">上傳</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">驗證單位審查</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" id="example-email-input" placeholder="請輸入驗證單位">
                                            <input class="form-control mt-3" type="date" value="5" id="example-email-input">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">數據化文件管理</label>
                                        <div class="col-md-10">
                                            <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg" checked>
                                                <label class="form-check-label" for="customSwitchsizelg" checked></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-2">
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                    class=" bx bx-file me-1"></i> 保存 </a>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <a href="#addproduct-productinfo-collapse3" class="text-dark" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="addproduct-productinfo-collapse3">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">05</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">稽核備存查證</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>

                        <div id="addproduct-productinfo-collapse3" class="collapse"
                            data-bs-parent="#addproduct-accordion3">
                            <div class="p-4 border-top">
                                <form>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">內部查證/外部稽核</label>
                                        <div class="col-md-10">
                                            <select class="form-select">
                                                <option>請選擇</option>
                                                <option>內部</option>
                                                <option>外部</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">亞瑞仕國際驗證ISO14064-1證書</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-primary" type="button"
                                                    id="inputGroupFileAddon04">上傳</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">亞瑞仕國際驗證零碳證書</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-primary" type="button"
                                                    id="inputGroupFileAddon04">上傳</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">聯合國碳權證書</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-primary" type="button"
                                                    id="inputGroupFileAddon04">上傳</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">盤查清冊</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-primary" type="button"
                                                    id="inputGroupFileAddon04">上傳</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-2">
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> 取消 </a>
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                                                    class=" bx bx-file me-1"></i> 保存 </a>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        
    @endsection
    @section('scripts')
        <!-- choices js -->
        <script src="{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

        <!-- dropzone plugin -->
        <script src="{{ URL::asset('build/libs/dropzone/min/dropzone.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ URL::asset('build/js/pages/ecommerce-choices.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
