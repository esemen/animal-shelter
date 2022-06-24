@extends('layouts.app')
@section('content')

<!-- Adopt pets-->
<section class="section-md bg-white text-center">
@include('api.search')
<div class="shell">
<div data-content-to="#adopt-dogs">
<h3>Meet our Dogs</h3>
</div>
<div data-content-to="#adopt-cats">
<h3>Meet our Cats</h3>
</div>
<div data-content-to="#adopt-small-pets">
<h3>Small Animals for Adoption</h3>
<p class="big text-width-small">Small animals can be great companions if you cannot afford a
bigger pet or live in a small house, but are looking for someone cute to adopt.</p>
</div>
<!-- Bootstrap tabs-->
<div class="tabs tabs-custom tabs-vertical tabs-corporate tabs-wide" id="tabs-1"
data-url-tabs="true">
<!-- Nav tabs-->
<ul class="nav nav-tabs">
<li class="active"><a href="#adopt-dogs" data-toggle="tab">Our Dogs</a></li>
<li><a href="#adoption-procedures" data-toggle="tab">Adoption Procedures</a></li>
<li><a href="#finding-the-right-dog" data-toggle="tab">Finding The Right Dog</a></li>
<li><a href="#adoption-details" data-toggle="tab">Adoption Details</a></li>
<li><a href="#adoption-advice" data-toggle="tab">Adoption Advice</a></li>
<li><a href="#training-your-dog" data-toggle="tab">Training Your Dog</a></li>
<li><a href="#harness" data-toggle="tab">Finding The Right Harness</a></li>
<li><a href="">Reserved Dogs</a></li>
</ul>
<!-- Tab panes-->
<div class="tab-content">
<!-- Tab 1-->
<div class="tab-pane fade in active" id="adopt-dogs">
<div class="range spacing-30">
@if (session('message'))
<div class="alert alert-success" role="alert">
    {{ session('message') }}
</div>
@endif
@foreach($reserved_pets as $dog)
<div class="cell-xs-12">
    <!-- Thumbnail boxed horizontal-->
    <div class="thumbnail-boxed thumbnail-boxed-horizontal">
        <div class="thumbnail-boxed-left"><a href="{!! route('pet-page.show',$dog->id) !!}">
            <img class="thumbnail-boxed-image"
        src="{{asset('images/thumbpics/'.$dog->id.'_thumb')}}"
        alt="{{$dog->name}}" width="370" height="254"/>


            </a>
        </div>
        <div class="thumbnail-boxed-body">
            <p class="thumbnail-boxed-title">
                <a href="{!! route('pet-page.show',$dog->id) !!}">{{$dog->name}}</a></p>
            <div class="thumbnail-boxed-text">
                {!!$dog -> shortdescription!!}
            </div>
            <div class="thumbnail-boxed-footer">
                <ul class="thumbnail-boxed-meta">
                    <li><i class="fa fa-paw" aria-hidden="true"></i><span>{{$dog->breed}}</span>
                    </li><br>
                    <li><span
                            class="icon icon-xs icon-black-hide material-icons-invert_colors"></span><span>{{$dog->colour}}</span>
                    </li>
                    <li>@if($dog->sex == 'Female')
                        <i class="fa fa-venus" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-mars" aria-hidden="true"></i>
                        @endif
                        <span>{{$dog->sex}}</span>
                    </li>
                    <li><span
                            class="icon icon-xs icon-black-hide material-icons-event_available"></span><span>{{$dog->age}}</span>
                    </li>
                </ul>
                <ul class="thumbnail-boxed-meta">

                    <li>
                        @if($dog->only_animal == '1')
                        <i class="fa fa-meh-o" aria-hidden="true"></i><span>Needs to be the only pet</span>
                        @else
                        <i class="fa fa-heartbeat" aria-hidden="true"></i><span>Frendly with other pets</span>
                        @endif
                    </li><br>
                    <li><span
                            class="icon icon-xs icon-black-hide material-icons-place"></span><span>In foster at {{$dog->doglocation}}</span>
                    </li>
                </ul>
                 <div class="adopt-a-pet">
                    <a class="btn" style="color: #04BDFF" href="{!! route('pet-page.show',$dog->id) !!}">More Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@if ($reserved_pets->onEachSide(4)->links())
<p>{{ "Page " . $reserved_pets->currentPage() . "  of  " . $reserved_pets->lastPage() }}</p>
    <ul class="pagination-custom"
    style="text-align: center; margin: 0 auto; margin-top: 25px; color: #04BDFF">
        @if ($reserved_pets->onFirstPage())
            <li class="disabled"><span>{{ __('Prev') }}</span></li>
        @else
            <li><a href="{{ $reserved_pets->previousPageUrl() }}" rel="prev" aria-label="Previous">{{ __('') }}</a></li>
        @endif
        @if ($reserved_pets->hasMorePages())
            <li><a href="{{ $reserved_pets->nextPageUrl() }}" rel="next" aria-label="Next">{{ __('') }}</a></li>
        @else
            <li class="disabled"><span>{{ __('Next') }}</span></li>
        @endif
    </ul>
@endif
</div>
</div>

<!-- Tab 4-->
<div class="tab-pane fade" id="dog-adoption-procedures">
<div class="range spacing-70">
<div class="cell-md-12"><img class="img-responsive" src="{{asset('images/photos/DSCF9692.jpg')}}"
        alt="" />
</div>
<div class="cell-md-12 text-gray-darker">
    <ul class="marked-list">
        <li>Find a dog you think suits you and your home best. Unsure? Please read
            our Finding the Right Dog (make this a link) section Complete an
            adoption form. Please give as much detail as possible so we can get to
            know you and your situation.</li>
        <li>If you are applying for a pup you will need to have information on puppy
            training classes you will be attending.</li>
        <li>Don't forget if you rent your home you must attach your landlord's
            consent for you to adopt a dog.</li>
        <li>If you work please give the working hours and rota for each working
            member of the household. We regret that we cannot accept applications
            without this information.</li>
        <li>Our rehoming team will contact you as soon as they can via email or
            telephone. If the dog you have chosen is in foster it may be the foster
            carer you hear from first. We need to discuss your application further
            to ensure you are a good match for the dog you have applied for. Please
            do not be offended if you are not the right match, we can always
            transfer an application to a different dog that may suit you better.
        </li>
        <li>Once a dog is reserved for you we will carry out a home visit to ensure
            a dog will be safe and secure with you and so we can verify who you are.
            We aim to do this within a couple of days. Please ensure your fencing is
            as secure as possible and your home and garden are free from hazards to
            help things along.</li>
        <li>If you pass your home check you will be expected to meet/collect the cat
            <strong>within 3 days</strong>. However, if you have school age children
            and can't travel until the weekend we will allow <strong>up to 5
                days</strong> for the 'meet and greet' to take place. If this goes
            well and everyone agrees this is the right cat for you, you will be able
            to take it home with you then. If you are unable to meet this timescale,
            please inform us immediately.</li>
    </ul>
</div>
<div class="cell-md-12"><img class="img-responsive" src="images/photos/DSCF9844.jpg"
        alt="" />
</div>
<div class="cell-md-12 text-gray-darker">
    <p>It is very important to find a dog that will match you and your home.
        Carefully considering what type of dog to adopt can really help avoid the
        disappointment of being turned down. Our priority will always be the dog and
        whilst we don't like turning down an application, we do have to put the
        needs of the dog first so please do not take it personally if we feel the
        dog is not the right match for you. it could be that we have other dogs that
        could be a much better match and if you are happy to be patient and work
        with us, your new companion could be waiting for you!</p>
    <p>To help find the right dog it may help to consider the following situations
        if they apply to you:</p>
    <p><strong>I LIVE IN A FLAT</strong><br>

        We have successfully rehomed dogs to flats, apartments, even houseboats and
        caravans! We do ask that you choose a dog who can happily walk on a lead so
        that you can take them out to the toilet without them being frightened or
        anxious of the lead.<br>

        <strong>Do you live upstairs?</strong> Please consider that as your dog gets
        older you may need to help them up and down those stairs. Would you be able
        to carry a dog if needed now, or even in ten years time? Perhaps that 50kg
        Great Dane isn't quite the right choice but we may have many smaller dogs
        that could be a better match for you!</p>
</div>
<div class="cell-md-12"><img class="img-responsive" src="images/photos/DSCF9903.jpg"
        alt="" />
</div>
<div class="cell-md-12 text-gray-darker">
    <p><strong>I HAVE YOUNG CHILDREN</strong><br>

        If you have small children you will want to choose the right dog and will
        need to take time to consider a new family member very carefully.<br>

        <strong>Are your children relaxed and calm around dogs?</strong> If not,
        then they are not ready to have a dog just yet.<br>

        <strong>Are you prepared to walk the dog in all weathers if you have to take
            your little ones with you?</strong> Not all small children will want to
        walk in the rain but if you have chosen a higher energy dog and you skip
        exercising the dog due to bad weather then your dog may become bored and
        frustrated and show unwanted or negative behaviour.<br>

        <strong>Are your children very young?</strong> Consider choosing a dog that
        is more confident... a scared ex breeding dog will never have seen children
        before and find them a bit much. Also consider avoiding a fragile dog that
        could get hurt by accident by a well meaning child... and avoid a large
        bouncy dog who could accidentally knock a small child!<br>

        <strong>Would you like to adopt a puppy?</strong> Whilst pups can be a great
        match if you have children, you do need to remember that puppy teeth and
        claws are very sharp and excited pups WILL accidentally scratch, bite and
        chew for a while!<br></p>

    <p><strong>I DON'T HAVE A GARDEN</strong><br>

        Are you prepared to get up early and get dressed to walk your dog outside to
        use the toilet before you've had your morning coffee? Are you prepared to
        get your wellies on several times a day in all weathers to allow your dog to
        toilet? Are you prepared for inevitable accidents indoors? Do you have
        somewhere that a dog can go and relax outside and enjoy being outdoors with
        you?</p>
</div>
<div class="cell-md-12"><img class="img-responsive" src="images/photos/DSCF9945.jpg"
        alt="" />
</div>
<div class="cell-md-12 text-gray-darker">
    <p><strong>I AM AN OLDER PERSON</strong><br>

        Being retired and adopting a dog can be perfect for both the adopter and the
        lucky dog that gets to be their companion. Again, the key is finding the
        right match.<br>

        <strong>Are you able to meet the dog's exercise needs?</strong> All dogs
        have different levels of energy, just like we humans do. Finding your
        perfect exercise partner is paramount to any successful adoption. Choosing a
        dog that will run rings around you or is too strong for you could make
        walking a dog a stressful chore, rather than the pleasure it should be.
        Whilst none of us can predict the future, do try to consider your abilities
        both now and in perhaps 5-10 years time.<br>

        <strong>Do you have a support network?</strong> Our most successful
        adoptions are where the adopter has a good network of family or friends to
        step in and offer some practical support if needed.</p>

    <p><strong>I WORK</strong><br>

        We appreciate that most people have to work to be able to provide for their
        dogs. Please bear in mind that most of our dogs have not lived inside before
        and so will need someone at home most of the time to be able to settle it
        into a home environment. The need to teach them about house training and
        other home skills and encourage them to bond with people.</p>

    <p><strong>Do you work more than 5hrs a day?</strong> A dog that has never lived
        indoors won't know about manners, how to behave etc and they need you to be
        there to show them. Leaving a dog several hours a day cannot help them
        settle and you may find that they could start to chew, howl, mess and you
        may end up feeling frustrated and discouraged. Perhaps you can ask family to
        help reduce the time a dog is left alone or choose a confident dog where you
        could use a daycare service</p>

    <p><strong>MY DOG IS NOT NEUTERED</strong><br>

        As a rescue we are very passionate about spaying and neutering for both
        medical and ethical reasons. We see too many dogs with pyometra, mammary
        cancer, testicular cancer, behavioural problems all associated with not
        having a dog neutered. It is heartbreaking to lose a dog on the vets table
        to preventable conditions. We also see far too many unplanned litters of
        pups here at the rescue. By neutering you are able to prevent this from
        happening.</p>

    <p><strong>I still don't want to neuter my dog due to personal preference or
            medical conditions.</strong> We can consider adoptions where the dog is
        the right match. For example if one of our spayed females is rehomed where
        there is an entire male we would expect that the male dog is polite with her
        and not inclined to mount her. Our dogs need to go to loving homes where
        they are free from such harassment. If your dog is a gentleman however, then
        it could be a wonderful match.</p>

    <p><strong>Please note:</strong> Unfortunately we wouldn't be able to place a
        puppy where there are dogs that have not been neutered.</p>

    <p><strong>I RENT MY HOME</strong><br>

        That's ok, we rehome many dogs to homes that are rented. We do have to check
        with your landlord that they are happy for you to have a dog at the
        property. To speed up the applications process please obtain your landlords
        permission in writing <strong>BEFORE</strong> you apply for a dog. We regret
        that we are unable to accept your application without this.</p>
</div>
</div>
</div>
<!-- Tab 4-->
<div class="tab-pane fade" id="cat-adoption-procedures">
<div class="range spacing-70">
<div class="cell-md-12"><img class="img-responsive" src="images/Mallow1.jpg"
        alt="" />
</div>
<div class="cell-md-12 text-gray-darker">
    <ul class="marked-list">
        <li>Find a cat you think suits you and your home best. Unsure? Please read
            Finding the Right Cat.</li>
        <li>Complete an adoption form. Please give as much detail as possible so we
            can get to know you and your situation.</li>
        <li>Don't forget if you rent your home you must attach your landlord's
            consent for you to adopt a cat. If you work please give the working
            hours and rota for each working member of the household. We regret that
            we cannot accept applications without this information.</li>
        <li>Our rehoming team will contact you as soon as they can via email or
            telephone. If the cat you have chosen is in foster it may be the foster
            carer you hear from first. We need to discuss your application further
            to ensure you are a good match for the cat you have applied for. Please
            do not be offended if you are not the right match, we can always
            transfer an application to a different cat that may suit you better.
        </li>
        <li>Once a cat is reserved for you we will carry out a home visit to ensure
            a cat will be safe and secure with you and so we can verify who you are.
            We aim to do this within a couple of days.</li>
        <li>If you pass your home check you will be expected to meet/collect the cat
            <strong>within 3 days</strong>. However, if you have school age children
            and can't travel until the weekend we will allow <strong>up to 5
                days</strong> for the 'meet and greet' to take place. If this goes
            well and everyone agrees this is the right cat for you, you will be able
            to take it home with you then. If you are unable to meet this timescale,
            please inform us immediately.</li>
    </ul>
</div>
<div class="cell-md-12"><img class="img-responsive" src="images/Mallow2.jpg"
        alt="" />
</div>
<div class="cell-md-12 text-gray-darker">
    <ul class="marked-list">
        <li>Please consider <strong>the age of the cat/kitten you want to adopt
                against your own age before applying</strong>. Whilst we understand
            life holds no guarantees Many Tears try to give every cat the best
            possible chance of a home for the rest of its life.</li>
        <li>It can be difficult to resist adopting a cute kitten but you need to
            consider they are full of energy and can cause havoc which is huge fun
            for them but not always to their owners who curtains or soft furnishing
            can get damaged! Kittens demand a lot of time and patience from their
            owners and need feeding 4 times a day at the beginning so if you are
            looking for a calmer, less demanding and more sedate feline addition it
            may be better to look at a cat who is at least a year old and is happy
            to spend time on its own and less likely to get up to mischief! Please
            don’t forget the more senior cats as they really do make wonderful
            additions to a home. The plus side of a senior cat is they sleep a lot
            more so are quieter and less hard work and they are also less likely to
            wander too far from home.</li>
        <li>Many Tears do allow cats to be adopted to homes with children of all
            ages as long as the cat is suitable for that environment. Occasionally
            some of our cats are traumatised and insecure. They may need a lot of
            time spent on them so although we are looking to home all our cats where
            they live as part of the family, occasionally they may need homes which
            are more calm and quiet so we would not home them with children.</li>
        <li>If you already own a dog/cat that is not spayed/neutered we will
            consider your application depending on the cat you are applying for.
            However, Many Tears strongly recommends dogs and cats are
            spayed/neutered for medical and ethical reasons.</li>
        <li>We are looking for wonderful, responsible, forever homes. That means
            asking questions and trying to match the correct pet with the
            prospective family. We are not judgmental but we have a very large
            responsibility to make sure we do what's right for you and especially
            for our charges.<br><br> We do understand that every home is different
            and we do try to take each application individually. If you are in any
            doubt please contact the office.</li>
    </ul>
</div>
</div>
</div>
<!-- Tab 5-->
<div class="tab-pane fade" id="other-adoption-procedures">
<div class="range spacing-70">
<div class="cell-md-12"><img class="img-responsive"
        src="images/OtherAnimals-procedure.jpg" alt="" />
</div>
<div class="cell-md-12 text-gray-darker">
    <ul class="marked-list">
        <li>Once you have completed an application form you will be contacted either
            via email or interviewed over the telephone. We will discuss some of
            your answers in order to ascertain if we think the animal you are
            applying for is a suitable match for your lifestyle. Once it is agreed
            to go ahead with the application, depending on the animal a home check
            will be arranged. This will take place as soon as possible (within 3
            days) so please be prepared to make yourself available to meet the home
            checker.</li>
        <li>A home visit is done to verify that the new home and surrounding area
            will be a safe and secure place for the animal you have applied for to
            live as far as possible. If you pass your home check you will be
            expected to meet/collect the animal <strong>within 3 days</strong>.
            However, if you have school age children and can't travel until the
            weekend we will allow <strong>up to 5 days</strong> for the 'meet and
            greet' to take place. If this goes well and everyone agrees this is the
            right animal for you, you will be able to take it home with you then. If
            you are unable to meet this timescale, please inform us immediately.
        </li>
        <li>In some circumstances you may be asked to provide references.</li>
        <li>Depending on the animal you are adopting you may be asked to sign and
            get your vet to sign a Pre-Agreement stating that you will get it
            spayed/neutered at a certain age and your vet will need to sign to
            confirm they are happy to do this. Many Tears Animal Rescue are not able
            to cover the cost of this and the adopter must be happy to pay for this
            themselves. You will be contacted about this if you fail to return the
            signed copy once the animal is over the agreed spay/neuter date and
            given a chance to send the signed form in or risk us taking action to
            have the animal returned.</li>
        <li>Depending on the animal you are adopting all members of the family may
            be asked to come to meet the animal at the adoption. You will be
            expected to travel to wherever the animal is located in order to meet
            and adopt it. We do not we do not let third parties collect for you or
            deliver animals to their new homes.</li>
    </ul>
</div>
<div class="cell-md-12"><img class="img-responsive"
        src="images/OtherAnimals2-prodecure.jpg" alt="" />
</div>
<div class="cell-md-12 text-gray-darker">
    <ul class="marked-list">
        <li>Please consider <strong>the age of the animal you want to adopt against
                your own age before applying.</strong> Whilst we understand life
            holds no guarantees Many Tears try to give every animal the best
            possible chance of a home for the rest of its life.</li>
        <li>It can be difficult to resist adopting an animal in need but you need to
            consider if you can provide it with the life it needs. If you are
            applying for an animal you have not owned before please be sure you have
            researched their needs and be certain you can provide them with what
            they will need.</li>
        <li>Many Tears allows all its animals to be adopted to homes with children
            of all ages as long as they are suitable for that environment.
            Occasionally some of our animals are traumatised and insecure and may
            need a lot of time spent on them so although we are looking to home all
            our animal there may be occasions we would not home them with children.
        </li>
        <li>If you own a dog or cat that is not spayed/neutered we will consider
            your application. However, Many Tears strongly recommends dogs and cats
            are spayed/neutered for medical and ethical reasons.</li>
        <li>We are looking for wonderful, responsible, forever homes. That means
            asking questions and trying to marry up the correct pet with the
            prospective family. We are not judgmental but we have a very large
            responsibility to make sure we do what's right for you and especially
            for our charges.<br><br> We do understand that every home is different
            and we do try to take each application individually. If you are in any
            doubt please contact the rehoming team.</li>
    </ul>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection
