<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            if (!Schema::hasColumn('admins', 'judul')) {
                $table->string('judul')->after('id');
            }
            if (!Schema::hasColumn('admins', 'penulis')) {
                $table->string('penulis')->after('judul');
            }
            if (!Schema::hasColumn('admins', 'deskripsi')) {
                $table->text('deskripsi')->after('penulis');
            }
            if (!Schema::hasColumn('admins', 'gambar')) {
                $table->string('gambar')->after('deskripsi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn(['judul', 'penulis', 'deskripsi', 'gambar']);
        });
    }
};
