@extends('layouts.app')
@section('content')
    <style>
        input, label {
            color: #000;
        }

        input {
            border: .5px solid #04BDFF !important;
            margin-top: 5px;
        }

        .policy-check {
            text-transform: none;
        }

    </style>
    <div class="container">
        <div class="card">
            <div class="card-header"
                 style="font-family: 'Neucha',Arial, Helvetca, sans-serif; font-size: 18px; line-height: 24px;">
                <strong>{{ __('Step 1 - Create a new account') }}</strong>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2 row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-8">
                                    <livewire:user-title-input/>
                                </div>
                            </div> <!-- Title -->
                            <div class="form-group mt-2 row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-8">
                                    <input id="first_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           name="first_name"
                                           value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                            </div> <!-- First Name -->
                            <div class="form-group mt-2 row">
                                <label for="last_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-8">
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name"
                                           value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div> <!-- Last Name -->
                            <div class="form-group mt-2 row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-8">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div> <!-- Email -->
                            <div class="form-group mt-2 row">
                                <label for="email_confirmation"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Verify E-Mail Address') }}</label>
                                <div class="col-md-8">
                                    <input id="email_confirmation" type="email"
                                           class="form-control @error('email_confirmation') is-invalid @enderror"
                                           name="email_confirmation"
                                           value="{{ old('email_confirmation') }}" required>
                                </div>
                            </div> <!-- Email -->
                            <div class="form-group mt-2 row">
                                <label for="mobile"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
                                <div class="col-md-8">
                                    <input id="mobile" type="tel"
                                           class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                           value="{{ old('mobile') }}" required>

                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div> <!-- Mobile -->
                            <div class="form-group mt-2 row">
                                <label for="landline"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Landline') }}</label>

                                <div class="col-md-8">
                                    <input id="landline" type="tel"
                                           class="form-control @error('landline') is-invalid @enderror" name="landline"
                                           value="{{ old('landline') }}">

                                    @error('landline')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div> <!-- Landline -->
                            <div class="form-group mt-2 row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div> <!-- Password -->
                            <div class="form-group mt-2 row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="password">
                                </div>
                            </div> <!-- Password Confirmation -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2 row">
                                <label for="search"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address Lookup') }}</label>
                                <div class="col-md-8">
                                    <input id="full_address" type="text"
                                           class="form-control @error('full_address') is-invalid @enderror"
                                           name="full_address"
                                           value="{{ old('full_address') }}" placeholder="Enter Your Postcode">

                                    @error('full_address')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div> <!-- Address Search -->
                            <div class="form-group mt-2 row">
                                <label for="house_no"
                                       class="col-md-4 col-form-label text-md-right">{{ __('House Name/No.') }}</label>
                                <div class="col-md-8">
                                    <input id="house_no" type="text"
                                           class="form-control @error('house_no') is-invalid @enderror" name="house_no"
                                           value="{{ old('house_no') }}">
                                    @error('house_no')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div> <!-- House No -->
                            <div class="form-group mt-2 row">
                                <label for="address1"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address 1') }}</label>
                                <div class="col-md-8">
                                    <input id="address1" type="text"
                                           class="form-control @error('address1') is-invalid @enderror" name="address1"
                                           value="{{ old('address1') }}" required autocomplete="address1">

                                    @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div> <!-- Address 1 -->
                            <div class="form-group mt-2 row">
                                <label for="address2"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address 2') }}</label>
                                <div class="col-md-8">
                                    <input id="address2" type="text"
                                           class="form-control @error('address2') is-invalid @enderror" name="address2"
                                           value="{{ old('address2') }}" required autocomplete="address2">

                                    @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div> <!-- Address 2 -->
                            <div class="form-group mt-2 row">
                                <label for="address3"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address 3') }}</label>
                                <div class="col-md-8">
                                    <input id="address3" type="text"
                                           class="form-control @error('address3') is-invalid @enderror" name="address3"
                                           value="{{ old('address3') }}" required autocomplete="address3">

                                    @error('address3')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div> <!-- Address 3 -->
                            <div class="form-group mt-2 row">
                                <label for="postcode"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>
                                <div class="col-md-8">
                                    <input id="postcode" type="text"
                                           class="form-control @error('postcode') is-invalid @enderror" name="postcode"
                                           value="{{ old('postcode') }}">
                                    @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div> <!-- Postcode -->
                            <div class="form-group mt-2 row">
                                <label for="town" class="col-md-4 col-form-label text-md-right">{{ __('Town') }}</label>
                                <div class="col-md-8">
                                    <input id="town" type="text"
                                           class="form-control @error('town') is-invalid @enderror" name="town"
                                           value="{{ old('town') }}" required autocomplete="town" autofocus>
                                    @error('town')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div> <!-- Town -->
                            <div class="form-group mt-2 row">
                                <label for="county"
                                       class="col-md-4 col-form-label text-md-right">{{ __('County') }}</label>
                                <div class="col-md-8">
                                    <input id="county" type="text"
                                           class="form-control @error('county') is-invalid @enderror" name="county"
                                           value="{{ old('county') }}" autocomplete="county" autofocus>
                                    @error('county')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div> <!-- County -->
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col form-group form-check text-center">
                            <input type="checkbox" class="form-check-input" id="policy" name="policy" value="1">
                            <label class="form-check-label policy-check pl-5" for="policy">I have read the GDPR and
                                Privacy Policy </label>
                            @error('policy')
                            <div class="text-danger mb-5" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col form-group text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('pagespecificscripts')
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var options = {
                types: ["geocode"],
                componentRestrictions: {country: 'UK'}
            }
            var search = document.getElementById("full_address");
            var places = new google.maps.places.Autocomplete(search, options);
            places.addListener("place_changed", function () {
                var place = places.getPlace();
                $('#postcode').val(place.address_components[0].long_name);
                $('#address1').val(place.address_components[1].long_name);
                $('#address2').val(place.address_components[2].long_name);
                $('#address3').val(place.address_components[4].long_name);
                $('#town').val(place.address_components[3].long_name);
            });
        });
    </script>
@endsection

@push('headScripts')
    <script
        src="//maps.googleapis.com/maps/api/js?key=AIzaSyAWhqhiJDIHFhYZ9TCQbNky-WQUi3PCRbM&libraries=places"></script>
@endpush
