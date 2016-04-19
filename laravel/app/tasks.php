<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id','name', 'slug','completed','description'];
    public function swati()
    {
       return $this->belongsTo('App\Project', 'project_id');
    }

}
