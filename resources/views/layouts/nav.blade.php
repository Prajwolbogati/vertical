<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Rocker</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('index') }}"><i class="bx bx-right-arrow-alt"></i>Default</a>
                        </li>
                        <li> <a href="{{ url('dashboard-alternate') }}"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-user'></i>
                        </div>
                        <div class="menu-title">Account</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('newaccount') }}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                        </li>
                        <li> <a href="{{ url('allAccount') }}"><i class="bx bx-right-arrow-alt"></i>View All</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-server'></i>
                        </div>
                        <div class="menu-title">Hosting</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('hosting-exp-15') }}"><i class="bx bx-right-arrow-alt"></i>Expire in 15 days</a>
                        </li>
                        <li> <a href="{{ url('hosting-exp-7') }}"><i class="bx bx-right-arrow-alt"></i>Expire in 7 days</a>
                        </li>
                        <li> <a href="{{ url('hosting-expired') }}"><i class="bx bx-right-arrow-alt"></i>Expired Accounts</a>
                        </li>
                        <li> <a href="{{ url('hosting-suspend') }}"><i class="bx bx-right-arrow-alt"></i>Suspended Accounts</a>
                        </li>
                        <li> <a href="{{ url('hosting-deleted') }}"><i class="bx bx-right-arrow-alt"></i>Deleted Accounts</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-world'></i>
                        </div>
                        <div class="menu-title">Domain</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('domain-exp-15') }}"><i class="bx bx-right-arrow-alt"></i>Expire in 15 days</a>
                        </li>
                        <li> <a href="{{ url('domain-exp-7') }}"><i class="bx bx-right-arrow-alt"></i>Expire in 7 days</a>
                        </li>
                        <li> <a href="{{ url('domain-expired') }}"><i class="bx bx-right-arrow-alt"></i>Expired Accounts</a>
                        </li>
                        <li> <a href="{{ url('domain-suspend') }}"><i class="bx bx-right-arrow-alt"></i>Suspended Accounts</a>
                        </li>
                        <li> <a href="{{ url('domain-deleted') }}"><i class="bx bx-right-arrow-alt"></i>Deleted Accounts</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-user-circle'></i>
                        </div>
                        <div class="menu-title">User</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('index') }}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                        </li>
                        <li> <a href="{{ url('dashboard-alternate') }}"><i class="bx bx-right-arrow-alt"></i>View All</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='lni lni-users'></i>
                        </div>
                        <div class="menu-title">Clients</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('newclient') }}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                        </li>
                        <li> <a href="{{ url('dashboard-alternate') }}"><i class="bx bx-right-arrow-alt"></i>View All</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='lni lni-customer'></i>
                        </div>
                        <div class="menu-title">Services</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('newserver') }}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                        </li>
                        <li> <a href="{{ url('dashboard-alternate') }}"><i class="bx bx-right-arrow-alt"></i>View All</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='fadeIn animated bx bx-envelope'></i>
                        </div>
                        <div class="menu-title">Email</div>
                    </a>
                    <ul>
                    <li> <a href="{{ url('domain-exp-15') }}"><i class="bx bx-right-arrow-alt"></i>Expire in 15 days</a>
                        </li>
                        <li> <a href="{{ url('domain-exp-7') }}"><i class="bx bx-right-arrow-alt"></i>Expire in 7 days</a>
                        </li>
                        <li> <a href="{{ url('domain-expired') }}"><i class="bx bx-right-arrow-alt"></i>Expired Accounts</a>
                        </li>
                        <li> <a href="{{ url('domain-suspend') }}"><i class="bx bx-right-arrow-alt"></i>Suspended Accounts</a>
                        </li>
                        <li> <a href="{{ url('domain-deleted') }}"><i class="bx bx-right-arrow-alt"></i>Deleted Accounts</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="">
                        <div class="parent-icon"><i class='lni lni-cog'></i>
                        </div>
                        <div class="menu-title" a href="{{ url('newsetting') }}">  Settings</div>
                    </a>
                   
                </li>
              
                
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-lock"></i>
                        </div>
                        <div class="menu-title">Authentication</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('authentication-signin') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In</a>
                        </li>
                        <li> <a href="{{ url('authentication-signup') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up</a>
                        </li>
                        <li> <a href="{{ url('authentication-signin-with-header-footer') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In with Header & Footer</a>
                        </li>
                        <li> <a href="{{ url('authentication-signup-with-header-footer') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up with Header & Footer</a>
                        </li>
                        <li> <a href="{{ url('authentication-forgot-password') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Forgot Password</a>
                        </li>
                        <li> <a href="{{ url('authentication-reset-password') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Reset Password</a>
                        </li>
                        <li> <a href="{{ url('authentication-lock-screen') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Lock Screen</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('user-profile') }}">
                        <div class="parent-icon"><i class="bx bx-user-circle"></i>
                        </div>
                        <div class="menu-title">User Profile</div>
                    </a>
                </li>
               
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-error"></i>
                        </div>
                        <div class="menu-title">Errors</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('errors-404-error') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>404 Error</a>
                        </li>
                        <li> <a href="{{ url('errors-500-error') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>500 Error</a>
                        </li>
                        <li> <a href="{{ url('errors-coming-soon') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Coming Soon</a>
                        </li>
                        <li> <a href="{{ url('error-blank-page') }}" target="_blank"><i class="bx bx-right-arrow-alt"></i>Blank Page</a>
                        </li>
                    </ul>
                </li>
              
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->