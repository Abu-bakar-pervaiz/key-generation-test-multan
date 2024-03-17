<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-center">
        <a href="/" class="text-nowrap logo-img">
          <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="150" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          
          <li class="sidebar-item">
            <a class="sidebar-link {{ Route::is('key.add')?"active":"" }}" href="{{ route('key.add') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Generate Keys</span>
            </a>
          </li>

          
        </ul>

      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>