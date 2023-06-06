<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'food',
        'client',
        'amount',
        'price',
        'is_paid',
        'date',
        
    ];

    public function client()
    {
        return $this->belongsTo(student::class, 'client', 'id');
    }

    public function food()
    {
        return $this->belongsTo(food::class, 'food', 'id');
    }

    public function order()
    {
        return $this->hasMany(order::class);
    }

    


}