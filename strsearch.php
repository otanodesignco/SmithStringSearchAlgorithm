<?php
class search
{
	const ASIZE = 256;
	private $bmBc = array();
	private $qsBc = array();
	
	private function memset(&$buffer, $c, $num) 
	{ 
    	$buffer = str_repeat($c, $num); 
	} 

	private function memcpy(&$dest, $offset, $src, $num=-1) 
	{ 
    
    	if($num == -1)
		{
			$num=strlen($src);
		}
	 
    	$dest = substr($dest, 0, $offset).substr($src, 0, $num).substr($dest, $offset+$num);
	
	}
	
	private function preBmBc($x, $m) 
	{
   		$i;
 	
		/* build preprocessing array */
   		for ($i = 0; $i < search::ASIZE; ++$i)
   		{
   	 		$this->bmBc[$i] = $m;
   		}
     
   		for ($i = 0; $i < $m - 1; ++$i)
   		{
   			$this->bmBc[$x{$i}] = $m - $i - 1;
   		} 
      
	}

	private function preQsBc($x, $m)
	{
   		$i;
		
   		for ($i = 0; $i < search::ASIZE; ++$i)
		{
			$this->qsBc[$i] = $m + 1;
		}
	  
   		for ($i = 0; $i < $m; ++$i)
   		{
   			$this->qsBc[$x{$i}] = $m - $i;
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
	public function smith($x, $y) 
	{
		$m = strlen($x);
		$n = strlen($y);
		
   		$j;

   		/* Preprocessing */
  		$this->preBmBc($x, $m);
  		$this->preQsBc($x, $m);

   		/* Searching */
  		 $j = 0;
		 
   		while ($j <= $n - $m) 
		{
      		if ($this->memcmp($x, $y + $j, $m) == 0)
			{
				echo $j;
			}
         
      		$j += max($this->bmBc[$y{$j + $m - 1}], $this->qsBc[$y{$j + $m}]);
	  	}
   }
}
	
?>