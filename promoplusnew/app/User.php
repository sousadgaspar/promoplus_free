<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Company;
use App\Role;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function company () {

        return $this->belongsTo(Company::class);

    }


    public function role () {

        return $this->belongsTo(Role::class);

    }


    public function noLonguerNeedToChangePassword () {

        $this->password_has_to_be_changed = 0;

    }


    public function produceIfNotExists () {

        if(count(static::all()->toArray()) > 0 )
            return __CLASS__ . ": exists";


            $this->name = "admin";

            $this->email = 'admin@company.com';

            $this->password = bcrypt("123");

            $this->role_id = Role::first()->id;

            $this->company_id = Company::first()->id;

            $this->save();


    }
}
