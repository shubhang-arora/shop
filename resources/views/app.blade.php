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
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '308477322845753',
                xfbml      : true,
                version    : 'v2.5'
            });
        };
        function FacebookInviteFriends() {
            FB.ui({
                method: 'apprequests',
                message: 'Invite your friends'
            });
        }

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>
    @yield('scripts')
</body>
</html>
