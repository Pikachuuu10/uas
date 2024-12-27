<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="film/create"  class="btn btn-primary mt-3">Tambah Data Lagu</a>
            <h1  class="mt-2">Daftar Lagu</h1>
            <?php if(session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-primary" role="alert">
                <?= session()->getFlashdata('pesan');?>
                 </div>
            <?php endif; ?>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Judul Lagu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($film as $f) :?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><img src="/img/<?= $f['poster']; ?>" alt="" width="75px"></td>
                        <td><?= $f['judul'];?></td>
                        <td>
                            <a href="/film/<?= $f['id']?>" class="btn btn-success">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>