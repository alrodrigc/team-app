<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['user_id', 'team_name_id', 'created_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function teamName()
    {
        return $this->belongsTo('App\Models\TeamName', $ownerKey = 'name');
    }
}
