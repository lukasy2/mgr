<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;


class PrivateMessage extends Model
{
    protected $table = "private_messages";
    protected $fillable = [
        'title', 'body', 'to_id'
    ];
    public function save(array $options = [])
    {

        if (!$this->from_id && Auth::user()) {
            $this->from_id = Auth::user()->id;
        }
        $this->deleted_by_sender='0';
        $this->deleted_by_receiver='0';

        parent::save();
    }

    public function from() {
        return $this->belongsTo('App\User', 'from_id');
    }

    public function to() {
        return $this->belongsTo('App\User', 'to_id');
    }
}
