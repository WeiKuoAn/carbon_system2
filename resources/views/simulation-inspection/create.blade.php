@extends('layouts.master')
@section('title')
    Profile
@endsection
@section('page-title')
    Profile
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <div class="row">
            <div class="card-body mt-5">
                        <div class="row">
                            <div class="col-md-9" style="background: white;">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="row p-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Username">Username</label>
                                                    <input type="text" class="form-control" placeholder="Enter Username"
                                                        id="AddNew-Username">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Position</label>
                                                    <select class="form-select">
                                                        <option selected>Select Position</option>
                                                        <option>Full Stack Developer</option>
                                                        <option>Frontend Developer</option>
                                                        <option>UI/UX Designer</option>
                                                        <option>Backend Developer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Email">Email</label>
                                                    <input type="text" class="form-control" placeholder="Enter Email"
                                                        id="AddNew-Email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Phone">Phone</label>
                                                    <input type="text" class="form-control" placeholder="Enter Phone"
                                                        id="AddNew-Phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div class="row p-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Username">Username</label>
                                                    <input type="text" class="form-control" placeholder="Enter Username"
                                                        id="AddNew-Username">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Position</label>
                                                    <select class="form-select">
                                                        <option selected>Select Position</option>
                                                        <option>Full Stack Developer</option>
                                                        <option>Frontend Developer</option>
                                                        <option>UI/UX Designer</option>
                                                        <option>Backend Developer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Email">Email</label>
                                                    <input type="text" class="form-control" placeholder="Enter Email"
                                                        id="AddNew-Email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Phone">Phone</label>
                                                    <input type="text" class="form-control" placeholder="Enter Phone"
                                                        id="AddNew-Phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                        aria-labelledby="v-pills-messages-tab">
                                        <div class="row p-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Username">Username</label>
                                                    <input type="text" class="form-control" placeholder="Enter Username"
                                                        id="AddNew-Username">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Position</label>
                                                    <select class="form-select">
                                                        <option selected>Select Position</option>
                                                        <option>Full Stack Developer</option>
                                                        <option>Frontend Developer</option>
                                                        <option>UI/UX Designer</option>
                                                        <option>Backend Developer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Email">Email</label>
                                                    <input type="text" class="form-control" placeholder="Enter Email"
                                                        id="AddNew-Email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Phone">Phone</label>
                                                    <input type="text" class="form-control" placeholder="Enter Phone"
                                                        id="AddNew-Phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                        aria-labelledby="v-pills-settings-tab">
                                        <div class="row p-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Username">Username</label>
                                                    <input type="text" class="form-control" placeholder="Enter Username"
                                                        id="AddNew-Username">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Position</label>
                                                    <select class="form-select">
                                                        <option selected>Select Position</option>
                                                        <option>Full Stack Developer</option>
                                                        <option>Frontend Developer</option>
                                                        <option>UI/UX Designer</option>
                                                        <option>Backend Developer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Email">Email</label>
                                                    <input type="text" class="form-control" placeholder="Enter Email"
                                                        id="AddNew-Email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="AddNew-Phone">Phone</label>
                                                    <input type="text" class="form-control" placeholder="Enter Phone"
                                                        id="AddNew-Phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--  end col -->
                            <div class="col-md-3 p-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical" style="background: white;">
                                    <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                        aria-selected="true">盤查資料</a>
                                    <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false">糞肥管理（總工時）</a>
                                    <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill"
                                        href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                        aria-selected="false">用電量</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                        href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false">車輛類別</a>
                                </div>
                            </div><!-- end col -->
                            
                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
    @endsection
    @section('scripts')
        <!-- apexcharts -->
        <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
