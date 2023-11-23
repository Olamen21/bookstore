<?php
    include_once("libs/helper.php");
    $t = new Helper();
    $db = new Database();
      if($t->is_submit("Create")){
        $book_title = $t->input_value('txtbook_title');
        $book_author = $t->input_value('txtbook_author');
        $book_price = $t->input_value('txtbook_price');
        $publisherid = $t->input_value('txtpublisherid');
        if(!empty($book_title) && !empty($book_author) && !empty($book_price) && !empty($publisherid)){
            //Insert
            $sql = "insert into books(book_title,book_author,book_price,publisherid) values(:book_title,:book_author,:book_price,:publisherid)";
            $params = [
                'book_title' => $book_title,
                'book_author' => $book_author,
                'book_price' => $book_price,
                'publisherid' => $publisherid
            ];
            if($db->db_execute($sql,$params)){
                echo "<script>alert('Insert successfully !')</script>";
            }
        } 
     }  
      

   //list
   $sql = "select * from books";
   $list =  $db->db_get_list($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Book Manager</title>
</head>
<body>
    <h2>Book Manager</h2>
    <hr>
    <form action="" method="post">
        <input type="text" class="form-control" name="txtbook_title" placeholder="Book title..."> <br>
        <input type="text" class="form-control" name="txtbook_author" placeholder="Book author ..."> <br>
        <input type="text" class="form-control" name="txtbook_price" placeholder="Book price ..."> <br>
        <input type="text" class="form-control" name="txtpublisherid" placeholder="Publisherid ..."> <br>
        <input type="hidden" name="action" value="Create"> <br>
        <input type="submit" class="btn btn-light" value="Create">
        <a href="find.php" class="btn btn-success">Tìm kiếm</a>
        <a href="publisher.php" class="btn btn-success">Publisher</a>
        <a href="thongke.php" class="btn btn-success">Thống kê</a>
    </form>
    <h2>List of Book</h2>
    <table class="table">
        <tr>
            <th>Book id</th>
            <th>Book title</th>
            <th>Book author</th>
            <th>Book price</th>
            <th>Publisherid</th>
        </tr>
        <?php 
           if(!empty($list)):
             foreach($list as $b):
        ?>
        <tr>
              <td><?php echo $b['book_id']; ?></td>
              <td><?php echo $b['book_title']; ?></td>
              <td><?php echo $b['book_author']; ?></td>
              <td><?php echo $b['book_price']; ?></td>
              <td><?php echo $b['publisherid']; ?></td>
              <td>
                <a href="<?php echo $t->get_url('delete.php?id=' . $b['book_id']); ?>" class="btn btn-success">Delete</a> |
                <a href="<?php echo $t->get_url('edit.php?id=' . $b['book_id']); ?>" class="btn btn-success">Edit</a>
              </td>
        </tr>
        <?php
             endforeach;
            endif;  
        ?>
    </table>
</body>
</html>