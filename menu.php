<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 col-sm-12 col-xs-12 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline"><b>Conciergerie</b></span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center  align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0 text-white">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                       
                    </li>
                    <li>
                  <?php echo' <a href="article.php"  class="nav-link px-0 align-middle text-white"> 
                          <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Articles</span> </a>';?>
                       <!-- <a href="article.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                          <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Articles</span> </a> -->
                    </li>
                    <li>
                        <a href="client.php" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Commandes</span></a>
                    </li>
                    <li>
                    <?php echo' <a href="client.php"  class="nav-link px-0 align-middle text-white ">
                          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Clients</span></a>';?>
                    </li>
                   
                    
                </ul>
                
            </div>
        </div>