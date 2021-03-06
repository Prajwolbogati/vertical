<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                class="alert-count">{{ $dataexpcount }}</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Expired Accounts</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                @foreach ($dataexp as $exp)
                                    <a class="dropdown-item" href="{{ url('expired') }}">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-primary text-primary"><i
                                                    class="bx bx-group"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">{{ $exp->account->companyname }}<span
                                                        class="msg-time float-end">
                                                    </span></h6>
                                                <p class="msg-info">{{ $exp->service->parent->stype_name }}
                                                    service expired</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <a href="{{ url('expired') }}">
                                <div class="text-center msg-footer">View All Notifications</div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (!empty(Auth::user()->image))
                        <img src="{{ asset('user') }}/{{ Auth::user()->image }}" class="user-img"
                            alt="user avatar">
                    @else
                        <img src="{{ asset('assets/images/webtechlogo.svg') }}" class="user-img"
                            alt="user avatar">
                    @endif
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ url('profileupdate') }}"><i
                                class="bx bx-user"></i><span>Profile</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <form method="POST" action="{{ url('logout') }}">
                        @csrf
                        <button class="dropdown-item "><i class='bx bx-log-out-circle'></i>Log Out</button>
                    </form>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->
