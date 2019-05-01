<?php

if (isset($_GET['path']) or isset($argv[1])) {
    //creo (o pulisco) file carzini (proxy)
    file_put_contents($_GET['path'].$argv[1].'/carzini.txt', '');
}else{
die("\n You need to specify a path for the output! \n");
}

$dom1 = new DOMDocument();
@$dom1->loadHTML(file_get_contents('https://www.sslproxies.org/'));

$xpath1 = new DOMXPath($dom1);

$k = 0;

while ($k < 99) { //for every row we extract the ip + port
    $k++;
    $ipxd = $xpath1->query("//*[@id='proxylisttable']/tbody/tr[$k]/td[1]"); //xpath of the ip
  $portaxd = $xpath1->query("//*[@id='proxylisttable']/tbody/tr[$k]/td[2]");  //xpath of the port
  foreach ($ipxd as $ip) {
      foreach ($portaxd as $porta) {
          if (isset($_GET['path']) or isset($argv[1])) {
              file_put_contents($_GET['path'].$argv[1].'/carzini.txt', $ip->nodeValue.':'.$porta->nodeValue."\n", FILE_APPEND);
          }

          if (isset($_GET['print']) and $_GET['print'] == 'yes') {
              echo $ip->nodeValue.':'.$porta->nodeValue."\n";
          }
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
