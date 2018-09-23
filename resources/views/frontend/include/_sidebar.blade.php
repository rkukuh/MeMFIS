<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
         data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Menu Utama
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.dashboard') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-text">Dashboard</span>
                </a>
            </li>
            {{-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-diagram"></i>
                    <span class="m-menu__link-text">
                        Menu
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Sub menu
                                </span>
                            </span>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Sub menu
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Sub menu
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.customer.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Customer
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.supplier.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Supplier
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.category.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Category
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.item.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Item
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.item-stock.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Item Stock
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.item-unit.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Item Unit
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.warehouse.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Warehouse
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.taskcard.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Task Card
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.taskcard-package.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Task Card Package
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.workpackage.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Work Package
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.quotation.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Quotation
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.journal.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Journal
                    </span>
                </a>
            </li>
            {{-- <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-user"></i>
                    <span class="m-menu__link-text">
                        Profil
                    </span>
                </a>
            </li>
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Aplikasi
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-settings-1"></i>
                    <span class="m-menu__link-text">
                        Pengaturan
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/informasi" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-info"></i>
                    <span class="m-menu__link-text">
                        Informasi
                    </span>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
