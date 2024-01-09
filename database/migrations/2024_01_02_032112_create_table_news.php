<?php

use App\Models\User;
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
        Schema::create('table_news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('content');
            $table->integer('status');
            $table->integer('deleted');
            $table->timestamp('created_time');
            $table->timestamp('updated_time');
            $table->foreignIdFor(User::class, 'created_by');
            $table->foreignIdFor(User::class, 'updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_news');
    }
};
