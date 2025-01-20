<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileImagesToBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->string('profile_bg')->nullable()->after('address');
            $table->string('profile_banner1')->nullable()->after('profile_bg');
            $table->string('profile_banner2')->nullable()->after('profile_banner1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn(['profile_bg', 'profile_banner1', 'profile_banner2']);
        });
    }
}
