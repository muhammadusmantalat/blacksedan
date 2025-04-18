<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image"
                    src="{{ asset('public/admin/assets/images/2020-10-Black_Sedan_logo.png') }}" class="header-logo" />
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"><i
                        class="fas fa-th-large"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/requests*') ? 'active' : '' }}">
                <a href="{{ route('chauffer.requests') }}"
                    class="nav-link {{ request()->is('admin/requests*') ? 'active' : '' }}"><i
                        class="fas fa-calendar-check"></i><span>Chauffer Account Requests</span>
                        <div id="requestCounter"
                            class="badge {{ request()->is('admin/requests*') ? 'bg-white text-dark' : 'bg-primary text-white' }} rounded-circle ">
                        </div>
                    </a>
            </li>
            <li class="dropdown {{ request()->is('admin/chauffer*') ? 'active' : '' }}">
                <a href="{{ route('chauffer.index') }}"
                    class="nav-link {{ request()->is('admin/chauffer*') ? 'active' : '' }}"><i
                        class="fas fa-calendar-check"></i><span>Chauffeurs</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/customer*') ? 'active' : '' }}">
                <a href="{{ route('customer.index') }}"
                    class="nav-link {{ request()->is('admin/customers*') ? 'active' : '' }}"><i
                        class="fas fa-calendar-check"></i><span>Customers</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/getBooking*') ? 'active' : '' }}">
                <a href="{{ route('getBooking') }}"
                    class="nav-link {{ request()->is('admin/getBooking*') ? 'active' : '' }}"><i
                        class="fas fa-calendar-check"></i><span>Offers</span>
                        <div id="offersCounter"
                            class="badge {{ request()->is('admin/getBooking*') ? 'bg-white text-dark' : 'bg-primary text-white' }} rounded-circle ">
                        </div>
                    </a>
            </li>
            <li class="dropdown {{ request()->is('admin/getUpcomingRides*') ? 'active' : '' }}">
                <a href="{{route('getUpcomingRides')}}"
                    class="nav-link {{ request()->is('admin/getUpcomingRides*') ? 'active' : '' }}"><i
                        class="fas fa-clock"></i><span>Upcoming rides</span>
                        <div id="upComingRidesCounter"
                            class="badge {{ request()->is('admin/getUpcomingRides*') ? 'bg-white text-dark' : 'bg-primary text-white' }} rounded-circle ">
                        </div>
                    </a>
            </li>
            <li class="dropdown {{ request()->is('admin/getPastRides*') ? 'active' : '' }}">
                <a href="{{route('getPastRides')}}"
                    class="nav-link {{ request()->is('admin/getPastRides*') ? 'active' : '' }}"><i
                        class="fas fa-history"></i><span>Past Rides</span>
                        <div id="pastRidesCounter"
                            class="badge {{ request()->is('admin/getPastRides*') ? 'bg-white text-dark' : 'bg-primary text-white' }} rounded-circle ">
                        </div>
                    </a>
            </li>
            
            <li class="dropdown {{ request()->is('admin/vehicle*') ? 'active' : '' }}">
                <a href="{{ route('vehicle.index') }}" class="nav-link  {{ request()->is('admin/vehicle*') ? 'active' : '' }}"><i class='fas fa-car'
                        style='font-size:24px'></i></i><span>Vehicle</span></a>
            </li>

            <li class="dropdown {{ request()->is('admin/delete*') ? 'active' : '' }}">
                <a href="{{route('delete.requests.index')}}"
                    class="nav-link {{ request()->is('admin/delete*') ? 'active' : '' }}"><i
                        class="fas fa-history"></i><span>Delete Account Requests</span>
                        <div id="deleteRequestCounter"
                            class="badge {{ request()->is('admin/delete*') ? 'bg-white text-dark' : 'bg-primary text-white' }} rounded-circle ">
                        </div>
                    </a>
            </li>
            {{-- <li class="dropdown {{ request()->is('admin/notification*') ? 'active' : '' }}">
                <a href="{{route('notification.index')}}"
                    class="nav-link {{ request()->is('admin/notification*') ? 'active' : '' }}"><i
                        class="fas fa-history"></i><span>Notifications</span>
                        <div id="notificationsCounter"
                            class="badge {{ request()->is('admin/notification*') ? 'bg-white text-dark' : 'bg-primary text-white' }} rounded-circle ">
                        </div>
                    </a>
            </li> --}}
            {{-- <li class="dropdown {{ request()->is('admin/about*') ? 'active' : '' }}">
                <a href="{{ route('about.index') }}" class="nav-link"><i class="fa fa-info-circle"></i><span>About
                        Us</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/policy*') ? 'active' : '' }}">
                <a href="{{ route('policy.index') }}" class="nav-link"><i class="fa fa-lock"></i><span>Privacy
                        Policy</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/terms*') ? 'active' : '' }}">
                <a href="{{ route('terms.index') }}" class="nav-link"><i class="fa fa-key"></i><span>Term & Condition</span></a>
            <li class="dropdown {{ request()->is('admin/faq*') ? 'active' : '' }}">
                <a href="{{ route('faq.index') }}" class="nav-link"><i
                    class="fa fa-question-circle"></i><span>FAQ's</span></a>
            </li>
            </li> --}}
        </ul>
    </aside>
</div>

