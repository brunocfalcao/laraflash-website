<footer class="footer footer--dark">
    <div class="container">
        <div class="footer__widgets">
            <div class="row" id="footer">
                <div class="col-lg-6 col-md-6">
                    <aside class="widget widget-logo">
                        <a href="#">
                            <img src="img/logo_default_white.png" srcset="img/logo_default_white.png 1x, img/logo_default_white@2x.png 2x" class="logo__img" alt="">
                        </a>
                        <p class="copyright">
                            © 2018 Laraflash | Made by <a href="https://twitter.com/brunocfalcao">Bruno Falcao</a>
                        </p>
                    </aside>
                </div>
                <div class="col-lg-6 col-md-6">
                    <aside class="widget widget_mc4wp_form_widget">
                        <h4 class="widget-title">Newsletter</h4>
                        <p class="newsletter__text">
                            <i class="ui-email newsletter__icon"></i> Subscribe to be the first to know new features! -- No spam, promise!
                        </p>
                        <form class="mc4wp-form" method="post" action="{{ route('register.newsletter') }}">
                            @csrf
                            <div class="mc4wp-form-fields">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Your email" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-lg btn-color" value="Sign Up">
                                </div>
                            </div>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->
</footer>
