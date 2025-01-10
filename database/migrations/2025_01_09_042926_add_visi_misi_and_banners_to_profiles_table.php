<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisiMisiAndBannersToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->text('visi')->nullable()->after('about');
            $table->text('misi')->nullable()->after('visi');
            $table->string('background')->nullable()->after('misi');
            $table->string('banner1')->nullable()->after('background');
            $table->string('banner2')->nullable()->after('banner1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['visi', 'misi', 'background', 'banner1', 'banner2']);
        });
    }
}
