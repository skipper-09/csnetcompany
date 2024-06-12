<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{ asset('front-end/images/logo-idnet.webp') }}" alt="logo" height="50">
      </span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  {{-- <div class="menu-inner-shadow"></div> --}}

  <ul class="menu-inner pt-5">
    <!-- Dashboards -->
    <li class="{{Request::is('admin/dashboard') ? 'menu-item active' : 'menu-item'}}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home"></i>
        <div data-i18n="Dashboards">Dashboard</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Master</span>
    </li>
    <!-- Packet -->
    <li class="{{$sidebar == 'packet' ? 'menu-item active open' : 'menu-item'}}" ">
  <a href=" javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-basket"></i>
      <div data-i18n="Paket">Paket</div>
      </a>
      <ul class="menu-sub">
        <li class="{{$page_name == 'Categori' ? 'menu-item active' : 'menu-item'}}">
          <a href=" {{ route('backend.categoripacket') }}" class="menu-link">
            <div data-i18n="Category">Kategori</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Pricing Packet">Harga Paket</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Management Blog -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-blanket"></i>
        <div data-i18n="Paket">Blog</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ route('backend.users') }}" class="menu-link">
            <div data-i18n="Category">Kategori Blog</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('backend.users') }}" class="menu-link">
            <div data-i18n="Category">Tag Blog</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Pricing Packet">List Blog</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Cards -->
    <li class="menu-item">
      <a href="cards-basic.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-data"></i>
        <div data-i18n="Basic">Pendaftar</div>
      </a>
    </li>
    <!-- Setting -->
    <li class="{{$sidebar == 'setting' ? 'menu-item active open' : 'menu-item'}}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div data-i18n="Account Settings">Pengaturan</div>
      </a>
      <ul class="menu-sub">
        <li class="{{$page_name == 'User' ? 'menu-item active' : 'menu-item'}}">
          <a href="{{ route('backend.users') }}" class="menu-link">
            <div data-i18n="Account">User</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="pages-account-settings-notifications.html" class="menu-link">
            <div data-i18n="Notifications">Role Permissison</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Components -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
    <!-- Cards -->
    <li class="menu-item">
      <a href="cards-basic.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-collection"></i>
        <div data-i18n="Basic">Cards</div>
      </a>
    </li>
  </ul>
</aside>
<!-- / Menu -->