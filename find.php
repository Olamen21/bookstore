<?php
    include_once("libs/helper.php");
    $t = new Helper();
    $db = new Database();
    $book_title = $t->input_value('txtbook_title');
     if($t->is_submit("Search")) {
         if(!empty($book_title)){
            global $result;
            $sql = "select * from books where book_title like '%$book_title%'";
            $result = $db->db_get_list($sql);
            foreach($result as $r):
                echo $r['book_title']." | ";
                echo $r['book_author']." | ";
                echo $r['book_price']." | ";
            endforeach;
          }
     }
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
        <input type="text" class="form-control" name="txtbook_title"> <br>
        <input type="hidden" name="action" value="Search"> <br>
        <a href="index.php" class="btn btn-success">Back</a>
        <input type="submit"  class="btn btn-light"  value="Search">
</form>
</body>
</html>



