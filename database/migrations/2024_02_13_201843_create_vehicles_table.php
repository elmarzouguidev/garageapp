<?php

use App\Enums\Vehicle\VehicleEnum;
use App\Models\Client\Client;
use App\Models\Vehicle\Brand;
use App\Models\Vehicle\Color;
use App\Models\Vehicle\Fuel;
use App\Models\Vehicle\VehicleModel;
use App\Models\Vehicle\VehiclePower;
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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable();

            $table->foreignIdFor(Client::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(Brand::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(Fuel::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(VehiclePower::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(VehicleModel::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(Color::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name', 200);
            $table->string('registration_number')->unique()->nullable();

            $table->string('origine', 200)->nullable();

            $table->enum('gearbox', array_column(VehicleEnum::cases(), 'value'))->default(VehicleEnum::MANUAL->value);

            $table->string('mileage', 100)->default(00);

            $table->string('etat', 200)->nullable();


            $table->mediumText('content')->nullable();

            $table->boolean('first_hand')->default(false);
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
        Schema::dropIfExists('vehicles');
    }
};
