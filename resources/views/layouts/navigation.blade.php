<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route(Auth::user()->is_admin ? 'admin.profile.show' : 'user.profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">

            <!-- Show for both admin and user -->
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ Auth::user()->is_admin ? route('admin.bookings.index') : route('user.bookings.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-credit-card"></i>
                    <p>{{ __('Booking') }}</p>
                </a>
            </li>

            <!-- Show only for admin -->
            @if(Auth::user()->is_admin)
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-address-book"></i>
                        <p>{{ __('Users') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.types.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-inbox"></i>
                        <p>{{ __('Kategori') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>{{ __('Mobil') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.testimonials.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-quote-left"></i>
                        <p>{{ __('Testimonial') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-rss"></i>
                        <p>{{ __('Blog') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.teams.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>{{ __('Team') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>{{ __('Setting') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>{{ __('Pesan') }}</p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
