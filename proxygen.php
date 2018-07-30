<?php

$dom1 = new DOMDocument();
@$dom1->loadHTML(file_get_contents("https://www.sslproxies.org/"));

$xpath1 = new DOMXPath($dom1);

//$roba1 = $xpath1->query('//*[@id="proxylisttable"]/tbody');//*[@id="proxylisttable"]/tbody/tr[1]/td[1]
//$roba12 = $xpath1->query('//*[@id="proxylisttable"]/tbody/tr[1]/td[1]');
////*[@id="proxylisttable"]/tbody/tr[1]/td[2]

$ke = 0;
	
//creo (o pulisco) file carzini (proxy)
file_put_contents("carzini.txt", "");

while($k < 99){
  $k++;
  $ipxd = $xpath1->query("//*[@id='proxylisttable']/tbody/tr[$k]/td[1]");
  $portaxd = $xpath1->query("//*[@id='proxylisttable']/tbody/tr[$k]/td[2]");
  foreach( $ipxd as $ip )
  {
    foreach( $portaxd as $porta )
    {
		//replace "PATH" with the path where you want to save the file
      file_put_contents("PATH", $ip->nodeValue.":".$porta->nodeValue."
", FILE_APPEND);

    }
  }
  }


  //coded bay @gabbo_xl (gabboxl.ga)








//test

/*
foreach( $roba1 as $node )
{
  foreach( $roba12 as $node2 )
  {
  file_put_contents("asd.php", "");
  preg_match_all("/[0-9]+/i",$node->nodeValue,$se);
  preg_match_all("/[0-9]+.[0-9]+.[0-9]+.[0-9]+/i",$node2->nodeValue,$var2);
    foreach( $se as $icsd){
      foreach( $node2->nodeValue as $icsd12){
      $k = 0;
      while($k < 99){
        $k++;
    file_put_contents("asd.php", $icsd12[$k].":".$icsd[$k]."
", FILE_APPEND);

  }
}
}//s
}
}
*/









 ?>
