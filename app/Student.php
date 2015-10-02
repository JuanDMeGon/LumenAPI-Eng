<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $fillable = ['id', 'name', 'address', 'phone', 'career'];

	protected $hidden = ['created_at', 'updated_at'];

	public function courses()
	{
		return $this->belongsToMany('App\Course');
	}
}