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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
//            name, cagtegory, date, qty, address, description, status
            $table->string("thumbnail")->nullable();
            $table->string("name");
            $table->string("slug",255)->unique();
            $table->bigInteger("view_count")->unsigned()->default(0)->index();
            $table->dateTime("date_from");
            $table->dateTime("date_to");
            $table->unsignedSmallInteger("qty")->default(0);
            $table->unsignedSmallInteger("qty_registered")->default(0);
            $table->smallInteger("status")->default(0);
            $table->string("address");
            $table->string("description");
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("tag_id");
            $table->unsignedBigInteger("user_id")->default(1);
            $table->bigInteger("count_like")->unsigned()->default(0)->index();
//            $table->bigInteger("count_comment")->unsigned()->default(0)->index();
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign("tag_id")->references("id")->on("tags")->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('events');
    }
};
