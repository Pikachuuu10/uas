<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Lagu </h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $film['poster']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title"><?= $film['judul']; ?></h2>
                            <p class="card-text"><b>Artis :</b> <?= $film['director']; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Album :</b> <?= $film['production']; ?></small></p>

                            <a href="/film/edit/<?= $film['id']; ?>" class="btn btn-success">Edit</a>

                            <form action="/film/<?= $film['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ')">Delete</button>
                            </form>
                            <br>
                            <a href="/film">Kembali ke daftar Musik</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>