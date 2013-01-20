<?php

# simple conversions from stupid old imperial units to the modern european metric units

$input = trim(getenv('POPCLIP_TEXT'));

//$input = trim($argv[1]);


switch ($input) {
    case (preg_match("/^(\d+).*lbs?\.?$/", $input, $treffer) ? true : false) :

		$zahl = $treffer[1];
		$ergebnis = number_format(0.45359237*$zahl,3) . " kg";
        break;

	case (preg_match("/^(\d+)\s*(fe?e?t|')\s*(\d+)?\s*(inc?h?e?s?|''|\")?$/i", $input, $treffer) ? true : false) :
		
		// yard = 0.9144 m (todo)
		// foot = 0.3048 m
		// inch = 0.0254 m
	
		$zahl = ($treffer[1]*0.3048) + ($treffer[3]*0.0254);
		
		if ($zahl > 1000) {
			$ergebnis = number_format(($zahl/1000),3) . " km";
		} else {
			$ergebnis = number_format($zahl,2) . " m";
		}
		break;
	default :
		$ergebnis = "can't compute";
}

echo $ergebnis;

exit(0);
?>
