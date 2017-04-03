<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name', 
        'email', 
        'password',
        'gender',
        'birthday',
        'image',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [  
        'password', 
        'remember_token'
    ];

    // A user has many movies.

    public function movies(){
        return $this->hasMany('App\Movie');
    }

    // A user has many genres.

    public function genres(){
        return $this->hasMany('App\Genre');
    }

    // A user has many ratings.

    public function ratings(){
        return $this->hasMany('App\Rating');
    }

    // A user has many directors.

    public function directors(){
        return $this->hasMany('App\Director');
    }

    // A user has many writers.

    public function writers(){
        return $this->hasMany('App\Writer');
    }

    // A user has many casts.

    public function casts(){
        return $this->hasMany('App\Cast');
    }

    // A user has many labels.

    public function labels(){
        return $this->hasMany('App\Label');
    }

    // A user can have many userlists.

    public function userlists(){
        return $this->hasMany('App\Userlist');
    }
    
}