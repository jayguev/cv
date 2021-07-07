 <?php
    if (!isset($_SESSION)) {
        session_start();
    }

    include_once("include/connection.php");

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pword = $_POST['pword'];
        $sql = "SELECT * FROM sims_db.tbl_users WHERE email = '$email' AND pword = '$pword'";
        $result = sqlsrv_query($conn, $sql, array(), array("Scrollable" => 'static'));
        $rowC = sqlsrv_num_rows($result);

        if ($result === false) {
            echo "Database Error";
            die(print_r(sqlsrv_errors(), true));
        } else {
            while ($rowU = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                if ($rowC == 1) {
                    $_SESSION['email'] = $rowU['email'];
                    $_SESSION['pword'] = $rowU['pword'];
                    if ($rowU['role'] == 5) { ?>
                     <script>
                         window.location.replace("admin/");
                     </script>
 <?php
                    }
                }
            }
        }
    }


    ?>
 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
     <link rel="stylesheet" href="css\bootstrap-4.1.3-dist\css\bootstrap.min.css">
     <link rel="stylesheet" href="css\font-awesome-4.7.0\css\font-awesome.min.css">
     <link rel="stylesheet" href="css/sims-custom.css">
     <title>FMB Portal Login</title>
 </head>

 <body class="bg-soft">

     <main>
         <!-- navigation bar -->
         <div class="row">
             <?php include("header.php"); ?>
         </div>




         <div class="row w3-animate-top">
             <div class="col-xs-2 col-sm-2 col-md-3 col-lg-4"> </div>
             <div class="col-xs-8 col-sm-8 col-md-6 col-lg-4">
                 <!-- <div class="col-lg-3 col-md-6 col-sm-5 d-flex align-items-center"> -->
                 <div class="row justify-content-center form-bg-image">
                     <div class="col-12 d-flex align-items-center justify-content-center">
                         <div class="signin-inner my-3 my-lg-0 bg-white shadow-soft border rounded border-light p-4 p-lg-5 w-100 fmxw-500">

                             <div class="text-center mb-4">
                                 <img class="mb-4" src="img\denr_fmb_logo.png" alt="denr_fmb_logo_is.jpg" width="200">
                                 <div class="text-center text-md-center mb-4 mt-md-0">
                                     <h1 class="mb-0 h3">Welcome to FMB Portal</h1>
                                 </div>

                             </div>
                             <form action="#" class="mt-4">
                                 <!-- Form -->
                                 <div class="form-group mb-4">
                                     <label for="email">Your Email</label>
                                     <div class="input-group">
                                         <span class="input-group-text" id="basic-addon1"><span class="fa fa-envelope"></span></span>
                                         <input type="email" name="email" class="form-control" placeholder="example@company.com" id="email">
                                     </div>
                                 </div>
                                 <!-- End of Form -->
                                 <div class="form-group">
                                     <!-- Form -->
                                     <div class="form-group mb-4">
                                         <label for="password">Your Password</label>
                                         <div class="input-group">
                                             <span class="input-group-text" id="basic-addon2"><span class="fa fa-unlock-alt"></span></span>
                                             <input type="password" name="pword" placeholder="Password" class="form-control" id="password" required="">
                                         </div>
                                     </div>
                                     <!-- End of Form -->
                                     <div class="d-flex justify-content-between align-items-center mb-4">
                                         <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                                             <label class="form-check-label" for="defaultCheck5">
                                                 Remember me
                                             </label>
                                         </div>
                                         <div><a href="#" class="small text-right">Forgot password?</a></div>
                                     </div>
                                 </div>
                                 <button name="login" type="submit" class="btn btn-block btn-primary">Sign in</button>
                             </form>

                         </div>
                     </div>
                 </div>
             </div>


         </div>
     </main>


 </body>

 </html>