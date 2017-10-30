<?php namespace App\Http\Controllers;

class Lesson5Controller extends Controller
{
    private $data;

    /**
     * Lesson5Controller constructor.
     * @internal param array $data
     */
    public function __construct()
    {
        $this->data            = [];
        $this->data['default'] = ['data1', 'data2', 'data3'];
    }


    public function assoc()
    {
        return view('layout.lesson5.lesson5_default', ['data' => $this->data]);
    }

    public function compact()
    {
        $data = $this->data;

        return view('layout.lesson5.lesson5_default', compact('data'));
    }

    public function with()
    {
        return view('layout.lesson5.lesson5_default')->with('data', $this->data);
    }

    public function with_constraint()
    {
        return view('layout.lesson5.lesson5_default')->withData($this->data);
    }

    public function combined()
    {
        $otherData = $this->data['default'];

        return view('layout.lesson5.lesson5_default', compact('otherData'))->withOtherOtherData($this->data['default'])->with('data', $this->data);
    }


}
