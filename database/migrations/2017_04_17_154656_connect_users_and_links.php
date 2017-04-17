<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectUsersAndLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('links', function (Blueprint $table) {
        $table->integer('user_id')->unsigned()->nullable();
        # This field `user_id` is a foreign key that connects to the `id` field in the `users` table
        $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $table->dropForeign('links_user_id_foreign');
      $table->dropColumn('user_id');
    }
}
