<?php namespace App\Http\Controllers\S01\E06;

use App\Http\Controllers\Controller;
use App\Song;

/**
 * Class SongsController
 * @package App\Http\Controllers\S01\E06
 */
class SongsController extends Controller
{
    /**
     * SongsController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param null|int $id
     * @return \Illuminate\View\View
     */
    public function songDispatcher($id = null)
    {
        return is_null($id) ? $this->songList() : $this->songGet($id);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function songList()
    {
        /** @var array $songs */
        $songs = $this->bucket();

        return view('layout.s01.e06.songlist.s01_e06_songlist_default', compact('songs'));
    }

    /**
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|null|static|static[]
     */
    private function bucket($id = null)
    {
        if (is_null($id))
        {
            return Song::all();
        }
        else
        {
            return Song::find($id);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function songGet($id)
    {
        $song = $this->bucket($id);

        return view('layout.s01.e06.songget.s01_e06_songget_default', compact('song'));
    }
}
