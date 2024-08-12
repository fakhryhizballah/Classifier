<?= $this->extend('layouts/index'); ?>
<?= $this->section('layout'); ?>
<div class="container overflow-hidden">
    <!-- Content here -->
    <div class="row">
        <div class="col">
            <div class="card text-white bg-secondary m-3">
                <div class="card-header">
                    <h5 class="card-title">Input data siswa Bintara POLRI</h5>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div style="color: red;">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <p><?= esc($error) ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                    <form action="/api/siswa" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" required>

                        </div>
                        <div class="mb-3">
                            <label for="NOSIS" class="form-label">NOSIS</label>
                            <input type="text" class="form-control" id="NOSIS" name="NOSIS" value="<?= old('NOSIS') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="PLETON" class="form-label">PLETON</label>
                            <input type="text" class="form-control" id="PLETON" name="PLETON" value="<?= old('PLETON') ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <table class="table table-striped" id="tableSiswa">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">NOSIS</th>
                        <th scope="col">PLETON</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/api/nilai/siswa" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_polri" id="id_polri">
                    <div class="mb-3">
                        <label for="moral" class="form-label">Nilai Moral</label>
                        <input type="number" step="0.1" min="0.1" max="5" class="form-control" id="moral" name="moral" value="<?= old('moral') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="penampilan" class="form-label">Nilai Penamilan</label>
                        <input type="number" step="0.1" min="0.1" max="5" class="form-control" id="penampilan" name="penampilan" value="<?= old('penampilan') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kepemimpinan" class="form-label">Nilai Kepemimpinan</label>
                        <input type="number" step="0.1" min="0.1" max="5" class="form-control" id="kepemimpinan" name="kepemimpinan" value="<?= old('kepemimpinan') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="disiplin" class="form-label">Nilai Disiplin</label>
                        <input type="number" step="0.1" min="0.1" max="5" class="form-control" id="disiplin" name="disiplin" value="<?= old('kepemimpinan') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengendalian" class="form-label">Nilai Pengendalian Diri</label>
                        <input type="number" step="0.1" min="0.1" max="5" class="form-control" id="pengendalian" name="pengendalian" value="<?= old('kepemimpinan') ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('layout'); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
<?= $this->endSection('css'); ?>

<?= $this->section('script'); ?>
<script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>
<script src="/aset/js/input.js"></script>
<?= $this->endSection('script'); ?>