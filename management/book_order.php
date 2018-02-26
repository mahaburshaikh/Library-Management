<?php
include("config.php");
?>
<?php include ("headerm.php"); ?>
<h2 style="color: #1b5e20;margin-top: 20px;margin-bottom: 20px;text-align: center;text-decoration: underline">View All Order</h2>

<table class="tbl2" width="60%"  style="margin-left: 310px">
    <tr style="background:rgba(27, 187, 46, 0.88)">
        <th width="2%">Serial</th> 
        <th width="6%">Student Name</th>
        <th width="5%">Student Id</th>    
        <th width=5%>Book Name</th>
        <th width=5%>Author Name</th>
        
    </tr>

    <?php
    $i = 0;
    $statement = $db->prepare("SELECT * FROM book_order ");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $i++;
        ?>

        <tr>  
            <td><?php echo $i; ?></td>
            <td><?php echo $row['st_name']; ?></td>
            <td><?php echo $row['st_id']; ?></td>
            <td><?php echo $row['book_name']; ?></td>
            <td><?php echo $row['author_name']; ?></td>
        </tr>
    <?php
}
?>
     
    </table>
 <?php include ("footer.php"); ?>