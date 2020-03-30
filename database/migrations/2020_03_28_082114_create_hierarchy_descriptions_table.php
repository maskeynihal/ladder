<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHierarchyDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hierarchy_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');

            //information of which hierarchy
            $table->string('hierarchy_id')->unique();
            $table->foreign('hierarchy_id')->references('hierarchy_id')->on('hierarchies');
            
            //true if the hierarchy is root
            $table->boolean('is_root')->default(false);

            //child of which parent
            $table->string('parent_id')->nullable();
            $table->foreign('parent_id')->references('hierarchy_id')->on('hierarchies');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hierarchy_descriptions');
    }
}
