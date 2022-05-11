<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">داشبورد</li>

                <li class="sidebar-item {{isActive('admin.')}}">
                    <a href="{{route('admin.')}}" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>صفحه اصلی</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub {{isActive(['admin.users.index', 'admin.users.edit', 'admin.users.create'])}}">
                    <a href="#" class='sidebar-link'>
                        <i class="icon bi-people-fill"></i>
                        <span>کاربران</span>
                    </a>
                    @can('all-users')
                        <ul class="submenu  {{isActive(['admin.users.index', 'admin.users.edit', 'admin.users.create'])}}">
                            <li class="submenu-item">
                                <a href="{{route('admin.users.index')}}">
                                    <i class="icon bi-person-fill"></i>
                                    لیست کاربران</a>
                            </li>

                        </ul>
                    @endcan
                </li>

                <li class="sidebar-item  has-sub {{isActive(['admin.permissions.index', 'admin.roles.index'])}}">
                    <a href="#" class='sidebar-link'>
                        <i class="icon bi-people-fill"></i>
                        <span>دسترسی ها</span>
                    </a>
                    <ul class="submenu  {{isActive(['admin.permissions.index', 'admin.roles.index'])}}">
                        <li class="submenu-item">
                            <a href="{{route('admin.permissions.index')}}">
                                <i class="icon bi-person-fill"></i>
                                مدیریت دسترسی ها</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{route('admin.roles.index')}}">
                                <i class="icon bi-person-fill"></i>
                                مدیریت نقش ها</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
