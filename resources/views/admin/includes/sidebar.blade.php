
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
      <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('images/icons/icon1.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
      <!-- search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <!--special section title need class .header-->
            <li class="header">MAIN NAVIGATION</li>

            <li >
                <a href="{{route('admin')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li  class="treeview @if(str_contains(Request::decodedPath(),'category'))  active @endif">

                <a href="{!! route('categoryindex') !!}">
                    <i class="fa  fa-internet-explorer"></i> <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa  pull-right  "></i>
                    </span>
                </a>
                <!--tree sons need class .treeview-menu-->
                <ul class="treeview-menu">
                    <li  @if(Request::decodedPath() ==  'admin/category/index') class="active" @endif><a href="{!! route('categoryindex') !!}"><i class="fa fa-edit"></i>Edit</a></li>
                </ul>

            </li>

            <li>
                <a href="#" id="logout">
                    <i class="fa  fa-unlock-alt"></i> <span>Logout</span>
                </a>

            </li>

            
        </ul>
    </section>
    <!-- /.sidebar -->
