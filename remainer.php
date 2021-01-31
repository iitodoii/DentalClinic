<?php

$curl = curl_init();

$list = array(
    'Remainer'=>'Remainer'
);
$myJson = json_encode($list);
echo $myJson;


curl_setopt_array($curl, array(

    // header (‘Content-type: text/html; charset=utf-8’);
    CURLOPT_URL => "https://notify-api.line.me/api/notify",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "message=เตือนๆ",
    CURLOPT_HTTPHEADER => array(
        "authorization: Bearer viyw9mVvY34D7OzHYFG7yfBpny7QsaHip96fzBoEaYo",
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded",
        "postman-token: f0453602-0739-cdc3-4d32-189b8680fa22"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
    echo $response;
}

?>