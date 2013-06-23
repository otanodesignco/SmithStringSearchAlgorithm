<?php
class search
{
	private $bmBc = array();
	private $qsBc = array();
	
	private function preBmBc($pattern,$length) 
	{
 		$pLen = $length;
		/* not needed php doesn't have bouned arrays that need the be defined at a fixed size
   		for ($i = 0; $i < search::ASIZE; ++$i)
   		{
   	 		$this->bmBc[$i] = $m;
   		}
   		
   		*/
     		
     		// create bad character array
   		for ($i = 0; $i < $pLen - 1; ++$i)
   		{
   			$this->bmBc[(int)$pattern{$i}] = $pLen - $i - 1;
   		} 
      
	}

	private function preQsBc($pattern,$length)
	{
   		$pLen = $length;
		/* removed not needed because arrays aren't bound to a fixed length
   		for ($i = 0; $i < search::ASIZE; ++$i)
		{
			$this->qsBc[$i] = $m + 1;
		} */
	  
   		for ($i = 0; $i < $pLen; ++$i)
   		{
   			$this->qsBc[(int)$pattern{$i}] = $pLen - $i;
   		}
      
	}
	
	private function memcmp($cs, $ct, $n)
	{
 		$i;   

 		for ($i = 0; $i < $n; $i++, $cs++, $ct++)
 		{
			if ($cs < $ct)
			{
  				return -1;
			}
			else if ($cs > $ct)
			{
  				return 1;
			}
		}

  		return 0;  
  	}
	// public function smith($x, $m, $y, $n)
	public function smith($pattern, $text) 
	{
		$pLen = strlen($pattern);
		$tLen = strlen($text);
		
   		$j;

   		/* Preprocessing */
  		$this->preBmBc($pattern,$pLen);
  		$this->preQsBc($pattern,$pLen);

   		/* Searching */
  		 $j = 0;
		 
   		while ($j <= $tLen - $pLen) 
		{
      		if ($this->memcmp($pattern, $text + $j, $pLen) == 0)
			{
				echo $j;
			}
         
      		$j += max($this->bmBc[(int)$text{$j + $pLen - 1}], $this->qsBc[(int)$text{$j + $pLen}]);
	  	}
   }
}
	
?>
