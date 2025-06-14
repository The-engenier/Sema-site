<?php 
session_start();
require("config.php");

if(!isset($_SESSION['auser']))
{
    header("location:index.php");
}

//// add code
$error="";
$msg="";
if(isset($_POST['addabout']))
{
    
    $title=$_POST['title'];
    $content=$_POST['content'];
    $aimage=$_FILES['aimage']['name'];
    
    $temp_name1 = $_FILES['aimage']['tmp_name'];


    move_uploaded_file($temp_name1,"upload/$aimage");
    
    $sql="insert into about (title,content,image) values('$title','$content','$aimage')";
    $result=mysqli_query($con,$sql);
    if($result)
        {
            $msg="<p class='alert alert-success'>Inséré avec succès</p>";
                    
        }
        else
        {
            $error="<p class='alert alert-warning'>* Non inséré, une erreur est survenue</p>";
        }
}
?>
 
<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>LM HOMES | À propos</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        
        <!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
        
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="assets/css/select2.min.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    
        <!-- Main Wrapper -->
        
            <!-- Header -->
            <?php include("header.php"); ?>
            <!-- /Sidebar -->
            
            <!-- Page Wrapper -->
            <div class="page-wrapper">
            
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title">À propos</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Tableau de bord</a></li>
                                    <li class="breadcrumb-item active">À propos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">À propos de nous</h2>
                                </div>
                                <form method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <h5 class="card-title">À propos de nous</h5>
                                                <?php echo $error; ?>
                                                <?php echo $msg; ?>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Titre</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="title" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Image</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" name="aimage" type="file" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Contenu</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-left">
                                            <input type="submit" class="btn btn-primary"  value="Soumettre" name="addabout" style="margin-left:200px;">
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <!-- /Page Wrapper -->
        <!-- /Main Wrapper -->
        <script src="assets/plugins/tinymce/tinymce.min.js"></script>
        <script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
        <!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        
        <!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        
        <!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        
        <!-- Select2 JS -->
        <script src="assets/js/select2.min.js"></script>
        
        <!-- Custom JS -->
        <script  src="assets/js/script.js"></script>
    </body>

</html>