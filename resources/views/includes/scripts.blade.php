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