<?php

require 'openid.php';
require 'redirect_conf.php';

require_once ('../../database/db.php');

$_STEAMKEYAPI = '2456924FBC06ECFA808ADC638182184D';


try {
    $openid = new LightOpenID('localhost');
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'https://steamcommunity.com/openid/?l=english';
            header('Location: ' . $openid->authUrl());
        } else {
            echo "<h2>Connect to Steam</h2>";
            echo "<form action='?login' method='post'>";
            echo "<input type='image' src='#'>";
        }
    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication';
    } else {
        if($openid->validate()) {
            $id = $openid->identity;
            $ptn = "/^https:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
            preg_match($ptn, $id, $matches);

            $url = "https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$_STEAMKEYAPI&steamids=$matches[1]";
            $json_object = file_get_contents($url);
            $json_decoded = json_decode($json_object);

            foreach($json_decoded->response->players as $player) {
                $sql_fetch_id = "SELECT * FROM steam_user WHERE steamid = $player->steamid";
                $query_id = mysqli_query($db, $sql_fetch_id);

                if(mysqli_num_rows($query_id) == 0) {
                    $sql_steam = "INSERT INTO steam_user (name, steamid, avatar) VALUES ('$player->personaname', '$player->steamid', '$player->avatar')";
                    mysqli_query($db, $sql_steam);
                }

                $_SESSION['steamid'] = $matches[1];

                if (!headers_sent()) {
                    header('Location: '. $steamauth['loginpage']);
                    exit;
                } else {
                    ?>
                    <script type="text/javascript">
                        window.location.href="<?= $steamauth['loginpage']  ?>";
                    </script>
                    <noscript>
                        <meta http-equiv="refresh" content="0;url=<?= $steamauth['loginpage']?>" />
                    </noscript>
                    <?php
                    exit;
                }
            }
        } else {
            echo "User is not logged in";
        }
    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
?>
