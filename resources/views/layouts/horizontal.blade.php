<header class="ishorizontal-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('build/images/logo.png') }}" alt="" height="60">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('build/images/logo.png') }}" alt="" height="60">
                    </span>
                </a>

                <a href="index" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('build/images/logo.png') }}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('build/images/logo.png') }}" alt="" height="30">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse"
                data-bs-target="#topnav-menu-content">
                <i class="bx bx-menu align-middle"></i>
            </button>

            <!-- start page title -->
            <div class="page-title-box align-self-center d-none d-md-block">
                <h4 class="page-title mb-0">@yield('page-title')</h4>
            </div>
            <!-- end page title -->

        </div>

        <div class="d-flex">

            {{-- <div class="dropdown d-inline-block language-switch ms-2 ms-xl-3">
                <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="header-lang-img" src="{{ URL::asset('build/images/flags/us.jpg') }}"
                        alt="Header Language" height="18">
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="eng">
                        <img src="{{ URL::asset('build/images/flags/us.jpg') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">English</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                        <img src="{{ URL::asset('build/images/flags/spain.jpg') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                        <img src="{{ URL::asset('build/images/flags/germany.jpg') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">German</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                        <img src="{{ URL::asset('build/images/flags/italy.jpg') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                        <img src="{{ URL::asset('build/images/flags/russia.jpg') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">Russian</span>
                    </a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-search icon-sm align-middle"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                    <form class="p-2">
                        <div class="search-box">
                            <div class="position-relative">
                                <input type="text" class="form-control rounded bg-light border-0"
                                    placeholder="Search...">
                                <i class="bx bx-search search-icon"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}

            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell icon-sm align-middle"></i>
                    <span class="noti-dot bg-danger rounded-pill">4</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-15"> Notifications </h5>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small fw-semibold text-decoration-underline"> Mark all as
                                    read</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 250px;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour
                                                ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour
                                                ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="uil-arrow-circle-right me-1"></i> <span>View More..</span>
                        </a>
                    </div>
                </div>
            </div> --}}

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-2 fw-medium font-size-15">{{ Auth::user()->name }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="p-3 border-bottom">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <p class="mb-0 font-size-11 text-muted">martin.gurley@email.com</p>
                    </div>
                    <a class="dropdown-item" href="contacts-profile"><i
                            class="mdi mdi-account-circle text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">個人資料</a>
                    {{-- <a class="dropdown-item" href="apps-chat"><i
                            class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Messages</span></a>
                    <a class="dropdown-item" href="pages-faqs"><i
                            class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Help</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i
                            class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle me-3">Settings</span><span
                            class="badge badge-soft-success ms-auto">New</span></a>
                    <a class="dropdown-item" href="auth-lock-screen"><i
                            class="mdi mdi-lock text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Lock screen</span></a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav"> 
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-home-alt icon nav-icon"></i>
                                <span data-key="t-dashboards">數據總覽</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="index" class="dropdown-item" data-key="t-ecommerce">Ecommerce</a>
                                <a href="dashboard-sales" class="dropdown-item" data-key="t-sales">Sales</a>
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-other"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-clipboard  icon nav-icon"></i>
                                <span data-key="t-dashboards">其他設定</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-other">
                                {{-- <a href="{{route('ipcc_report.index')}}" class="dropdown-item">IPCC評估報告</a> --}}
                                <a href="{{ route('scope.index') }}" class="dropdown-item">範疇</a>
                                <a href="{{ route('iso14064.index') }}" class="dropdown-item">ISO14064排放源類別</a>
                                <a href="{{ route('ghg_protocol.index') }}" class="dropdown-item">GHG Protocol排放源類別</a>
                                <a href="{{route('source.create')}}" class="dropdown-item">排放源形式</a>
                                <a href="{{route('process.create')}}" class="dropdown-item">製程類別</a>
                                <a href="{{ route('device.index') }}" class="dropdown-item">活動設備</a>
                            </div>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-inspection"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-clipboard  icon nav-icon"></i>
                                <span data-key="t-dashboards">碳盤模擬流程</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-inspection">
                                {{-- <a href="{{ route('simulation-inspection.create') }}" class="dropdown-item">新增盤查</a> --}}
                                <a href="{{ route('simulation-inspection.step1') }}" class="dropdown-item">新增盤查</a>
                                <a href="{{ route('simulation-inspection.index') }}" class="dropdown-item">盤查列表</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-vendor"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-store icon nav-icon"></i>
                                <span data-key="t-dashboards">廠商管理</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-vendor">
                                <a href="{{ route('customer.create') }}" class="dropdown-item">新增廠商</a>
                                <a href="{{ route('customer.index') }}" class="dropdown-item">廠商列表</a>
                                <a href="{{ route('industry-category.index') }}" class="dropdown-item">行業類別設定</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-book-content icon nav-icon"></i>
                                <span data-key="t-dashboards">企業健檢問卷管理</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="{{ route('survey.create') }}" class="dropdown-item">新增問卷</a>
                                <a href="{{ route('survey.index') }}" class="dropdown-item">問卷列表</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-coffee  icon nav-icon"></i>
                                <span data-key="t-dashboards">企業盤查建檢管理</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="{{ route('inspection.create') }}" class="dropdown-item">新增盤查建檢管理</a>
                                {{-- <a href="{{ route('inspection.create') }}" class="dropdown-item">盤查建檢管理2</a> --}}
                            </div>
                        </li>

                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-user icon nav-icon"></i>
                                <span data-key="t-dashboards">用戶管理</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="{{ route('user.index') }}" class="dropdown-item">用戶列表</a>
                                <a href="#" class="dropdown-item">部門設定</a>
                                <a href="#" class="dropdown-item">職稱設定</a>
                                <a href="#" class="dropdown-item">權限設定</a>
                            </div>
                        </li> --}}

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
