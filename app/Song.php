<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'songs';
    protected $dates = ['delete_at'];
    protected $guarded = ['id', 'create_at', 'update_at', 'delete_at'];
    protected $fillable = ['song', 'lyric'];
    protected $primaryKey = 'id';
}
