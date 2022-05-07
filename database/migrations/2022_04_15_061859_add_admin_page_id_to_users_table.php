<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_page_id')->nullable();
            $table->foreign('admin_page_id')->references('id')->on('admin_pages')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->json('accessible_pages_id')->nullable();
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
            $table->dropForeign(['admin_page_id']);
            $table->dropColumn('accessible_pages_id');
        });
    }
};
