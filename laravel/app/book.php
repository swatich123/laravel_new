<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bookname', 'description', 'author', 'publisher', 'published_on'];

}
