<?php
    namespace App\Controller;
       
    use App\Controller\AppController;
    use Cake\Event\Event;
    use bjsmasth\Salesforce;
       
    class AccountsController extends AppController 
    {
        public $components = ["SFRest"];

       public function beforeFilter(Event $event)
       {
           parent::beforeFilter($event);
       }
       
       public function index()
       {
           $this->autoRender = false;
           
            try{
                $query = 'SELECT Id,Name FROM pt_taisaku__c LIMIT 100';
                $crud = new Salesforce\CRUD();
                $result = $crud->query($query);

                $i = 0;
                while ($i <= 99) {
                    echo $result["records"][$i]["Name"];
                    echo "<br>";
                    $i++;
                }

                print_r("<pre>");
                print_r($result);
                print_r("</pre>");

            } catch (Exception $e) {
                echo '捕捉した例外: ',  $e->getMessage(), "\n";
            }
   
       }
    }