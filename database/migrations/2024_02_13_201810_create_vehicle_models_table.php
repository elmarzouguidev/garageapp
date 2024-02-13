<?php

use App\Models\Vehicle\Brand;
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
        Schema::create('vehicle_models', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable();
            
            $table->string('name', 100)->unique();
            $table->mediumText('content')->nullable();
            $table->foreignIdFor(Brand::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->date('date')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_models');
    }
};
