  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{ Auth::guard('admin')->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{route('admin.events.index')}}">
            <i class="fa fa-table"></i> <span>My events</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.events.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
            <li><a href="{{route('admin.events.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="{{route('admin.products.index')}}">
            <i class="fa fa-edit"></i> <span>Galleries</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.products.index')}}"><i class="fa fa-circle-o"></i>View</a></li>
            <li><a href="{{route('admin.products.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.categories.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Create</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="{{route('admin.customers.index')}}">
            <i class="fa fa-pie-chart"></i>
            <span>Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.customers.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="{{route('admin.customers.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="{{route('admin.bookings.index')}}">
            <i class="fa fa-envelope"></i>
            <span>Bookings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.bookings.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="{{route('admin.employees.index')}}">
            <i class="fa fa-laptop"></i>
            <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.employees.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
            <li><a href="{{route('admin.employees.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
          </ul>
        </li>

        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
