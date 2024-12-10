<?php
    require_once("private/database.php");
    $statement = $db->query("SELECT id FROM `laporan` ORDER BY id DESC LIMIT 1");
    // $cekk = $statement->fetch(PDO::FETCH_ASSOC);
    if ($statement->rowCount()>0) {
        foreach ($statement as $key ) {
            // get max id from tabel laporan
            $max_id = $key['id']+1;
        }
    }
    if ($statement->rowCount()<1) {
        $max_id = 100;
    }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>FisipCare | Form Pengaduan Mahasiswa</title>
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Main Styles CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="shadow">
        <nav class="navbar navbar-fixed navbar-inverse form-shadow">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index">
                        <img alt="Brand" src="images/favicon1.png" width="50" height="50">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index">HOME</a></li>
                        <li class="active"><a href="lapor">LAPOR</a></li>
                        <li><a href="lihat">LIHAT PENGADUAN</a></li>
                        <li><a href="faq">FAQ</a></li>
                        <li><a href="bantuan">BANTUAN</a></li>
                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


        <!-- content -->
       <div class="main-content">
    <h3>Buat Laporan</h3>
    <hr/>
    <div class="row">
        <div class="col-md-8 card-shadow-2 form-custom">
            <form class="form-horizontal" role="form" method="post" action="private/validasi" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nomor" class="col-sm-3 control-label">Nomor Pengaduan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-exclamation-sign"></span></div>
                            <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo $max_id; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= @$_GET['nama'] ?>" required>
                        </div>
                        <p class="error"><?= @$_GET['namaError'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?= @$_GET['email'] ?>" required>
                        </div>
                        <p class="error"><?= @$_GET['emailError'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telpon" class="col-sm-3 control-label">Telpon</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
                            <input type="text" class="form-control" id="telpon" name="telpon" placeholder="087123456789" value="<?= @$_GET['telpon'] ?>" required>
                        </div>
                        <p class="error"><?= @$_GET['telponError'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= @$_GET['alamat'] ?>" required>
                        </div>
                        <p class="error"><?= @$_GET['alamatError'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tujuan" class="col-sm-3 control-label">Tujuan Pengaduan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-random"></span></div>
                            <select class="form-control" name="tujuan">
                                <option value="1">Pengaduan Dosen</option>
                                <option value="2">Pengaduan Fasilitas Kampus</option>
                                <option value="3">Pengaduan Lingkungan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pengaduan" class="col-sm-3 control-label">Isi Pengaduan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>
                            <textarea class="form-control" rows="4" name ="pengaduan" placeholder="Tuliskan Isi Pengaduan" required><?= @$_GET['pengaduan'] ?></textarea>
                        </div>
                        <p class="error"><?= @$_GET['pengaduanError'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="file" class="col-sm-3 control-label">Upload File</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-upload"></span></div>
                            <input type="file" class="form-control" id="file" name="file" accept=".jpg,.jpeg,.png,.pdf">
                        </div>
                        <p class="error"><?= @$_GET['fileError'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="captcha" class="col-sm-3 control-label">Captcha</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <img class="card-shadow-2" src="private/captcha.php"/> <br/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="captcha" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-open"></span></div>
                            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Masukkan Captcha di Atas" value="<?= @$_GET['captcha'] ?>" required>
                        </div>
                        <p class="error"><?= @$_GET['captchaError'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-3">
                        <input id="submit" name="submit" type="submit" value="Kirim Pengaduan" class="btn btn-primary-custom form-shadow">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <p class="error"><em>* Catat Nomor Pengaduan Untuk Melihat Status Pengaduan</em></p>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <a id="top" href="#" onclick="topFunction()">
        <i class="fa fa-arrow-circle-up"></i>
    </a>
    <script>
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.getElementById("top").style.display = "block";
        } else {
            document.getElementById("top").style.display = "none";
        }
    }
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
</div>
            // When the user scrolls down 100px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    document.getElementById("top").style.display = "block";
                } else {
                    document.getElementById("top").style.display = "none";
                }
            }
            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
            </script>
            <!-- link to top -->


            <!-- /.section -->
            <hr>
        </div>

        <!-- Footer -->
    <footer class="footer text-center">
        <div class="row">
            <div class="col-md-4 mb-5 mb-lg-0">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <i class="fa fa-top fa-map-marker"></i>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="text-uppercase mb-4">Kampus UNS</h4>
                    </li>
                </ul>
                <p class="mb-0">
                    Kentingan Jl. Ir. Sutami No.36, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126
                </p>
            </div>
            <div class="col-md-4 mb-5 mb-lg-0">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <i class="fa fa-top fa-rss"></i>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="text-uppercase mb-4">Sosial Media</h4>
                    </li>
                </ul>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                            <i class="fa fa-fw fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                            <i class="fa fa-fw fa-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <i class="fa fa-top fa-envelope-o"></i>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="text-uppercase mb-4">Kontak</h4>
                    </li>
                </ul>
                <p class="mb-0">
                    
                </p>
            </div>
        </div>
    </footer>
    <!-- /footer -->

    <div class="copyright py-4 text-center text-white">
        <small>Copyright &copy; FisipCare 2024</small>
    </div>
    <!-- shadow -->
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.js"></script>

</body>

</html>
