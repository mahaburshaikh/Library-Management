
<!doctype html>
<html>
    <head>
        <title>Library Management System</title>
        <link rel="stylesheet" href="../style-admin.css">
        <script type='text/javascript'>
            function confirmDelete(){
                return confirm("Do U Want To Delete Data?");
            }
        </script>
           <!-- Fancybox jQuery -->
	<script type="text/javascript" src="../fancybox/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="../fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="../fancybox/main.js"></script>
	<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox.css" />
	<!-- //Fancybox jQuery -->
        
        <!-- CKEditor Start -->
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
	<!-- // CKEditor End -->
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
            <h1>Admin panel</h1>
            </div>
            <div id="container">
                <div id="sidebar">
                    <h2>Page option</h2>
                    <ul>
                        <li><a href="../index.php">Front View</a></li>
                        <li> <a href="home.php">Home</a></li>
                        <li> <a href="add-post.php">Add Books</a></li>
                        <li> <a href="view-post.php">View Books</a></li>
                        <li> <a href="student.php">View Students</a></li>
                        <li><a href="st-add.php">Add Students</a></li>
                        <li><a href="logout.php">LogOut</a></li>
                        
                          
                    </ul>
                    
                    
                </div>
                <div id="content">