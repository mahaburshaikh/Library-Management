<?php
include("config.php");
?>
<?php include ("headerm.php"); ?>
<h2 style="color: #1b5e20;margin-top: 20px;margin-bottom: 20px;text-align: center;text-decoration: underline">View All Post</h2>

<table class="tbl2" width="80%" style="margin-left: 210px">
    <tr style="background:rgba(27, 187, 46, 0.88)">
        <th width="5%">Serial</th> 
        <th width="10%">Name</th>
        <th width="10%">Author</th>
        <th width=10%>Faculty</th>
        <th width=10%>Department</th>
        
    </tr>

    <?php
    $i = 0;
    $statement = $db->prepare("SELECT * FROM book ORDER BY book_id ASC");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $i++;
        ?>

        <tr>  
            <td><?php echo $i; ?></td>
            <td><?php echo $row['book_name']; ?></td>
            <td><?php echo $row['author_name']; ?></td>
            <td><?php echo $row['faculty']; ?></td>
            <td><?php echo $row['dept']; ?></td>
        </tr>
    <?php
}
?>
     
    </table>
 <?php include ("footer.php"); ?>