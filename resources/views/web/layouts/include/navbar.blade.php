<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
          <form action="{{route('blog.search')}}" method="get">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" name="query" class="form-control border-0 shadow-none" placeholder="Search..."
                    aria-label="Search..." />
            </div>
        </form>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
           @if(Auth::user() == true)
           <li class="nav-item lh-1 me-3">
            <a href="{{route('home')}}" class="btn btn-primary btn-sm">Home</a>
          </li>
           @else
           <li class="nav-item lh-1 me-3">
            <a href="{{route('login')}}" class="btn btn-primary btn-sm">Login</a>
          </li>
           @endif
           
        </ul>
    </div>
</nav>

<!-- / Navbar -->
