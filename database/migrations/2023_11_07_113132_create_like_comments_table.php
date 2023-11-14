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
        Schema::create('like_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("post_id");
            $table->unsignedBigInteger("comment_id");
            $table->boolean("like_cmt_post")->default(false);
            $table->foreign("comment_id")->references("id")->on("comments")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign("post_id")->references("id")->on("posts")->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('like_comments');
    }
};
