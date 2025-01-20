<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaliaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalia', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Name of the personalia
            $table->string('title'); // Title of the personalia (e.g., job position)
            $table->string('profile_picture')->nullable(); // Profile picture, nullable
            $table->unsignedBigInteger('branch_id'); // Foreign key for branch
            $table->timestamps(); // Created at and updated at timestamps

            // Add foreign key constraint
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personalia');
    }
}
