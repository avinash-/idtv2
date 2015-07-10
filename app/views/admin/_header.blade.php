 <!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">IDT Version 2.0</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>
                         @if (Session::has('name'))
                            {{ Session::get('name'); }}
                        @endif
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                @if (Session::has('role'))
                    @if(Session::get('role') == 'admin')
               
                        <li>
                            <a href="/welcome/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="/user"><i class="fa fa-users fa-fw"></i> Users</a>
                        </li>
                         <li>
                            <a href="/managers"><i class="fa fa-user fa-fw"></i> Managers</a>
                        </li>
                        <li>
                            <a href="/reports"><i class="fa fa-area-chart fa-fw"></i> Reports</a>
                        </li>
                 @else
                <li>
                    <a href="/manager/@if (Session::has('manager_id')){{ Session::get('manager_id'); }}@endif"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                 <li>
                    <a href="/accounts"><i class="fa fa-user fa-fw"></i> Create Accounts</a>
                </li>
                 <li>
                    <a href="/employees"><i class="fa fa-user fa-fw"></i> Create Employee</a>
                </li>
                  @endif
            @endif
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>