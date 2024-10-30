<?= $this->extend('layouts/index'); ?>
<?= $this->section('layout'); ?>
<div class="container overflow-hidden">
    <div class="card mt-2">
        <div class="card-body">
            <h5 class="card-title">Comparison</h5>
            <p class="card-text">Perbandingan</p>
            <table class="table table-bordered" id="tableComparison">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NOSIS</th>
                        <th scope="col">PLETON</th>
                        <th scope="col">NAIVE BAYES</th>
                        <th scope="col">DECISION TREE</th>
                        <th scope="col">LABEL AKTUAL</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <h5 class="card-title">Akurasi</h5>
            <p class="card-text">Perhitungan Akurasi</p>
            <table class="table table-bordered" id="tableAkurasi">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data Testing</th>
                        <th scope="col">Tingkat Akurasi DT</th>
                        <th scope="col">Tingkat Akurasi NBC</th>
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
<script src="/aset/js/comparison.js"></script>
<?= $this->endSection('script'); ?>