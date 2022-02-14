<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Account extends Authenticatable
{
    use HasFactory;
    protected $table = 'account';
    protected $primaryKey = 'account_id';
    protected $fillable = [
        'role_id',
        'gender_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'display_picture_link',
        'delete_flag',
        'modified_at',
        'modified_by'
    ];
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'gender_id');
    }
}
