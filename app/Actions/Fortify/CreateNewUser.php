<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        Validator::make($input, [
            'rpe' => ['required','unique:users'],
            'nombre' => ['required', 'string'],
            'apellido_pa' => ['required'],
            'apellido_ma' => ['required'],
        ])->validate();

        return User::create([
            'rpe' => $input['rpe'],
            'nombre' => $input['nombre'],
            'apellido_pa' => $input['apellido_pa'],
            'apellido_ma' => $input['apellido_ma'],
        ]);
    }
}
