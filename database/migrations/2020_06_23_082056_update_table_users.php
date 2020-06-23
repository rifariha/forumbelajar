<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('email');
            $table->string('phone')->after('password')->nullable();
            $table->string('image')->after('phone')->nullable();
            $table->tinyInteger('status')->after('image')->default(0);
            $table->string('bmkz_origin')->after('status');
            $table->string('mz_origin')->after('bmkz_origin');
            $table->string('suluk')->after('mz_origin');
            $table->string('alumni')->after('suluk');
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
            //
        });
    }
}
