<?php
    $response=array();
	$response['success']=0;
    $response['message']='Invalid Request';
    
    if((isset($_POST['username']) || isset($_POST['password'])))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

		include ("dbconnection_open.php");
		
        $query="select * from student where username='".$username."' and password='".$password."'";
        $result=mysql_query($query);

		if(mysql_num_rows($result)>0)
		{
			
			while($row=mysql_fetch_array($result))
			{
				$response['st_name']=$row['st_name'];
				$response['st_id']=$row['st_id'];
				$response['st_reg']=$row['st_reg'];
				$response['st_fac']=$row['st_fac'];
				$response['st_add']=$row['st_add'];
                                $response['username']=$row['username'];
                                $response['password']=$row['password'];

		        $response['message']="Welcome ".$row['st_name'];
			
			    break;
			}
			$response['success']=1;
		}
		else 
		{
			 $response['success']=0;
			 $response['message']='Wrong username or password';
		}
		
		include ("dbconnection_close.php");
    }
	else
	{
		$response['success']=0;
		$response['message']='Invalid request.';
	}
	
    echo json_encode($response);

?>