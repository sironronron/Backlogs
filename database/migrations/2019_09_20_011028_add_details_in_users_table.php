<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetailsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->text('bio')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('pinterest')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('phone');
            $table->dropColumn('birthday');
            $table->dropColumn('bio');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('instagram');
            $table->dropColumn('pinterest');
        });
    }
}
