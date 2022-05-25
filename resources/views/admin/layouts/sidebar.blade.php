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

                <li class="sidebar-item  has-sub {{isActive(['admin.permissions.index', 'admin.roles.index', 'admin.permissions.create', 'admin.permissions.edit'])}}">
                    <a href="#" class='sidebar-link'>
                        <i class="icon bi-people-fill"></i>
                        <span>دسترسی ها</span>
                    </a>
                    <ul class="submenu {{isStartsWith('admin.permissions')}} {{isStartsWith('admin.roles')}}">
                        <li class="submenu-item {{isStartsWith('admin.permissions')}}">
                            <a href="{{route('admin.permissions.index')}}">
                                <i class="icon bi-person-fill"></i>
                                مدیریت دسترسی ها</a>
                        </li>
                        <li class="submenu-item {{isStartsWith('admin.roles')}}">
                            <a href="{{route('admin.roles.index')}}">
                                <i class="icon bi-person-fill"></i>
                                مدیریت نقش ها</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub {{isStartsWith('admin.products')}} {{isStartsWith('admin.categories')}}">
                    <a href="#" class='sidebar-link'>
                        <i class="icon bi-shop"></i>
                        <span>محصولات</span>
                    </a>
                    <ul class="submenu {{isStartsWith('admin.products')}} {{isStartsWith('admin.categories')}}">
                        <li class="submenu-item">
                            <a href="{{route('admin.products.index')}}">
                                مدیریت محصولات</a>
                        </li>
                    </ul>
                    <ul class="submenu {{isStartsWith('admin.categories')}} {{isStartsWith('admin.products')}}">
                        <li class="submenu-item">
                            <a href="{{route('admin.categories.index')}}">
                                مدیریت دسته بندی ها</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub {{isStartsWith('admin.comments')}}">
                    <a href="#" class='sidebar-link'>
                        <i class="icon bi-people-fill"></i>
                        <span>نظرات</span>
                    </a>
                    <ul class="submenu {{isStartsWith('admin.comments')}}">
                        <li class="submenu-item">
                            <a href="{{route('admin.comments.index')}}">
                                مشاهده نظرات</a>
                        </li>
                    </ul>
                    <ul class="submenu {{isStartsWith('admin.comments')}}">
                        <li class="submenu-item">
                            <a href="{{route('admin.comments.unapproved')}}">
                                نظرات تایید نشده</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
