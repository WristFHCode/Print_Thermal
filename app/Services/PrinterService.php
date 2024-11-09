<?php

namespace App\Services;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class PrinterService
{
    protected $printer;

    public function __construct()
    {
        // Pastikan nama printer sesuai dengan yang ada di sistem operasi
        $connector = new WindowsPrintConnector("POS-58"); // Jika di Windows
        // $connector = new FilePrintConnector("/dev/usb/lp0"); // Jika di Linux
        $this->printer = new Printer($connector);
    }

    public function printReceipt()
    {
        // Format teks yang akan dicetak ke printer thermal
        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->text("TOKO KITA\n");
        $this->printer->text("Jl. Jalan Kemana-mana No. 123\n");
        $this->printer->text("Telp: 08123456789\n");
        $this->printer->text("--------------------------------\n");

        // Item contoh
        $this->printer->setJustification(Printer::JUSTIFY_LEFT);
        $items = [
            ["name" => "Produk A", "qty" => 2, "price" => 5000, "total" => 10000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000],
            ["name" => "Produk B", "qty" => 1, "price" => 7000, "total" => 7000]
        ];

        foreach ($items as $item) {
            $this->printer->text($item['name'] . "\n");
            $this->printer->text($item['qty'] . " x " . number_format($item['price']) . " = " . number_format($item['total']) . "\n");
        }

        $this->printer->text("--------------------------------\n");
        $this->printer->text("Total: " . number_format(17000) . "\n");
        $this->printer->text("Tunai: " . number_format(20000) . "\n");
        $this->printer->text("Kembali: " . number_format(3000) . "\n");
        $this->printer->text("--------------------------------\n");
        $this->printer->text("Terima Kasih\n");

        // Potong kertas
        $this->printer->cut();
        $this->printer->close();
    }
}
