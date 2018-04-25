<aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>

            @role('admin')
            <li>
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            
            <li class="treeview">
                <a href="#blog"><i class="fa fa-file-text-o"></i> <span>Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.post.index') }}">
                            <i class="fa fa-circle-o"></i> Posts
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.category-post.index') }}">
                            <i class="fa fa-circle-o"></i> Category
                        </a>
                    </li>
                    <li class="hide">
                        <a href="{{ route('admin.tag-post.index') }}">
                            <i class="fa fa-circle-o"></i> Tag
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#event"><i class="fa fa-calendar"></i> <span>Event</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.event.index') }}">
                            <i class="fa fa-circle-o"></i> Events
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.category-event.index') }}">
                            <i class="fa fa-circle-o"></i> Category
                        </a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="{{ route('admin.partner.index') }}">
                    <i class="fa fa-users"></i> Partner
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.donation.index') }}">
                    <i class="fa fa-money"></i> Donation
                </a>
            </li>
            
            <li class="treeview">
                <a href="#gallery"><i class="fa fa-image"></i> <span>Gallery</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.gallery.index') }}">
                            <i class="fa fa-circle-o"></i> Galleries
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.category-gallery.index') }}">
                            <i class="fa fa-circle-o"></i> Category
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#setting"><i class="fa fa-cog"></i> <span>Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.tag.index') }}">
                            <i class="fa fa-circle-o"></i> <span>Tags</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.index') }}">
                            <i class="fa fa-circle-o"></i> <span>Users</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
        </ul>

    </section>
</aside>