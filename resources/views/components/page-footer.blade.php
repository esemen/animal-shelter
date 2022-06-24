<!-- Page Footer-->
<section class="pre-footer-minimal bg-gray-dark">
    <div class="pre-footer-minimal-inner">
        <div class="shell text-center text-sm-left">
            <div class="range range-sm-center spacing-55">
                <div class="cell-sm-12 cell-md-4 text-sm-center text-md-left">
                    <h4>Quick Links</h4>
                    <div class="group-md-1">
                        <ul class="list-nav-marked">
                            <li class="active"><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="about-us">About us</a></li>
                            <li><a href="{{ route('adopt-a-pet') }}">Adopt</a></li>
                            <li><a href="{{ route('become-fosterer') }}">Become a Fosterer</a></li>
                            <li><a href="{{ route('become-vetter') }}">Become a Vetter</a></li>
{{--                            <li><a href="{{ route('assessment-form') }}">Assessment Form</a></li>--}}
                            @auth
                                @can('admin.view')
                                    <li><a href="{{ route('admin.dashboard') }}">Administration</a></li>
                                @endcan
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="cell-sm-4 cell-md-3">
                    <h4>Opening Hours</h4>
                    <dl class="terms-list-inline">
                        <dt>Week Days</dt>
                        <dd>10:00am–4:00pm</dd>
                    </dl>
                    <dl class="terms-list-inline">
                        <dt>Sunday, Saturday</dt>
                        <dd>10:00am–4:00pm</dd>
                    </dl>
                </div>
                <div class="cell-sm-4 cell-md-2">
                    <h4>Phone</h4>
                    <ul class="list-xxs">
                        <li>
                            <a class="link link-md" href="callto:#">01269 843 084</a>
                        </li>
                        <li>
                            <a class="link" href="mailto:#">info@manytearsrescue.org</a>
                        </li>
                    </ul>
                </div>
                <div class="cell-sm-4 cell-md-3">
                    <h4>Address</h4>
                    <address class="reveal-inline-block" style="max-width: 215px;">
                        <p>
                            Cwmlogin House, Cefneithin, Llanelli Carmarthenshire,<br/>
                            SA14 7HB
                        </p>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="shell">
        <hr/>
    </div>
</section>
<footer class="page-footer-minimal">
    <div class="shell">
        <p class="rights">
            Many Tears Animal Rescue&nbsp;&copy;&nbsp;<span
                id="copyright-year"
            ></span
            >.&nbsp;<br class="veil-sm"/><a
                class="link-underline"
                href="privacy-policy"
            >Privacy Policy</a
            >
            <!-- {%FOOTER_LINK}-->
        </p>
    </div>
</footer>
