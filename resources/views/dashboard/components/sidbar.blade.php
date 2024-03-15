@php
     $role=Auth()->user()->role;
      echo $role;
  @endphp
 

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" data-key="t-menu">Menu</li>
                            <!-- User SideBar -->
                            @if (Auth()->check() && $role == 0)
                                <li>
                                    <a href="/dashboard">
                                        <i data-feather="home"></i>
                                        <span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user/jobs_application')}}">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-company">Jobs Applied</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-company">Jobs Circulars</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/dashboard/profile">
                                        <i data-feather="settings"></i>
                                        <span data-key="t-profile">Profile Setting</span>
                                    </a>
                            </li>
                            <!-- Admin SideBar -->  
                            @elseif (Auth()->check() && $role == 1)
                                <li>
                                    <a href="/dashboard">
                                        <i data-feather="home"></i>
                                        <span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/user_list">
                                        <i data-feather="user"></i>
                                        <span data-key="t-user">User List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/company_list">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-company">Company List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/job_category_list">
                                        <i data-feather="edit"></i>
                                        <span data-key="t-company">Job Category</span>
                                    </a>
                                </li>
                               

                                <!-- <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-apps">Staff</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li>
                                            <a href="javascript: void(0);" class="has-arrow">
                                                <span data-key="t-email">HRM</span>
                                            </a>
                                            <ul class="sub-menu" aria-expanded="false">
                                                <li><a href="apps-email-inbox.html" data-key="t-inbox">GM</a></li>
                                                <li><a href="apps-email-read.html" data-key="t-read-email">DGM</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> -->
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="settings" class="icon-lg"></i>
                                        <span data-key="t-settings">Settings</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li>
                                            <a href="/dashboard/profile">
                                                <span data-key="t-profile">Profile</span>
                                            </a>
                                            <a href="/admin/website_settings">
                                                <span data-key="t-website">Website</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                 <!-- Nav Item - Plugin -->
                                <li class="nav-item">
                                    <a class="nav-link" href="/plugins">
                                        <i class="fas fa-puzzle-piece"></i>
                                        <span>Plugin</span>
                                    </a>
                                </li>
                             <!-- Company SideBar -->
                             @elseif (Auth()->check() && $role == 2)
                                <li>
                                    <a href="/dashboard">
                                        <i data-feather="home"></i>
                                        <span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                </li>
                                @php
                                    $plugin = App\Http\Controllers\PluginController::fetchAllPlugin();
                                @endphp
                                @if($plugin)
                                    @foreach ($plugin as $pluginData)
                                        @if ($pluginData->plugin == 'employee' && $pluginData->status == 1)
                                        <!-- Nav Item - Company Employee -->
                                        <li>
                                            <a href="/company-employee">
                                                <i data-feather="user"></i>
                                                <span data-key="t-profile">All Employees</span>
                                            </a>
                                        </li>
                                        @endif
                                    @endforeach
                                @endif
                               
                                <li>
                                    <a href="/company-profile">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-profile">Company Info</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="edit" class="icon-lg"></i>
                                        <span data-key="t-job">Job Post</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li>
                                            <a href="/company/create">
                                                <span data-key="t-njob">Create New JOB</span>
                                            </a>
                                            <a href="/job-list">
                                                <span data-key="t-joblist">Jobs List</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/dashboard/profile">
                                        <i data-feather="settings"></i>
                                        <span data-key="t-profile">Profile Setting</span>
                                    </a>
                            </li>

                            @endif
                            

                            

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

