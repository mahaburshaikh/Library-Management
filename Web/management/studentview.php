<?php include ("config.php");?>
<?php include ("headerm.php");?>

<table class="tbl2"  width="80%" style="margin-left: 500px" >
   
    <tr>
        <th style="font-size: 30px;color:#1b5e20;text-decoration: underline"  > Student Name</th> 
 
    </tr>
    
    
    <?php
    $i = 0;
    $statement = $db->prepare("SELECT * from student order by st_id ASC");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row){
        $i++;
        ?>
    <tr>
        <td><a href="studentdetails.php?id=<?php echo $row['serial_id'];?>" style="color:black;font-size: 20px"><?php echo $row['st_name'];?></a></td>
        
    </tr>
<?php
    }
    ?>
    
</table>

<?php include ("footer.php");?>
