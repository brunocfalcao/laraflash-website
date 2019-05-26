<!DOCTYPE html>
<html lang="en">
{{-- HEAD html section --}}
@include('common::partials.head')
{{-- /HEAD html section --}}
<body class="bg-light style-default style-rounded">
    <div class="loader-mask">
        <div class="loader">
            <div></div>
        </div>
    </div>
    <div class="content-overlay"></div>
    {{-- SIDENAV html section --}}
    @include('common::partials.sidenav')
    {{-- /SIDENAV html section --}}
    <main class="main oh" id="main">
        {{-- NAVBAR TOP html section --}}
        @include('common::partials.navbar_top')
        @include('common::partials.navbar', ['total' => $total ?? null])
        {{-- /NAVBAR TOP html section --}}
        {{-- Newsflash optional section --}}
        @yield('newsflash')
        {{-- /Newsflash optional section --}}
        {{-- Featured posts optional section --}}
        @yield('featured')
        {{-- /Featured posts optional section --}}
        <div class="main-container container pt-24" id="main-container">
           {{-- Body optional section --}}
            @yield('body')
            {{-- /Body optional section --}}
        </div>
        {{-- FOOTER html section --}}
        @include('common::partials.footer')
        {{-- /FOOTER html section --}}
        <div id="back-to-top">
            <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
        </div>
    </main>
    {{-- SCRIPTS section --}}
    @include('common::partials.scripts')
    @stack('additional.scripts')
    {{-- /SCRIPTS section --}}
    @if(isset($message))
    <script type="text/javascript">
        $.toast({
            heading: '{{ $message->header ?? '' }}',
            text: '{{ $message->text ?? '' }}',
            showHideTransition: 'slide',
            position: 'top-center',
            bgColor: '#f65858',
            hideAfter: 7000,
            textColor: 'white',
            icon: 'error'
        });
    </script>
    @endif
</body>
</html>

