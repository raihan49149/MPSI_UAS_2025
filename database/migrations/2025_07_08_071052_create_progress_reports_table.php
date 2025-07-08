<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('progress_reports', function (Blueprint $table) {
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->after('report_text');
    });
}

public function down(): void
{
    Schema::table('progress_reports', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}


};
