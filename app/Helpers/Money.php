<?php

function money_format_nep($number, $is_unicode = false) {
	if (strstr($number, "-")) {
		$number = str_replace("-", "", $number);
		$negative = "-";
	}

	$split_number = @explode(".", $number);

	$rupee = $split_number[0];
	$paise = @$split_number[1];

	$thousands = '';

	if (@strlen($rupee) > 3) {
		$hundreds = substr($rupee, strlen($rupee) - 3);
		$thousands_in_reverse = strrev(substr($rupee, 0, strlen($rupee) - 3));
		for ($i = 0; $i < (strlen($thousands_in_reverse)); $i = $i + 2) {
			$thousands .= $thousands_in_reverse[$i] . $thousands_in_reverse[$i + 1] . ",";
		}
		$thousands = strrev(trim($thousands, ","));
		$formatted_rupee = $thousands . "," . $hundreds;

	} else {
		$formatted_rupee = $rupee;
	}

	if ((int) $paise > 0) {
		$formatted_paise = "." . substr($paise, 0, 2);
	} else {
		$formatted_paise = "." . substr("00", 0, 2);
	}

	if ($is_unicode) {
		return get_nep($negative . $formatted_rupee . $formatted_paise);
	} else {
		// return $negative.$formatted_rupee.$formatted_paise;
		return "Rs. " . $negative . $formatted_rupee;
	}
}

function get_nep($eng_str) {
	$replace = array("१", "२", "३", "४", "५", "६", "७", "८", "९", "०");
	$find = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
	$nep_str = str_replace($find, $replace, $eng_str);
	return $nep_str;
}

function money_in_words($number) {
	// $number = 1257.37;
	$no = round($number);
	$point = round($number - $no, 2) * 100;
	$hundred = null;
	$digits_1 = strlen($no);
	$i = 0;
	$str = array();
	$words = array('0' => '', '1' => 'One', '2' => 'Two', '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six', '7' => 'Seven', '8' => 'Eight', '9' => 'Nine', '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve', '13' => 'Thirteen', '14' => 'Fourteen', '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen', '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty', '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty', '60' => 'Sixty', '70' => 'Seventy', '80' => 'Eighty', '90' => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_1) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += ($divider == 10) ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
			$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
			$str[] = ($number < 21) ? $words[$number] . " " . $digits[$counter] . $plural . " " . $hundred : $words[floor($number / 10) * 10] . " " . $words[$number % 10] . " " . $digits[$counter] . $plural . " " . $hundred;
		} else {
			$str[] = null;
		}
	}
	$str = array_reverse($str);
	$result = implode('', $str);
	$points = ($point) ? ". " . $words[$point / 10] . " " . $words[$point = $point % 10] : '';
	// return $result . "Rupees" . $points . " Paisa Only.";
	return $result . "Rupees Only";
}