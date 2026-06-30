<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 120);
            $table->string('email', 150);
            $table->string('phone', 30)->nullable();
            $table->string('company', 150)->nullable();
            $table->string('subject', 180)->nullable();
            $table->text('message');
            $table->enum('status', ['new', 'read', 'replied'])->default('new')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
