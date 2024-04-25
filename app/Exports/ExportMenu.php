<?php

namespace App\Exports;

use App\Models\menu;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;

class Exportmenu implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return menu::all();
    }

    public function headings(): array
    {
        return [
            'nomor',
            'nama menu',
            'harga',
            'deskripsi',
            'waktu pembuatan',
        ];
    }

    public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {
            $highestRow = $event->sheet->getHighestRow();
            $highestColumn = $event->sheet->getHighestColumn();

            $event->sheet->getStyle('A1:' . $highestColumn . $highestRow)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ]);
        },
    ];
}

}
