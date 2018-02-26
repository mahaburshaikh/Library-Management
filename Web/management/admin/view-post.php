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
<h2>View All Post</h2>

<table class="tbl2" width="100%">
    <tr>
        <th width="5%">ID</th> 
        <th width="15%">Name</th>
        <th width="15%">Author</th>
        <th width=15>Faculty</th>
        <th width=15>Department</th>
        <th width="30">Action</th>
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
           
            <td>
                <a href="edit-post.php?id=<?php echo $row['book_id'];?>">Edit</a>
                &nbsp;/&nbsp;
                <a onclick='return confirmDelete();' href="delete-post.php?id=<?php echo $row['book_id'];?>">Delete</a>
            </td>
        </tr>



    <?php
}
?>
     
    </table>
 <?php include ("footer.php"); ?>