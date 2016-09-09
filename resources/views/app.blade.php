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

    <script src='http://connect.facebook.net/en_US/all.js'></script>
    <script>
        FB.init({
            appId: '308477322845753',
            cookie: true,
            status: true,
            xfbml: true
        });
        function FacebookInviteFriends() {
            FB.ui({
                method: 'apprequests',
                message: 'Invite your friends'
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
