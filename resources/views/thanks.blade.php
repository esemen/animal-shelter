@extends('layouts.app')
@section('content')
    <section class="section-md-top-new-pages bg-white text-center">
        <div class="shell">
            <div class="range range-sm-center spacing-30">
                <!-- <div class="cell-xs-12">
                  <h3>Tabs &amp; Accordions</h3>
                  <p class="big text-width-smaller">
                    With modern and intuitive interface of tabs and accordions, you can
                     control contents to be organised within a single frame.

                  </p>
                </div> -->
                <div class="cell-sm-10">
                    <h2>Thanks & Stories</h2>
                    <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-1">
                        <!-- Nav tabs-->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabs-1-1" data-toggle="tab" aria-expanded="true">Thank You</a></li>
                            <li class=""><a href="#tabs-1-2" data-toggle="tab" aria-expanded="false">Happy Endings</a></li>
                            <li class=""><a href="#tabs-1-3" data-toggle="tab" aria-expanded="false">Rainbow Bridge</a></li>
                        </ul>
                        <!-- Tab panes-->

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tabs-1-1">

                                <div class="panel-group panel-group-custom panel-group-corporate" id="accordion1" role="tablist">
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion1Heading1" role="tab">
                                            <div class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="false" class="collapsed">OUR NEW SURGERY!
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">02 October 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="post-single">
                                                        <div class="post-single-left"><img class="box-profile-image" src="images/ThankYou-Dog.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-body">
                                                            <p>Our thanks again to the Second Hand Shop in Yateley for the £1904.73 we have recevied.  This is a great amount particularly in these very difficult times and lockdown restrictions.  As always we are so grateful to them and their customers for their continued support and everything they do.</p>

                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion1Heading2" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse2" aria-controls="accordion1Collapse2" aria-expanded="false">SECOND HAND SHOP IN YATELY
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion1Collapse2" role="tabpanel" aria-labelledby="accordion1Heading2" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">29 September 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="post-single">
                                                        <div class="post-single-left"><img class="box-profile-image" src="images/ThankYou-Dog.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-body">
                                                            <p>Our thanks again to the Second Hand Shop in Yateley for the £1904.73 we have recevied.  This is a great amount particularly in these very difficult times and lockdown restrictions.  As always we are so grateful to them and their customers for their continued support and everything they do.</p>

                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion1Heading3" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse3" aria-controls="accordion1Collapse3" aria-expanded="false">BEV MUIR AND MARGARET
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion1Collapse3" role="tabpanel" aria-labelledby="accordion1Heading3" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">02 October 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="post-single">
                                                        <div class="post-single-left"><img class="box-profile-image" src="images/ThankYou-Dog.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-body">
                                                            <p>Our thanks again to the Second Hand Shop in Yateley for the £1904.73 we have recevied.  This is a great amount particularly in these very difficult times and lockdown restrictions.  As always we are so grateful to them and their customers for their continued support and everything they do.</p>

                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion1Heading4" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse4" aria-controls="accordion1Collapse4" aria-expanded="false">ISABEL PATTEN
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion1Collapse4" role="tabpanel" aria-labelledby="accordion1Heading4" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">02 October 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="post-single">
                                                        <div class="post-single-left"><img class="box-profile-image" src="images/ThankYou-Dog.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-body">
                                                            <p>Our thanks again to the Second Hand Shop in Yateley for the £1904.73 we have recevied.  This is a great amount particularly in these very difficult times and lockdown restrictions.  As always we are so grateful to them and their customers for their continued support and everything they do.</p>

                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion1Heading5" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse5" aria-controls="accordion1Collapse5" aria-expanded="false">MANY TEARS AWARENESS AUCTION PAGE
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion1Collapse5" role="tabpanel" aria-labelledby="accordion1Heading5" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">02 October 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="post-single">
                                                        <div class="post-single-left"><img class="box-profile-image" src="images/ThankYou-Dog.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-body">
                                                            <p>Our thanks again to the Second Hand Shop in Yateley for the £1904.73 we have recevied.  This is a great amount particularly in these very difficult times and lockdown restrictions.  As always we are so grateful to them and their customers for their continued support and everything they do.</p>

                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tabs-1-2">
                                <div class="panel-group panel-group-custom panel-group-corporate" id="accordion2" role="tablist">
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion2Heading1" role="tab">
                                            <div class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse1" aria-controls="accordion2Collapse1" aria-expanded="false" class="collapsed">SANDY WAS QUINOA
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion2Collapse1" role="tabpanel" aria-labelledby="accordion2Heading1" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">09 August 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="">
                                                        <div class="post-single-center"><img class="box-profile-image" src="images/happy-endings-example.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-fullwidth">
                                                            <p>We adopted Sandy / Quinoa November 2019. A very nervous, anxious girl so desperate for love and kindness, she joined our family and a new sister Amber. Who over just two months has taught her to enjoy life to the full , gain confidence and Conker her anxieties . She enjoys coming to work with us , long country, beach walks and trips in our motorhome. We’d like to send a big thank you to Many Tears for your devotion and hard work<br>
                                                                Karen and Garry Smart Amber and Sandy</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion2Heading2" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse2" aria-controls="accordion2Collapse2" aria-expanded="false">DOTTIE
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion2Collapse2" role="tabpanel" aria-labelledby="accordion2Heading2" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">09 August 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="">
                                                        <div class="post-single-center"><img class="box-profile-image" src="images/happy-endings-example.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-fullwidth">
                                                            <p>We adopted Sandy / Quinoa November 2019. A very nervous, anxious girl so desperate for love and kindness, she joined our family and a new sister Amber. Who over just two months has taught her to enjoy life to the full , gain confidence and Conker her anxieties . She enjoys coming to work with us , long country, beach walks and trips in our motorhome. We’d like to send a big thank you to Many Tears for your devotion and hard work<br>
                                                                Karen and Garry Smart Amber and Sandy</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion2Heading3" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse3" aria-controls="accordion2Collapse3" aria-expanded="false">RAISIN AND ROCKY
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion2Collapse3" role="tabpanel" aria-labelledby="accordion2Heading3" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">09 August 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="">
                                                        <div class="post-single-center"><img class="box-profile-image" src="images/happy-endings-example.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-fullwidth">
                                                            <p>We adopted Sandy / Quinoa November 2019. A very nervous, anxious girl so desperate for love and kindness, she joined our family and a new sister Amber. Who over just two months has taught her to enjoy life to the full , gain confidence and Conker her anxieties . She enjoys coming to work with us , long country, beach walks and trips in our motorhome. We’d like to send a big thank you to Many Tears for your devotion and hard work<br>
                                                                Karen and Garry Smart Amber and Sandy</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion2Heading4" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse4" aria-controls="accordion2Collapse4" aria-expanded="false">LEIA
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion2Collapse4" role="tabpanel" aria-labelledby="accordion2Heading4" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">09 August 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="">
                                                        <div class="post-single-center"><img class="box-profile-image" src="images/happy-endings-example.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-fullwidth">
                                                            <p>We adopted Sandy / Quinoa November 2019. A very nervous, anxious girl so desperate for love and kindness, she joined our family and a new sister Amber. Who over just two months has taught her to enjoy life to the full , gain confidence and Conker her anxieties . She enjoys coming to work with us , long country, beach walks and trips in our motorhome. We’d like to send a big thank you to Many Tears for your devotion and hard work<br>
                                                                Karen and Garry Smart Amber and Sandy</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion2Heading5" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse5" aria-controls="accordion2Collapse5" aria-expanded="false">LOUIS WAS LIAM
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion2Collapse5" role="tabpanel" aria-labelledby="accordion2Heading5" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">09 August 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="">
                                                        <div class="post-single-center"><img class="box-profile-image" src="images/happy-endings-example.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-fullwidth">
                                                            <p>We adopted Sandy / Quinoa November 2019. A very nervous, anxious girl so desperate for love and kindness, she joined our family and a new sister Amber. Who over just two months has taught her to enjoy life to the full , gain confidence and Conker her anxieties . She enjoys coming to work with us , long country, beach walks and trips in our motorhome. We’d like to send a big thank you to Many Tears for your devotion and hard work<br>
                                                                Karen and Garry Smart Amber and Sandy</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="tab-pane fade" id="tabs-1-3">
                                <div class="panel-group panel-group-custom panel-group-corporate" id="accordion3" role="tablist">
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion3Heading1" role="tab">
                                            <div class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion3" href="#accordion3Collapse1" aria-controls="accordion3Collapse1" aria-expanded="false" class="collapsed">BARNEY - August 2020
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion3Collapse1" role="tabpanel" aria-labelledby="accordion3Heading1" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">09 August 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="">
                                                        <div class="post-single-center"><img class="box-profile-image" src="images/rainbow-img-example.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-fullwidth">
                                                            <p>Dear Many Tears
                                                                With a very heartbroken and heavy heart we have to give you the very sad news that our wonderful Barney (Rubble) left us to cross the Rainbow Bridge on Monday 10th August 20. ( Age Approximately 13 years)
                                                                We picked up Barney from a lovely foster mum Nicole just over 10 years ago. (June 2010)
                                                                Barney has been the most wonderful dog, and everyone we met just loved him and called him a lovely big soft Teddy Bear, which he was.
                                                                He was just amazing with our other Many Tears dogs, (Lucie sadly crossed the Rainbow Bridge far too early July 17) Cherry (was Bakewell) & Bertie (was Venner) showing them the way in the home, garden and when we went out walking every day. He was always there to comfort them when they were uncertain with life, always letting them snuggle up, showing them that everything would be OK. It is so sad to see both Cherry & Bertie looking for him and the sadness in their eyes when they realise he is no longer by their side.
                                                                We certainly could not have wished for a better boy, always well-mannered and certainly knew who to flutter his extremely long eye lashes at for a tasty treat, which no one could resist giving him.
                                                                He has not been too well for the past 6 months, we know he had a bit of Arthritis, but this did not stop him until the last couple of months to come out for his walks, bless him he just went out for a short walk.
                                                                But he became quite unwell and the last couple of months was starting to lose weight and fall down, really not interested in treats, food or his walks. We had him at the vets, really knowing what the answer would be.
                                                                But we bought him home, and made him comfortable, we kept him going for another month but over a weekend he just deteriorate rapidly, not eating, but just been sick. Having trouble standing, his legs giving way. Really un-interested in anything. On his final day he found it so hard to lift his head up to even to say Hello, so we felt that we had to do the kindest thing for Barney, and help him to Cross the Rainbow Bridge.
                                                                As it was a lovely evening the vet said we could all go to their own private garden and we could all lay on the grass together, even the vet, laying with us, and let him go without any stress, to go and join our beloved Lucie.
                                                                We would like to thank you all at Many Tears for letting us adopt Barney, he was the most wonderful dog.
                                                                He gave us many years of love and trust, we miss him so much and our hearts are broken.
                                                                RIP Barney, you will always be our Teddy Boy. Run free over the Rainbow Bridge.
                                                                Love and miss you every day.
                                                                Best wishes
                                                                Margaret & Andy (Nesbitt)</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion3Heading2" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#accordion3Collapse2" aria-controls="accordion3Collapse2" aria-expanded="false">MINNIE - October 2020
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion3Collapse2" role="tabpanel" aria-labelledby="accordion3Heading2" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">09 August 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="">
                                                        <div class="post-single-center"><img class="box-profile-image" src="images/rainbow-img-example.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-fullwidth">
                                                            <p>Dear Many Tears
                                                                With a very heartbroken and heavy heart we have to give you the very sad news that our wonderful Barney (Rubble) left us to cross the Rainbow Bridge on Monday 10th August 20. ( Age Approximately 13 years)
                                                                We picked up Barney from a lovely foster mum Nicole just over 10 years ago. (June 2010)
                                                                Barney has been the most wonderful dog, and everyone we met just loved him and called him a lovely big soft Teddy Bear, which he was.
                                                                He was just amazing with our other Many Tears dogs, (Lucie sadly crossed the Rainbow Bridge far too early July 17) Cherry (was Bakewell) & Bertie (was Venner) showing them the way in the home, garden and when we went out walking every day. He was always there to comfort them when they were uncertain with life, always letting them snuggle up, showing them that everything would be OK. It is so sad to see both Cherry & Bertie looking for him and the sadness in their eyes when they realise he is no longer by their side.
                                                                We certainly could not have wished for a better boy, always well-mannered and certainly knew who to flutter his extremely long eye lashes at for a tasty treat, which no one could resist giving him.
                                                                He has not been too well for the past 6 months, we know he had a bit of Arthritis, but this did not stop him until the last couple of months to come out for his walks, bless him he just went out for a short walk.
                                                                But he became quite unwell and the last couple of months was starting to lose weight and fall down, really not interested in treats, food or his walks. We had him at the vets, really knowing what the answer would be.
                                                                But we bought him home, and made him comfortable, we kept him going for another month but over a weekend he just deteriorate rapidly, not eating, but just been sick. Having trouble standing, his legs giving way. Really un-interested in anything. On his final day he found it so hard to lift his head up to even to say Hello, so we felt that we had to do the kindest thing for Barney, and help him to Cross the Rainbow Bridge.
                                                                As it was a lovely evening the vet said we could all go to their own private garden and we could all lay on the grass together, even the vet, laying with us, and let him go without any stress, to go and join our beloved Lucie.
                                                                We would like to thank you all at Many Tears for letting us adopt Barney, he was the most wonderful dog.
                                                                He gave us many years of love and trust, we miss him so much and our hearts are broken.
                                                                RIP Barney, you will always be our Teddy Boy. Run free over the Rainbow Bridge.
                                                                Love and miss you every day.
                                                                Best wishes
                                                                Margaret & Andy (Nesbitt)</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion3Heading3" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#accordion3Collapse3" aria-controls="accordion3Collapse3" aria-expanded="false">RUBY - October 2020
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion3Collapse3" role="tabpanel" aria-labelledby="accordion3Heading3" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">09 August 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="">
                                                        <div class="post-single-center"><img class="box-profile-image" src="images/rainbow-img-example.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-fullwidth">
                                                            <p>Dear Many Tears
                                                                With a very heartbroken and heavy heart we have to give you the very sad news that our wonderful Barney (Rubble) left us to cross the Rainbow Bridge on Monday 10th August 20. ( Age Approximately 13 years)
                                                                We picked up Barney from a lovely foster mum Nicole just over 10 years ago. (June 2010)
                                                                Barney has been the most wonderful dog, and everyone we met just loved him and called him a lovely big soft Teddy Bear, which he was.
                                                                He was just amazing with our other Many Tears dogs, (Lucie sadly crossed the Rainbow Bridge far too early July 17) Cherry (was Bakewell) & Bertie (was Venner) showing them the way in the home, garden and when we went out walking every day. He was always there to comfort them when they were uncertain with life, always letting them snuggle up, showing them that everything would be OK. It is so sad to see both Cherry & Bertie looking for him and the sadness in their eyes when they realise he is no longer by their side.
                                                                We certainly could not have wished for a better boy, always well-mannered and certainly knew who to flutter his extremely long eye lashes at for a tasty treat, which no one could resist giving him.
                                                                He has not been too well for the past 6 months, we know he had a bit of Arthritis, but this did not stop him until the last couple of months to come out for his walks, bless him he just went out for a short walk.
                                                                But he became quite unwell and the last couple of months was starting to lose weight and fall down, really not interested in treats, food or his walks. We had him at the vets, really knowing what the answer would be.
                                                                But we bought him home, and made him comfortable, we kept him going for another month but over a weekend he just deteriorate rapidly, not eating, but just been sick. Having trouble standing, his legs giving way. Really un-interested in anything. On his final day he found it so hard to lift his head up to even to say Hello, so we felt that we had to do the kindest thing for Barney, and help him to Cross the Rainbow Bridge.
                                                                As it was a lovely evening the vet said we could all go to their own private garden and we could all lay on the grass together, even the vet, laying with us, and let him go without any stress, to go and join our beloved Lucie.
                                                                We would like to thank you all at Many Tears for letting us adopt Barney, he was the most wonderful dog.
                                                                He gave us many years of love and trust, we miss him so much and our hearts are broken.
                                                                RIP Barney, you will always be our Teddy Boy. Run free over the Rainbow Bridge.
                                                                Love and miss you every day.
                                                                Best wishes
                                                                Margaret & Andy (Nesbitt)</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion3Heading4" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#accordion3Collapse4" aria-controls="accordion3Collapse4" aria-expanded="false">HARRY - October 2020
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion3Collapse4" role="tabpanel" aria-labelledby="accordion3Heading4" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">09 August 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="">
                                                        <div class="post-single-center"><img class="box-profile-image" src="images/rainbow-img-example.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-fullwidth">
                                                            <p>Dear Many Tears
                                                                With a very heartbroken and heavy heart we have to give you the very sad news that our wonderful Barney (Rubble) left us to cross the Rainbow Bridge on Monday 10th August 20. ( Age Approximately 13 years)
                                                                We picked up Barney from a lovely foster mum Nicole just over 10 years ago. (June 2010)
                                                                Barney has been the most wonderful dog, and everyone we met just loved him and called him a lovely big soft Teddy Bear, which he was.
                                                                He was just amazing with our other Many Tears dogs, (Lucie sadly crossed the Rainbow Bridge far too early July 17) Cherry (was Bakewell) & Bertie (was Venner) showing them the way in the home, garden and when we went out walking every day. He was always there to comfort them when they were uncertain with life, always letting them snuggle up, showing them that everything would be OK. It is so sad to see both Cherry & Bertie looking for him and the sadness in their eyes when they realise he is no longer by their side.
                                                                We certainly could not have wished for a better boy, always well-mannered and certainly knew who to flutter his extremely long eye lashes at for a tasty treat, which no one could resist giving him.
                                                                He has not been too well for the past 6 months, we know he had a bit of Arthritis, but this did not stop him until the last couple of months to come out for his walks, bless him he just went out for a short walk.
                                                                But he became quite unwell and the last couple of months was starting to lose weight and fall down, really not interested in treats, food or his walks. We had him at the vets, really knowing what the answer would be.
                                                                But we bought him home, and made him comfortable, we kept him going for another month but over a weekend he just deteriorate rapidly, not eating, but just been sick. Having trouble standing, his legs giving way. Really un-interested in anything. On his final day he found it so hard to lift his head up to even to say Hello, so we felt that we had to do the kindest thing for Barney, and help him to Cross the Rainbow Bridge.
                                                                As it was a lovely evening the vet said we could all go to their own private garden and we could all lay on the grass together, even the vet, laying with us, and let him go without any stress, to go and join our beloved Lucie.
                                                                We would like to thank you all at Many Tears for letting us adopt Barney, he was the most wonderful dog.
                                                                He gave us many years of love and trust, we miss him so much and our hearts are broken.
                                                                RIP Barney, you will always be our Teddy Boy. Run free over the Rainbow Bridge.
                                                                Love and miss you every day.
                                                                Best wishes
                                                                Margaret & Andy (Nesbitt)</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bootstrap panel-->
                                    <div class="panel panel-custom panel-corporate">
                                        <div class="panel-heading" id="accordion3Heading5" role="tab">
                                            <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#accordion3Collapse5" aria-controls="accordion3Collapse5" aria-expanded="false">BONNIE - August 2020
                                                    <div class="panel-arrow"></div></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="accordion3Collapse5" role="tabpanel" aria-labelledby="accordion3Heading5" aria-expanded="false" style="height: 0px;">
                                            <ul class="post-meta">
                                                <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                    <time datetime="2016-01-01">09 August 2020</time>
                                                </li>
                                            </ul>
                                            <div class="range range-sm-center">
                                                <div class="cell-sm-9 cell-md-12">
                                                    <article class="">
                                                        <div class="post-single-center"><img class="box-profile-image" src="images/rainbow-img-example.jpg" alt="" width="570" height="389"/>
                                                        </div>
                                                        <div class="post-single-fullwidth">
                                                            <p>Dear Many Tears
                                                                With a very heartbroken and heavy heart we have to give you the very sad news that our wonderful Barney (Rubble) left us to cross the Rainbow Bridge on Monday 10th August 20. ( Age Approximately 13 years)
                                                                We picked up Barney from a lovely foster mum Nicole just over 10 years ago. (June 2010)
                                                                Barney has been the most wonderful dog, and everyone we met just loved him and called him a lovely big soft Teddy Bear, which he was.
                                                                He was just amazing with our other Many Tears dogs, (Lucie sadly crossed the Rainbow Bridge far too early July 17) Cherry (was Bakewell) & Bertie (was Venner) showing them the way in the home, garden and when we went out walking every day. He was always there to comfort them when they were uncertain with life, always letting them snuggle up, showing them that everything would be OK. It is so sad to see both Cherry & Bertie looking for him and the sadness in their eyes when they realise he is no longer by their side.
                                                                We certainly could not have wished for a better boy, always well-mannered and certainly knew who to flutter his extremely long eye lashes at for a tasty treat, which no one could resist giving him.
                                                                He has not been too well for the past 6 months, we know he had a bit of Arthritis, but this did not stop him until the last couple of months to come out for his walks, bless him he just went out for a short walk.
                                                                But he became quite unwell and the last couple of months was starting to lose weight and fall down, really not interested in treats, food or his walks. We had him at the vets, really knowing what the answer would be.
                                                                But we bought him home, and made him comfortable, we kept him going for another month but over a weekend he just deteriorate rapidly, not eating, but just been sick. Having trouble standing, his legs giving way. Really un-interested in anything. On his final day he found it so hard to lift his head up to even to say Hello, so we felt that we had to do the kindest thing for Barney, and help him to Cross the Rainbow Bridge.
                                                                As it was a lovely evening the vet said we could all go to their own private garden and we could all lay on the grass together, even the vet, laying with us, and let him go without any stress, to go and join our beloved Lucie.
                                                                We would like to thank you all at Many Tears for letting us adopt Barney, he was the most wonderful dog.
                                                                He gave us many years of love and trust, we miss him so much and our hearts are broken.
                                                                RIP Barney, you will always be our Teddy Boy. Run free over the Rainbow Bridge.
                                                                Love and miss you every day.
                                                                Best wishes
                                                                Margaret & Andy (Nesbitt)</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
