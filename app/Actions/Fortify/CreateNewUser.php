<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Services\Coordinates;
use App\Services\Geocode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $coordinates = null;

        Validator::make($input, [
            'policy' => ['required', 'accepted'],
            'title' => ['required', 'string', 'max:10'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'confirmed', 'string', 'email', 'max:255',
                Rule::unique(User::class),
            ],
            'mobile' => ['required', 'numeric', 'min:11'],
            'landline' => ['numeric', 'min:11'],
            'postcode' => ['required', 'regex:/(^[\pL0-9 ]+)$/u', 'min:3'],
            'password' => $this->passwordRules(),
        ])->after(function($validator) use (&$coordinates) {
                $geocode = resolve(Geocode::class);
                if ($geocode->loadAddress(request('postcode')) && $geocode->getTypes()->contains('postal_code')) {
                    $coordinates = $geocode->getCoordinates();
                }
                else {
                    $validator->errors()->add(
                        'postcode', 'Invalid postcode ' . request('postcode')
                    );
                }
        })->validate();

        return User::create([
            'title' => $input['title'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'house_no' => $input['house_no'],
            'address1' => $input['address1'],
            'address2' => $input['address2'],
            'address3' => $input['address3'],
            'town' => $input['town'],
            'county' => $input['county'],
            'postcode' => $input['postcode'],
            'landline' => $input['landline'],
            'mobile' => $input['mobile'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'latitude' => $coordinates->lat,
            'longitude' => $coordinates->lng,
        ]);
    }
}
