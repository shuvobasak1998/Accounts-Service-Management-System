<!-- ========== Left Sidebar Start ========== -->
<aside class="left-sidebar sidebar-dark" id="left-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
      <a href="{{ route('dashboard') }}" class=" d-flex align-items-center gap-2 mt-15">
        @if (isset($business_info->business_logo_path))
          <img src="{{ asset('storage/' . $business_info->business_logo_path) }}" alt="Business Logo" style="height: 45px;">
        @endif
        <span class="brand-name">{{ isset($business_info->title) ? $business_info->title : 'CA' }}</span>
      </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-left" data-simplebar style="height: 100%;">
      <!-- sidebar menu -->
      <ul class="nav sidebar-inner" id="sidebar-menu">

        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
          <a class="sidenav-item-link " href=" {{ route('dashboard') }}">
            <i class="mdi mdi-briefcase-account-outline"></i>
            <span class="nav-text">Business Dashboard</span>
          </a>
        </li>

        <li class="{{ request()->routeIs('#') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="analytics.html">
            <i class="mdi mdi-chart-line"></i>
            <span class="nav-text">Analytics Dashboard</span>
          </a>
        </li>

        <li class="section-title">
          Page Content
        </li>

        <li class="{{ request()->routeIs('servicesinfo.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('servicesinfo.index') }}">
            <i class="fa-solid fa-hand-holding-heart"></i>
            <span class="nav-text">Services Information</span>
          </a>
        </li>
        <li class="{{ request()->routeIs('our_progress.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('our_progress.index') }}">
            <i class="fas fa-tasks"></i>
            <span class="nav-text">Our Progress</span>
          </a>
        </li>
        <li class="{{ request()->routeIs('partnersinfo.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('partnersinfo.index') }}">
            <i class="fa-solid fa-people-arrows"></i>
            <span class="nav-text">Partners Information</span>
          </a>
        </li>

        <li class="{{ request()->routeIs('customer_review.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('customer_review.index') }}">
            <i class="fas fa-star-half-alt"></i>
            <span class="nav-text">Customer Review</span>
          </a>
        </li>
        <li class="{{ request()->routeIs('our_team.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('our_team.index') }}">
            <i class="fa-solid fa-people-group"></i>
            <span class="nav-text">Team Information</span>
          </a>
        </li>

        <li class="{{ request()->routeIs('about_us.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('about_us.index') }}">
            <i class="fa-solid fas fa-info-circle"></i>
            <span class="nav-text">About Us Information</span>
          </a>
        </li>

        <li class="{{ request()->routeIs('blog_details.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('blog_details.index') }}">
            <i class="fas fa-file-alt"></i>
            <span class="nav-text">Blog Details</span>
          </a>
        </li>

        <li class="{{ request()->routeIs('contact_us.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('contact_us.index') }}">
            <i class="fas fa-address-book"></i>
            <span class="nav-text">Contact Us Information</span>
          </a>
        </li>

        <li class="{{ request()->routeIs('image_gallery.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('image_gallery.index') }}">
            <i class="fas fa-images"></i>
            <span class="nav-text">Image Gallery</span>
          </a>
        </li>

        <li class="section-title">
          <i class="mdi mdi-settings"></i>
          App Settings
        </li>

        <li class="{{ request()->routeIs('businessinfo.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('businessinfo.index') }}">
            <i class="fa-solid fa-bank"></i>
            <span class="nav-text">Business Information</span>
          </a>
        </li>

        <li class="{{ request()->routeIs('service_category.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('service_category.index') }}">
            <i class="fa-solid fas fa-briefcase"></i>
            <span class="nav-text">Service Category</span>
          </a>
        </li>
        <li class="{{ request()->routeIs('blog_category.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('blog_category.index') }}">
            <i class="fa-solid fas fa-book"></i>
            <span class="nav-text">Blog Category</span>
          </a>
        </li>

        <li class="{{ request()->routeIs('tag.index') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('tag.index') }}">
            <i class="fas fa-tags"></i>
            <span class="nav-text">Tag</span>
          </a>
        </li>

        <li class="{{ request()->routeIs('user.list') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('user.list') }}">
            <i class="fa-solid fa-user second-user"></i>
            <span class="nav-text">User Information</span>
          </a>
        </li>

      </ul>
    </div>


    {{-- <div class="sidebar-footer">
      <div class="sidebar-footer-content">
        <ul class="d-flex">
          <li>
            <a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a>
          </li>
          <li>
            <a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
          </li>
        </ul>
      </div>
    </div> --}}
  </div>
</aside>
<!-- ========== Left Sidebar End ========== -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    var currentUrl = window.location.pathname;

    $(".sidenav-item-link").each(function() {
      var linkUrl = $(this).attr("href");

      if (currentUrl.includes(linkUrl) && linkUrl !== "#") {
        var $parentLi = $(this).parent("li");
        $parentLi.addClass("active");

        // Open the parent submenu if applicable
        var $parentMenu = $parentLi.closest(".has-sub");
        $parentMenu.addClass("open");
        $parentMenu.find(".collapse").addClass("show");
      }
    });

    $(".sidenav-item-link").on("click", function() {
      $(".sidenav-item-link").parent("li").removeClass("active");
      $(this).parent("li").addClass("active");
    });
  });
</script> --}}

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get current URL path
    let currentUrl = window.location.href;

    // Loop through all sidebar links
    document.querySelectorAll(".sidenav-item-link").forEach(function(link) {
      if (link.href === currentUrl) {
        let listItem = link.closest("li");
        if (listItem) {
          listItem.classList.add("active"); // Add active class to clicked item

          let parentCollapse = listItem.closest(".collapse");
          if (parentCollapse) {
            parentCollapse.classList.add("show"); // Keep submenu open
            let parentListItem = parentCollapse.closest("li.has-sub");
            if (parentListItem) {
              parentListItem.classList.add("active"); // Add active class to parent
            }
          }
        }
      }
    });

    // Click event for parent menus
    document.querySelectorAll(".has-sub > a").forEach(function(parentLink) {
      parentLink.addEventListener("click", function() {
        let parentItem = this.closest("li.has-sub");

        // Toggle active class on click
        if (parentItem.classList.contains("active")) {
          parentItem.classList.remove("active");
        } else {
          // Remove active from all parent menus
          document.querySelectorAll(".has-sub").forEach(function(item) {
            item.classList.remove("active");
          });

          parentItem.classList.add("active");
        }
      });
    });
  });
</script>
