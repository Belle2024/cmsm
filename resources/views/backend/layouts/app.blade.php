<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    <link rel="stylesheet" href="{{ asset('js/chosen_v1.8.3/chosen-bootstrap-css.css') }}">
    <link rel="stylesheet" href="{{ asset('js/chosen_v1.8.3/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('notific8/dist/notific8.css') }}">
    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}

    @stack('after-styles')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('notific8/src/js/notific8.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="{{ config('backend.body_classes') }}">
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            @include('includes.partials.logged-in-as')
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div><!--content-header-->

                    @include('includes.partials.messages')
                    @yield('content')
                </div><!--animated-->
            </div><!--container-fluid-->
        </main><!--main-->

        @include('backend.includes.aside')
    </div><!--app-body-->

    @include('backend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/backend.js')) !!}
    @stack('after-scripts')
    <script>
        $("#distributor-dropdown").chosen();

        var numericField = document.getElementsByClassName('numeric-input');

        for(var elementIndex=0; elementIndex<numericField.length; elementIndex++) {
            new Cleave(numericField[elementIndex], {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });
        }
    </script>
</body>
</html>
