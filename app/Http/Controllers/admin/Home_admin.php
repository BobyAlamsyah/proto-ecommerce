<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class Home_admin extends Controller
{
    public function index(Request $request){
        //echo"admin";
      //print_r(session()->all());
      return view('admin/home');
    }

    public function kirim(){
            $curl = curl_init();

          curl_setopt_array($curl, array(
          CURLOPT_URL => "http://panel.rapiwha.com/send_message.php?apikey=NF5D7BZYW9LXKJRGZETW&number=+6285720002721&text=Test",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          ));

          $response = curl_exec($curl);
          $err = curl_error($curl);

          curl_close($curl);

          if ($err) {
          echo "cURL Error #:" . $err;
          } else {
          echo $response;
          }

          }
    }

