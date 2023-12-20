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
        Schema::table('activities', function (Blueprint $table) {
            $table->string('hyperlink_surat')->nullable()->after('status');
            $table->string('nomor_surat')->nullable()->after('status');
            $table->string('jenis_surat')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn(['jenis_surat', 'nomor_surat', 'hyperlink_surat']);
        });
    }
};
