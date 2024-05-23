<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
// use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
  use LaratrustUserTrait;
  use HasFactory, Notifiable  ;


  protected $fillable = [
      'name',
      'phone',
      'password',
  ];

  public function scopeWhereRoleNot($query, $role_name)
     {
         return $query->whereHas('roles', function ($q) use ($role_name) {
             return $q->whereNotIn('name', (array)$role_name)
                 ->whereNotIn('id', (array)$role_name);
         });

     }// end of scopeWhereRoleNot

  public function scopeWhenRole($query, $role_id)
  {
      return $query->when($role_id, function ($q) use ($role_id) {
          return $this->scopeWhereRole($q, $role_id);
      });

  }// end of scopeWhenRole


  protected $hidden = [
      'password',
      'remember_token',
  ];

  protected $guard = "admin";

}
