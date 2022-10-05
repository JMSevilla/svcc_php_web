<?php
include_once "../Connections/db.php";
include_once "../Queries/queries.php";

interface IPost {
    public function postData($data);
}

class PostController extends DatabaseConfiguration implements IPost {
    public function postData($data)
    {
        $queries = new QueriesBuilder();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($this->php_prepare($queries->insertSomething("api/insert-data", "users"))){
                $this->php_dynamic_handlers(':fname', $data['fname']);
                $this->php_dynamic_handlers(':lname', $data['lname']);
                if($this->execution()){
                    $response = array(
                        'status' => 'success'
                    );
                    echo json_encode($response);
                }
            }
        }
    }
}