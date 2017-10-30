<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Songs100CreateTable
 */
class Songs0010000000CreateTable extends Migration
{
    /**
     * @var Illuminate\Database\Schema\Builder
     */
    private $schema;
    /**
     * @var string
     */
    private $tableName;

    /**
     * Songs100 constructor.
     */
    public function __construct()
    {
        $this->schema    = \Illuminate\Support\Facades\Schema::getFacadeRoot();
        $this->tableName = 'songs';
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
        if (!$this->schema->hasTable($this->tableName))
        {
            $this->schema->create($this->tableName, function (Blueprint $table) use ($db) {
                $table->increments('id');
                $table->string('song', 50);
                $table->string('lyric', 100)->nullable();
                $table->timestamp('created_at')->default($db->raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default($db->raw('CURRENT_TIMESTAMP'));
            });
        }
        else
        {
            echo 'Table Already Exists';
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists($this->tableName);
    }
}
