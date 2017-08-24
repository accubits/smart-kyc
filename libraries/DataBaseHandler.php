<?php


class DataBaseHandler {

    protected  $connectionHandler;
    protected $flag = false;
    //Defines if the connection was successful or not
    protected $does_fetch_all_exist=false;
    //If fetch all function Exists

    function __construct(){

    }

    function __destruct(){
        unset($this->connectionHandler);
        unset($this->flag);
       // unset($this->does_fetch_all_exist);
    }

    /*
     * Opens a database with the constants set in nvooy_user_db_config.api configuration file
     * and sets flag to true if connected to the database successfully, and false if it fails
     * @params No Arguements are passed
     * @return true if Successfully connected to the Database and false if failed to connect or some error occurs
     *
     * */
    public function openDatabase(dbConfig $config){

        try{
        $this->connectionHandler = mysqli_connect($config->HOST,
                                                  $config->USER,
                                                  $config->PASSWORD,
                                                  $config->DB_NAME);
        if($this->connectionHandler){
            $this->connectionHandler->set_charset('utf8');
            $this->flag= true;
            //Setting flag to true denotes success in connection
            return true;
        }
        return false;
    }
        catch(Exception $e){
             return false;
    }}

    /*
     * Executes the actual SQL provided by other Member functions. This function actually does the work and sent the
     * result back to the calling function.
     * @params String $query the query String which is actually passed to the function
     * @return array("CODE"=>STATUS CODE, "RESULT"=>RESULT ARRAY OF THAT QUERY, "ERROR_CODE"=> ERROR CODE)
     *         CODE         => status code of the query(0 => has an error, 1 => does not have an error )
     *         RESULT       => Result of that query(array mostly)
     *         ERROR_CODE   => Error code, if there is any error or else -1,usually mysqli_errorno(int)
     *
     * */
    public function executeQuery($query){

        try{
            $result = mysqli_query($this->connectionHandler,$query);
            if(mysqli_errno($this->connectionHandler)){
                //If some Error Occured

                return array("CODE"=>0,"RESULT"=>0,"ERROR_CODE"=>mysqli_errno($this->connectionHandler),"ERROR"=>mysqli_error($this->connectionHandler));

            }
            if($result){

                if(is_object($result)){

                        return array("CODE"=>1, "RESULT"=>mysqli_fetch_all($result,MYSQLI_ASSOC), "ERROR_CODE"=>-1);

                }
                    return array("CODE"=>1, "RESULT"=>$result, "ERROR_CODE"=>-1);
            }
            else{

                return array("CODE"=>1, "RESULT"=>null, "ERROR_CODE"=>-1);
            }
        }
        catch(Exception $e){
            return array("CODE"=>0, "RESULT"=>null,"ERROR_CODE"=>1000,"ERROR"=>"Some Exception Occured");
        }
    }


    /*
     * Get the Last Insert id from the database
     * @param No Arguements required
     * @return Int -1|unsigned non-zero Integer --> Id of the Last Inserted Row.
     * */
    public function getLastInsertId(){
        if($this->flag){
             return mysqli_insert_id($this->connectionHandler);
        }
        return -1;
    }


    /*
     * Closes the data base when this function is called and this also set the flag to false to
     * to restrict any other function calls if the user wants to make more even after closing the database
     * @params No arguements required while calling this function
     * @return returns a Boolean false if it fails to close the db and true if it successfully closes a db.
     * */
    public function closeDatabase(){
        try{
            mysqli_close($this->connectionHandler);

            $this->flag= false;
            //Setting the flag to false
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }


    /*
     * Create Update Query From the table Name and Query Array passed to the Actual Program
     * @param String $tableName   --> Name of the table to which it should be Queries Against
     * @param Array  $queryArray  --> Associative Array from which the Query can be constructed
     * @return String Query --> Query which can be used to update the Table.
     *
     * */
    public  function createInsertQuery($tableName,$queryArray){
        $query_columnName="INSERT INTO ".$tableName." (";
        $queryValue="VALUES (";

        $elemCount = count($queryArray);
        $i=1;

        foreach($queryArray as $key=>$query){

            //increment i for every Iteration
            if($i==$elemCount){
                //If this is the Last Element
                $query_columnName .=$key.")";
                $queryValue .=(filter_var($query,FILTER_VALIDATE_INT))?$query.");":"'".$query."');";
            }
            else{
                $query_columnName .="`".$key."`, ";
                $queryValue .=(filter_var($query,FILTER_VALIDATE_INT))?$query.", ":"'".$query."', ";
            }
            ++$i;
        }
        return $query_columnName." ".$queryValue;

    }

    /*
     *Create a SQL Query to update the database
     * @param String $tableName  --> Name of the Table to be operated on
     * @param Array $queryArray --> Associative Array with Query parameters
     * @param Array $condtionArray --> Array in which the WHERE Conditions comes, It can be operated when only 2 params are required
     * @return String Query Array
     *
     * */
    public function createUpdateQuery($tableName,$queryArray,$conditionArray,$limit=" "){
        $queryColumnName ="UPDATE ".$tableName." SET ";


        $elemCount = count($queryArray);
        $i=1;

        foreach($queryArray as $key=>$query){
            if($i == $elemCount){
                $queryColumnName .= $key."=".((filter_var($query,FILTER_VALIDATE_INT))?($query." "):("'".$query."' "));
            }
            else{
                $queryColumnName .= $key."=".((filter_var($query,FILTER_VALIDATE_INT))?($query.", "):("'".$query."', "));
            }
            ++$i;
        }
        if(count($conditionArray) == 1){
            if(filter_var($limit,FILTER_VALIDATE_INT)){
                $conditionQuery=" WHERE {$conditionArray[0][0]} = '{$conditionArray[0][1]}' LIMIT ".$limit.";";
            }else{
                $conditionQuery=" WHERE {$conditionArray[0][0]} = '{$conditionArray[0][1]}';";
            }

        }else{
            $conditionQuery=" WHERE ".$conditionArray["array"][0][0]." ".
            $conditionArray["array"][0][1].(filter_var($conditionArray["array"][0][2],FILTER_VALIDATE_INT)?$conditionArray["array"][0][2]:"'".$conditionArray["array"][0][2]."'")." ".
            $conditionArray["condition"]." ".
            $conditionArray["array"][1][0]." ".$conditionArray["array"][1][1].(filter_var($conditionArray["array"][1][2],FILTER_VALIDATE_INT)?$conditionArray["array"][1][2]:"'".$conditionArray["array"][1][2]."';");
        }

        return $queryColumnName.$conditionQuery;
    }

    /*
     * Create a read query from the array passed
     * @param String $tableName --> Table of the table where it is operated on
     * @param int|String|Array  --> columns to be returned 0|avoid --> *
     * @param int|Array         --> Conditions to be evaluated, array("condition"=>"OR|AND",
     *                                                                 "array"   => array(array("name of column","operator","arg"),
     *                                                                                    array("name of column","operator","arg"))
     * @return String Query
     * */

    public function createReadQuery($tableName,$queryArray=0,$conditionArray=0,$limit = ''){
        $query="SELECT ";

        if($queryArray===0){

            $query .="* FROM ".$tableName;
            }
        if(is_array($queryArray)){
            $count = count($queryArray);
            $i =1;
            foreach($queryArray as $queryString){
                $query .= $queryString.(($i==$count)?" ":", ");
                ++$i;
            }
        }
        else if(is_string($queryArray)){
            $query .= $queryArray." ";
        }
        $query .="FROM ".$tableName." ";
        if($conditionArray === 0){
            if(is_numeric($limit)){
                return $query." LIMIT ".$limit.";";
            }
            return $query;
        }

        if(count($conditionArray)==1){
            if(is_numeric($limit)){
                return $query."WHERE ".$conditionArray["array"][0][0]." ".$conditionArray["array"][0][1].(filter_var($conditionArray["array"][0][2],FILTER_VALIDATE_INT)?$conditionArray["array"][0][2].";":"'".$conditionArray["array"][0][2]."' LIMIT ".$limit.";");
            }
            return $query."WHERE ".$conditionArray["array"][0][0]." ".$conditionArray["array"][0][1].(filter_var($conditionArray["array"][0][2],FILTER_VALIDATE_INT)?$conditionArray["array"][0][2].";":"'".$conditionArray["array"][0][2]."';");
        }
        if(is_numeric($limit)){
            return $query."WHERE ".$conditionArray["array"][0][0]." ".$conditionArray["array"][0][1].(filter_var($conditionArray["array"][0][2],FILTER_VALIDATE_INT)?$conditionArray["array"][0][2]:"'".$conditionArray["array"][0][2]."'").
            " ".$conditionArray["condition"]." ".
            $conditionArray["array"][1][0]." ".$conditionArray["array"][1][1].(filter_var($conditionArray["array"][1][2],FILTER_VALIDATE_INT)?$conditionArray["array"][1][2]:("'".$conditionArray["array"][1][2]."' LIMIT ".$limit.";"))
                ;
        }
        return $query."WHERE ".$conditionArray["array"][0][0]." ".$conditionArray["array"][0][1].(filter_var($conditionArray["array"][0][2],FILTER_VALIDATE_INT)?$conditionArray["array"][0][2]:"'".$conditionArray["array"][0][2]."'").
               " ".$conditionArray["condition"]." ".
               $conditionArray["array"][1][0]." ".$conditionArray["array"][1][1].(filter_var($conditionArray["array"][1][2],FILTER_VALIDATE_INT)?$conditionArray["array"][1][2]:("'".$conditionArray["array"][1][2]."';"))
            ;

    }

    /*
     * Create a delete Query to delete a row from a table
     * @param String $tableName --> name of the Table where the command should be operated on
     * @param array  $conditionArray --> Condition to be evaluted for matching the row
     * @return String Query Made out of the Passed functions
     * */
    public function createDeleteQuery($tableName,$condtionArray){
        $query="DELETE FROM $tableName WHERE ";
        if(isset($condtionArray["condition"])){
            //Only if the condition Exists
            $query .= $condtionArray["array"][0][0]." ".$condtionArray["array"][0][1]." ".((filter_var($condtionArray["array"][0][2],FILTER_VALIDATE_INT))?$condtionArray["array"][0][2]:("'".$condtionArray["array"][0][2]."' "))." ".$condtionArray["condition"]." ".
                      $condtionArray["array"][1][0]." ".$condtionArray["array"][1][1]." ".((filter_var($condtionArray["array"][1][2],FILTER_VALIDATE_INT))?$condtionArray["array"][1][2]:("'".$condtionArray["array"][1][2]."'"));
            return $query.";";
        }
        else{
            //If condition does not exist
            $query .= $condtionArray["array"][0][0]." ".$condtionArray["array"][0][1]." ".((filter_var($condtionArray["array"][0][2],FILTER_VALIDATE_INT))?$condtionArray["array"][0][2]:("'".$condtionArray["array"][0][2]."' ")).";";
            return $query;
        }
    }

    /*
     * Escape All the String inside an array
     * @param Array $Querys Array with all the elements to be Escaped
     * @param Array $comparisonArray If an array is passed then the elements in this array is only matched against the host array to be escaped
     * @return Array Returns the actual Array with all the escaped strings.
     *
     * */
    public function escapeQueryString($Querys,$comparisonArray=0){

        if(!$comparisonArray){
            foreach($Querys as $key=>$query){
                $Querys[$key] =mysqli_real_escape_string($this->connectionHandler,$query);
            }
            return $Querys;
        }
        foreach($comparisonArray as $item){
            $Querys[$item] = mysqli_real_escape_string($this->connectionHandler,$Querys[$item]);
        }
        return $Querys;
    }

    public function queryExists($selection, $table, $condition = array()) {
        if (!empty($condition)) {
            $conArr = [];
            foreach ($condition as $key => $cond) {
                $conArr[] = "{$key} = '{$cond}'";
            }
            $condition = implode($conArr);
        } else {
            $condition = "";
        }
        return $query = "SELECT $selection FROM {$table} WHERE $condition";
    }

    public function escapeString($string){
        return mysqli_real_escape_string($this->connectionHandler, $string);
    }

    public function affectedRows() {
        return $this->connectionHandler->affected_rows;
    }

    public function delNumRows() {
        return $this->connectionHandler->num_rows;
    }

    public function autoCommit($flag) {
        if ($flag == FALSE)
            mysqli_autocommit($this->connectionHandler,FALSE);
        else
            mysqli_commit($this->connectionHandler);
    }
}