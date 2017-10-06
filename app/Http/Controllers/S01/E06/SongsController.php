<?php namespace App\Http\Controllers\S01\E06;

use App\Http\Controllers\Controller;

class SongsController extends Controller
{
    private $songs;

    /**
     * SongsController constructor.
     */
    public function __construct()
    {
        $this->songs = [
            'Song 1',
            'Song 2',
            'Song 3',
            'Song 4',
            'Song 5',
        ];
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
        $songs = $this->bucket();

        return view('layout.s01.e06.songlist.s01_e06_songlist_default', compact('songs'));
    }

    /**
     * @param int|null $id
     * @return array|string
     */
    private function bucket($id = null)
    {
        if (is_null($id))
        {
            return $this->songs;
        }
        else
        {
            return $this->songs[$id];
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
