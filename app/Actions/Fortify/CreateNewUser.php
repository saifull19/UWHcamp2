<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\DetailUser;

// model spatie
use Spatie\Activitylog\Models\Activity;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);

                
                // add to detail users
                $detail_user = new DetailUSer;
                $detail_user->users_id = $user->id;
                $detail_user->photo = NULL;
                $detail_user->role = 'Member';
                $detail_user->contact_number = NULL;
                $detail_user->address = NULL;
                $detail_user->biography = NULL;
                $detail_user->save();
                
                // add to Activity
                $activity = new Activity;
                $activity->log_name = $user->name;
                $activity->description = 'This user Registration ';
                $activity->subject_type = 'App\Models\User';
                $activity->event = 'Registration';
                $activity->subject_id = $user->id;
                $activity->causer_type = 'App\Models\User';
                $activity->causer_id = $user->id;
                $activity->properties = $user->email;
                $activity->save();
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
