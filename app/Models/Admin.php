<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

     use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'number',
        'date_birth',
        'address',
        'image',
        'admin_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function creator(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function subordinates(){
        return $this->hasMany(Admin::class, 'admin_id');
    }
}
