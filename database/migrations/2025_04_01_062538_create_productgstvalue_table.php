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
        Schema::create('productgstvalue', function (Blueprint $table) {
            $table->id();
            $table->string('productname');
            $table->string('mrp');
            $table->decimal('base_price', 10, 2);  
            $table->decimal('gst_rate', 5, 2);  
            $table->decimal('central_gst_rate', 5, 2);  
            $table->decimal('central_gst_amount', 10, 2); 
            $table->decimal('state_gst_rate', 5, 2);   
            $table->decimal('state_gst_amount', 10, 2); 
            $table->decimal('gst_amount', 10, 2); 
            $table->decimal('total_price', 10, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productgstvalue');
    }
};
