<?php

namespace App\Models\Thread;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Thread extends Model
{
  use HasApiTokens, HasFactory, Notifiable;

	protected $fillable = ['title', 'body', 'slug', 'channel_id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function replies()
	{
		return $this->hasMany(Reply::class)->orderBy('created_at', 'DESC');
	}

	public function channel()
	{
		return $this->belongsTo(Channel::class);
	}
}
