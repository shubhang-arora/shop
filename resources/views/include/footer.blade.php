@if(isset($material))
    @unless($material)
        <br><br>
    @endunless
@else
    <br><br><br>
@endif
<footer>
    <div class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container">
            <div class="navbar-collapse collapse" id="footer-body">
                <ul class="nav navbar-nav">
                    <li><a href="#!">About Us</a></li>
                    <li><a href="#!">Contact Us</a></li>
                    <li><a href="#!">Terms &amp; Conditions</a></li>
                    <li><a href="#!">Privacy Policy</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#!">Copyright &copy; 2016 | E Shoppee</a></li>
                    <li><a href="#!">All Rights Reserved</a></li>
                </ul>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#footer-body">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

        </div>
    </div>
</footer>