<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Musik</h2>
            
            <form action="/film/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ""; ?>" id="judul" name="judul" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="director" class="col-sm-2 col-form-label">Artis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="director" name="director">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="production" class="col-sm-2 col-form-label">Album</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="production" name="production">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="poster" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-2">
                        <img src="/img/" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="poster" name="poster" onchange="previewImg()">
                            <label class="custom-file-label" for="poster"></label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-3">Selesai</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>