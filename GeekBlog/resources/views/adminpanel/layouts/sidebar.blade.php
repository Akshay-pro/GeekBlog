<div class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo">
        <a href="" class="simple-text  logo-mini">
            Welcome
        </a>
        <a href="" class="simple-text logo-normal">
          GeekBlog Admin
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.dashboard' )}}">
              <i class="material-icons">dashboard</i>
              <p class="text-grey">Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('category.index' )}}">
              <i class="material-icons">all_inbox</i>
              <p class="text-grey"> Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.index' )}}">
              <i class="material-icons">face</i>
              <p class="text-grey">Users</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('role.index' )}}">
              <i class="material-icons">grading</i>
              <p class="text-grey">Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('permission.index' )}}">
              <i class="material-icons">work</i>
              <p class="text-grey"> Permission</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>