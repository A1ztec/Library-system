<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('admin/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">{{Auth::user()->name}}</h1>

        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{route('admin.index')}}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{route('categories.index')}}"> <i class="icon-grid"></i> categories </a></li>
        <li><a href="{{route('books.index')}}"> <i class="icon-grid"></i> Books </a></li>
        <li><a href="{{route('borrow_request')}}"> <i class="icon-grid"></i> Borrow requests </a></li>
        <li><a href="{{route('user.index')}}"> <i class="icon-grid"></i> users </a></li>
        <li><a href="{{route('student.index')}}"> <i class="icon-grid"></i> students </a></li>





    </ul>
</nav>
