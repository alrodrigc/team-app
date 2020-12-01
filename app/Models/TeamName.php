<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamName extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'name';
    protected $keyType = 'string';
    protected $fillable = ['name', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function votes()
    {
        return $this->hasMany('App\Models\Vote', $foreignKey = 'team_name_id');
    }
}
