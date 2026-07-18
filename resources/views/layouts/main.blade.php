<!DOCTYPE html>
<html class="h-full" data-kt-theme="true" data-kt-theme-mode="light" dir="ltr" lang="en">

<head>
    <base href="../../../../">
    <title>APP - @yield('title')</title>
    <meta charset="utf-8" />
    <meta content="follow, index" name="robots" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <meta content="APP UIN Maulana Malik Ibrahim Malang" name="description" />
    <meta content="@ppsuinmalang" name="twitter:site" />
    <meta content="@ppsuinmalang" name="twitter:creator" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="APP - @yield('title')" name="twitter:title" />
    <meta content="APP UIN Maulana Malik Ibrahim Malang" name="twitter:description" />
    <meta content="assets/media/app/og-image.png" name="twitter:image" />
    <meta content="id_ID" property="og:locale" />
    <meta content="website" property="og:type" />
    <meta content="@ppsuinmalang" property="og:site_name" />
    <meta content="APP - @yield('title')" property="og:title" />
    <meta content="APP UIN Maulana Malik Ibrahim Malang" property="og:description" />
    <meta content="assets/media/app/og-image.png" property="og:image" />

    @include('layouts.css')
    @yield('css')
</head>

<body
    class="antialiased flex h-full text-base text-foreground bg-background [--header-height:60px] [--sidebar-width:270px] lg:overflow-hidden bg-muted">
    <!-- Theme Mode -->
    <script>
        const defaultThemeMode = 'light'; // light|dark|system
        let themeMode;

        if (document.documentElement) {
            if (localStorage.getItem('kt-theme')) {
                themeMode = localStorage.getItem('kt-theme');
            } else if (
                document.documentElement.hasAttribute('data-kt-theme-mode')
            ) {
                themeMode =
                    document.documentElement.getAttribute('data-kt-theme-mode');
            } else {
                themeMode = defaultThemeMode;
            }

            if (themeMode === 'system') {
                themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches ?
                    'dark' :
                    'light';
            }

            document.documentElement.classList.add(themeMode);
        }
    </script>
    <!-- End of Theme Mode -->
    <!-- Page -->
    <!-- Base -->
    <div class="flex grow">
        <!-- Header -->
        <header class="flex lg:hidden items-center fixed z-10 top-0 start-0 end-0 shrink-0 bg-muted h-(--header-height)"
            id="header">
            <!-- Container -->
            <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-3">
                <a href="{{ route('home') }}">
                    <img class="dark:hidden h-[36px]" src="assets/media/app/sipasca-white-branding.png" />
                    <img class="hidden dark:block h-[36px]" src="assets/media/app/sipasca-white-branding.png" />
                </a>
                <button class="kt-btn kt-btn-icon kt-btn-ghost [&_i]:text-white hover:bg-background hover:[&_i]:text-primary -me-2" data-kt-drawer-toggle="#sidebar">
                    <i class="ki-filled ki-menu text-xl">
                    </i>
                </button>
            </div>
            <!-- End of Container -->
        </header>
        <!-- End of Header -->
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->
        <!-- Wrapper -->
        <div class="flex flex-col lg:flex-row grow pt-(--header-height) lg:pt-0">
            <!-- Main -->
            <div
                class="flex flex-col grow items-stretch rounded-xl bg-background border border-input lg:ms-(--sidebar-width) mt-0 lg:mt-[15px] m-[15px]">
                <div class="flex flex-col grow kt-scrollable-y-auto [--kt-scrollbar-width:auto] pt-5"
                    id="scrollable_content">
                    <main class="grow" role="content">
                        @yield('content')
                    </main>
                    <!-- Footer -->
                    <footer class="footer">
                        <!-- Container -->
                        <div class="kt-container-fixed">
                            <div
                                class="flex flex-col md:flex-row justify-center md:justify-between items-center gap-3 py-5">
                                <div class="flex order-2 md:order-1 gap-2 font-normal text-sm">
                                    <span class="text-muted-foreground">
                                        {{ date('Y') }}©
                                    </span>
                                    <a class="text-secondary-foreground hover:text-primary"
                                        href="https://uin-malang.ac.id/" target="_blank">
                                        UIN Malang.
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Container -->
                    </footer>
                    <!-- End of Footer -->
                </div>
            </div>
            <!-- End of Main -->
        </div>
        <!-- End of Wrapper -->
    </div>
    <!-- End of Base -->
    <!-- End of Page -->
    @yield('modal')
    @include('layouts.js')
    @yield('js')
    @stack('scripts')
    <script>
        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
</body>
</html>
