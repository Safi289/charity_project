<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Export extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('order_model');
    }
    // create xlsx
    public function generateXls($id) {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->order_model->order_info($id);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Order ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Item');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Description');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Rate');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Quantity'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Price');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Total');     
        // set Row
       //  $rowCount = 2;
	      //   foreach ($listInfo as $list) {

	      //       $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->order_id);
	      //       $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->product_name);
	      //       $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->product_description);
	      //       $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->product_price);
	      //       $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->item_qty);
			    // $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->item_subtotal);
	      //   	$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->total);
       //   	    $rowCount++;
       //   }
        $filename = "tutsmake". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
 
    }
     
}
?>