<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Buku;
use App\Models\History_Peminjaman;
use Carbon\Carbon;

class PeminjamanExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:peminjaman';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update based on date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $peminjaman = History_Peminjaman::whereDate('tgl_pengembalian', '<', now())->get();
        foreach ($peminjaman as $peminjaman) {
            $peminjaman->update(['status' => 'sudah dikembalikan']);
            $buku = Buku::findOrFail($peminjaman -> idBuku);
            $buku->update([
                'stok' => $buku->stok + 1,
            ]);
        }

        $this->info('Peminjaman and buku statuses updated successfully.');
    }
}
