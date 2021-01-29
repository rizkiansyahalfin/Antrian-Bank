<!DOCTYPE html>
<html>
<head>
    <title>Sistem Bank</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <span class="anchor" id="formLogin"></span>
                        <!-- form card login -->
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0" align="center">Daftar</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" action="p_daftar.php" method="POST">
                                    <img src="logo1.jpg" title="Bank" height="250" width="400">
                                    <div style="margin-top: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="nama" value="" placeholder="name">
                                    </div>
                                    <div style="margin-top: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="email">
                                    </div>
                                    <div style="margin-top: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">
                                    </div>
                                    <div style="margin-top: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input id="login-username" type="password" class="form-control" name="password" value="" placeholder="password">
                                    </div>
                                    <input style="margin-top: 25px" class="btn btn-info btn-md float-right" type="submit" name="simpan" value="Daftar">
                                </form>
                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->
</body>
</html>
