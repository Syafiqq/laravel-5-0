<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Songs100
 * Check connection DB::connection()->getPdo();
 */
class Songs100 extends Migration
{
    /**
     * @var Illuminate\Database\Schema\Builder
     */
    private $schema;

    /**
     * Songs100 constructor.
     */
    public function __construct()
    {
        $this->schema = \Illuminate\Support\Facades\Schema::getFacadeRoot();
    }


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var Illuminate\Database\Connection $db */
        $db = \Illuminate\Support\Facades\DB::getFacadeRoot();
        $this->schema->create('songs', function (Blueprint $table) use ($db) {
            $table->increments('id');
            $table->string('song', 50);
            $table->string('lyric', 100)->nullable();
            $table->timestamp('created_at')->default($db->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default($db->raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->drop('songs');
    }

}
