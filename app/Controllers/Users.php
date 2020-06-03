<?php namespace App\Controllers;

use App\Models\UserModel;
use Facebook;
use Facebook\Exceptions\FacebookSDKException;

class Users extends BaseController
{
    //making login here
    public function index()
    {
        $data = [];
        echo view('templates/header', $data);
        echo view('code_post_timeline', $data);
        echo view('templates/footer', $data);
        log_message('info', 'Loaded Users controller with index.');
    }

    /**
     * This function calls login screen.
     */
    public function login(){
        $data = [];
        $data['facebook_login_url'] = $this->facebook_login_url();

        if($this->request->getMethod() == 'post'){
            $rules = [
                'email'             => ['label' => 'Email address',     'rules' => 'required|valid_email'],
                'password'          => ['label' => 'Password',          'rules' => 'required|authenticateUser[email,password]'],
            ];

            $errors = [
                'password' => [
                    'authenticateUser' => 'User authentication failed.'
                ]
            ];

            if(!$this->validate($rules, $errors)){
                //authentication unsuccessful
                $data['validation'] = $this->validator;
            } else{
                //authentication successful
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();
                $this->setUserSession($user);
                return redirect()->to('/timeline/index');
            }
        }

        echo view('templates/header', $data);
        echo view('login', $data);
        echo view('templates/footer', $data);
    }
    //--------------------------------------------------------------------


    /**
     * This function first checks if post method has been used in last request.
     * If the last request used post method, it validates fields
     */
    public function register(){
        $data = [];

        if($this->request->getMethod() == 'post'){
            $rules = [
                'nickname'          => ['label' => 'Nickname',          'rules' => 'required|alpha_numeric|min_length[3]|max_length[30]'],
                'email'             => ['label' => 'Email address',     'rules' => 'required|min_length[6]|max_length[60]|valid_email|is_unique[Users.email]'],
                'password'          => ['label' => 'Password',          'rules' => 'required|min_length[8]|max_length[255]'],
                'password_confirm'  => ['label' => 'Confirm password',  'rules' => 'required|matches[password]']
            ];

            if(!$this->validate($rules)){
                //validation unsuccessful
                $data['validation'] = $this->validator;
            } else{
                //validation successful
                $model = new UserModel();
                $newData = [
                    'nickname'      => $this->request->getVar('nickname'),
                    'email'         => $this->request->getVar('email'),
                    'password'      => $this->request->getVar('password'),
                    'created_at'    => date('Y-m-d H:m:s'),
                    'type'          => 'user',
                    'active'        => true
                ];
                try{
                    $model->save($newData);
                } catch (\ReflectionException $reflectionException){
                    log_message('error', 'Reflection exception caught during registration process. Details: '.$reflectionException->getMessage());
                }
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/users/login');
            }
        }

        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }

    public function logout(){
        session()->destroy();

        return redirect()->to('/');
    }

    //--------------------------------------------------------------------

    private function setUserSession($user){
        $data = [
            'id'            => $user['id'],
            'nickname'      => $user['nickname'],
            'email'         => $user['email'],
            'type'          => $user['type'],
            'login'         => true
        ];

        session()->set($data);
        return true;
    }

    private function facebook_login_url(){
        try {
            $fb = new \Facebook\Facebook([
                'app_id' => '2389443598021091',
                'app_secret' => 'c47c6504c1cefe0a7af42ac6588e6235',
                'default_graph_version' => 'v2.10',
            ]);
        } catch (FacebookSDKException $e) {
            log_message('error', 'facebook login oauth2 failed. Error message: '.$e->getMessage());
        }

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl(base_url().'/users/fb_callback', $permissions);

        return $loginUrl;
    }

    public function fb_callback(){
        try {
            $fb = new Facebook\Facebook([
                'app_id' => '2389443598021091',
                'app_secret' => 'c47c6504c1cefe0a7af42ac6588e6235',
                'default_graph_version' => 'v2.10',
            ]);
        } catch (FacebookSDKException $e) {
            log_message('error', 'facebook login oauth2 failed. Error message: '.$e->getMessage());
        }

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (! isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

        // Logged in
        echo '<h3>Access Token</h3>';
        var_dump($accessToken->getValue());

        // The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        echo '<h3>Metadata</h3>';
        var_dump($tokenMetadata);

        // Validation (these will throw FacebookSDKException's when they fail)
        try {
            $tokenMetadata->validateAppId(2389443598021091);
        } catch (FacebookSDKException $e) {
            log_message('error', 'facebook login oauth2 failed. Error message: '.$e->getMessage());
        }
        // If you know the user ID this access token belongs to, you can validate it here
        //$tokenMetadata->validateUserId('123');
        try {
            $tokenMetadata->validateExpiration();
        } catch (FacebookSDKException $e) {
            log_message('error', 'facebook login oauth2 failed. Error message: '.$e->getMessage());
        }

        if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
                exit;
            }

            echo '<h3>Long-lived</h3>';
            var_dump($accessToken->getValue());
        }

        $_SESSION['fb_access_token'] = (string) $accessToken;

        // User is logged in with a long-lived access token.
        // You can redirect them to a members-only page.
        //header('Location: https://example.com/members.php');
    }
}