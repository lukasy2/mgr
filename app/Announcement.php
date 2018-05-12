<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Announcement extends Model
{
    protected $table = "announcements";
    protected $fillable = [
        'title', 'short_description', 'body'
    ];
    public function postedBy()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function save(array $options = [])
    {

        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->id;
        }

        parent::save();
    }
    
}
