<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public static function boot()
    {
      static::saved(function($u){
        \Storage::disk("public")->createDirectory("files/".$u->id);
      });
      static::deleting(function($u){
        \Storage::disk("public")->deleteDirectory("files/".$u->id);
      });
    }
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

    public function trackings()
    {
      return $this->hasMany(Tracking::class);
    }
}
