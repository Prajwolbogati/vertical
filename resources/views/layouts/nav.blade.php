<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
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
                    <a href ="{{ url('index') }}">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
</div>
                        <div class="menu-title">Dashboard</div>
                      
                       
                    </a>
                   
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
                        <div class="parent-icon"><i class='lni lni-customer'></i>
                        </div>
                        <div class="menu-title">Services</div>
                    </a>
                    <ul>

                    @foreach($services as $ser)
                <li>
                    <a href="javascript:;" class="">
                        <div class="parent-icon"><i class='lni lni-angle-double-down'></i>
                        </div>
                        <div class="menu-title">{{$ser->stype_name}}</div>
                    </a>
                    <ul>
                        <li> <a href="{{url('exp-15')}}/{{$ser->stype_id}}"><i class="bx bx-right-arrow-alt"></i>Expire in 15 days</a>
                        </li>
                        <li> <a href="{{ url('exp-7') }}/{{$ser->stype_id}}"><i class="bx bx-right-arrow-alt"></i>Expire in 7 days</a>
                        </li>
                        <li> <a href="{{ url('expired') }}/{{$ser->stype_id}}"><i class="bx bx-right-arrow-alt"></i>Expired Accounts</a>
                        </li>
                        <li> <a href="{{ url('suspend') }}/{{$ser->stype_id}}"><i class="bx bx-right-arrow-alt"></i>Suspended Accounts</a>
                        </li>
                        <li> <a href="{{ url('deleted') }}/{{$ser->stype_id}}"><i class="bx bx-right-arrow-alt"></i>Deleted Accounts</a>
                        </li>
                    </ul>
                </li>
                @endforeach
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
                        <li> <a href="{{ url('allClient') }}"><i class="bx bx-right-arrow-alt"></i>View All</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='lni lni-plus '></i>
                        </div>
                        <div class="menu-title"> Add Services</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('newservice') }}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                        </li>
                        <li> <a href="{{ url('allservices') }}"><i class="bx bx-right-arrow-alt"></i>View All</a>
                        </li>
                    </ul>
                </li>


                <li>
                   <a href="{{ url('newsetting') }}">
                        <div class="parent-icon"><i class='lni lni-cog'></i>
                        </div>
                      
                        <div class="menu-title">    Settings </div>
                     
                    </a>
                   
                </li>
                
              
                
               
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->