<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('users', ['is_admin', 'is_moderator'])) {
            Schema::table('users', function ($table) {
                $table->boolean('is_admin')->default(0);
                $table->boolean('is_moderator')->default(0);
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
        Schema::table('users', function ($table) {
            $table->dropColumn('is_admin');
            $table->dropColumn('is_moderator');
        });
    }
}
