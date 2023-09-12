<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB ;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('subcategory_name');
            $table->string('subcategory_slug');
            $table->string('subcategory_image')->nullable();
            $table->timestamps();
        });

//        DB::table('sub_categories')->insert([
//            [
//                'subcategory_name' => 'subcategory name',
//                'subcategory_slug' =>  'subcategory slug'
//
//            ],
//
//        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
