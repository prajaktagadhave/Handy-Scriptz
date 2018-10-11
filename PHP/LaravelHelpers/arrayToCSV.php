<?php
namespace App\Helpers;

class arrayToCSV
{
   static function convertToCSV($input_array, $output_file_name, $delimiter)
    {
    	/**
    	 * open raw memory as file, no need for temp files, be careful not to run out of memory thought
    	 */
    	$f = fopen ('php://memory', 'w');
    	/**
    	 * loop through array
    	 */
    	
    	foreach ($input_array [0] as $key => $val)
    	{
    		
    		$cabeca [] = utf8_decode($key);
    	}
    	fputcsv ($f, $cabeca, $delimiter);
    	#fputs ($f, $bom = chr (0xEF) . chr (0xBB) . chr (0xBF));
    	
    	foreach ($input_array as $line)
    	{
    		/**
    		 * default php csv handler *
    		 */
    		#foreach($line as $line2)
    			#$line2= iconv('UTF-8', 'windows1252 ', $line2);
    		
    		$line = array_map("utf8_decode", $line);
    		fputcsv ($f, $line, $delimiter, '"');
    	}
    	/**
    	 * rewrind the "file" with the csv lines *
    	 */
    	fseek ($f, 0);
    	/**
    	 * modify header to be downloadable csv file *
    	 */
    	header ('Content-Type: application/csv');
    	header ('Content-Disposition: attachement; filename="' . $output_file_name . '";');
    	/**
    	 * Send file to browser for download
    	 */
    	fpassthru ($f);
    }
}
