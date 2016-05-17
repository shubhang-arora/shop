<!DOCTYPE html>
<!--[if IE]>
<![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en">
<!--<![endif]-->
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.header')
    @yield('content')
    @include('includes.footer')

    @yield('scripts')
</body>
</html>
