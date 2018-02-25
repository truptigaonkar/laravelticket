<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;
use App\Comment;

class Comment extends Model
{
    public function ticket()
	{
	    return $this->belongsTo(Ticket::class);
	}
}
