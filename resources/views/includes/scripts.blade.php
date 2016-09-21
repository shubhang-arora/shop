<script src='http://connect.facebook.net/en_US/all.js'></script>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '308477322845753',
            xfbml: true,
            version: 'v2.5'
        });
    };
    function FacebookInviteFriends() {
        FB.ui({
            method: 'apprequests',
            message: 'Invite your friends'
        });
    }

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>

<script>
    if ($('#state').length && $('#city').length && $('#zipcode').length) {
        $('body').append('<script src="{{asset('js/filter_zip_city_state.js')}}">');
    }
</script>
@if(session()->get('expires_in')!=null)
    <script>

        var expires_in = '';
        @if(session()->get('expires_in')==0)
                expires_in = 'Your Shop\'s subscription will end today.\nContact admin for renewal.';
        @elseif(session()->get('expires_in')==-1)
                expires_in = 'Your Shop\'s subscription has expired.\nContact admin for renewal.';
        @else
                expires_in = 'Your Shop\'s subscription will expire after {{session()->get('expires_in')}} days.\nContact admin for renewal.';
        @endif
    </script>

    <script src="{{asset('js/notify.js')}}"></script>
    <script>
        $.notify(expires_in, {
            // whether to hide the notification on click
            clickToHide: true,
            // whether to auto-hide the notification
            autoHide: false,
            // show the arrow pointing at the element
            arrowShow: true,
            // arrow size in pixels
            arrowSize: 5,
            // position defines the notification position though uses the defaults below
            position: '...',
            // default positions
            elementPosition: 'bottom left',
            globalPosition: 'top right',
            // default style
            style: 'bootstrap',
            // default class (string or [string])
            className: 'error',
            // show animation
            showAnimation: 'slideDown',
            // show animation duration
            showDuration: 400,
            // hide animation
            hideAnimation: 'slideUp',
            // hide animation duration
            hideDuration: 200,
            // padding between element and notification
            gap: 2
        });
    </script>
@endif