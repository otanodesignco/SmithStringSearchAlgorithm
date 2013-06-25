<?php
error_reporting(0); // suppress errors because we know what the issues is and the line number

//$pattern = 'GCAGAGAG';
$pattern = 'GCAGAGAG';
$text = 'GCATCGCAGAGAGTATACAGTACG';
$len = strlen($pattern);
$bmbadChars = array();
$qsBadChars = array();

function arrayCmp($a, $aIdx, $b, $bIdx, $length) 
{
  $i = 0;
	$aLen = strlen($a);
	$bLen = strlen($b);

	for ($i = 0; $i < $length && $aIdx + $i < $aLen && $bIdx + $i < $bLen; $i++)
	{
		if ($a[$aIdx + $i] == $b[$bIdx + $i])
		{
	
		}
		else if ($a[$aIdx + $i] > $b[$bIdx + $i])
		{
			return 1;
		}
		else
		{
			return 2;
		}

	}

	if ($i < $length)
	{
		if ($aLen - $aIdx == $bLen - $bIdx)
		{
			return 0;
		}	
		else if ($aLen - $aIdx > $bLen - $bIdx)
		{
			return 1;
		}	
		else
		{
			return 2;
		}	
	}
	else
	{
		return 0;
	}	
}

function memcmp($str1, $str2, $amt, $addstr2 = 0, $addstr1 = 0)
{
	$rtn = -1;
	
	for($i = 0; $i < $amt; $i++)
	{
		if(ord($str1[$i]) + $addstr1 == ord($str2[$i]) + $addstr2)
		{
			$rtn = -1;
		}
		else
		{
			$rtn = 0;
			break;
		}
	}
	
	return $rtn;
}

function BoyerMoyerBadCharcter($pattern, $patLen, &$bmbadChars) 
{
	//internal arrays for debugging 
	//$out2 = array();
	
   for ($i = 0; $i < $patLen - 1; ++$i)
   {
   		$bmbadChars[$pattern[$i]] = $patLen - $i - 1;
		//$out2[$pattern[$i]] = $patLen - $i - 1;
   }
   // output array
   //echo "Second array output is: <br />";
   //print_r($out2);
}

function QuickSearchBadCharacter($pattern, $patLen, &$qsBadChars) 
{
	//internal arrays for debugging 
	//$out2 = array();
	
   for ($i = 0; $i < $patLen; ++$i)
   {
   		$qsBadChars[$pattern[$i]] = $patLen - $i;
		//$out2[$pattern[$i]] = $patLen - $i;
   }
   // output array
   //echo "Second array output is: <br />";
   //print_r($out2);
}

function SmithSearch($pattern, $text) 
{
	$patLen = strlen($pattern);
	$txtLen = strlen($text);
	$bmbadChars = array_fill(0, 256,$patLen);
	$qsBadChars = array_fill(0,256, $patLen);
	$j = 0;

    BoyerMoyerBadCharcter($pattern, $patLen,$bmbadChars); // removed & on badchars
    QuickSearchBadCharacter($pattern, $patLen, $qsBadChars); // removed & on badchars

    while ($j <= $txtLen - $patLen) 
    {
    	if (arrayCmp($pattern, 0, $text, $j, $patLen) == 0)
	    {
	    	print($j);
	    } 
      $j += max($bmbadChars[$text[$j + $patLen - 1]], $qsBadChars[$text[$j + $patLen]]);
   }
}

//BoyerMoyerBadCharcter($pattern,$len,$bmbadChars);

//QuickSearchBadCharacter($pattern,$len,$qsBadChars);

SmithSearch($pattern,$text);


?>
