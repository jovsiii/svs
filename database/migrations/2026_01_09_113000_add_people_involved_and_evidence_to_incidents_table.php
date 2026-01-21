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
        Schema::table('incidents', function (Blueprint $table) {
            $table->string('people_involved_names')->nullable();
            $table->enum('people_involved_type', ['student', 'teacher', 'staff', 'unknown'])->nullable();
            $table->enum('evidence_type', ['photo', 'video', 'screenshot', 'none'])->default('none');
            $table->string('evidence_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incidents', function (Blueprint $table) {
            $table->dropColumn([
                'people_involved_names',
                'people_involved_type', 
                'evidence_type',
                'evidence_path'
            ]);
        });
    }
};
