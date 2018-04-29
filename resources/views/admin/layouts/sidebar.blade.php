
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                
                <img src=" {{ Storage::url(Auth::guard('employee')->user()->image) }} " class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  {{ ucfirst( Auth::guard('employee')->user()->name ) }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
           
            <!-- @hasRole("Admin") -->
                <li><a href="{{ route('Managers.index') }}"><i class="fa fa-link"></i> <span>Manage Managers</span></a></li>
            <!-- @endhasRole -->

            <!-- @hasRole('Admin|Manager') -->
                 <li class=""><a href="{{ route('Receptionists.index') }}"><i class="fa fa-link"></i> <span>Manage Receptionists</span></a></li>
            <!-- @endhasRole -->

            <!-- @hasRole('Admin|Manager|Receptionist') -->
                <li class=""><a href="{{ route('clients.index') }}"><i class="fa fa-link"></i> <span>Manage Clients</span></a></li>
            <!-- @endhasRole -->
            <!-- @hasRole('Admin|Manager') -->
                <li class=""><a href="{{ route('floors.index') }}"><i class="fa fa-link"></i> <span>Manage Floors</span></a></li>
                <li class=""><a href="{{ route('rooms.index') }}"><i class="fa fa-link"></i> <span>Manage Rooms</span></a></li>
            <!-- @endhasRole -->
            <!-- @hasRole('Admin|Manager|Receptionist') -->
                <li class=""><a href="{{ route('clients.approved') }}"><i class="fa fa-link"></i> <span>Approved clients</span></a></li>
                <li class=""><a href="{{  route('clients.reservation') }}"><i class="fa fa-link"></i> <span>Clients Reservations​</span></a></li>
                <li class=""><a href="{{  route('clients.pending') }}"><i class="fa fa-link"></i> <span>Clients Pending​</span></a></li>
            <!-- @endhasRole -->
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">Link in level 2</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li>    
            
                </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

