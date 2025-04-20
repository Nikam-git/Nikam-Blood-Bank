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
        Schema::create('blood_stocks', function (Blueprint $table) {
            $table->id();
            $table->double('bloodgroupAplus')->default(0.0);
            $table->double('bloodgroupBplus')->default(0.0);
            $table->double('bloodgroupOplus')->default(0.0);
            $table->double('bloodgroupAminus')->default(0.0);
            $table->double('bloodgroupBminus')->default(0.0);
            $table->double('bloodgroupOminus')->default(0.0);
            $table->double('bloodgroupABplus')->default(0.0);
            $table->double('bloodgroupABminus')->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_stocks');
    }
};
