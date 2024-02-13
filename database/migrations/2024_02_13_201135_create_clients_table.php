<?php

use App\Enums\CRM\Client\ClientType;
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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable();
            $table->enum('type', array_column(ClientType::cases(), 'value'))->default(ClientType::PERSONNE->value);

            $table->string('nom', 40);
            $table->string('prenom', 40);
            $table->string('email')->unique()->nullable();
            $table->string('phone', 20)->unique()->nullable();


            $table->enum('civility', ['madame', 'monsieur', 'default'])->default('default');
            $table->string('raison_sociale', 200)->nullable();
            $table->string('if', 50)->unique()->nullable(); // to be contuned
            $table->string('rc', 50)->unique()->nullable();
            $table->string('ice', 50)->unique()->nullable();

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
        Schema::dropIfExists('clients');
    }
};
