<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>assets/qrcode/jquery.min.js"> </script>
<script src="<?= base_url(); ?>assets/qrcode/instascan.min.js"> </script>

<script src="instascan.min.js"> </script>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card-header bg-transparent mb-0">
                    <h5 class="text center"> <span class="font-weight-bold text-primary">Scan</span>
                        <h1><?= $device ?></h1>

                        <div class="card-body">
                            <video id="preview" width="100%" height="300"></video>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="kode_proyektor" id="kode_proyektor" class="form-control">
                                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Pinjam</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
        mirror: false
        // refractoryPeriod: 1000,
        // scanPeriod: 3
    });

    scanner.addListener('scan', function(content) {
        // alert(content);
        document.getElementById('kode_proyektor').value = content;
        document.getElementById('submit').click();
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[1]);
        } else {
            console.error('No cameras found');

        }
    }).catch(function(e) {
        console.error(e);
    });
</script>