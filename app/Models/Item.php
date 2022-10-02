<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'user_name',
        'name',
        'status',
        'type',
        'detail',
    ];

    const TYPE = [
        1 => ' 本',
        2 => '家電',
        3 => '食品',
        4 => 'エンターテインメント',
        5 => '衣類',
        6 => '日用品',
        7 => '人間',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
