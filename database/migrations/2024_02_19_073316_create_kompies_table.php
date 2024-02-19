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
        Schema::create('kompies', function (Blueprint $table) {
            $table->id();
            $table->string('station_number'); // Numer stanowiska (np. string)
            $table->string('serial_number')->unique();
            $table->string('ip_address')->nullable(); // Adres IP
            $table->string('mac_address')->nullable(); // Adres MAC
            $table->integer('memory_size'); // ilość pamięci w GB
            $table->integer('processor_cores'); // ilość rdzeni procesora
            $table->integer('memory_slots'); // ilość slotów pamięci RAM
            $table->integer('pci_slots'); // ilość slotów PCI
            $table->integer('pcie_slots'); // ilość slotów PCI Express (PCIe)
            $table->integer('ram_slots'); // ilość slotów pamięci RAM
            $table->integer('free_pci_slots'); // ilość wolnych slotów PCI
            $table->integer('free_pcie_slots'); // ilość wolnych slotów PCIe
            $table->integer('free_ram_slots'); // ilość wolnych slotów pamięci RAM
            $table->string('monitor_serial_number')->nullable(); // Numer seryjny monitora
            $table->string('keyboard_serial_number')->nullable(); // Numer seryjny klawiatury
            $table->string('mouse_serial_number')->nullable(); // Numer seryjny myszy
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kompies');
    }
};
