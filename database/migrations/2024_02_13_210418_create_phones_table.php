<?php

use App\Enums\CRM\Phone\PhoneType;
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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable();
            $table->morphs('phoneable');
            $table->string('phone', 40)->unique();

            $table->enum('type', array_column(PhoneType::cases(), 'value'))->default(PhoneType::PORTABLE->value);

            $table->boolean('is_active')->default(true);
            $table->boolean('is_default')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
