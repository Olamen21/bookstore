
<?php
   include_once("libs/helper.php");
   $t = new Helper();
   $db = new Database();
   $book_id = $t->input_value('id');
    if($t->is_submit("Edit")) {
        
        if(!empty($book_id)){
            $book_title = $t->input_value('txtbook_title');
            $book_author = $t->input_value('txtbook_author');
            $book_price = $t->input_value('txtbook_price');
            $sql = "update books set book_title = :book_title, book_author = :book_author, book_price = :book_price where book_id = :book_id";
            $params = [
              'book_title' => $book_title,
              'book_author' => $book_author,
              'book_price' => $book_price,
              'book_id' => $book_id
            ];
            if($db->db_execute($sql,$params)){
                 $t->redirect($t->get_url('index.php'));
            }
         }
    }
    $sql = "select * from books where book_id = :book_id";
    $params = [
        'book_id' => $book_id
      ];
    $books =  $db->db_get_list_condition($sql,$params);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Document</title>
</head>
<body>
  
<form action="" method="post">
        <?php 
           if(!empty($books)):
             foreach($books as $book):
        ?>
        <input type="text" class="form-control" name="txtbook_title" value="<?php echo $book['book_title']; ?>"> <br>
        <input type="text" class="form-control" name="txtbook_author" value="<?php echo $book['book_author']; ?>"> <br>
        <input type="text" class="form-control" name="txtbook_price" value="<?php echo $book['book_price']; ?>"> <br>
        <?php
             endforeach;
            endif;  
        ?>
        <input type="hidden" name="action" value="Edit"> <br>
        <input type="submit" class="btn btn-light" value="Edit">
        <a href="index.php" class="btn btn-success">Back</a>
</form>
</body>
</html>




