<div>
    <div class="card">
        <div class="card-header"
             style="font-family: 'Neucha',Arial, Helvetca, sans-serif; font-size: 18px; line-height: 24px;">
            <strong>{{ __('Edit Profile') }}</strong>
        </div>

        <div class="card-body">
            <form wire:submit.prevent="updateProfile" role="form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row mt-2">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-8">
                                <select name="title" wire:model="selectedTitle"
                                        class="form-control @error('state.title') is-invalid @enderror"
                                        required autofocus>
                                    <option value="">Select</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="title" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-8">
                                <input class="form-control {{ $selectedTitle <> 'Other' ? 'hidden' : null }}"
                                       type="text"
                                       name="title" id="title" wire:model="state.title"
                                       placeholder="Please enter your title"/>
                                @error('state.title')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="first_name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-8">
                                <input id="first_name" type="text" wire:model="state.first_name"
                                       class="form-control @error('state.first_name') is-invalid @enderror"
                                       name="first_name"
                                       value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('state.first_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="last_name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-8">
                                <input id="last_name" type="text" wire:model="state.last_name"
                                       class="form-control @error('state.last_name') is-invalid @enderror"
                                       name="last_name"
                                       value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('state.last_name')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="text" value="{{ auth()->user()->email }}"
                                       class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="mobile"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
                            <div class="col-md-8">
                                <input id="mobile" type="tel" wire:model="state.mobile"
                                       class="form-control @error('state.mobile') is-invalid @enderror" name="mobile"
                                       value="{{ old('mobile') }}" required>

                                @error('state.mobile')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="landline"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Landline') }}</label>
                            <div class="col-md-8">
                                <input id="landline" type="tel" wire:model="state.landline"
                                       class="form-control @error('state.landline') is-invalid @enderror" name="landline"
                                       value="{{ old('landline') }}">

                                @error('state.landline')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mt-2">
                            <label for="search"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Search Address') }}</label>
                            <div class="col-md-8">
                                <input id="full_address" type="text"
                                       class="form-control @error('state.full_address') is-invalid @enderror"
                                       name="full_address"
                                       value="{{ old('full_address') }}" placeholder="Enter Your Postcode">

                                @error('state.full_address')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="house_no"
                                   class="col-md-4 col-form-label text-md-right">{{ __('House Name/No.') }}</label>
                            <div class="col-md-8">
                                <input id="house_no" type="text" wire:model="state.house_no"
                                       class="form-control @error('state.house_no') is-invalid @enderror"
                                       name="house_no"
                                       value="{{ old('house_no') }}">
                                @error('state.house_no')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="address1"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Address 1') }}</label>
                            <div class="col-md-8">
                                <input id="address1" type="text" wire:model="state.address1"
                                       class="form-control @error('state.address1') is-invalid @enderror"
                                       name="address1"
                                       value="{{ old('address1') }}" required autocomplete="address1">

                                @error('state.address1')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="address2"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Address 2') }}</label>
                            <div class="col-md-8">
                                <input id="address2" type="text" wire:model="state.address2"
                                       class="form-control @error('state.address2') is-invalid @enderror"
                                       name="address2"
                                       value="{{ old('address2') }}"  autocomplete="address2">

                                @error('state.address2')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="address3"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Address 3') }}</label>
                            <div class="col-md-8">
                                <input id="address3" type="text" wire:model="state.address3"
                                       class="form-control @error('state.address3') is-invalid @enderror"
                                       name="address3"
                                       value="{{ old('address3') }}" autocomplete="address3">

                                @error('state.address3')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="postcode"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>
                            <div class="col-md-8">
                                <input id="postcode" type="text" wire:model="state.postcode"
                                       class="form-control @error('state.postcode') is-invalid @enderror"
                                       name="postcode"
                                       value="{{old('postcode')}}">
                                @error('state.postcode')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="town" class="col-md-4 col-form-label text-md-right">{{ __('Town') }}</label>
                            <div class="col-md-8">
                                <input id="town" type="text" wire:model="state.town"
                                       class="form-control @error('state.town') is-invalid @enderror" name="town"
                                       value="{{ old('town') }}" required autocomplete="town" autofocus>

                                @error('state.town')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="county"
                                   class="col-md-4 col-form-label text-md-right">{{ __('County') }}</label>
                            <div class="col-md-8">
                                <input id="county" type="text" wire:model="state.county"
                                       class="form-control @error('state.county') is-invalid @enderror" name="county"
                                       value="{{ old('county') }}" autocomplete="county" autofocus>

                                @error('state.county')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center m-0">
                    <div class="form-group row mt-5">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            <a href="{{ route('home') }}" class="btn btn-danger mt-0">{{ __('Cancel') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
