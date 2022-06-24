@extends('layouts.app')

@section('content')
    <style>
        input, label {
            color: #000;
        }
        input {
            border: .5px solid #04BDFF!important;
            margin-top: 5px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <livewire:profile-form/>
            </div>
        </div>
    </div>
@endsection

@section('pagespecificscripts')
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function()
        {
            var options = {
                types: ["geocode"],
                componentRestrictions: {country: 'UK'}
            }
            var search = document.getElementById("full_address");
            var places = new google.maps.places.Autocomplete(search, options);
            places.addListener("place_changed", function () {
                var place = places.getPlace();

                let addressParts = {
                    address: document.getElementById("full_address").value,
                    postcode: place.address_components[0].long_name,
                    address1: place.address_components[1].long_name,
                    address2: place.address_components[2].long_name,
                    address3: place.address_components[4].long_name,
                    town: place.address_components[3].long_name,
                }

                Livewire.emit('addressSelected', addressParts);
            });
        });
    </script>
@endsection
