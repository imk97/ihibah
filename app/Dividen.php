<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dividen extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank', 'account', 'reference', 'startDura', 'endDura', 'month', 'interest', 'lastDura', 'valLastDura', 'total', 'accBill'
    ];
}
