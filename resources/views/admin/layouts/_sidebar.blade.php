<aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>

            @role('admin')
            <li>
                <a href="{{ route('dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @endrole

            @role('admin')
            <li class="treeview">
                <a href="#post"><i class="fa fa-file-text-o"></i> <span>Post</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('post.index') }}">
                            <i class="fa fa-circle-o"></i> Post
                        </a>
                    </li>
                </ul>
            </li>
            @endrole

            @role('admin')
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-user"></i> <span>User</span>
                </a>
            </li>
            @endrole
        </ul>

    </section>
</aside>