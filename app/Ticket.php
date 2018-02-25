<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;
use App\Comment;

class Ticket extends Model
{
	protected $fillable = [
    	'ticket_title', 'ticket_priority', 'ticket_message', 'ticket_status', 'ticket_author', 'ticket_image'
    ];

    public function comments()
	{
    	return $this->hasMany(Comment::class);
	}

}
