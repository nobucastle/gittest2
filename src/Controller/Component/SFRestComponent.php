<?php
    namespace App\Controller\Component;

    use Cake\Controller\Component;
    use bjsmasth\Salesforce;

    class SFRestComponent extends Component{

        public function initialize(array $config) {

            $options = [
                'grant_type' => 'password',
                'client_id' => CLIENT_ID,
                'client_secret' => CLIENT_SECRET,
                'username' => USER_NAME,
                'password' => PASS_PLUS_TOKEN
                ];
            
            $salesforce = new Salesforce\Authentication\PasswordAuthentication($options);
            $salesforce->authenticate();

        }
    }