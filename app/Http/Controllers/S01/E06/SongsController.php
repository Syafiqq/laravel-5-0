<?php namespace App\Http\Controllers\S01\E06;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class SongsController extends Controller
{
    /**
     * @var Builder
     */
    private $db;

    /**
     * SongsController constructor.
     */
    public function __construct()
    {
        $this->db = DB::table('songs');;
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
     * @return array|string
     */
    private function bucket($id = null)
    {
        if (is_null($id))
        {
            return $this->db->get();
        }
        else
        {
            return $this->db->find($id);
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
