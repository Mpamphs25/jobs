<?php


use \App\Models\Job;
use \App\Models\User;
use \App\Models\Employer;
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
        Schema::create('lara_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignIdFor(Employer::class)->constrained();
            $table->unsignedInteger('salary');
            $table->string('location');
            $table->enum('category',Job::$categories);
            $table->enum('experience', Job::$expierience);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lara_jobs');
    }
};
