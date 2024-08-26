<?= $this->extend('layouts/index'); ?>
<?= $this->section('layout'); ?>
<div class="container overflow-hidden">
    <!-- Content here -->
    <div class="row">
        <div class="col-4">
            <div class="card text-white bg-secondary m-3">
                <div class="card-header">
                    <h5 class="card-title">Input data sampel</h5>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div style="color: red;">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <p><?= esc($error) ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                    <form action="/api/label" method="POST">
                        <div class="mb-3">
                            <label for="MORAL" class="form-label">MORAL</label>
                            <input type="number" class="form-control" id="MORAL" name="MORAL" value="<?= old('MORAL') ?>" step="0.1" min="0.1" max="5" required>

                        </div>
                        <div class="mb-3">
                            <label for="PENAMPILAN" class="form-label">PENAMPILAN</label>
                            <input type="number" class="form-control" id="PENAMPILAN" name="PENAMPILAN" value="<?= old('PENAMPILAN') ?>" step="0.1" min="0.1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="KEPEMIMPINAN" class="form-label">KEPEMIMPINAN</label>
                            <input type="number" class="form-control" id="KEPEMIMPINAN" name="KEPEMIMPINAN" value="<?= old('KEPEMIMPINAN') ?>" step="0.1" min="0.1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="DISIPLIN" class="form-label">DISIPLIN</label>
                            <input type="number" class="form-control" id="DISIPLIN" name="DISIPLIN" value="<?= old('DISIPLIN') ?>" step="0.1" min="0.1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="PENGENDALIAN" class="form-label">PENGENDALIAN DIRI</label>
                            <input type="number" class="form-control" id="PENGENDALIAN" name="PENGENDALIAN" value="<?= old('PENGENDALIAN') ?>" step="0.1" min="0.1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="LABEL" class="form-label">LABEL</label>
                            <select class="form-select" aria-label="LABEL" name="LABEL" id="LABEL" required>
                                <option value="TIDAK BERPRESTASI">TIDAK BERPRESTASI</option>
                                <option value="BERPRESTASI">BERPRESTASI</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <table class="table table-bordered" id="tableLabel">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">MORAL</th>
                        <th scope="col">PENAMPILAN</th>
                        <th scope="col">KEPEMIMPINAN</th>
                        <th scope="col">DISIPLIN</th>
                        <th scope="col">PENGENDALIAN DIRI</th>
                        <th scope="col">LABEL</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card text-white bg-secondary m-3">
                <div class="card-header">
                    <h5 class="card-title">Input data Uji</h5>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div style="color: red;">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <p><?= esc($error) ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                    <form action="/api/sampel" method="POST">
                        <div class="mb-3">
                            <label for="MORAL" class="form-label">MORAL</label>
                            <input type="number" class="form-control" id="Sampel_MORAL" name="Sampel_MORAL" value="<?= old('MORAL') ?>" min="1" max="5" required>

                        </div>
                        <div class="mb-3">
                            <label for="PENAMPILAN" class="form-label">PENAMPILAN</label>
                            <input type="number" class="form-control" id="Sampel_PENAMPILAN" name="Sampel_PENAMPILAN" value="<?= old('PENAMPILAN') ?>" min="1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="KEPEMIMPINAN" class="form-label">KEPEMIMPINAN</label>
                            <input type="number" class="form-control" id="Sampel_KEPEMIMPINAN" name="Sampel_KEPEMIMPINAN" value="<?= old('KEPEMIMPINAN') ?>" min="1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="DISIPLIN" class="form-label">DISIPLIN</label>
                            <input type="number" class="form-control" id="Sampel_DISIPLIN" name="Sampel_DISIPLIN" value="<?= old('DISIPLIN') ?>" min="1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="PENGENDALIAN" class="form-label">PENGENDALIAN DIRI</label>
                            <input type="number" class="form-control" id="Sampel_PENGENDALIAN" name="Sampel_PENGENDALIAN" value="<?= old('PENGENDALIAN') ?>" min="1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="LABEL" class="form-label">LABEL</label>
                            <select class="form-select" aria-label="LABEL" name="Sampel_LABEL" id="Sampel_LABEL" required>
                                <option value="TIDAK BERPRESTASI">TIDAK BERPRESTASI</option>
                                <option value="BERPRESTASI">BERPRESTASI</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <table class="table table-bordered" id="tableSampel">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">MORAL</th>
                        <th scope="col">PENAMPILAN</th>
                        <th scope="col">KEPEMIMPINAN</th>
                        <th scope="col">DISIPLIN</th>
                        <th scope="col">PENGENDALIAN DIRI</th>
                        <th scope="col">LABEL</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
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
<script src="/aset/js/sampel.js"></script>
<?= $this->endSection('script'); ?>