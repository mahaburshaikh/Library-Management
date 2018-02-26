<?php
include("config.php");
?>
<?php include ("headerm.php"); ?>
<h2 style="text-align: center;color:#1b5e20;margin-top: 20px;margin-bottom: 20px;text-decoration: underline">View All Post</h2>

<table class="tbl2" width="80%" style="margin-left: 250px">
    <tr style="padding: 2px">
        <th width="20%">Name</th> 
        <th width="15%">ID</th>
        <th width="15%">Registration</th>
        <th width=15>Faculty</th>
        <th width=15>Address</th>
    </tr>

    <?php
    $i = 0;
    $statement = $db->prepare("SELECT * FROM student order by st_id ASC");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $i++;
        ?>

        <tr>  
 
           <td><?php echo $row['st_name']; ?></td>
            <td><?php echo $row['st_id']; ?></td>
            <td><?php echo $row['st_reg']; ?></td>
            <td><?php echo $row['st_fac']; ?></td>
            <td><?php echo $row['st_add']; ?></td>
        </tr>



    <?php
}
?>
     
    </table>
 <?php include ("footer.php"); ?>