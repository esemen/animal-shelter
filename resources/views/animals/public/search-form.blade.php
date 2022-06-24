@if($animalType->name == 'Dog' || $animalType->name == 'Cat')
<section class="section mt-5 bg-white text-center">
    <div class="shell">
        <div class="box-form box-form-1">
            <form method="GET">
                <h3>Meet our {{ Str::plural(str_replace('Other', '', $animalType->name)) }}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger col-xs-12 mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ str_replace('id ', '', str_replace('state.', '', $error)) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="range range-xs-center range-sm-bottom spacing-30">
                    <div class="cell-xs-10 cell-sm-6 cell-md-4">
                        <div class="form-group">
                            <label class="form-label-outside" for="form-postcode">Please enter Postcode Here</label>
                            <input name="postcode" class="form-control" id="postcode" placeholder="SA14 7HB"
                                   value="{{ old('postcode', request('postcode')) }}">
                        </div>
                    </div>
                    <div class="cell-xs-10 cell-sm-6 cell-md-4">
                        <div class="form-group">
                            <label class="form-label-outside" for="form-distance">Miles willing to travel</label>
                            <!--Select 2-->
                            <select class="form-control select-filter" id="form-distance"
                                    name="distance">
                                <option value="">Any</option>
                                @foreach ([25,50,100,250,500] as $miles)
                                    <option value="{{ $miles }}"
                                        {{ $miles === old('distance', request('distance')) ? 'selected' : null }}>{{ $miles }}
                                        miles
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="cell-xs-10 cell-sm-6 cell-md-4">
                        <div class="form-group">
                            <label class="form-label-outside" for="name">Name
                                of {{ str_replace('Other', '', $animalType->name) }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name', request('name')) }}"
                                   placeholder="Lassie">
                        </div>
                    </div>
                    <div class="cell-xs-10 cell-sm-6 cell-md-4">
                        <div class="form-group">
                            <label class="form-label-outside" for="form-sex">Gender</label>
                            <!--Select 2-->
                            <select class="form-control select-filter" id="form-sex" data-placeholder="All"
                                    value="" name="gender">
                                <option value="">All</option>
                                <option
                                    value="female" {{ (old('gender', request('gender')) === 'female' ? 'selected' : null) }}>
                                    Female
                                </option>
                                <option
                                    value="male" {{ (old('gender', request('gender')) === 'male' ? 'selected' : null) }}>
                                    Male
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="cell-xs-10 cell-sm-6 cell-md-4">
                           <div class="form-group">
                               <label class="form-label-outside" for="age_from">Age From</label>
                               <input type="number" placeholder="1" class="form-control col-xs-4 col-sm-4 col-md-4" name="age_from" value="{{ old('age_from', request('age_from')) }}">
                               <select class="form-control select-filter col-xs-8 col-sm-8 col-md-8" data-placeholder="All"
                                       value="{{ old('date_type_from', request('date_type_from')) }}" name="date_type_from">
                                   <option value="">All</option>
                                   <option value="week" {{ (old('date_type_from', request('date_type_from')) === 'week' ? 'selected' : null) }}>Weeks</option>
                                   <option value="month" {{ (old('date_type_from', request('date_type_from')) === 'month' ? 'selected' : null) }}>Months</option>
                                   <option value="year" {{ (old('date_type_from', request('date_type_from')) === 'year' ? 'selected' : null) }}>Years</option>
                               </select>
                        </div>
                    </div>
                    <div class="cell-xs-10 cell-sm-6 cell-md-4">
                        <div class="form-group">
                            <label class="form-label-outside" for="age_to">Age To</label>
                            <input type="number" placeholder="1" class="form-control col-xs-4 col-sm-4 col-md-4" name="age_to" value="{{ old('age_to', request('age_to')) }}">
                            <select class="form-control select-filter col-xs-8 col-sm-8 col-md-8" data-placeholder="All"
                                    value="{{ old('date_type_to', request('date_type_to')) }}" name="date_type_to">
                                <option value="">All</option>
                                <option value="week" {{ (old('date_type_to', request('date_type_to')) === 'week' ? 'selected' : null) }}>Weeks</option>
                                <option value="month" {{ (old('date_type_to', request('date_type_to')) === 'month' ? 'selected' : null) }}>Months</option>
                                <option value="year" {{ (old('date_type_to', request('date_type_to')) === 'year' ? 'selected' : null) }}>Years</option>
                            </select>
                        </div>
                    </div>
                    <div class="cell-xs-10 cell-sm-6 cell-md-4">
                        <div class="form-group">
                            <label class="form-label-outside" for="name">Breed</label>
                            <select name="breed" id="breed" class="form-control" name="breeds">
                                <option value="">All</option>
                                @foreach($breeds as $breed)
                                    <option value="{{$breed, (old('breed', request('breed')))}}">{{$breed}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="cell-xs-10 cell-sm-6 cell-md-4">
                        <div class="form-group">
                            <label class="form-label-outside" for="days_no">New & Latest Update</label>
                            <select name="days_no" class="form-control" id="days_no">
                                <option value="">Select</option>
                                @foreach([1,2,3,4,5,6,7] as $day)
                                    <option value="{{ $day }}"
                                        {{ $day === old('days_no', request('days_no')) ? 'selected' : null }}">{{ $day }} days</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="cell-xs-10 cell-sm-6 cell-md-4">
                        <div class="form-group">
                            <label class="form-label-outside" for="general_search">General Search
                                of {{ str_replace('Other', '', $animalType->name) }}</label>
                            <input type="text" class="form-control" id="general_search" name="general_search"
                                   value="{{ old('general_search', request('general_search')) }}"
                                   placeholder="Type anything">
                        </div>
                    </div>
                    <div class="cell-xs-12 row">
                        @if($animalType->name === 'Dog')
                            @foreach($animalAttributesDogs as $key => $attribute)
                                <div class="col-lg-3 text-left">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label" for="check_{{ $key }}">
                                                <input class="form-check-input" type="checkbox" name="attributes[]"
                                                       value="{{ $key }}"
                                                       id="check_{{ $key }}" {{ in_array($key, old('attributes', request('attributes')) ?? []) ? 'checked' : null }}>
                                                <div class="d-inline-block ml-3 pl-3">
                                                    {{ $attribute['publicLabel'] }}
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif($animalType->name === 'Cat')
                            @foreach($animalAttributesCats as $key => $attribute)
                                <div class="col-lg-3 text-left">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label" for="check_{{ $key }}">
                                                <input class="form-check-input" type="checkbox" name="attributes[]"
                                                       value="{{ $key }}"
                                                       id="check_{{ $key }}" {{ in_array($key, old('attributes', request('attributes')) ?? []) ? 'checked' : null }}>
                                                <div class="d-inline-block ml-3 pl-3">
                                                    {{ $attribute['publicLabel'] }}
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <button class="btn btn-block btn-primary btn-effect-anis " type="submit">Find Pets</button>

                        </div>
                        &nbsp;
                        <div class="col-xs-12 col-sm-12 col-md-3 pull-right">
                            <a href="{{ url ('adopt-an-animal/dog') }}" class="btn btn-block btn-primary btn-effect-anis">Clear Search</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endif
