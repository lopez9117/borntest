<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model

{

		protected $table = 'posts';

		protected $fillable = [

			'title',
			'author_id',
			'content',

		];
	

	 public function author(){

    		return $this->belongsTo(Author::class);
    }


}