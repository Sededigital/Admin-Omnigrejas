<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-bs-theme="light" data-bs-theme-color="theme-color-default">

    @include('components.layouts.head.head')
    @livewireStyles
    <body>


    {{--  loader END  --}}


        {{-- START SIDEBAR --}}
            @include('components.layouts.sidebar.sidebar')
        {{-- END SIDEBAR --}}

        {{-- START MAIN CONTENT --}}
        <main class="main-content">
        {{-- START Nav --}}
            <div class="position-relative iq-banner">

                    @include('components.layouts.nav.nav')

            </div>
        {{-- END NAV --}}

        {{-- START SLOT --}}
            <div class="conatiner-fluid py-0  m-3 position-relative">
                {{ $slot }}
            </div>
        {{-- END SLOT --}}

        </main>
        {{-- END MAIN --}}



        {{-- START FOOTER --}}

            @include('components.layouts.footer.footer')

        {{-- END FOOTER --}}
       @livewireScripts

       @stack('scripts')
    </body>
</html>
