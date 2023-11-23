<?php
    include_once("libs/helper.php");
    $t = new Helper();
    $db = new Database();
    $sql = "select publisherid, count(book_id) as 'Số sách' from books group by publisherid";
    $result = $db->db_get_list($sql);
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
    
<table class="table  table-bordered">
        <tr>
            
            <th>Publisherid</th>
            <th>Số sách</th>
        </tr>
        <?php 
           if(!empty($result)):
             foreach($result as $r):
        ?>
        <tr>
              <td><?php echo $r['publisherid']; ?></td>
              <td><?php echo $r['Số sách']; ?></td>
              
        </tr>
        <?php
             endforeach;
            endif;  
        ?>
    </table>
    <a href="index.php" class="btn btn-success">Back</a>
</body>
</html>
