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
        Schema::create('like_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("event_id");
            $table->unsignedBigInteger("user_id");
            $table->boolean("like")->default(false);
            $table->foreign("event_id")->references("id")->on("events")->cascadeOnUpdate()->cascadeOnDelete();;
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_events');
    }
};
