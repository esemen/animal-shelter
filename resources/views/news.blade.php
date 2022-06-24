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
              <h2>News & Events</h2>
              <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-1">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tabs-1-1" data-toggle="tab" aria-expanded="true">Sylvia's Diary</a></li>
                  <li class=""><a href="#tabs-1-2" data-toggle="tab" aria-expanded="false">Staff and Fosterer Blog</a></li>
                  <li class=""><a href="#tabs-1-3" data-toggle="tab" aria-expanded="false">Events</a></li>
                </ul>
                <!-- Tab panes-->

                <div class="tab-content">
                  <div class="tab-pane fade in active" id="tabs-1-1">

                   <div class="panel-group panel-group-custom panel-group-corporate" id="accordion1" role="tablist">
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading1" role="tab">
                    <div class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="false" class="collapsed">Sylvia's Trip To Ireland
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
                            <iframe width="460" height="320" src="https://www.youtube.com/embed/enXiBApwfVk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="post-single-body">
                              <p>This week Sylvia has been to Ireland to collect dogs that so desperately needed our help. In this video she takes us on her journey as they arrive in Wales to start their new lives.</p>
                              <p>Not only are these trips incredibly expensive, but they take an incredible amount of time and energy to arrange. This is only possible through your kindness and generosity. If you'd like to donate towards these dogs and to help future dogs just like them, please click the link below.</p>
                              <p style="text-align: center;"><input name="cmd" type="hidden" value="_s-xclick"> <input name="hosted_button_id" type="hidden" value="4ZF3NAHELPFGL"> <input alt="Donate with PayPal button" border="0" name="submit" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" title="PayPal - The safer, easier way to pay online!" type="image"> <img alt="" border="0" height="1" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1"></p>
                            </div>
                          </article>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading2" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse2" aria-controls="accordion1Collapse2" aria-expanded="false">Maisie Has Been Found
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
                            <iframe width="460" height="320" src="https://www.youtube.com/embed/enXiBApwfVk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="post-single-body">
                              <p>This week Sylvia has been to Ireland to collect dogs that so desperately needed our help. In this video she takes us on her journey as they arrive in Wales to start their new lives.</p>
                              <p>Not only are these trips incredibly expensive, but they take an incredible amount of time and energy to arrange. This is only possible through your kindness and generosity. If you'd like to donate towards these dogs and to help future dogs just like them, please click the link below.</p>
                              <p style="text-align: center;"><input name="cmd" type="hidden" value="_s-xclick"> <input name="hosted_button_id" type="hidden" value="4ZF3NAHELPFGL"> <input alt="Donate with PayPal button" border="0" name="submit" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" title="PayPal - The safer, easier way to pay online!" type="image"> <img alt="" border="0" height="1" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1"></p>
                            </div>
                          </article>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading3" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse3" aria-controls="accordion1Collapse3" aria-expanded="false">An Evening Tour Of Many Tears
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
                            <iframe width="460" height="320" src="https://www.youtube.com/embed/enXiBApwfVk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="post-single-body">
                              <p>This week Sylvia has been to Ireland to collect dogs that so desperately needed our help. In this video she takes us on her journey as they arrive in Wales to start their new lives.</p>
                              <p>Not only are these trips incredibly expensive, but they take an incredible amount of time and energy to arrange. This is only possible through your kindness and generosity. If you'd like to donate towards these dogs and to help future dogs just like them, please click the link below.</p>
                              <p style="text-align: center;"><input name="cmd" type="hidden" value="_s-xclick"> <input name="hosted_button_id" type="hidden" value="4ZF3NAHELPFGL"> <input alt="Donate with PayPal button" border="0" name="submit" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" title="PayPal - The safer, easier way to pay online!" type="image"> <img alt="" border="0" height="1" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1"></p>
                            </div>
                          </article>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading4" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse4" aria-controls="accordion1Collapse4" aria-expanded="false">Molly's Vet Visit
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
                            <iframe width="460" height="320" src="https://www.youtube.com/embed/enXiBApwfVk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="post-single-body">
                              <p>This week Sylvia has been to Ireland to collect dogs that so desperately needed our help. In this video she takes us on her journey as they arrive in Wales to start their new lives.</p>
                              <p>Not only are these trips incredibly expensive, but they take an incredible amount of time and energy to arrange. This is only possible through your kindness and generosity. If you'd like to donate towards these dogs and to help future dogs just like them, please click the link below.</p>
                              <p style="text-align: center;"><input name="cmd" type="hidden" value="_s-xclick"> <input name="hosted_button_id" type="hidden" value="4ZF3NAHELPFGL"> <input alt="Donate with PayPal button" border="0" name="submit" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" title="PayPal - The safer, easier way to pay online!" type="image"> <img alt="" border="0" height="1" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1"></p>
                            </div>
                          </article>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading5" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse5" aria-controls="accordion1Collapse5" aria-expanded="false">Bedding Update
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
                            <iframe width="460" height="320" src="https://www.youtube.com/embed/enXiBApwfVk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="post-single-body">
                              <p>This week Sylvia has been to Ireland to collect dogs that so desperately needed our help. In this video she takes us on her journey as they arrive in Wales to start their new lives.</p>
                              <p>Not only are these trips incredibly expensive, but they take an incredible amount of time and energy to arrange. This is only possible through your kindness and generosity. If you'd like to donate towards these dogs and to help future dogs just like them, please click the link below.</p>
                              <p style="text-align: center;"><input name="cmd" type="hidden" value="_s-xclick"> <input name="hosted_button_id" type="hidden" value="4ZF3NAHELPFGL"> <input alt="Donate with PayPal button" border="0" name="submit" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" title="PayPal - The safer, easier way to pay online!" type="image"> <img alt="" border="0" height="1" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1"></p>
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
                    <div class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse1" aria-controls="accordion2Collapse1" aria-expanded="false" class="collapsed">JENNY & JUNE by Geri
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
                            <div class="post-single-center"><img class="box-profile-image" src="images/JennyJune.jpg" alt="" width="570" height="389"/>
                            </div>
                            <div class="post-single-fullwidth">
                              <p>Yesterday the rescue centre was bustling ... a happy hive of activity! All the dogs - including the new arrivals - were busy running around, barking, playing, wagging their tails, jumping up and down... All intrigued / happy / excited at being rescued; - with their living conditions and new lives ahead of them... Even the more nervous dogs were up and about playing with their fellow furry friends and having a great time - having a good nose! It was lovely to hear and see!
All, apart from two dogs in one kennel on my section... Kennel 20 was completely silent, still ... I could see names on the board - Jenny and June, and two bowls of food in the bedroom, so there were definitely dogs in there, but I couldn't see or hear them... I entered their kennel and went to introduce myself. I think the pictures speak volumes.
The girls were hiding behind their beds. Laying on the cold hard floor. Their faces a painful looking expression of fear and worry... Their eyes full of fear... They looked so very sad ... Their bodies were rigid. They seemed too scared to even move away from me... I spoke softly, I offered them my hand, I did stroke them, and hoped I came across as un-threatening as I could possibly do so... To me, it was as though these two beautiful girls ... These two beautiful living beings ... Hadn't lived at all ... Hadn't experienced anything in life ... They definitely hadn't been shown any love or anything ... I felt as though they'd had their spirit trampled on, and their souls ... Well... they looked so depressed, and like they'd given up on all hope of living a happy life... Harsh I know, but true. They were so sad, and made me feel so sad for them too.
All the dogs at the centre go outside to play 4 times a day on average. These girls could only cope with going out once ... They spent their half hour just cowering in the corner together ... they had a nose at the big sandschool, but the big outside open world is just too scary for them ! So they cuddled together in the corner of the corridor ... I compared them to all the other scared dogs on my section - whose tails lifted, and who leapt and bounded around once they went outside to play... Afterwards though, Jenny and June did sit and lay down so we could see them... But when I went over to say hello to them, they'd look up at me so sad and desparately worried... They took themselves away from me, retreated into their bedroom, and curled up into balls to hide their faces...
A little later on Sylvia told us their story ... Jenny and June had been rescued along with their Mum and other siblings, from a local hell hole in Romania, but had since been abandoned and left behind, being thought of as "not pretty" ... They are the sisters no one wanted.Thank God for Simona and Sylvia who saved them and bought them all the way over here for a chance at experiencing a happy life.
We at Many Tears believe Jenny and June are beautiful on the outside as well as on the inside. Unique. Stunning. What do you all think? I can't wait for the day these girls discover happiness and learn what it is to feel loved & be accepted, and lead a normal doggy life. Please can you all keep your fingers crossed for them.
Jenny and June are available to foster and adopt from Many Tears Animal Rescue. We will of course keep you updated with their progress.</p>
                            </div>
                          </article>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion2Heading2" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse2" aria-controls="accordion2Collapse2" aria-expanded="false">PROJECT DOG UPDATES
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
                            <div class="post-single-center"><img class="box-profile-image" src="images/JennyJune.jpg" alt="" width="570" height="389"/>
                            </div>
                            <div class="post-single-fullwidth">
                              <p>Yesterday the rescue centre was bustling ... a happy hive of activity! All the dogs - including the new arrivals - were busy running around, barking, playing, wagging their tails, jumping up and down... All intrigued / happy / excited at being rescued; - with their living conditions and new lives ahead of them... Even the more nervous dogs were up and about playing with their fellow furry friends and having a great time - having a good nose! It was lovely to hear and see!
All, apart from two dogs in one kennel on my section... Kennel 20 was completely silent, still ... I could see names on the board - Jenny and June, and two bowls of food in the bedroom, so there were definitely dogs in there, but I couldn't see or hear them... I entered their kennel and went to introduce myself. I think the pictures speak volumes.
The girls were hiding behind their beds. Laying on the cold hard floor. Their faces a painful looking expression of fear and worry... Their eyes full of fear... They looked so very sad ... Their bodies were rigid. They seemed too scared to even move away from me... I spoke softly, I offered them my hand, I did stroke them, and hoped I came across as un-threatening as I could possibly do so... To me, it was as though these two beautiful girls ... These two beautiful living beings ... Hadn't lived at all ... Hadn't experienced anything in life ... They definitely hadn't been shown any love or anything ... I felt as though they'd had their spirit trampled on, and their souls ... Well... they looked so depressed, and like they'd given up on all hope of living a happy life... Harsh I know, but true. They were so sad, and made me feel so sad for them too.
All the dogs at the centre go outside to play 4 times a day on average. These girls could only cope with going out once ... They spent their half hour just cowering in the corner together ... they had a nose at the big sandschool, but the big outside open world is just too scary for them ! So they cuddled together in the corner of the corridor ... I compared them to all the other scared dogs on my section - whose tails lifted, and who leapt and bounded around once they went outside to play... Afterwards though, Jenny and June did sit and lay down so we could see them... But when I went over to say hello to them, they'd look up at me so sad and desparately worried... They took themselves away from me, retreated into their bedroom, and curled up into balls to hide their faces...
A little later on Sylvia told us their story ... Jenny and June had been rescued along with their Mum and other siblings, from a local hell hole in Romania, but had since been abandoned and left behind, being thought of as "not pretty" ... They are the sisters no one wanted.Thank God for Simona and Sylvia who saved them and bought them all the way over here for a chance at experiencing a happy life.
We at Many Tears believe Jenny and June are beautiful on the outside as well as on the inside. Unique. Stunning. What do you all think? I can't wait for the day these girls discover happiness and learn what it is to feel loved & be accepted, and lead a normal doggy life. Please can you all keep your fingers crossed for them.
Jenny and June are available to foster and adopt from Many Tears Animal Rescue. We will of course keep you updated with their progress.</p>
                            </div>
                          </article>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion2Heading3" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse3" aria-controls="accordion2Collapse3" aria-expanded="false">INTRODUCING OUR PROJECT DOGS - PART 3
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
                            <div class="post-single-center"><img class="box-profile-image" src="images/JennyJune.jpg" alt="" width="570" height="389"/>
                            </div>
                            <div class="post-single-fullwidth">
                              <p>Yesterday the rescue centre was bustling ... a happy hive of activity! All the dogs - including the new arrivals - were busy running around, barking, playing, wagging their tails, jumping up and down... All intrigued / happy / excited at being rescued; - with their living conditions and new lives ahead of them... Even the more nervous dogs were up and about playing with their fellow furry friends and having a great time - having a good nose! It was lovely to hear and see!
All, apart from two dogs in one kennel on my section... Kennel 20 was completely silent, still ... I could see names on the board - Jenny and June, and two bowls of food in the bedroom, so there were definitely dogs in there, but I couldn't see or hear them... I entered their kennel and went to introduce myself. I think the pictures speak volumes.
The girls were hiding behind their beds. Laying on the cold hard floor. Their faces a painful looking expression of fear and worry... Their eyes full of fear... They looked so very sad ... Their bodies were rigid. They seemed too scared to even move away from me... I spoke softly, I offered them my hand, I did stroke them, and hoped I came across as un-threatening as I could possibly do so... To me, it was as though these two beautiful girls ... These two beautiful living beings ... Hadn't lived at all ... Hadn't experienced anything in life ... They definitely hadn't been shown any love or anything ... I felt as though they'd had their spirit trampled on, and their souls ... Well... they looked so depressed, and like they'd given up on all hope of living a happy life... Harsh I know, but true. They were so sad, and made me feel so sad for them too.
All the dogs at the centre go outside to play 4 times a day on average. These girls could only cope with going out once ... They spent their half hour just cowering in the corner together ... they had a nose at the big sandschool, but the big outside open world is just too scary for them ! So they cuddled together in the corner of the corridor ... I compared them to all the other scared dogs on my section - whose tails lifted, and who leapt and bounded around once they went outside to play... Afterwards though, Jenny and June did sit and lay down so we could see them... But when I went over to say hello to them, they'd look up at me so sad and desparately worried... They took themselves away from me, retreated into their bedroom, and curled up into balls to hide their faces...
A little later on Sylvia told us their story ... Jenny and June had been rescued along with their Mum and other siblings, from a local hell hole in Romania, but had since been abandoned and left behind, being thought of as "not pretty" ... They are the sisters no one wanted.Thank God for Simona and Sylvia who saved them and bought them all the way over here for a chance at experiencing a happy life.
We at Many Tears believe Jenny and June are beautiful on the outside as well as on the inside. Unique. Stunning. What do you all think? I can't wait for the day these girls discover happiness and learn what it is to feel loved & be accepted, and lead a normal doggy life. Please can you all keep your fingers crossed for them.
Jenny and June are available to foster and adopt from Many Tears Animal Rescue. We will of course keep you updated with their progress.</p>
                            </div>
                          </article>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion2Heading4" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse4" aria-controls="accordion2Collapse4" aria-expanded="false">INTRODUCING OUR PROJECT DOGS - PART 2
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
                            <div class="post-single-center"><img class="box-profile-image" src="images/JennyJune.jpg" alt="" width="570" height="389"/>
                            </div>
                            <div class="post-single-fullwidth">
                              <p>Yesterday the rescue centre was bustling ... a happy hive of activity! All the dogs - including the new arrivals - were busy running around, barking, playing, wagging their tails, jumping up and down... All intrigued / happy / excited at being rescued; - with their living conditions and new lives ahead of them... Even the more nervous dogs were up and about playing with their fellow furry friends and having a great time - having a good nose! It was lovely to hear and see!
All, apart from two dogs in one kennel on my section... Kennel 20 was completely silent, still ... I could see names on the board - Jenny and June, and two bowls of food in the bedroom, so there were definitely dogs in there, but I couldn't see or hear them... I entered their kennel and went to introduce myself. I think the pictures speak volumes.
The girls were hiding behind their beds. Laying on the cold hard floor. Their faces a painful looking expression of fear and worry... Their eyes full of fear... They looked so very sad ... Their bodies were rigid. They seemed too scared to even move away from me... I spoke softly, I offered them my hand, I did stroke them, and hoped I came across as un-threatening as I could possibly do so... To me, it was as though these two beautiful girls ... These two beautiful living beings ... Hadn't lived at all ... Hadn't experienced anything in life ... They definitely hadn't been shown any love or anything ... I felt as though they'd had their spirit trampled on, and their souls ... Well... they looked so depressed, and like they'd given up on all hope of living a happy life... Harsh I know, but true. They were so sad, and made me feel so sad for them too.
All the dogs at the centre go outside to play 4 times a day on average. These girls could only cope with going out once ... They spent their half hour just cowering in the corner together ... they had a nose at the big sandschool, but the big outside open world is just too scary for them ! So they cuddled together in the corner of the corridor ... I compared them to all the other scared dogs on my section - whose tails lifted, and who leapt and bounded around once they went outside to play... Afterwards though, Jenny and June did sit and lay down so we could see them... But when I went over to say hello to them, they'd look up at me so sad and desparately worried... They took themselves away from me, retreated into their bedroom, and curled up into balls to hide their faces...
A little later on Sylvia told us their story ... Jenny and June had been rescued along with their Mum and other siblings, from a local hell hole in Romania, but had since been abandoned and left behind, being thought of as "not pretty" ... They are the sisters no one wanted.Thank God for Simona and Sylvia who saved them and bought them all the way over here for a chance at experiencing a happy life.
We at Many Tears believe Jenny and June are beautiful on the outside as well as on the inside. Unique. Stunning. What do you all think? I can't wait for the day these girls discover happiness and learn what it is to feel loved & be accepted, and lead a normal doggy life. Please can you all keep your fingers crossed for them.
Jenny and June are available to foster and adopt from Many Tears Animal Rescue. We will of course keep you updated with their progress.</p>
                            </div>
                          </article>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion2Heading5" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse5" aria-controls="accordion2Collapse5" aria-expanded="false">INTRODUCING OUR PROJECT DOGS
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
                            <div class="post-single-center"><img class="box-profile-image" src="images/JennyJune.jpg" alt="" width="570" height="389"/>
                            </div>
                            <div class="post-single-fullwidth">
                              <p>Yesterday the rescue centre was bustling ... a happy hive of activity! All the dogs - including the new arrivals - were busy running around, barking, playing, wagging their tails, jumping up and down... All intrigued / happy / excited at being rescued; - with their living conditions and new lives ahead of them... Even the more nervous dogs were up and about playing with their fellow furry friends and having a great time - having a good nose! It was lovely to hear and see!
All, apart from two dogs in one kennel on my section... Kennel 20 was completely silent, still ... I could see names on the board - Jenny and June, and two bowls of food in the bedroom, so there were definitely dogs in there, but I couldn't see or hear them... I entered their kennel and went to introduce myself. I think the pictures speak volumes.
The girls were hiding behind their beds. Laying on the cold hard floor. Their faces a painful looking expression of fear and worry... Their eyes full of fear... They looked so very sad ... Their bodies were rigid. They seemed too scared to even move away from me... I spoke softly, I offered them my hand, I did stroke them, and hoped I came across as un-threatening as I could possibly do so... To me, it was as though these two beautiful girls ... These two beautiful living beings ... Hadn't lived at all ... Hadn't experienced anything in life ... They definitely hadn't been shown any love or anything ... I felt as though they'd had their spirit trampled on, and their souls ... Well... they looked so depressed, and like they'd given up on all hope of living a happy life... Harsh I know, but true. They were so sad, and made me feel so sad for them too.
All the dogs at the centre go outside to play 4 times a day on average. These girls could only cope with going out once ... They spent their half hour just cowering in the corner together ... they had a nose at the big sandschool, but the big outside open world is just too scary for them ! So they cuddled together in the corner of the corridor ... I compared them to all the other scared dogs on my section - whose tails lifted, and who leapt and bounded around once they went outside to play... Afterwards though, Jenny and June did sit and lay down so we could see them... But when I went over to say hello to them, they'd look up at me so sad and desparately worried... They took themselves away from me, retreated into their bedroom, and curled up into balls to hide their faces...
A little later on Sylvia told us their story ... Jenny and June had been rescued along with their Mum and other siblings, from a local hell hole in Romania, but had since been abandoned and left behind, being thought of as "not pretty" ... They are the sisters no one wanted.Thank God for Simona and Sylvia who saved them and bought them all the way over here for a chance at experiencing a happy life.
We at Many Tears believe Jenny and June are beautiful on the outside as well as on the inside. Unique. Stunning. What do you all think? I can't wait for the day these girls discover happiness and learn what it is to feel loved & be accepted, and lead a normal doggy life. Please can you all keep your fingers crossed for them.
Jenny and June are available to foster and adopt from Many Tears Animal Rescue. We will of course keep you updated with their progress.</p>
                            </div>
                          </article>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>




                  <div class="tab-pane fade" id="tabs-1-3">
                    <h3>Top 4 Dog Breeds you Can Easily Take To Work</h3>
                      <ul class="post-meta">
                        <li><span class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                          <time datetime="2016-01-01">19 February 2016</time>
                        </li>
                        <li><span class="icon icon-xs icon-tan-hide mdi mdi-thumb-up"></span><span>23</span></li>
                        <li><span class="icon icon-xs icon-tan-hide mdi mdi-comment-outline"></span><span>6</span></li>
                      </ul>
                      <div class="range range-sm-center">
                        <div class="cell-sm-9 cell-md-12">
                          <article class="post-single">
                            <div class="post-single-left"><img class="box-profile-image" src="images/post-single-1-570x389.jpg" alt="" width="570" height="389"/>
                            </div>
                            <div class="post-single-body">
                              <p class="post-single-title">Bringing Your Dog to Work</p>
                              <p>A dog in the workplace provides many positive benefits. However, before you decide to bring your dog to work with you check your company policies about a pet at the business.</p>
                              <p>Bringing a dog to work may have been unheard of in the past, but many companies are now allowing their employees to have man's best friend accompany them to the office. Of course, there's a difference between a well-behaved, friendly canine residing at a colleague's desk and having the pet distract and disrupt the working environment. If you are looking for a dog to bring to the office, here are a few good choices.</p>
                              <ul class="marked-list">
                                <li>Flat-Coated Retriever</li>
                                <li>English Cocker Spaniel</li>
                                <li>Irish Water Spaniel</li>
                                <li>Miniature Schnauzer</li>
                              </ul>
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
      </section>
@endsection