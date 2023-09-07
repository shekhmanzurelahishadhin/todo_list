<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-files"></i><span class="hide-menu">Todo List</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('todo.add')}}">Add Todo</a></li>
                        <li><a href="{{route('todo.manage')}}">Manage Todo</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-pie-chart"></i><span class="hide-menu">Todo Task</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('task.add')}}">Add Task</a></li>
                        <li><a href="{{route('task.manage')}}">Manage Task</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
