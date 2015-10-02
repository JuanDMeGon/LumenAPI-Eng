<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $fillable = ['id', 'name', 'address', 'phone', 'profession'];

	protected $hidden = ['created_at', 'updated_at'];

	public function courses()
	{
		return $this->hasMany('App\Course');
	}
}