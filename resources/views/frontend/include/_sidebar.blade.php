<button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>

<div id="m_aside_left" class="m-grid__item	m-aside-left m-aside-left--skin-dark">
    <div id="m_ver_menu" class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" m-menu-vertical="1"
         m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Menu Utama
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" style="display: none;">
                <a href="{{ route('frontend.dashboard') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-text">Dashboard</span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.customer.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Customer
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" style="display: none;">
                <a href="{{ route('frontend.supplier.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Supplier
                    </span>
                </a>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Material
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.item.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Materials
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true" style="display: none;">
                            <a href="{{ route('frontend.category-item.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Categories
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Employees
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.employee.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Employees
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.employee.history.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Employee History
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.company-document.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Document Management
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.employee.travel-request.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Travel Requests
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.monitor-attendance.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Monitor Attendance
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.hr-form.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    HR Form Management
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover" style="display: none;">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Personal Information
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.qualification') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Qualifications
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.personal-dashboard') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.dependents') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Dependents
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.emergency-contacts') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Emergency Contacts
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.basic-information') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Basic Information
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" style="display: none;">
                <a href="{{ route('frontend.storages.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Storage
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
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" style="display: none;">
                <a href="{{ route('frontend.taskcard-package.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Task Card Package
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
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
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" style="display: none;">
                <a href="{{ route('frontend.journal.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Journal
                    </span>
                </a>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Settings
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.unit.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Unit
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
