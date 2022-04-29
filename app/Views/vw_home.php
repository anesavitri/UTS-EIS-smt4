<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Somad - Social Networking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/starter-template/">



    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/starter-template/starter-template.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="Home">Somad</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="Home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <main class="container">

        <div class="starter-template text-center py-5 px-3">
            <h1>Hai ! <?= session()->get('name'); ?></h1>
            <p class="lead">Selamat datang di social media somad</p>
        </div>

        <div class="starter-template px-3">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4>Periksa Panjang Konten</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url(); ?>/home/process">
                <div class="form-group">
                    <input type="hidden" name="nama" value="<?= session()->get('name'); ?>">
                    <label for="konten">Buat Postingan!</label>
                    <textarea class="form-control" name='konten' id="konten" rows="3" placeholder="Mungkin perasaan kamu?"></textarea>
                </div>

                <div class="form-group py-2">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>

            </form>
        </div>
        </form>
        <br>
        <div class="starter-template ">
            <h3>Timeline</h3>
            <?php
            $db = \Config\Database::connect();
            //Mengurutkan postingan yang terbaru
            $query   = $db->query('SELECT * FROM `postingan` ORDER BY created_at DESC');
            $results = $query->getResultArray();

            foreach ($results as $row) {
            ?>
                <br>
                <div class="card">
                    <div class="card-header">
                        <b> Diposting oleh: </b><?php echo $row['name']; ?> <br>
                        <b> Diupload pada:</b> <?php echo $row['created_at'] ?> <br>
                        <a href=""> <i class="fa fa-trash"></i> </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Konten:
                            <br> <?php echo $row['content']; ?>
                        </li>
                        <li class="list-group-item">
                            <form method="post" action="<?= base_url(); ?>/home/process2">
                                <div class="form-group mb-1">
                                    <?php
                                    $db2 = \Config\Database::connect();
                                    $query2   = $db2->query('SELECT komentar.postId,komentar.name,komentar.komen FROM komentar,postingan WHERE komentar.postId=postingan.postId');
                                    $results2 = $query2->getResultArray();

                                    foreach ($results2 as $row2) {
                                        if ($row['postId'] === $row2['postId']) {
                                    ?>
                                            <div class="card">
                                                <ul class="list-group list-group-flush">
                                                    <div class="card-header">
                                                        <b><?php echo $row2['name']; ?> </b> meninggalkan komentar<br>

                                                        <a href=""> <i class="fa fa-trash"></i> </a>
                                                    </div>
                                                    <li class="list-group-item">
                                                        <?php echo $row2['komen']; ?>
                                                    </li>
                                                </ul>
                                            </div>
                                            <br>
                                    <?php
                                        }
                                    } ?>

                                    <label for="komentar">Komentar</label>
                                    <input type="hidden" name="postId" value="<?php echo $row['postId']; ?>">
                                    <input type="hidden" name="nama" value="<?= session()->get('name'); ?>">
                                    <textarea class=" form-control" name="komentar" id="komentar" rows="1" placeholder="Beri Tanggapan"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Kirim Komentar</button>
                            </form>
                        </li>
                    </ul>
                </div>
        </div>
    <?php } ?>
    </main><!-- /.container -->


    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>

</html>