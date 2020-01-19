<?php

function Lattice($Num1='0',$Num2='0') {
  // check if they're both plain numbers
  if(!preg_match("/^\d+$/",$Num1)||!preg_match("/^\d+$/",$Num2)) return(0);

  // remove zeroes from beginning of numbers
  for($i=0;$i<strlen($Num1);$i++) if(@$Num1{$i}!='0') {$Num1=substr($Num1,$i);break;}
  for($i=0;$i<strlen($Num2);$i++) if(@$Num2{$i}!='0') {$Num2=substr($Num2,$i);break;}

  // get both number lengths
  $Len1=strlen($Num1);
  $Len2=strlen($Num2);

  // $Rema is for storing the calculated numbers and $Rema2 is for carrying the remainders
  $Rema=$Rema2=array();

  // we start by making a $Len1 by $Len2 table (array)
  for($y=$i=0;$y<$Len1;$y++)
    for($x=0;$x<$Len2;$x++)
      // we use the classic lattice method for calculating the multiplication..
      // this will multiply each number in $Num1 with each number in $Num2 and store it accordingly
      @$Rema[$i++%$Len2].=sprintf('%02d',(int)$Num1{$y}*(int)$Num2{$x});

  // cycle through each stored number
  for($y=0;$y<$Len2;$y++)
    for($x=0;$x<$Len1*2;$x++)
      // add up the numbers in the diagonal fashion the lattice method uses
      @$Rema2[Floor(($x-1)/2)+1+$y]+=(int)$Rema[$y]{$x};

  // reverse the results around
  $Rema2=array_reverse($Rema2);

  // cycle through all the results again
  for($i=0;$i<count($Rema2);$i++) {
    // reverse this item, split, keep the first digit, spread the other digits down the array
    $Rema3=str_split(strrev($Rema2[$i]));
    for($o=0;$o<count($Rema3);$o++)
      if($o==0) @$Rema2[$i+$o]=$Rema3[$o];
      else @$Rema2[$i+$o]+=$Rema3[$o];
  }
  // implode $Rema2 so it's a string and reverse it, this is the result!
  $Rema2=strrev(implode($Rema2));

  // just to make sure, we delete the zeros from the beginning of the result and return
  while(strlen($Rema2)>1&&$Rema2{0}=='0') $Rema2=substr($Rema2,1);

  return($Rema2);
}

?>