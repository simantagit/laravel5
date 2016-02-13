<?php namespace App;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Article extends Model {

	protected $fillable = [
		'title',
		'body',
		'published_at',
		'user_id'
	];
	
	protected $dates = ['published_at'];
	
	public function scopePublished($query)
	{
		$query->where('published_at','<=',Carbon::now());
	}
	public function scopeUnpublished($query)
	{
		$query->where('published_at','>',Carbon::now());
	}
	/*public function setPublishedAtAttribute($date)
	{
		$this->setAttribtes['published_at'] = Carbon::now();
	}*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function tag()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}
	
	public function getTagListAttribute()
	{
		return $this->tag->lists('id');
	}

}