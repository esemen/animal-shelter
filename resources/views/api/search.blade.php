{{-- @extends('../layouts.app') --}}

<section class="section-md-bottom bg-white">

<div class="shell">
<div class="box-form box-form-1">
<!-- RD Mailform-->
<form method="GET" action="{{route('adopt-a-pet/search')}}">
<div class="range range-xs-center range-sm-bottom spacing-30">
<div class="cell-xs-10 cell-sm-6 cell-md-4">
<div class="form-group">
<label class="form-label-outside" for="form-postcode">Please enter Postcode Here</label>
<input type="postcode" class="form-control" id="postcode" placeholder="E.G. E1 1DU" disabled>
</div>
</div>
<div class="cell-xs-10 cell-sm-6 cell-md-4">
<div class="form-group">
<label class="form-label-outside" for="form-location">Miles willing to travel</label>
<!--Select 2-->
<select class="form-control select-filter" id="form-location"
disabled name="location">
<option value="">Choose location</option>
</select>
</div>
</div>
<div class="cell-xs-10 cell-sm-6 cell-md-4">
<div class="form-group">
<label class="form-label-outside" for="name">Name of Dog</label>
<input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Ruby....">
</div>
</div>
<div class="cell-xs-10 cell-sm-6 cell-md-4">
<div class="form-group">
<label class="form-label-outside" for="form-sex">Sex</label>
<!--Select 2-->
<select class="form-control select-filter" id="form-sex" data-placeholder="All"
value="" name="sex">
<option value="{{old('sex')}}">All</option>
<option value="female">Female</option>
<option value="male">Male</option>
</select>
</div>
</div>
<div class="cell-xs-10 cell-sm-6 cell-md-4">
<div class="form-group">
<label class="form-label-outside" for="name">Colour</label>
<input type="text" class="form-control" id="colour" name="colour" value="{{old('colour')}}" placeholder="Mixed....">
</div>
</div>
<div class="cell-xs-10 cell-sm-6 cell-md-4">
<div class="form-group">
<label class="form-label-outside" for="name">Breed</label>
<input type="text" class="form-control" id="breed" name="breed" value="{{old('breed')}}" placeholder="Mixed....">
</div>
</div>
<div class="cell-xs-10 cell-sm-6 cell-md-3">
<div class="form-group">
<div class="form-check">
<label class="form-check-label" for="defaultCheck1">
    Good with Cats
</label>
<input class="form-check-input" type="checkbox" value="" id="goodwithcats" disabled>
</div>
</div>
</div>
<div class="cell-xs-10 cell-sm-6 cell-md-3">
<div class="form-group">
<div class="form-check">
<label class="form-check-label" for="defaultCheck1">
    Good with Children
</label>
<input class="form-check-input" type="checkbox" value="" id="goodwithchildren" disabled>
</div>
</div>
</div>
<div class="cell-xs-10 cell-sm-6 cell-md-3">
<div class="form-group">
<div class="form-check">
<label class="form-check-label" for="bondedpair">
    Bonded Pair
</label>
<input class="form-check-input" type="checkbox" value="" id="bondedpair">
</div>
</div>
</div>
<div class="cell-xs-10 cell-sm-6 cell-md-3">
<div class="form-group">
<div class="form-check">
<label class="form-check-label" for="only_pet">
    Only dog
</label>
<input class="form-check-input" type="checkbox" value="1" id="only_pet" name="only_pet" value="1">
</div>
</div>
</div>
<div class="cell-xs-10 cell-sm-6 cell-md-4">
<div class="form-group">
<button class="btn btn-block btn-primary btn-effect-anis" type="submit">Find Dogs</button>
</div>
</div>
</div>
</form>
</div>
</div>
<section>
