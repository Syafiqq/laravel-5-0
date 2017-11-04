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
     * @var Song
     */
    private $songModel;

    /**
     * SongsController constructor.
     * @param Song $songModel
     */
    public function __construct(Song $songModel)
    {
        $this->songModel = $songModel;
    }

    /**
     * @param Song $song
     * @param null|int $id
     * @return \Illuminate\View\View
     */
    public function dispatcher(Song $song, $id = null)
    {
        return is_null($id) ? $this->lists() : $this->find($song, $id);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function lists()
    {
        /** @var array $songs */
        //$songs = $this->bucket($this->songModel);
        $songs = $this->songModel->all();

        return view('layout.s01.e06.songlist.s01_e06_songlist_default', compact('songs'));
    }

    /**
     * @param Song $songModel
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|null|static|static[]
     */
    private function bucket(Song $songModel, $id = null)
    {
        return is_null($id) ? $songModel->all() : $songModel->find($id);
    }

    /**
     * @param Song $songModel
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function find(Song $songModel, $id)
    {
        $song = $this->bucket($songModel, $id);

        return view('layout.s01.e06.songget.s01_e06_songget_default', compact('song'));
    }
}
