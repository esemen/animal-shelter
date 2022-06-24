@extends('layouts.app')
@section('content')
<section class="section-md bg-gray-light text-center">
        <div class="shell">
          <div class="range spacing-55">
            <div class="cell-xs-12">
              <h2>Contact Us</h2>
              <p class="large">At the moment Many Tears are open to the public for scheduled show arounds only. These are at 12pm on a weekday and at 11am and 1pm on a weekend.</p>
              <p class="large"><strong>PLEASE NOTE</strong> There will be a £3 charge (please bring cash as we do not have a card reader) for anyone over the age of 14. These are the ONLY times the general public can turn up without prior arrangement. If you are adopting or volunteering you will be allowed in at a pre agreed time</p>
            </div>
            <div class="cell-xs-12">
              <div class="range spacing-70">
                <div class="cell-xs-6 cell-md-4">
                  <article class="box-minimal">
                    <div class="box-minimal-icon fa fa-phone-square"></div>
                    <div class="box-minimal-title">Telephone</div>
                    <div class="box-minimal-divider"></div>
                    <div class="box-minimal-text">You can call the rescue centre between 10am and 4pm on 01269 843 084</div>
                  </article>
                </div>
                <div class="cell-xs-6 cell-md-4">
                  <article class="box-minimal">
                    <div class="box-minimal-icon fa fa-envelope"></div>
                    <div class="box-minimal-title">Email</div>
                    <div class="box-minimal-divider"></div>
                    <div class="box-minimal-text">You can email us at <a href="mailto:info@manytearsrescue.org">info@manytearsrescue.org</a>, If you are emailing about adopting an animal please ensure you include its name in your email and your landline telephone number in case we need to contact you urgently.</div>
                  </article>
                </div>
                <div class="cell-xs-6 cell-md-4">
                  <article class="box-minimal">
                    <div class="box-minimal-icon fa fa-home"></div>
                    <div class="box-minimal-title">Where we are</div>
                    <div class="box-minimal-divider"></div>
                    <div class="box-minimal-text">Cwmlogin House, Cefneithin, Llanelli, Carmarthenshire, SA14 7HB</div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contacts-->
      <section class="section-md last-section bg-white text-center">
        <div class="shell">
          <div class="range range-sm-center">
            <div class="cell-sm-10 cell-md-10 cell-lg-6">
              <h2>Get in Touch</h2>
              <!-- RD Mailform-->
              <form class="rd-mailform form-recaptcha" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                <div class="range range-sm-bottom spacing-20">
                  <div class="cell-sm-6">
                    <div class="form-group">
                      <input class="form-control" id="contact-first-name" type="text" name="name" data-constraints="@Required">
                      <label class="form-label" for="contact-first-name">Your name</label>
                    </div>
                  </div>
                  <div class="cell-sm-6">
                    <div class="form-group">
                      <input class="form-control" id="contact-last-name" type="text" name="phone" data-constraints="@Numeric">
                      <label class="form-label" for="contact-last-name">Phone</label>
                    </div>
                  </div>
                  <div class="cell-xs-12">
                    <div class="form-group">
                      <textarea class="form-control" id="contact-message" name="message" data-constraints="@Required"></textarea>
                      <label class="form-label" for="contact-message">Your Message</label>
                    </div>
                  </div>
                  <div class="cell-sm-7">
                    <div class="form-group form-group-recaptcha">
                      <input class="form-control" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                      <label class="form-label" for="contact-email">E-mail</label>
                    </div>
                  </div>
                  <div class="cell-xs-12">
                    <!-- Google captcha-->
                    <div class="form-group form-group-recaptcha form-validation-left text-left">
                      <div class="recaptcha" id="captcha1" data-sitekey="6LfZlSETAAAAAC5VW4R4tQP8Am_to4bM3dddxkEt"></div>
                    </div>
                  </div>
                  <div class="cell-sm-7">
                    <div class="form-group-recaptcha">
                      <button class="btn btn-tan-hide btn-effect-anis btn-block" type="submit">send message</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <!-- RD Google Map-->
      <section class="section-md bg-white text-center">
        <div class="shell">
        <iframe
  width="1200"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAMDg26KUB-7KhRG0-d3fv-N8eZyCQcZn8&q=Many+Tears+Animal+Rescue,Cefneithin+Llanelli" allowfullscreen>
</iframe>
</div>
</section>
@endsection