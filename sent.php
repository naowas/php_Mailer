<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Email</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.(DESC)</th>
      <th scope="col">Email ID</th>
      <th scope="col">Subject</th>
      <th scope="col" style="width: 30.00%">Message</th>
      <th scope="col">Time Stamp</th>
    </tr>
  </thead>
  

  <tbody>

    <?php
    $sql = "SELECT * FROM naowas_mail_1 ORDER BY id DESC";
    $query = $conn -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $count=1;
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
    ?>
    <tr>
       <td><?php echo $count ; ?></td>
       <td><?php echo $result -> email_id ; ?></td>
       <td><?php echo $result -> sub ; ?></td>
       <td><?php echo $result -> message_body ; ?></td>
       <td><?php echo $result -> sent_time ; ?></td>
    </tr>
<?php 
$count=$count+1;
 }
}
?> 
  </tbody>
 
</table>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>