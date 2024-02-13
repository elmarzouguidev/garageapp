<?php

use App\Enums\CRM\Addresse\AddressType;
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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable();

            $table->morphs('addressable');

            $table->string('city', 100)->nullable();
            $table->longText('address')->nullable();

            $table->string('country', 100)->nullable();
            $table->string('postal', 70)->nullable();

            $table->enum('type', array_column(AddressType::cases(), 'value'))->default(AddressType::NORMAL->value);

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
        Schema::dropIfExists('addresses');
    }
};
