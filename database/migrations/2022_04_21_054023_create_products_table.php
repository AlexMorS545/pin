<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Product::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string('article', 255)->unique();
            $table->string('name', 255);
            $table->enum('status', array_keys(Product::$statuses))->default(Product::AVAILABLE);
            $table->jsonb('data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Product::TABLE);
    }
};
