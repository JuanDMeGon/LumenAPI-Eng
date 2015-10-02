<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = ['id', 'title', 'description', 'value'];

	protected $hidden = ['created_at', 'updated_at'];

	public function students()
	{
		return $this->belongsToMany('App\Student');
	}

	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}
}