<?php


namespace App\Modules\Courses\Traits;


trait VdocipherIntegration
{

    private function runCurl($url , $request_method = "POST") {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $request_method,
            CURLOPT_POSTFIELDS => json_encode([
                "ttl" => 300,
            ]),
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Apisecret ".env('VDOCIPHER_API_SECRET'),
                "Content-Type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    public function getOtp($video_id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.vdocipher.com/api/videos/".$video_id."/otp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                "ttl" => 300,
            ]),
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Apisecret ".env('VDOCIPHER_API_SECRET'),
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        
        if ($err) {
            return response()->json(['status' => 0, 'message' => "cURL Error #:" . $err,'data' => []]);
        } else {
            $data = json_decode($response);
            return response()->json(['status' => 1, 'message' => 'success', 'data' => $data ? $data : null]);
        }
    }

    public function getVideos($id = false) {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.vdocipher.com/api/videos".($id != false ? "?q=" . $id :""),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Apisecret ".env('VDOCIPHER_API_SECRET'),
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json(['status' => 0, 'message' => "cURL Error #:" . $err,'data' => []]);
        } else {
            $data = json_decode($response);
            return response()->json(['status' => 1, 'message' => 'success', 'data' => $data && !empty($data->rows)? $data->rows : []]);
        }
    }

    public function buildVideo($id) {

        $response = $this->getOtp($id)->getData()->data;
        if(!empty($response->otp)) {
            $otp = $response->otp;
            $playbackInfo = $response->playbackInfo;
        }else {

            $otp = '';
            $playbackInfo = '';
        }

        return view('front.courses.render-video' , compact('otp','playbackInfo'))->render();
    }
}