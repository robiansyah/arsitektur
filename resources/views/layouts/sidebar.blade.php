<!-- Sidebar -->
<div class="fixed top-0 bottom-0 z-20 hidden lg:flex flex-col shrink-0 w-(--sidebar-width) bg-muted [--kt-drawer-enable:true] lg:[--kt-drawer-enable:false]"
    data-kt-drawer="true" data-kt-drawer-class="kt-drawer kt-drawer-start flex top-0 bottom-0" id="sidebar">
    <!-- Sidebar Header -->
    <div id="sidebar_header">
        <div class="flex items-center gap-2.5 px-3.5 h-[70px]">
            <a href="{{ route('home') }}">
                <img class="dark:hidden h-[42px]" src="{{ asset('assets/media/app/mini-logo-circle.svg') }}" />
                <img class="hidden dark:inline-block h-[42px]"
                    src="{{ asset('assets/media/app/mini-logo-circle-dark.svg') }}" />
            </a>
            <div class="kt-menu kt-menu-default grow" data-kt-menu="true">
                <div class="kt-menu-item grow" data-kt-menu-item-offset="0px,0px"
                    data-kt-menu-item-placement="bottom-start" data-kt-menu-item-toggle="dropdown"
                    data-kt-menu-item-trigger="hover">
                    <div class="kt-menu-label cursor-pointer text-mono font-medium grow justify-between">
                        <span class="text-base font-medium text-mono grow justify-start">
                            MetronicCloud
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Sidebar Header -->
    <!-- Sidebar menu -->
    <div class="flex items-stretch grow shrink-0 justify-center my-5" id="sidebar_menu">
        <div class="kt-scrollable-y-auto grow" data-kt-scrollable="true"
            data-kt-scrollable-dependencies="#sidebar_header, #sidebar_footer" data-kt-scrollable-height="auto"
            data-kt-scrollable-offset="0px" data-kt-scrollable-wrappers="#sidebar_menu">
            <!-- Primary Menu -->
            <div class="kt-menu flex flex-col w-full gap-1.5 px-3.5" data-kt-menu="true"
                data-kt-menu-accordion-expand-all="false" id="sidebar_primary_menu">
                <div class="kt-menu-item {{ Request::segment(1) == 'home' ? 'active' : '' }}">
                    <a class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                        href="{{ route('home') }}">
                        <span
                            class="kt-menu-icon items-start text-lg text-mono kt-menu-item-active:text-mono kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-mono dark:menu-item-active:text-white dark:menu-item-here:text-white dark:menu-item-show:text-white dark:menu-link-hover:text-white">
                            <i class="ki-filled ki-home-3">
                            </i>
                        </span>
                        <span
                            class="kt-menu-title text-sm text-mono font-medium kt-menu-item-active:text-mono kt-menu-item-show:text-mono kt-menu-link-hover:text-mono">
                            Dashboard
                        </span>
                    </a>
                </div>
                @if (Auth::user()->hasRole('admin'))
                    <div class="kt-menu-item {{ Request::segment(1) == 'admin' ? 'here show' : '' }} kt-menu-item-accordion"
                        data-kt-menu-item-toggle="accordion" data-kt-menu-item-trigger="click">
                        <div class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md border border-transparent">
                            <span
                                class="kt-menu-icon items-start text-mono text-lg kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-white dark:menu-item-here:text-white dark:menu-item-show:text-white dark:menu-link-hover:text-white">
                                <i class="ki-filled ki-setting-2">
                                </i>
                            </span>
                            <span
                                class="kt-menu-title font-medium text-sm text-mono kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-white">
                                Referensi
                            </span>
                            <span
                                class="kt-menu-arrow text-muted-foreground kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-white">
                                <span class="inline-flex kt-menu-item-show:hidden text-mono">
                                    <i class="ki-filled ki-down text-xs">
                                    </i>
                                </span>
                                <span class="hidden kt-menu-item-show:inline-flex text-mono">
                                    <i class="ki-filled ki-up text-xs">
                                    </i>
                                </span>
                            </span>
                        </div>
                        <div class="kt-menu-accordion gap-px ps-7">
                            <div
                                class="kt-menu-item {{ Request::segment(1) == 'admin' && Request::segment(2) == 'categories' ? 'active' : '' }}">
                                <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                    href="{{ route('admin.categories.index') }}">
                                    <span
                                        class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                        Kategori
                                    </span>
                                </a>
                            </div>
                            <div
                                class="kt-menu-item {{ Request::segment(1) == 'admin' && Request::segment(2) == 'constructs' ? 'active' : '' }}">
                                <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                    href="{{ route('admin.constructs.index') }}">
                                    <span
                                        class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                        Konstruk
                                    </span>
                                </a>
                            </div>
                            <div
                                class="kt-menu-item {{ Request::segment(1) == 'admin' && Request::segment(2) == 'tests' ? 'active' : '' }}">
                                <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                    href="{{ route('admin.tests.index') }}">
                                    <span
                                        class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                        Tes
                                    </span>
                                </a>
                            </div>
                            <div
                                class="kt-menu-item {{ Request::segment(1) == 'admin' && Request::segment(2) == 'test-domains' || Request::segment(2) == 'test-subdomains' ? 'active' : '' }}">
                                <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                    href="{{ route('admin.test-domains.index') }}">
                                    <span
                                        class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                        Domain
                                    </span>
                                </a>
                            </div>
                            <div
                                class="kt-menu-item {{ Request::segment(1) == 'admin' && Request::segment(2) == 'test-spesifications' || Request::segment(2) == 'test-indicators' ? 'active' : '' }}">
                                <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                    href="{{ route('admin.test-spesifications.index') }}">
                                    <span
                                        class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                        Spesifikasi
                                    </span>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                @endif

            </div>
            <!-- End of Primary Menu -->
            <div class="border-b border-input mt-4 mb-1 mx-3.5"></div>
            <div class="kt-menu flex flex-col w-full gap-1.5 px-3.5" data-kt-menu="true"
                data-kt-menu-accordion-expand-all="false" id="sidebar_primary_menu">

                @if (Auth::user()->hasRole('prodi'))
                    <div class="kt-menu-item {{ Request::segment(1) == 'kurikulum' ? 'here show' : '' }} kt-menu-item-accordion"
                        data-kt-menu-item-toggle="accordion" data-kt-menu-item-trigger="click">
                        <div class="kt-menu-link gap-2.5 py-2 px-2.5 rounded-md border border-transparent">
                            <span
                                class="kt-menu-icon items-start text-mono text-lg kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-white dark:menu-item-here:text-white dark:menu-item-show:text-white dark:menu-link-hover:text-white">
                                <i class="ki-filled ki-check-squared">
                                </i>
                            </span>
                            <span
                                class="kt-menu-title font-medium text-sm text-mono kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-white">
                                Kurikulum
                            </span>
                            <span
                                class="kt-menu-arrow text-muted-foreground kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-white">
                                <span class="inline-flex kt-menu-item-show:hidden text-mono">
                                    <i class="ki-filled ki-down text-xs">
                                    </i>
                                </span>
                                <span class="hidden kt-menu-item-show:inline-flex text-mono">
                                    <i class="ki-filled ki-up text-xs">
                                    </i>
                                </span>
                            </span>
                        </div>
                        <div class="kt-menu-accordion gap-px ps-7">
                            <div class="kt-menu-item {{ (Request::segment(1) == 'kurikulum' && Request::segment(2) == 'kurikulum') || (Request::segment(1) == 'kurikulum' && Request::segment(2) == 'pl') || (Request::segment(1) == 'kurikulum' && Request::segment(2) == 'cpl') || (Request::segment(1) == 'kurikulum' && Request::segment(2) == 'bk') || (Request::segment(1) == 'kurikulum' && Request::segment(2) == 'mk') ? 'here show' : '' }}"
                                data-kt-menu-item-toggle="accordion" data-kt-menu-item-trigger="click">
                                <div class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent">
                                    <span
                                        class="kt-menu-title text-sm text-mono kt-menu-item-active:text-white kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-white">
                                        Data
                                    </span>
                                    <span
                                        class="kt-menu-arrow text-muted-foreground kt-menu-item-here:text-foreground kt-menu-item-show:text-foreground kt-menu-link-hover:text-foreground">
                                        <span class="inline-flex kt-menu-item-show:hidden text-mono">
                                            <i class="ki-filled ki-down text-xs">
                                            </i>
                                        </span>
                                        <span class="hidden kt-menu-item-show:inline-flex text-mono">
                                            <i class="ki-filled ki-up text-xs">
                                            </i>
                                        </span>
                                    </span>
                                </div>
                                <div class="kt-menu-accordion gap-px ps-2.5">
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'kurikulum' && Request::segment(2) == 'kurikulum' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('kurikulum.kurikulum.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Kurikulum
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'kurikulum' && Request::segment(2) == 'pl' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('kurikulum.pl.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Profil Lulusan
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'kurikulum' && Request::segment(2) == 'cpl' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('kurikulum.cpl.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                CPL
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'theses' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.theses.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Indikator CPL
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'kurikulum' && Request::segment(2) == 'bk' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('kurikulum.bk.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Bahan Kajian
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'kurikulum' && Request::segment(2) == 'mk' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('kurikulum.mk.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Mata Kuliah
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-menu-accordion gap-px ps-7">
                            <div class="kt-menu-item {{ (Request::segment(1) == 'wadir' && Request::segment(2) == 'supervisors') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'proposals') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'semhas') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'dissertations') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'promotions') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'comprehensives') ? 'here show' : '' }}"
                                data-kt-menu-item-toggle="accordion" data-kt-menu-item-trigger="click">
                                <div class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent">
                                    <span
                                        class="kt-menu-title text-sm text-mono kt-menu-item-active:text-white kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-white">
                                        Pemetaan
                                    </span>
                                    <span
                                        class="kt-menu-arrow text-muted-foreground kt-menu-item-here:text-foreground kt-menu-item-show:text-foreground kt-menu-link-hover:text-foreground">
                                        <span class="inline-flex kt-menu-item-show:hidden text-mono">
                                            <i class="ki-filled ki-down text-xs">
                                            </i>
                                        </span>
                                        <span class="hidden kt-menu-item-show:inline-flex text-mono">
                                            <i class="ki-filled ki-up text-xs">
                                            </i>
                                        </span>
                                    </span>
                                </div>
                                <div class="kt-menu-accordion gap-px ps-2.5">
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'supervisors' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.supervisors.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                CPL - PL
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'proposals' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.proposals.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                CPL - BK
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'semhas' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.semhas.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                BK - MK
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'comprehensives' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.theses.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                CPL - MK
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-menu-accordion gap-px ps-7">
                            <div class="kt-menu-item {{ (Request::segment(1) == 'wadir' && Request::segment(2) == 'supervisors') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'proposals') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'semhas') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'dissertations') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'promotions') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'comprehensives') ? 'here show' : '' }}"
                                data-kt-menu-item-toggle="accordion" data-kt-menu-item-trigger="click">
                                <div class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent">
                                    <span
                                        class="kt-menu-title text-sm text-mono kt-menu-item-active:text-white kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-white">
                                        Penyusunan
                                    </span>
                                    <span
                                        class="kt-menu-arrow text-muted-foreground kt-menu-item-here:text-foreground kt-menu-item-show:text-foreground kt-menu-link-hover:text-foreground">
                                        <span class="inline-flex kt-menu-item-show:hidden text-mono">
                                            <i class="ki-filled ki-down text-xs">
                                            </i>
                                        </span>
                                        <span class="hidden kt-menu-item-show:inline-flex text-mono">
                                            <i class="ki-filled ki-up text-xs">
                                            </i>
                                        </span>
                                    </span>
                                </div>
                                <div class="kt-menu-accordion gap-px ps-2.5">
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'supervisors' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.supervisors.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Matakuliah
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'proposals' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.proposals.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Matakuliah Prasyarat
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'semhas' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.semhas.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Dosen Pengampu
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-menu-accordion gap-px ps-7">
                            <div
                                class="kt-menu-item {{ Request::segment(1) == 'academic' && Request::segment(2) == 'proposals' ? 'active' : '' }}">
                                <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                    href="{{ route('academic.proposals.index') }}">
                                    <span
                                        class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                        RPS
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="kt-menu-accordion gap-px ps-7">
                            <div class="kt-menu-item {{ (Request::segment(1) == 'wadir' && Request::segment(2) == 'supervisors') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'proposals') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'semhas') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'dissertations') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'promotions') || (Request::segment(1) == 'wadir' && Request::segment(2) == 'comprehensives') ? 'here show' : '' }}"
                                data-kt-menu-item-toggle="accordion" data-kt-menu-item-trigger="click">
                                <div class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent">
                                    <span
                                        class="kt-menu-title text-sm text-mono kt-menu-item-active:text-white kt-menu-item-here:text-white kt-menu-item-show:text-white kt-menu-link-hover:text-white">
                                        Evaluasi
                                    </span>
                                    <span
                                        class="kt-menu-arrow text-muted-foreground kt-menu-item-here:text-foreground kt-menu-item-show:text-foreground kt-menu-link-hover:text-foreground">
                                        <span class="inline-flex kt-menu-item-show:hidden text-mono">
                                            <i class="ki-filled ki-down text-xs">
                                            </i>
                                        </span>
                                        <span class="hidden kt-menu-item-show:inline-flex text-mono">
                                            <i class="ki-filled ki-up text-xs">
                                            </i>
                                        </span>
                                    </span>
                                </div>
                                <div class="kt-menu-accordion gap-px ps-2.5">
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'supervisors' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.supervisors.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Semester
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'proposals' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.proposals.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Nilai
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        class="kt-menu-item {{ Request::segment(1) == 'wadir' && Request::segment(2) == 'semhas' ? 'active' : '' }}">
                                        <a class="kt-menu-link py-2 px-2.5 rounded-md border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border"
                                            href="{{ route('wadir.semhas.index') }}">
                                            <span
                                                class="kt-menu-title text-sm text-mono kt-menu-item-active:text-mono kt-menu-link-hover:text-mono">
                                                Statistik
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <!-- End of Sidebar kt-menu-->
    <!-- Footer -->
    <div class="flex flex-center justify-between shrink-0 ps-4 pe-3.5 mb-3.5" id="sidebar_footer">
        <!-- User -->
        <div data-kt-dropdown="true" data-kt-dropdown-offset="10px, 10px" data-kt-dropdown-offset-rtl="-20px, 10px"
            data-kt-dropdown-placement="bottom-start" data-kt-dropdown-placement-rtl="bottom-end"
            data-kt-dropdown-trigger="click">
            <div class="cursor-pointer shrink-0" data-kt-dropdown-toggle="true">
                <img alt="" class="size-9 rounded-full border-2 border-mono/25 shrink-0"
                    src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/media/avatars/blank.png') }}" />
            </div>
            <div class="kt-dropdown-menu w-[250px]" data-kt-dropdown-menu="true">
                <div class="flex items-center justify-between px-2.5 py-1.5 gap-1.5">
                    <div class="flex items-center gap-2">
                        <img alt="" class="size-9 shrink-0 rounded-full border-2 border-green-500"
                            src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/media/avatars/blank.png') }}" />
                        <div class="flex flex-col gap-1.5">
                            <span class="text-sm text-foreground font-semibold leading-none">
                                {{ Auth::user()->name }}
                            </span>
                            <a class="text-xs text-foreground hover:text-primary font-medium leading-none"
                                href="mailto:{{ Auth::user()->email }}" target="_blank">
                                {{ Auth::user()->email }}
                            </a>
                        </div>
                    </div>
                    <span class="kt-badge kt-badge-sm kt-badge-primary kt-badge-outline">
                        Aktif
                    </span>
                </div>
                <ul class="kt-dropdown-menu-sub">
                    <li>
                        <div class="kt-dropdown-menu-separator">
                        </div>
                    </li>
                    <li>
                        <a class="kt-dropdown-menu-link" href="{{ route('user.index') }}">
                            <i class="ki-filled ki-profile-circle"></i>
                            Profil Saya
                        </a>
                    </li>
                    <li>
                        <div class="kt-dropdown-menu-separator">
                        </div>
                    </li>
                </ul>
                <div class="px-2.5 pt-1.5 mb-2.5 flex flex-col gap-3.5">
                    <div class="flex items-center gap-2 justify-between">
                        <span class="flex items-center gap-2">
                            <i class="ki-filled ki-moon text-base text-muted-foreground">
                            </i>
                            <span class="font-medium text-2sm">
                                Dark Mode
                            </span>
                        </span>
                        <input class="kt-switch" data-kt-theme-switch-state="dark" data-kt-theme-switch-toggle="true"
                            name="check" type="checkbox" value="1" />
                    </div>
                    <a class="kt-btn kt-btn-outline justify-center w-full" href="javascript:void(0);"
                        onclick="confirmLogout()">
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <!-- End of User -->
        <div class="flex items-center gap-1.5">
            <a class="kt-btn kt-btn-ghost kt-btn-icon size-8 hover:bg-background hover:[&_i]:text-primary"
                href="javascript:void(0);" onclick="confirmLogout()">
                <i class="ki-filled ki-exit-right"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    <!-- End of Footer -->
</div>
<!-- End of Sidebar -->
