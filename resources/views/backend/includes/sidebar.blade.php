<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon icon-speedometer"></i> @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/auth*')) }}" href="#">
                        <i class="nav-icon icon-user"></i> @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="divider"></li>

            <!-- <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/log-viewer*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> @lang('menus.backend.log-viewer.main')
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                            @lang('menus.backend.log-viewer.dashboard')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                            @lang('menus.backend.log-viewer.logs')
                        </a>
                    </li>
                </ul>
            </li> -->
            @if($logged_in_user->hasRole('administrator'))
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/jobs*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/jobs*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> Adds Management
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.adds.create') }}">
                            Add New Adds
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.adds.index') }}">
                            All Adds
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/jobs*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/jobs*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> Cities Management
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.cities.create') }}">
                            Add New Cities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.cities.index') }}">
                            All Cities
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/jobs*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/jobs*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> Category Management
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.categories.create') }}">
                            Add New Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.categories.index') }}">
                            All Categories
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/jobs*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/jobs*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> Newspaper Management
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.newspaper.create') }}">
                            Add New Newspapers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.newspaper.index') }}">
                            All Newspapers
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/jobs*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/jobs*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> Qualifications Management
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.qualification.create') }}">
                            Add New Qualifications
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.qualification.index') }}">
                            All Qualifications
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/jobs*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/jobs*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> Job Types Management
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.jobtype.create') }}">
                            Add New Job Types
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.jobtype.index') }}">
                            All Job Types
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/jobs*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/jobs*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> Adsens Code
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/adsense-create')) }}" href="{{ route('admin.adsense.create') }}">
                            Add New Adsense Code
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/adsense-create')) }}" href="{{ route('admin.adsense.list') }}">
                            All Adsense Code
                        </a>
                    </li>
                </ul>
            </li>
             <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/jobs*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/jobs*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> Custom Message
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/adsense-create')) }}" href="{{ route('admin.message.create') }}">
                            Add New Custom Message
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/adsense-create')) }}" href="{{ route('admin.message.index') }}">
                            All Custom Message
                        </a>
                    </li>
                </ul>
            </li>

                       

            @endif
            @if($logged_in_user->hasRole('executive'))
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/jobs*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/jobs*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> Adds Management
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.ex.adds.create') }}">
                            Add New Adds
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.ex.adds.index') }}">
                            All Adds
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/jobs*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/jobs*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> Adds Submission
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/jobs')) }}" href="{{ route('admin.ex.adds.applied') }}">
                            Applied Adds
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
