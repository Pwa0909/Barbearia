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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};

{
    Schema::create('agendamentos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
        $table->foreignId('barbeiro_id')->constrained('barbeiros')->onDelete('cascade');
        $table->foreignId('servico_id')->constrained('servicos')->onDelete('cascade');

        $table->date('data');
        $table->time('hora');
        $table->string('status')->default('agendado');
        $table->text('observacoes')->nullable();
        $table->timestamp('criado_em')->useCurrent();
    });
}
