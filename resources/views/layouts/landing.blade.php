<!DOCTYPE html>
<html class="h-full" data-kt-theme="true" data-kt-theme-mode="light" dir="ltr" lang="en">

<head>
    <base href="../../../../">
    <title>SIPASCA - @yield('title')</title>
    <meta charset="utf-8" />
    <meta content="follow, index" name="robots" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <meta content="Sign in page, using Tailwind CSS" name="description" />
    <meta content="@keenthemes" name="twitter:site" />
    <meta content="@keenthemes" name="twitter:creator" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="SIPASCA - Tailwind CSS Sign In" name="twitter:title" />
    <meta content="Sign in page, using Tailwind CSS" name="twitter:description" />
    <meta content="assets/media/app/og-image.png" name="twitter:image" />
    <meta content="id_ID" property="og:locale" />
    <meta content="website" property="og:type" />
    <meta content="@keenthemes" property="og:site_name" />
    <meta content="SIPASCA - Tailwind CSS Sign In" property="og:title" />
    <meta content="Sign in page, using Tailwind CSS" property="og:description" />
    <meta content="assets/media/app/og-image.png" property="og:image" />

    @include('layouts.css')
    @yield('css')
</head>

<body class="antialiased flex h-full text-base text-foreground bg-background">
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
                themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches
                    ? 'dark'
                    : 'light';
            }

            document.documentElement.classList.add(themeMode);
        }
    </script>
    <!-- End of Theme Mode -->
    <!-- Page -->
    <style>
        .page-bg {
            background-image: url({{ asset('assets/media/images/2600x1200/bg-10.png') }});
        }

        .dark .page-bg {
            background-image: url({{ asset('assets/media/images/2600x1200/bg-10-dark.png') }});
        }
    </style>
    <!-- Wrapper -->
    <div class="flex flex-col lg:flex-row grow pt-(--header-height) lg:pt-0">
        <!-- Main -->
        <div
            class="flex flex-col grow items-stretch rounded-xl bg-background border border-input lg:ms-(--sidebar-width) mt-0 page-bg bg-cover bg-no-repeat bg-center">
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
                                    href="https://pasca.uin-malang.ac.id/" target="_blank">
                                    Pascasarjana UIN Malang.
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
    <!-- End of Page -->
    <!-- Scripts -->
    @include('layouts.js')
    @yield('js')
    <!-- End of Scripts -->
</body>

</html>
