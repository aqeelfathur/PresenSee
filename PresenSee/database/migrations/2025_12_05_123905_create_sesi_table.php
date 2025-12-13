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
            Schema::create('sesi', function (Blueprint $table) {
                $table->id('id_sesi');
                $table->foreignId('id_mapel_kelas')->constrained('mapel_kelas', 'id_mapel_kelas')->onDelete('cascade');
                $table->foreignId('id_guru')->constrained('users', 'id_user')->onDelete('cascade');
                $table->date('tanggal_sesi');
                $table->time('jam_mulai');
                $table->time('jam_selesai');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('sesi');
        }
    };
