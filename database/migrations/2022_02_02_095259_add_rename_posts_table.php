<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRenamePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( Schema::hasTable('posts') && !Schema::hasTable('articles')) {
            Schema::rename('posts', 'articles');
        }

        if (Schema::hasColumn('articles', 'title')) {
            Schema::table('articles', function (Blueprint $table) {       
                $table->renameColumn('title', 'name');
                if (Schema::hasColumn('articles', 'active')) {
                    $table->boolean('main')->default(0)->after('active');
                }

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('articles', 'posts');
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
        });
        Schema::dropIfExists('articles');
    }
}
