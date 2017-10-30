<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Songs101AddSoftDelete extends Migration
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
        if ($this->schema->hasTable($this->tableName))
        {
            $this->schema->table($this->tableName, function (Blueprint $table) {
                $table->softDeletes();
            });
        }
        else
        {
            echo "Table $this->tableName doesn't exists";
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ($this->schema->hasTable($this->tableName))
        {
            $this->schema->table($this->tableName, function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }
        else
        {
            echo "Table $this->tableName doesn't exists";
        }
    }

}
