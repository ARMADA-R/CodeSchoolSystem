<?php

namespace App\Controllers;

use PHPExcel_IOFactory;
use PHPExcel;

require_once APPPATH . "ThirdParty/PHPExcel/Classes/PHPExcel/IOFactory.php";
class ExcelReader extends BaseController
{
    protected $file;
    function __construct($file = null)
    {
        $this->file = $file;
    }

    public function index()
    {
        // $this->upload();
        $this->parseToArray(isset($_FILES["excel"]['tmp_name']) ? $_FILES["excel"]['tmp_name'] : '', 2, 1);
    }

    public function upload(Type $var = null)
    {

        if (true) {
            $path = 'uploads/';
            require_once APPPATH . "ThirdParty/PHPExcel/Classes/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if (empty($error)) {
                if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;

                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $flag = true;
                    $i = 0;
                    foreach ($allDataInSheet as $value) {
                        if ($flag) {
                            $flag = false;
                            continue;
                        }
                        $inserdata[$i]['first_name'] = $value['A'];
                        $inserdata[$i]['last_name'] = $value['B'];
                        $inserdata[$i]['address'] = $value['C'];
                        $inserdata[$i]['email'] = $value['D'];
                        $inserdata[$i]['mobile'] = $value['E'];
                        $i++;
                    }
                    $result = $this->import_model->importdata($inserdata);
                    if ($result) {
                        echo "Imported successfully";
                    } else {
                        echo "ERROR !";
                    }
                } catch (Exception $e) {
                    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
                }
            } else {
                echo $error['error'];
            }
            $this->load->view('excel_file_upload');
        }
    }

    public function viewExcel()
    {
        return view('excel');
    }

    public static function parseToArray($file, $deletedHeader = 0, $sheetIndex = 0)
    {

        if ($file) {
            
            $reader = PHPExcel_IOFactory::createReader('Excel2007');
            $reader->setReadDataOnly(true);

            $objPHPExcel = $reader->load($file);
            $objWorksheet = $objPHPExcel->getSheet($sheetIndex);
            $header = true;
            if ($header) {
                $highestRow = $objWorksheet->getHighestRow();
                $highestColumn = $objWorksheet->getHighestColumn();
                $headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
                // dd($headingsArray);
                $headingsArray = $headingsArray[1];
                $r = -1;
                $namedDataArray = array();

                for ($row = $deletedHeader; $row <= $highestRow; ++$row) {
                    $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
                    if (true) { // (isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')
                        ++$r;
                        foreach ($headingsArray as $columnKey => $columnHeading) {
                            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
                        }
                    }
                }
            } else {
                
                //excel sheet with no header
                $namedDataArray = $objWorksheet->toArray(null, true, true, true);
            }


            // dd($namedDataArray);
            return $namedDataArray;

            // echo '<pre>';
            // print_r($namedDataArray);
            // exit;
        }
        else {
            return [];
        }
    }
}
