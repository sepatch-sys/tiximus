<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DisableExpiredTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:disable-expired-tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nonaktifkan tiket yang sudah lewat tanggalnya';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredTickets = Ticket::where('ticket_date', '<', Carbon::today())->get();

        foreach ($expiredTickets as $ticket) {
            $ticket->update(['barcode' => null]);
        }

        $this->info('Tiket yang sudah kadarluarsa berhasil dinonaktifkan.');
    }
}
