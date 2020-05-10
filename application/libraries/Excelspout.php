<?php

defined('BASEPATH') or exit('No direct script access allowed');


//load Spout Library
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\Color;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


class Excelspout
{
    // CI
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function export_data($filename, $coloheader, $pk, $get)
    {
        if ($get->num_rows() > 0) {
            $writer = WriterEntityFactory::createXLSXWriter();
            $writer->openToBrowser($filename . ".xlsx");
            $header = WriterEntityFactory::createRowFromArray($coloheader);
            $writer->addRow($header);
            $data   = array();
            $no     = 1;
            $rows = array();
            foreach ($get->result_array() as $key) {
                $key[$pk] = $no++;
                array_push($data, WriterEntityFactory::createRowFromArray($key)); //masukkan variabel array anggota ke variabel array data
            }
            $writer->addRows($data); // tambahkan row untuk data anggota

            $writer->close(); //tutup spout writer
        } else {
            echo "Data tidak ditemukan";
        }
    }
}
