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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
//            $table->string("thumbnail")->nullable();
            $table->string("title",255)->unique();
            $table->string("slug",255)->unique();
            $table->bigInteger('view_count')->unsigned()->default(0)->index();
            $table->longText("body");
            $table->unsignedBigInteger("category_id");
            $table->json("tag_id");
            $table->unsignedBigInteger("user_id");
            $table->boolean("is_approved")->default(0);
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnUpdate()->cascadeOnDelete();
//            $table->foreign("tag_id")->references("id")->on("tags")->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('posts');
    }
};
