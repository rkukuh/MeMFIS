<button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>

<div id="m_aside_left" class="m-grid__item	m-aside-left m-aside-left--skin-dark">
    <div id="m_ver_menu" class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark"
        m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">
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
            @role('admin')
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    MARKETING
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.customer.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Customer
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
            @endrole
            @role('admin')
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    PPC/SUPPORTING
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle"
                title="Non functional dummy link"><i class="m-menu__link-icon flaticon-list-3"></i><span class="m-menu__link-text">Task Card</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('frontend.taskcard.index') }}"
                                    class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                        class="m-menu__link-text">Task Cards</span></a></li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"><a href="javascript:;"
                    class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i
                        class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                        class="m-menu__link-text">Create New</span><i
                        class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a
                                href="{{ route('frontend.taskcard-routine.create') }}" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Routine</span></a></li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"><a href="javascript:;"
                                class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Non Routine</span><i
                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                            href="{{ route('frontend.preliminary.create') }}" class="m-menu__link "><i
                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                class="m-menu__link-text">Preliminary</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                            href="{{ route('frontend.taskcard-eo.create') }}" class="m-menu__link "><i
                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                class="m-menu__link-text">Enginering Order</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                            href="{{ route('frontend.taskcard-si.create') }}" class="m-menu__link "><i
                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                class="m-menu__link-text">Special Instruction</span></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

                    </ul>
                </div>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.workpackage.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Work Package
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.project.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Project
                    </span>
                </a>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Job Card
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.jobcard.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Scan Job Card
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.jobcard-ppc.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    PPC
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.taskrelease-jobcard.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Task Release
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.riirelease-jobcard.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                        RII Release
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
                        Job Card Hard Time
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.jobcard.hardtime.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Job Card Hard Time Scan
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.jobcard-hardtime-ppc.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    PPC
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.taskrelease-htcrr.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Task Release
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.riirelease-htcrr.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                        RII Release
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
                        Discrepancy Found
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.discrepancy-mechanic.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Mechanic
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.discrepancy-engineer.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Engineer
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.discrepancy-ppc.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    PPC
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
                        Defect Card
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.defectcard.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Scan Defect Card
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.defectcard-ppc.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    PPC
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.defectcard-project.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Defect Card by Project
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('frontend.taskrelease-defectcard.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                        Task Release
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ route('frontend.riirelease-defectcard.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                            RII Release
                                    </span>
                                </a>
                            </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.rts-progress.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Release to Service
                    </span>
                </a>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('frontend.work-progress-report.index')}}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Work Progress Report
                    </span>
                </a>
            </li>
            @endrole
            @role('admin')
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    MATERIAL PLANNER
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Purchase Request
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.purchase-request-general.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    General
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.purchase-request-project.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Project
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endrole
            @role('admin')
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    PURCHASING
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.price-list.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Price List
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.purchase-order.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Purchase Order
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.vendor.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Vendor
                    </span>
                </a>
            </li>
            @endrole
            @hasanyrole('hrd|admin')
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    HUMAN RESOURCES
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>

            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.company.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Company Structure & Department
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.statuses.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Employment Status
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.benefit.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Benefits
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.position.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Position
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.holiday.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Event/Holidays
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.workshift.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Workshift Schedule
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.leave-period.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Leave Period
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.leave-type.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Leave Types
                    </span>
                </a>
            </li>
            @endrole
            @hasanyrole('hrd|employee|admin')
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    MY PROFILE
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>

            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.employee.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Employee
                    </span>
                </a>
            </li>

            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    ATTENDANCE
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>

            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.import-fingerprint.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Import From Fingerprint Machine
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.attendance.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Attendance List
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.attendance-correction.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Attendance Correction
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.overtime.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Overtime
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.propose-leave.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Propose Leave
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Leave Report
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Calendar
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Assign Leaves
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Leave Datalist
                    </span>
                </a>
            </li>
            @endrole
            @role('admin')
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Finance & Accounting
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/cashbook" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">Cashbook</span>
                </a>
            </li>

            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/invoice" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">Invoice</span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/coa" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">COA</span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/ar" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">Account Receivable</span>
                </a>
            </li>
            @endrole
            @role('admin')
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    WAREHOUSE
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Items
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
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.tool.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Tools
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
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.goods-received.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Goods Received Note
                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle"
                title="Non functional dummy link"><i class="m-menu__link-icon flaticon-list-3"></i><span class="m-menu__link-text">Material Request Jobcard</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('frontend.material-request-jobcard.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Material Request Jobcard</span></a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"><a href="javascript:;"
                                class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Create New</span><i
                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                            href="{{ route('frontend.material-request-jobcard.hm.create') }}" class="m-menu__link "><i
                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                class="m-menu__link-text">HM</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                            href="{{ route('frontend.material-request-jobcard.workshop.create') }}" class="m-menu__link "><i
                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                class="m-menu__link-text">Workshop</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                        href="{{ route('frontend.material-request-jobcard.defect-card.create') }}" class="m-menu__link "><i
                                            class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                            class="m-menu__link-text">Defect Card</span></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle"
                title="Non functional dummy link"><i class="m-menu__link-icon flaticon-list-3"></i><span class="m-menu__link-text">Tool Request Jobcard</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('frontend.tool-request-jobcard.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Material Request Jobcard</span></a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"><a href="javascript:;"
                                class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Create New</span><i
                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                            href="{{ route('frontend.tool-request-jobcard.hm.create') }}" class="m-menu__link "><i
                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                class="m-menu__link-text">HM</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                            href="{{ route('frontend.tool-request-jobcard.workshop.create') }}" class="m-menu__link "><i
                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                class="m-menu__link-text">Workshop</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                        href="{{ route('frontend.tool-request-jobcard.defect-card.create') }}" class="m-menu__link "><i
                                            class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                            class="m-menu__link-text">Defect Card</span></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.inventory-in.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Inventory In
                    </span>
                </a>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Inventory Out
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.inventory-out-material.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Material
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.inventory-out-tool.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Tool
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.gse-tool-returned.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        GSE/Tool Returned
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.interchange.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Interchange
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" >
                <a href="{{ route('frontend.receiving-inspection-report.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Receiving Inspection Report
                    </span>
                </a>
            </li>
            <li class="m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover" style="display: none;">
                <a href="{{ route('frontend.vendor.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Vendor
                    </span>
                </a>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Master
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.aircraft.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Aircraft
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.storage.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Storage
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.manufacturer.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Manufacturer
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
                        Setting
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
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('frontend.currency.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Currencies
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ route('testing.setting.index') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Setting
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">

                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/jobcard-basic') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    JobCard Basic
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/jobcard-eo2') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    JobCard EO
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/jobcard-si2') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    JobCard SI
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/jobcard-sip') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    JobCard SIP
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/jobcard-cpcp') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    JobCard CPCP
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/jobcard-cmrawl') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    JobCard CMR-AWL
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/jobcard-adsb') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    JobCard AD-SB
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/jobcard-routine2') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    JobCard Routine
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/preliminaryinspection-one') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    JobCard Preliminary One
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/preliminaryinspection-two') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    JobCard Preliminary Two
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/rts-certificate') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    RTS Certificate
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/receiving-inspection-report-doc') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    RIR
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true">
                            <a href="{{ url('/quotation-doc2') }}" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Quotation
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endrole
        </ul>
    </div>
</div>
