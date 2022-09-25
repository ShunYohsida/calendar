<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = ['date', 'name'];
    protected $dates = ['date'];
    protected $casts = [
        'date' => 'date:j',
    ];
}
