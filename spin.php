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
 /$$      /$$                  /$$$$$$  /$$   /$$ /$$$$$$$  /$$         /$$   /$$   /$$
| $$$    /$$$                 /$$__  $$| $$  | $$| $$__  $$| $$       /$$$$  | $$$ | $$
| $$$$  /$$$$  /$$$$$$       | $$  \__/| $$  | $$| $$  \ $$| $$      |_  $$  | $$$$| $$
| $$ $$/$$ $$ /$$__  $$      | $$      | $$$$$$$$| $$$$$$$/| $$        | $$  | $$ $$ $$
| $$  $$$| $$| $$  \__/      | $$      |_____  $$| $$____/ | $$        | $$  | $$  $$$$
| $$\  $ | $$| $$            | $$    $$      | $$| $$      | $$        | $$  | $$\  $$$
| $$ \/  | $$| $$            |  $$$$$$/      | $$| $$      | $$$$$$$$ /$$$$$$| $$ \  $$
|__/     |__/|__/             \______/       |__/|__/      |________/|______/|__/  \__/";
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
