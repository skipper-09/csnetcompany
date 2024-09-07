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

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner pt-5">
        <!-- Dashboards -->
        <li class="{{ Request::is('admin/dashboard') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master</span>
        </li>
        <!-- Packet -->
        <li class="{{ $sidebar == 'packet' ? 'menu-item active open' : 'menu-item' }}">
            <a href=" javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-basket"></i>
                <div data-i18n="Paket">Paket</div>
            </a>
            <ul class="menu-sub">
                <li class="{{ $page_name == 'Categori' ? 'menu-item active' : 'menu-item' }}">
                    <a href=" {{ route('backend.categoripacket') }}" class="menu-link">
                        <div data-i18n="Category">Kategori</div>
                    </a>
                </li>
                <li class="{{ $page_name == 'Daftar Paket' ? 'menu-item active' : 'menu-item' }}">
                    <a href="{{ route('backend.packet') }}" class="menu-link">
                        <div data-i18n="Pricing Packet">Harga Paket</div>
                    </a>
                </li>
                <li class="{{ $page_name == 'Deskripsi Paket' ? 'menu-item active' : 'menu-item' }}">
                    <a href="{{ route('backend.deskription') }}" class="menu-link">
                        <div data-i18n="Pricing Deskripsi">Deskripsi Paket</div>
                    </a>
                </li>
            </ul>
        </li>
        {{-- management promo --}}
        <li class="{{ $sidebar == 'Promo' ? 'menu-item active open' : 'menu-item' }}">
            <a href=" javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                <div data-i18n="promo">Promo</div>
            </a>
            <ul class="menu-sub">
                <li class="{{ $page_name == 'Promo' ? 'menu-item active' : 'menu-item' }}">
                    <a href=" {{ route('backend.promo') }}" class="menu-link">
                        <div data-i18n="Promo">Promo</div>
                    </a>
                </li>
                <li class="{{ $page_name == 'Promo Paket' ? 'menu-item active' : 'menu-item' }}">
                    <a href=" {{ route('backend.promo_paket') }}" class="menu-link">
                        <div data-i18n="Promo Paket">Promo Paket</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- management ODP --}}

        <li class="{{ $sidebar == 'Odp' ? 'menu-item active open' : 'menu-item' }}">
            <a href=" javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="odp">ODP</div>
            </a>
            <ul class="menu-sub">
                <li class="{{ $page_name == 'Area' ? 'menu-item active' : 'menu-item' }}">
                    <a href=" {{ route('backend.area') }}" class="menu-link">
                        <div data-i18n="area">Area</div>
                    </a>
                </li>
                <li class="{{ $page_name == 'Odp' ? 'menu-item active' : 'menu-item' }}">
                    <a href=" {{ route('backend.odp') }}" class="menu-link">
                        <div data-i18n="Promo">Data Odp</div>
                    </a>
                </li>
                <li class="{{ $page_name == 'Maps Odp' ? 'menu-item active' : 'menu-item' }}">
                    <a href=" {{ route('backend.maps') }}" class="menu-link">
                        <div data-i18n="Maps">Maps</div>
                    </a>
                </li>
            </ul>
        </li>


        {{-- management CEK COVERAGE --}}

        <li class="{{ $sidebar == 'cek coverage' ? 'menu-item active open' : 'menu-item' }}">
            <a href=" javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="kota">Coverage Area</div>
            </a>
            <ul class="menu-sub">
                <li class="{{ $page_name == 'Kota' ? 'menu-item active' : 'menu-item' }}">
                    <a href=" {{ route('backend.kota') }}" class="menu-link">
                        <div data-i18n="area">Kota</div>
                    </a>
                </li>
                <li class="{{ $page_name == 'Kecamatan' ? 'menu-item active' : 'menu-item' }}">
                    <a href=" {{ route('backend.kecamatan') }}" class="menu-link">
                        <div data-i18n="kecamatan">Kecamatan</div>
                    </a>
                </li>
                <li class="{{ $page_name == 'Kelurahan' ? 'menu-item active' : 'menu-item' }}">
                    <a href=" {{ route('backend.kelurahan') }}" class="menu-link">
                        <div data-i18n="kelurahan">Kelurahan</div>
                    </a>
                </li>
                <li class="{{ $page_name == 'Jalan' ? 'menu-item active' : 'menu-item' }}">
                    <a href=" {{ route('backend.jalan') }}" class="menu-link">
                        <div data-i18n="jalan">Jalan</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Management Blog -->
        {{-- <li class="menu-item">
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
    </li> --}}
        {{-- partner --}}
        <li class="{{ Request::is('admin/partner') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('backend.partner') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Partner">Partner</div>
            </a>
        </li>
        {{-- Media --}}
        <li class="{{ Request::is('admin/media') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('backend.media') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="media">Media</div>
            </a>
        </li>
        {{-- faq --}}
        <li class="{{ Request::is('admin/faq') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('backend.faq') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-unite"></i>
                <div data-i18n="Faq">Faq</div>
            </a>
        </li>
        {{-- Trem Of Service --}}
        <li class="{{ Request::is('admin/tremofservice') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('backend.tremofservice') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-unite"></i>
                <div data-i18n="TremofService">Trems Of Service</div>
            </a>
        </li>
        {{-- privacy policy --}}
        <li class="{{ Request::is('admin/privacy-policy') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('backend.privacypolicy') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-unite"></i>
                <div data-i18n="Privacy Policy">Privacy Policy</div>
            </a>
        </li>


        <!-- Setting -->
        <li class="{{ $sidebar == 'setting' ? 'menu-item active open' : 'menu-item' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Account Settings">Pengaturan</div>
            </a>
            <ul class="menu-sub">
                <li class="{{ $page_name == 'User' ? 'menu-item active' : 'menu-item' }}">
                    <a href="{{ route('backend.users') }}" class="menu-link">
                        <div data-i18n="Account">User</div>
                    </a>
                </li>
                <li class="{{ $page_name == 'Role' ? 'menu-item active' : 'menu-item' }}">
                    <a href="{{ route('backend.role') }}" class="menu-link">
                        <div data-i18n="role">Role Permission</div>
                    </a>
                </li>

            </ul>
        </li>
        {{-- <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
        <!-- Cards -->
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Cards</div>
            </a>
        </li> --}}
    </ul>
</aside>
<!-- / Menu -->
