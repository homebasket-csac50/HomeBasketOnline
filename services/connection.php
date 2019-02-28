<?php
  ob_start();
      if(!isset($_SESSION)) 
      { 
          session_start(); 
      } 
  
      $DB_SERVER = 'localhost';
      $DB_USER = 'root';
      $DB_PASS = '';
      $DB_NAME = '';

  
      class Connection{
          private static $con;
          function __Construct(){
              self::$con= mysqli_connect('localhost','root','','homebasket');
              mysqli_set_charset(self::$con, 'utf8');
              //mysqli_autocommit(self::$con,false);
              if(mysqli_connect_errno()){
                      die("Database connection failed:".mysqli_connect_error());
              }
          }
          public function runQuery($query){
              /*try{
                  foreach($query as $q){
                      mysqli_query(self::$con,$q);
                  }
                  mysqli_commit(self::$con);
              }catch (Exception $e){
                  rollback(self::$con);
                  echo $e->message();
              }*/
              $result=mysqli_query(self::$con,$query);
              $this->confirm_query($result);
              return $result;
          }
          private function confirm_query($result){
              if(!$result)
              {
                  $output ="Database query failed ".mysqli_error(self::$con);
                  die($output);
              }
          }
          public function getId(){
              return mysqli_insert_id(self::$con);
          }
          public function fetchArray($res){
              return mysqli_fetch_assoc($res);
          }
          public function close_connection(){
              if(isset(self::$con)){
                  mysqli_close(self::$con);
              }
          }
          public function num_rows($result){
              return mysqli_num_rows($result);
          }
          public function insert_id(){
              return mysqli_insert_id(self::$con);
          }
          public function affected_rows(){
              return mysqli_affected_rows(self::$con);
          }
      
      
      }
      
  ?>  
