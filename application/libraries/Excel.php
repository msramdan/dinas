<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel {

    public function export ($data)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tgl Update');
        $sheet->setCellValue('C1', 'Produk');
        $sheet->setCellValue('D1', 'Sumber');
        $sheet->setCellValue('E1', 'Stok');
        $sheet->setCellValue('F1', 'Rencana Produksi\Ketahanan');
        $sheet->setCellValue('G1', 'Ketahanan Bulanan');
        $sheet->setCellValue('H1', 'Bulan Tahun');
        $sheet->setCellValue('I1', 'Data Minggu');
        $sheet->setCellValue('J1', 'Produksi Mingguan');
        $sheet->setCellValue('K1', 'Produksi Harian');
        $sheet->setCellValue('L1', 'Harga Total Produksi');
        $sheet->setCellValue('M1', 'Harga Dari Produsen');
        $sheet->setCellValue('N1', 'Harga Pedagang');

        foreach ($data as $key => $value) {
            
            $sheet->setCellValue('A' . $key+2, $key + 1);
            $sheet->setCellValue('B' . $key+2, $value->tgl_update);
            $sheet->setCellValue('C' . $key+2, $value->nama_produk);
            $sheet->setCellValue('D' . $key+2, $value->nama_dinas);
            $sheet->setCellValue('E' . $key+2, $value->stok);
            $sheet->setCellValue('F' . $key+2, $value->rencana_produksi);
            $sheet->setCellValue('G' . $key+2, $value->ketahanan_bulanan);
            $sheet->setCellValue('H' . $key+2, date('F Y', strtotime($value->bulan_tahun)));
            $sheet->setCellValue('I' . $key+2, $value->data_minggu);
            $sheet->setCellValue('J' . $key+2, $value->jml_produksi_minggu);
            $sheet->setCellValue('K' . $key+2, round($value->jml_produksi_minggu / 7));
            $sheet->setCellValue('L' . $key+2, rupiah($value->harga_dari_produsen * $value->jml_produksi_minggu));
            $sheet->setCellValue('M' . $key+2, rupiah($value->harga_dari_produsen));
            $sheet->setCellValue('N' . $key+2, rupiah($value->harga_pedagang ?? 0));
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode('Info_Komoditas.xlsx') . '"');
        $writer->save('php://output');
    }
}


?>