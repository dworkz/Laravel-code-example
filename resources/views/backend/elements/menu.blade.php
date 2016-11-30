    <!-- Sidebar -->
    <nav id="sidebar">
        <!-- Sidebar Scroll Container -->
        <div id="sidebar-scroll">
            <!-- Sidebar Content -->
            <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="side-header side-content bg-white-op">
                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                    <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times"></i>
                    </button>
                    <!-- Themes functionality initialized in App() -> uiHandleTheme() -->

                    <a class="h5 text-white" href="/backend/dashboard">
                        <span class="h4 font-w600 sidebar-mini-hide">{{ config('app.short_name') }}</span>
                    </a>
                </div>
                <!-- END Side Header -->

                <!-- Side Content -->
                <div class="side-content">
                    <ul class="nav-main">


                        <li>
                            <a class="active" href="/backend/dashboard"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Главная</span></a>
                        </li>
                        <li class="nav-main-heading"><span class="sidebar-mini-hide">Меню</span></li>

                        @if(isset($sidebar_menu))
                            @foreach($sidebar_menu AS $sm)

                                <li class="open">
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                        <i class="{{ $sm['icon'] }}"></i></i>
                                        <span class="sidebar-mini-hide">{{ $sm['name'] }}</span></a>
                                    <ul>
                                        @foreach($sm['items'] AS $key => $value)
                                            <li>
                                                <a href="{{ $key }}"> {{ $value }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                            @endforeach
                        @endif

                    </ul>
                </div>
                <!-- END Side Content -->
            </div>
            <!-- Sidebar Content -->
        </div>
        <!-- END Sidebar Scroll Container -->
    </nav>
    <!-- END Sidebar -->
