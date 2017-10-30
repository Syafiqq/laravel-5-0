<?php namespace App;

use App\Model\Translator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Song
 * @package App
 */
class Song extends Model
{
    use SoftDeletes;
    use Translator;

    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * @var string
     */
    protected $table = 'songs';
    /**
     * @var array
     */
    protected $dates = ['delete_at'];
    /**
     * @var array
     */
    protected $guarded = ['id', 'create_at', 'update_at', 'delete_at'];
    /**
     * @var array
     */
    protected $fillable = ['song', 'lyric'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @param $value
     * @return int
     */
    public static function decode($value)
    {
        return Song::hash(base_convert($value, 33, 10));
    }

    /**
     * @return string
     */
    public function encode()
    {
        return base_convert(Song::hash($this->attributes['id']), 10, 33);
    }

    /**
     * @param $value
     * @return int
     */
    public static function hash($value)
    {
        return (((0x0000FFFF & $value) << 16) + ((0xFFFF0000 & $value) >> 16));
    }

    /**
     * @return string
     */
    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

    /**
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->getAttribute('id');
    }
}
