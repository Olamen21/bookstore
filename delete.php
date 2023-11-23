<?php
   include_once("libs/helper.php");
   $t = new Helper();
   $db = new Database();
   $book_id = $t->input_value('id');
   if(!empty($book_id)){
      $sql = "delete from books where book_id = :book_id";
      $params = [
        'book_id' => $book_id
      ];
      if($db->db_execute($sql,$params)){
           $t->redirect($t->get_url('index.php'));
      }
   }
?>

<h1>Delete</h1>