<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $parser = service('parser');
        $data= array(
            'nim' => null,
            'prodi' =>null,
            'fullname' => null,
            'data' =>[]
        );
        return view('header_view').$parser->setData($data)->render('table_view').view('footer_view');
    }

    public function auth(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $recaptcha = $this->request->getPost('g-recaptcha-response');
        // var_dump($recaptcha);
        // die();

        $secret = getenv('recaptcha3.secret'); // Ganti dengan secret key Anda
    
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $recaptcha);
        $responseData = json_decode($verifyResponse);

        if (!$responseData->success)
        {
               // reCAPTCHA gagal,
               return redirect('/')->with('error', '"There was an error verifying your request');
        } 

        $islogin = $this->_login_curl($username, $password);
        // var_dump($islogin);
        // die();
        $validationRules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $validation = service('validation');
        $validation->setRules($validationRules);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if(!$isDataValid){
            return redirect()->to('/')->withInput()->with('errors', $validation->getErrors());
        }

        if($islogin=="failed"){
            return redirect('/')->with('error', 'Your login attempt was unsuccessful. Please verify your username and password.');
        }else{

            $ses = $this->_gentoken_curl($username,$password);
            $resses = json_decode($ses);
            // var_dump($resses->accessToken);

            $hispay = $this->_gethistorypayment($resses->accessToken);
            $jsonhispay = json_decode($hispay);
            $getlastrow = count($jsonhispay)-1;
            // var_dump($jsonhispay[$getlastrow]);
            // die();
            $datasingle = array(
                $jsonhispay[$getlastrow]
            );


            $datases = json_decode($this->_createses($username));
            // var_dump($datases);
            // die();
            $parser = service('parser');

            $data = array(
                'nim' => $datases->identityid,
                'prodi' =>$datases->prodi,
                'fullname' => $datases->fullname,
                'data' => $datasingle
            );

            // return $parser->setData($data)->render('welcome_message');
            return view('header_view').$parser->setData($data)->render('table_view').view('footer_view');
        }

        
    }

    private function _login_curl($username=null, $password=null){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => getenv('API_URL').'?mod=login2&username='.$username.'&password='.$password,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    private function _gentoken_curl($username=null, $password=null){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => getenv('API_URL').'?mod=genToken&username='.$username.'&password='.$password,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    private function _gethistorypayment($token = null)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => getenv('API_URL').'?mod=HISpembayaran&token='.$token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        )
        );

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }

    private function _createses($username=null){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => getenv('API_URL').'?mod=createSession&usid='.$username,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
