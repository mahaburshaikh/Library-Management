
<?php include ("config.php"); ?>

<?php include ("headerm.php"); ?>

 <!-- <tr>
  <table style="width:50%;height: 100%;margin-left: 400px;background: #69f0ae">
      <td style="text-align: center"><img src="images/pstulogo1.jpg" style="width: 100" height="100"></td>
 
 
  </tr> -->

<?php
if(!isset($_REQUEST['id'])){
    header("location:studentview.php");
}
else{
    $id = $_REQUEST['id'];
}
?>

<table style="width:30%;height: 60%;margin-left: 400px;background-image:url(images/hall.jpg);margin-top: 30px;border: 2px solid #1b5e20">

    <?php
    $i = 0;
    $statement = $db->prepare("SELECT * FROM student where serial_id=?");
    $statement->execute(array($id));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $i++;
        ?>

        <tr>  

            <td>

                <p>
               
                    <form  action="" method="post" >
                    <div style="margin-bottom:30px;text-align: center">
                        <img src="images/pstulogo1.jpg" style="width: 150" height="40%">
                    </div>
                       
                    <table   style="width:70%;height:100%;margin-left: 70px">

                        <tr style="border-bottom:1px solid">
                            <td style="text-align: center;color: red"><b>Name</b></td>

                            <td><?php echo $row['st_name']; ?></td>
                        </tr>
                        <tr style="border-bottom:1px solid">
                            <td style="text-align: center;color: red"><b>Id</b></td>

                            <td><?php echo $row['st_id']; ?></td>
                        </tr>
                        <tr style="border-bottom:1px solid">
                            <td style="text-align: center;color: red"><b>Reg</b></td>

                            <td><?php echo $row['st_reg']; ?></td>
                        </tr>
                        <tr style="border-bottom:1px solid">
                            <td style="text-align: center;color: red"><b>Faculty</b></td>

                            <td><?php echo $row['st_fac']; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;color: red"><b>Address</b></td>

                            <td><?php echo $row['st_add']; ?></td>
                        </tr>


                    </table>
                </form>    
                </p>
                </div>
               
            </td>
        </tr>



        <?php
    }
    ?>

</table>
<?php include ("footer.php"); ?>