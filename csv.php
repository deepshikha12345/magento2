<?php 
error_reporting(E_ALL | E_STRICT);
//$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//$CsvObject= $objectManager->get('Magento\Framework\File\Csv');
$file = 'Product Master_1-2015.csv';
$OurCsv=$CsvObject->getData($file);
$firstarray=array_combine($OurCsv[0],$OurCsv[1]);
$OurData[0]=$firstarray;
$importerModel->processImport($OurData);?>
<?php /*?>function parse_csv_file($csvfile) {
        $csv = Array();
		$rowcount = 0;
		
		if (($handle = fopen($csvfile, "r")) !== FALSE) {
			$max_line_length = defined('MAX_LINE_LENGTH') ? MAX_LINE_LENGTH : 10000;
			$header = fgetcsv($handle, $max_line_length);
			foreach($header as $c=>$_cols) {
				$header[$c] = strtolower(str_replace(" ","_",$_cols));
			}
			$header_colcount = count($header);
			while (($row = fgetcsv($handle, $max_line_length)) !== FALSE) {
				$row_colcount = count($row);
				if ($row_colcount == $header_colcount) {
					$entry = array_combine($header, $row);
					$csv[] = $entry;
				}
				else {
					error_log("csvreader: Invalid number of columns at line " . ($rowcount + 2) . " (row " . ($rowcount + 1) . "). Expected=$header_colcount Got=$row_colcount");
					return null;
				}
				$rowcount++;
			}
			//echo "Totally $rowcount rows found\n";
			fclose($handle);
		}
		else {
			error_log("csvreader: Could not read CSV \"$csvfile\"");
			return null;
		}
		return $csv;
}<?php */?>
<?php
$products->addAttributeToFilter('status', 1);
$fopen = fopen('Product Master_1-2015.csv', 'w');
$csvHeader = array("id","sku", "name", "price");// Add the fields you need to export
fputcsv( $fopen , $csvHeader,",");
foreach ($products as $product){
    $id = $product->getId();
	$sku = $product->getSku();
	$name = $product->getName();
	$price = $product->getPrice();
	$color= $product->getcolor();
    fputcsv($fp, array($id,$sku,$name, $price, $color), ","); 
}
fclose($fopen );
?>

