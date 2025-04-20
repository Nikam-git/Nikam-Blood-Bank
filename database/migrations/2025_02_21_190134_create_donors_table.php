<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('bloodgroup');
            $table->double('amountofblood');
            $table->unsignedBigInteger('to_user_id');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('donor_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
