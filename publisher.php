<?php
    include_once("libs/helper.php");
    $t = new Helper();
    $db = new Database();
      if($t->is_submit("Create")){
        $publisher_name = $t->input_value('txtpub');
        if(!empty($publisher_name)){
            //Insert
            $sql = "insert into publisher(publisher_name) values(:publisher_name)";
            $params = [
                'publisher_name' => $publisher_name,
                
            ];
            if($db->db_execute($sql,$params)){
                echo "<script>alert('Insert successfully !')</script>";
            }
        }
     }  
      

   //list
   $sql = "select * from publisher";
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
    <h2>Publisher</h2>
    <hr>
    <form action="" method="post">
        <input type="text" class="form-control" name="txtpub" placeholder="Publisher name..."> <br>
        <input type="hidden" name="action" value="Create"> <br>
        <input type="submit" class="btn btn-light" value="Create">
        <a href="index.php" class="btn btn-success">Back</a>
    </form>
    <h2>List of publisher</h2>
    <table class="table">
        <tr>
            <th>Publisher name</th>
            <th>Publisher id</th>
        </tr>
        <?php 
           if(!empty($list)):
             foreach($list as $b):
        ?>
        <tr>
              <td><?php echo $b['publisher_name']; ?></td>
              <td><?php echo $b['publisherid']; ?></td>
              
              
        </tr>
        <?php
             endforeach;
            endif;  
        ?>
    </table>
</body>
</html>