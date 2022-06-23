<?php
session_start();
@$_SESSION['status'] === false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <form class="d-flex" role="search" method="POST" action="filter.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h5 class="mb-3">Import spreadSheet</h5>
                <hr>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="card card-body shadow">
                        <div class="row">
                            <div class="col-md-2 my-auto">
                                <h5>Select File</h5>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="import_file" id="form-control" />
                            </div>
                            <div class="col-md-4">
                                <button type="submit" name="import_file_btn" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Business Directory</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-borderd">
                            <?php
                            if (@$_SESSION['status'] == true) {
                                echo $_SESSION['data'];
                            } 
                            else if(@$_SESSION['str_search']){
                                echo $_SESSION['str_search'];
                                $_SESSION['status'] == true;
                            }
                            else {
                                echo "Import Valid file";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <form action="logout.php" method="POST"><button type="submit" class="btn btn-primary my-2">LogOut</button></form>
</body>

</html>