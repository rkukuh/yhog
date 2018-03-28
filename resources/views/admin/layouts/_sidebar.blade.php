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
                <a href="#blog"><i class="fa fa-file-text-o"></i> <span>Blog</span>
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
                    <li>
                        <a href="{{ route('category-post.index') }}">
                            <i class="fa fa-circle-o"></i> Category
                        </a>
                    </li>
                </ul>
            </li>
            @endrole

            @role('admin')
            <li class="treeview">
                <a href="#event"><i class="fa fa-calendar"></i> <span>Event</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i> Event
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category-event.index') }}">
                            <i class="fa fa-circle-o"></i> Category
                        </a>
                    </li>
                </ul>
            </li>
            @endrole

            @role('admin')
            <li class="treeview">
                <a href="#partner"><i class="fa fa-users"></i> <span>Partner</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i> Partner
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category-partner.index') }}">
                            <i class="fa fa-circle-o"></i> Category
                        </a>
                    </li>
                </ul>
            </li>
            @endrole

            @role('admin')
            <li class="treeview">
                <a href="#donation"><i class="fa fa-money"></i> <span>Donation</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i> Donation
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category-donation.index') }}">
                            <i class="fa fa-circle-o"></i> Category
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