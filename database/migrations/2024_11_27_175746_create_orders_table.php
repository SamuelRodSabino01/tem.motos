<?php

use App\Models\Client;
use App\Models\Order;
use App\Models\Part;
use App\Models\Service;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
                $table->foreignIdFor(Client::class)->constrained();
                $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('order_service', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Service::class)->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->softDeletes();
        });

        Schema::create('order_part', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Part::class)->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->softDeletes();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
