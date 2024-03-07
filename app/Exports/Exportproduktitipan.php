<?php

namespace App\Exports;

use App\Models\produktitipan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Evenst\AfterSheet;
use Maatwebsite\Excel\Sheet;

class Exportproduktitipan implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return produktitipan::all();
    }

    public function headings(): array
    {
        return [
            'produk titipan',
            'nama supplier',
        ];
    }

    public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {
            $event->sheet->getColumnDimension('A')->setAutoSize(true);
            $event->sheet->getColumnDimension('B')->setAutoSize(true);
            $event->sheet->getColumnDimension('C')->setAutoSize(true);
            $event->sheet->getColumnDimension('D')->setAutoSize(true);
            $event->sheet->getColumnDimension('E')->setAutoSize(true);
            $event->sheet->getColumnDimension('F')->setAutoSize(true);


            $event->sheet->insertNewRowBefore(1, 2);
            $event->sheet->mergeCells('A1:G1');
            $event->sheet->setCellValue('A1', 'DATA produktitipan');
            $event->sheet->getStyle('A1')->getFont()->setBold(true);
            $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $event->sheet->getStyle('A3:G' . $event->sheet->getHighestRow())->applyFromArray([
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
