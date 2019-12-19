<div class="sidebar-menu">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="{{ route('admin.home') }}">
                    <img src="{{ asset('backend/assets/images/logo@2x.png') }}" width="120" alt="" />
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon">
                    <i class="entypo-menu"></i>
                </a>
            </div>

            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation">
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>


        <ul id="main-menu" class="main-menu">

            <li class="{{ request()->is('admin') ? 'active' : '' }}">
                <a href="{{ route('admin.home') }}">
                    <i class="entypo-monitor"></i>
                    <span class="title">Yönetim Paneli</span>
                </a>
            </li>
            <!--<li class="has-sub">
                <a href="index.html">
                    <i class="entypo-newspaper"></i>
                    <span class="title">Sayfa Yönetimi</span>
                </a>
                <ul>
                    <li class="active">
                        <a href="index.html">
                            <span class="title">Hakkımızda</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard-2.html">
                            <span class="title">İletişim</span>
                        </a>
                    </li>
                </ul>
            </li>-->
            <li class="{{ request()->is('admin/category*') ? 'has-sub active opened' : 'has-sub' }}">
                <a href="#">
                    <i class="entypo-layout"></i>
                    <span class="title">Kategori Yönetimi</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.category.create') }}">
                            <span class="title">Kategori Ekle</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.category.index') }}">
                            <span class="title">Kategori Listele</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ request()->is('admin/product*') ? 'has-sub active opened' : 'has-sub' }}">
                <a href="#">
                    <i class="entypo-doc-text"></i>
                    <span class="title">Ürün Yönetimi</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.product.create') }}">
                            <span class="title">Ürün Ekle</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product.index') }}">
                            <span class="title">Ürün Listele</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ request()->is('admin/slider*') ? 'has-sub active opened' : 'has-sub' }}">
                <a href="#">
                    <i class="entypo-monitor"></i>
                    <span class="title">Slayt Yönetimi</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.slider.create') }}">
                            <span class="title">Slayt Ekle</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.slider.index') }}">
                            <span class="title">Slayt Listele</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ request()->is('admin/reservation*') ? 'active opened' : '' }}">
                <a href="{{ route('admin.reservation.index') }}">
                    <i class="entypo-chart-bar"></i>
                    <span class="title">Rezervasyonlar</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/order*') ? 'active opened' : '' }}">
                <a href="{{ route('admin.order.index') }}">
                    <i class="entypo-bag"></i>
                    <span class="title">Siparişler</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/contact*') ? 'active opened' : '' }}">
                <a href="{{ route('admin.contact.index') }}">
                    <i class="entypo-mail"></i>
                    <span class="title">Gelen Kutusu</span>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="entypo-logout right"></i>
                    <span class="title">{{ __('Çıkış Yap') }}</span>
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>
        </ul>

    </div>

</div>
