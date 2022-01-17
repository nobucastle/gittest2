<?php
echo __DIR__;
require_once '/app/curl.php';

/**
 * Salesforce APIを実行するクラス
 */
class Salesforce{
    public static $properties = [];
    const API_KEYS = [
        'client_id'=> '3MVG9I1kFE5Iul2CiAmMTx2ftH.9TueuWCvdjp3ir3RtEmtTpYqueCYnnB2UKRToFFNDRzdovzkzzJIfhvBI_',
        'username'=> 'system.test@komei.jp',
        'password'=> 'komei1117',
    ];

    /**
     * oauthを取得し返す
     *
     * @return array
     */
    public static function oauth(){
        #oauth取得済みの場合、設定されているoauthを返す
        if(self::property('oauth')){
            return self::property('oauth');
        }

        #oauth取得処理
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://login.salesforce.com/services/oauth2/token?grant_type=password'
                                            .'&client_id='.self::API_KEYS['client_id']
                                            .'&username='. self::API_KEYS['username']
                                            .'&password='. self::API_KEYS['password']
                    );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $oauth_data = Curl::execute($curl);
        $oauth_data = json_decode($oauth_data, true);

        #oauthを設定
        self::property('oauth', $oauth_data);

        return $oauth_data;
    }

    /**
     * 読み込み処理（取引先の単一のデータの取得）
     *
     * @param [string] $id
     * @return array
     */
    public static function read($id){
        if(empty($id)) return;

        $oauth = self::oauth();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://ap8.salesforce.com/services/data/v50.0/query/?q=SELECT+Id,+Name+FROM+Account+WHERE+Id='$id'");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: '.$oauth['token_type'].' '.$oauth['access_token'],
        ]);

        $data = Curl::execute($curl);
        return json_decode($data, true);
    }

    /**
     * 更新処理（取引先の単一のデータの更新）
     *
     * @param [string] $id
     * @param [array] $updates
     * @return array
     */
    public static function update($id, $updates){
        if(empty($id) or empty($updates)) return;

        $oauth = self::oauth();

        $json = json_encode($updates);
        $json = preg_replace('/\\\\\//', '/', $json);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://ap8.salesforce.com/services/data/v50.0/sobjects/Account/$id");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: '.$oauth['token_type'].' '.$oauth['access_token'],
            'Content-Type: application/json;charset=UTF-8',
        ]);

        $data = Curl::execute($curl);
        return json_decode($data, true);
    }

    /**
     * 登録処理（取引先のデータの登録）
     *
     * @param [array] $creates
     * @return array
     */
    public static function create($creates){
        if(empty($creates)) return;
        $oauth = self::oauth();

        $json = json_encode($creates);
        $json = preg_replace('/\\\\\//', '/', $json);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://ap8.salesforce.com/services/data/v50.0/sobjects/Account/Id");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: '.$oauth['token_type'].' '.$oauth['access_token'],
            'Content-Type: application/json;charset=UTF-8',
        ]);

        $data = Curl::execute($curl);
        return json_decode($data, true);
    }

    /**
     * 削除処理（取引先のデータの削除）
     *
     * @param [string] $id
     * @return array
     */
    public static function delete($id){
        if(empty($id)) return;
        $oauth = self::oauth();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://ap8.salesforce.com/services/data/v50.0/sobjects/Account/$id");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: '.$oauth['token_type'].' '.$oauth['access_token'],
        ]);

        $data = Curl::execute($curl);
        return json_decode($data, true);
    }

    /**
     * getter,setter
     *
     * @param [string] $name
     * @param $value
     * @return
     */
    public static function property($name, $value = null) {
        if (func_num_args() > 1) {
            return self::$properties[$name] = $value;
        } else {
            return isset(self::$properties[$name]) ? self::$properties[$name] : null;
        }
    }
}
