<?php

if (isset($_GET['path']) or isset($argv[1])) {
    //creo (o pulisco) file carzini (proxy)
    if (isset($_GET['path'])) {
        $path = $_GET['path'];
    } else {
        $path = $argv[1];
    }
    file_put_contents($path.'/carzini.txt', '');
} else {
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
          file_put_contents($path.'/carzini.txt', $ip->nodeValue.':'.$porta->nodeValue."\n", FILE_APPEND);

          if (isset($_GET['print']) and $_GET['print'] == 'yes') {
              echo $ip->nodeValue.':'.$porta->nodeValue."\n";
          }
      }
  }
}
echo("\n yay! The proxies are now copied into $path/carzini.txt");

  //coded bay Gabboxl (https://github.com/Gabboxl)
