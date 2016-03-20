<?php
    include 'PHPExcel/IOFactory.php';
   
    $inputFileType = PHPExcel_IOFactory::identify($new_filename);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);

    $objReader->setReadDataOnly(true);
    $objPHPExcel = $objReader->load($new_filename);

   foreach($objPHPExcel->getSheetNames() as $sheet){
//       echo $sheet.'</br>';
//       $objReader->setLoadSheetsOnly($sheet);
       $sheetData = $objPHPExcel->getSheetByName($sheet)->toArray(null,true,true,true);
      
//       var_dump($sheetData);
       echo json_encode($sheetData);
   }

?>