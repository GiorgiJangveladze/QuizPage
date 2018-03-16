
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        
      <!-- search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <!--special section title need class .header-->
            <li class="header">MAIN MODULES</li>

            <li >
                <a href="{{route('admin')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li  class="treeview @if(str_contains(Request::decodedPath(),'category'))  active @endif">

                <a href="{!! route('categoryindex') !!}">
                    <i class="fa  fa-th-large"></i> <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa  pull-right  "></i>
                    </span>
                </a>
                <!--tree sons need class .treeview-menu-->
                <ul class="treeview-menu">
                    <li  @if(Request::decodedPath() ==  'admin/category/index') class="active" @endif><a href="{!! route('categoryindex') !!}"><i class="fa fa-edit"></i>Edit</a></li>
                </ul>

            </li>

            <li  class="treeview @if(str_contains(Request::decodedPath(),'quiz'))  active @endif">

                <a href="{!! route('quizIndex') !!}">
                    <i class="fa  fa-file-text-o"></i> <span>Quiz</span>
                    <span class="pull-right-container">
                        <i class="fa  pull-right  "></i>
                    </span>
                </a>
                <!--tree sons need class .treeview-menu-->
                <ul class="treeview-menu">
                    <li  @if(Request::decodedPath() ==  'admin/quiz/add') class="active" @endif><a href="{!! route('addQuiz') !!}"><i class="fa fa-edit"></i>Add</a></li>
                    <li  @if(Request::decodedPath() ==  'admin/quiz') class="active" @endif><a href="{!! route('quizIndex') !!}"><i class="fa fa-file-text-o"></i>List</a></li>
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
