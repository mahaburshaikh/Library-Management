<?php
ob_start();
session_start();
if($_SESSION['name']!='admin'){
    header('location:login.php');
}
?>
<?php
include("../config.php");
?>
<?php include ("header.php"); ?>
<h2 style="text-align: center">View All Post</h2>

<table class="tbl2" width="100%">
    <tr>
        <th width="20%">Name</th> 
        <th width="15%">ID</th>
        <th width="15%">Registration</th>
        <th width=15>Faculty</th>
        <th width=15>Address</th>
        <th width="20">Action</th>
    </tr>

    <?php
    $i = 0;
    $statement = $db->prepare("SELECT * FROM student ORDER BY serial_id ASC");
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
           
            <td>
                <a href="st-edit.php?id=<?php echo $row['serial_id'];?>">Edit</a>
                &nbsp;/&nbsp;
                <a onclick='return confirmDelete();' href="st-delete.php?id=<?php echo $row['serial_id'];?>">Delete</a>
            </td>
        </tr>



    <?php
}
?>
     
    </table>
 <?php include ("footer.php"); ?>