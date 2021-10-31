<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/user-details*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_detail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-details.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-details") || request()->is("admin/user-details/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userDetail.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('facility_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.facilities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/facilities") || request()->is("admin/facilities/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.facility.title') }}
                </a>
            </li>
        @endcan
        @can('speciality_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.specialities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/specialities") || request()->is("admin/specialities/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.speciality.title') }}
                </a>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
            </li>
        @endcan
        @can('job_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.jobs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jobs") || request()->is("admin/jobs/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.job.title') }}
                </a>
            </li>
        @endcan
        @can('profile_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.profiles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/profiles") || request()->is("admin/profiles/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.profile.title') }}
                </a>
            </li>
        @endcan
        @can('experience_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.experiences.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/experiences") || request()->is("admin/experiences/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.experience.title') }}
                </a>
            </li>
        @endcan
        @can('tracker_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.trackers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/trackers") || request()->is("admin/trackers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.tracker.title') }}
                </a>
            </li>
        @endcan
        @can('notification_setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.notification-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/notification-settings") || request()->is("admin/notification-settings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.notificationSetting.title') }}
                </a>
            </li>
        @endcan
        @can('job_applied_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.job-applieds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/job-applieds") || request()->is("admin/job-applieds/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.jobApplied.title') }}
                </a>
            </li>
        @endcan
        @can('provider_type_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.provider-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/provider-types") || request()->is("admin/provider-types/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.providerType.title') }}
                </a>
            </li>
        @endcan
        @can('package_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.packages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/packages") || request()->is("admin/packages/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.package.title') }}
                </a>
            </li>
        @endcan
        @can('subscription_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.subscriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subscriptions") || request()->is("admin/subscriptions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.subscription.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>