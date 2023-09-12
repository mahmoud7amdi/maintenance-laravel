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
        Schema::create('ship_divisions', function (Blueprint $table) {
            $table->id();
            $table->string('division_name');
            $table->timestamps();
        });
//        DB::table('ship_divisions')->insert([
//            [
//                'division_name' => 'division name',
//
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
        Schema::dropIfExists('ship_divisions');
    }
};
