<?php
header("Access-Control-Allow-Origin: http://goophim.com");
$url=urldecode($_GET['url']);
if(preg_match('/hdviet.com/', $url))
    $referer='http://m.hdviet.com/phim-bo/tam-sinh-tam-the-thap-ly-dao-hoa-ten-sreat-iii-of-peach-blossom-tap-42.html';
else
    $referer=$url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, urldecode($url));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36 OPR/62.0.3331.18';
$headers[] = 'Referer: https://fimfast.com/tik-tok-kinh-thien-dai-nghich-chuyen';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($curl, $data) {
    echo $data;
    return strlen($data);
});
curl_exec($ch);
curl_close($ch);
