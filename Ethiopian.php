<?php
function halve($x){
  return floor($x/2);
}
 
function double($x){
  return $x*2;
}
 
function iseven($x){
  return !($x & 0x1);
}
 
function ethiopicmult($plier, $plicand){
  $r = 0;
  while($plier >= 1) {
    if ( !iseven($plier) ) $r += $plicand;
    $plier = halve($plier);
    $plicand = double($plicand);
  }
  return $r;
}


class ethiopian_multiply {
 
   protected $result = 0;
 
   protected function __construct($x, $y){
      while($x >= 1){
         $this->sum_result($x, $y);
         $x = $this->half_num($x);
         $y = $this->double_num($y);
      }
   }
 
   protected function half_num($x){
      return floor($x/2);
   }
 
   protected function double_num($y){
      return $y*2;
   }
 
   protected function not_even($n){
      return $n%2 != 0 ? true : false;
   }
 
   protected function sum_result($x, $y){
      if($this->not_even($x)){
         $this->result += $y;
      }
   }
 
   protected function get_result(){
      return $this->result;
   }
 
   static public function init($x, $y){
      $init = new ethiopian_multiply($x, $y);
      return $init->get_result();
   }
 
}

?>