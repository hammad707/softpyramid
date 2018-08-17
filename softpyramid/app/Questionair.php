<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionair extends Model
{
     use SoftDeletes;
	 
	 protected $table = "questionair"; //Set the table for user status
	  
	  public $timestamps = true;
   	  protected $softDelete = true;
	  //These are the parameter which are allowed to save and update.
    	protected $fillable = [
		'id',
		'name',
		'total_questions',
		'duration',
		'resumable',
		'ispublish',
		'user_id'
	 ];
	 
	 
    /*
     * One to many relation with users table
     * @author Hammad Ali <hammad.ali.707@gmail.com>
     */

    public function usersInfo()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
