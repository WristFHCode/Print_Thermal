<?php

namespace App\Http\Controllers;

use App\Services\PrinterService;

class PrinterController extends Controller
{
    protected $printerService;

    public function __construct(PrinterService $printerService)
    {
        $this->printerService = $printerService;
    }

    public function printReceipt()
    {
        // Memanggil method cetak struk dari PrinterService
        $this->printerService->printReceipt();

        return "Struk berhasil dicetak!";
    }
}
