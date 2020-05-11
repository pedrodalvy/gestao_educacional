<?php

use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use \App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'admin@admin.com',
            'enrolment' => 100001,
        ])->each(function (User $user) {
            $profile = factory(UserProfile::class)->make();
            $user->profile()->create($profile->toArray());

            User::assignRole($user, User::ROLE_ADMIN);
            User::assignEnrolment($user, User::ROLE_ADMIN);

            $user->save();
        });

        factory(User::class, 10)->create()->each(function (User $user) {
            if (!$user->userable) {
                $profile = factory(UserProfile::class)->make();
                $user->profile()->create($profile->toArray());

                User::assignRole($user, User::ROLE_TEACHER);
                User::assignEnrolment($user, User::ROLE_TEACHER);
                $user->save();
            }
        });

        factory(User::class, 30)->create()->each(function (User $user) {
            if (!$user->userable) {
                $profile = factory(UserProfile::class)->make();
                $user->profile()->create($profile->toArray());

                User::assignRole($user, User::ROLE_STUDENT);
                User::assignEnrolment($user, User::ROLE_STUDENT);
                $user->save();
            }
        });
    }
}
