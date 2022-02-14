<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'account_id',
        'ebook_id'
    ];
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }
    public function ebook()
    {
        return $this->hasOne(Ebook::class, 'ebook_id', 'ebook_id');
    }
}
