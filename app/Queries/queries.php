<?php

class QueriesBuilder {
    public function insertSomething($condition, $table){
        if($condition == 'api/insert-data'){
            $sql = "insert into ".$table." values (default, :fname, :lname, current_timestamp)";
            return $sql;
        }
    }
}