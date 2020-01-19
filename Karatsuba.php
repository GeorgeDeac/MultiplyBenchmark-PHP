<?php
class Karatsuba {

	const BASE = 10;

	private function __construct() {
		
	}

	public static function validate($value1, $value2) {
		if (strchr($value1, ".") == true || strchr($value2, ".") == true || strchr($value1, "e") == true || strchr($value2, "e") == true || strchr($value1, "E") == true || strchr($value2, "E") == true) {
			throw new Exception('Error1');
		} else {
			if (!is_numeric($value1) || is_float($value1) || empty($value1) || $value1 < 0 || !is_numeric($value2) || is_float($value2) || empty($value2) || $value2 < 0) {
				throw new Exception('Error2');
			}
		}
	}

	public static function prepare($parameter) {
		$array = array();
		$n = strlen($parameter);
		$ajuste = ceil($n / 2);
		$var1 = substr($parameter, -$n, $ajuste);
		$var0 = substr($parameter, -$n / 2);
		$len_var0 = strlen($var0);
		array_push($array, $var0);
		array_push($array, $var1);
		array_push($array, $len_var0);
		return $array;
	}

	public static function multiply($x, $y) {
		$k1 = Karatsuba::prepare($x);
		$k2 = Karatsuba::prepare($y);
		$m1 = $k1[2];
		$m2 = $k2[2];

		$z2 = $k1[1] * $k2[1];
		$z0 = $k1[0] * $k2[0];
		$z1 = ($k1[1] * $k2[0]) + ($k1[0] * $k2[1]);

		if ($m1 == $m2) {
			$m = $m1 = $m2;
			$result = $z2 * pow(pow(Karatsuba::BASE, 2), $m) + $z1 * pow(Karatsuba::BASE, $m) + $z0;
			return $result;
		}
	}

}
