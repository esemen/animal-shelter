<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\Geocode;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        User::factory(20)->create();

        $users = User::take(3)->get();
        $users->each(function ($user) {
            $geocode = resolve(Geocode::class);
            if ($geocode->loadAddress($user->postcode)) {
                $coordinates = $geocode->getCoordinates();
            }

            $user->fill([
                'latitude' => $coordinates->lat ?? 50.33,
                'longitude' => $coordinates->lng ?? -0.55,
                'full_address' => $geocode->getFormattedAddress()
            ])->save();
        }); */

        $user = User::factory()->create(['email' => 'admin@admin.com']);
        $user->assignRole('Super Admin');

        /*        $roles = Role::all();

        for ($i = 1; $i <= 5; $i++) {
            $user = User::factory()->create(['email' => 'level' . $i . '@admin.com']);
            $user->assignRole($roles[$i]);
        }*/
    }
}
