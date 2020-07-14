<?php

function curl($url, $post){
  $ch = curl_init($ch);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  return curl_exec($ch);
  curl_close($ch);
}

$baner ="
        'dwoapfjsod`         `dwoapfjsod`
    `xdwdsfasdfjaapz`       `dwdsfasdfjaapzx`     android-93dce2ba20d6335b
  `wadladfladlafsozmm`     `wadladfladlafsozmm`   OS: Android 5.1.1
 `aodowpwafjwodisosoaas` `odowpwafjwodisosoaaso`  Device: SM-J320G (j3xlte)
 `adowofaowiefawodpmmxs` `dowofaowiefawodpmmxso`  ROM: LMY47V.J320GXXS0AQL2
 `asdjafoweiafdoafojffw` `sdjafoweiafdoafojffwq`  Baseband: unknown
  `dasdfjalsdfjasdlfjdd` `asdfjalsdfjasdlfjdda`   Kernel: armv7l Linux 3.10.65-12227952
   `dddwdsfasdfjaapzxaw` `ddwdsfasdfjaapzxawo`    Uptime: 4d 5h 55m
     `dddwoapfjsowzocmw` `ddwoapfjsowzocmwp`      CPU: sc8830
       `ddasowjfowiejao` `dasowjfowiejaow`        GPU: sc8830
                                                  RAM: 979MiB / 1361MiB
       `ddasowjfowiejao` `dasowjfowiejaow`
     `dddwoapfjsowzocmw` `ddwoapfjsowzocmwp`
   `dddwdsfasdfjaapzxaw` `ddwdsfasdfjaapzxawo`
  `dasdfjalsdfjasdlfjdd` `asdfjalsdfjasdlfjdda`
 `asdjafoweiafdoafojffw` `sdjafoweiafdoafojffwq`
 `adowofaowiefawodpmmxs` `dowofaowiefawodpmmxso`
 `aodowpwafjwodisosoaas` `odowpwafjwodisosoaaso`
   `wadladfladlafsozmm`     `wadladfladlafsozmm`
     `dwdsfasdfjaapzx`       `dwdsfasdfjaapzx`
        `woapfjsod`             `woapfjsod`";

//ambil data login

function login($user, $pass){
  $url="https://umairspin.spinforcash.app/api.php";
  $post="username=$user&access_key=6808&password=$pass&user_login=1&";
  return json_decode(curl($url, $post));

}

//ambil data spin nya

function spin($user, $point){
  $url="https://umairspin.spinforcash.app/api.php";
  $post="add_spin=1&username=$user&access_key=6808&type=Spin+wheel&points=$point&";
  return json_decode(curl($url, $post));

}

echo "Username: ";
$user=trim(fgets(STDIN));
echo "password: ";
$pass=trim(fgets(STDIN));
echo "ISI POINT: ";
$point=trim(fgets(STDIN));

echo $baner."\n";
echo "\n";
echo "created by @MrBadut101\n";
echo "\n";


$login = login($user, $pass);

if($login->error == "false"){
  echo "[login] {$login->message} => {$login->data->username}\n";

  while(true){
    $log = login($user, $pass);
    $spin= spin($log->data->username, $point);

    echo "[+] {$log->data->username} | {$spin->message} | Point: {$log->data->points}\n";
  }

}else{
  echo "gagal  boss!!!!!.....";
}




?>