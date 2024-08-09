<?= $this->extend('layouts/index'); ?>
<?= $this->section('layout'); ?>
<div class="container overflow-hidden">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Decision tree</h5>
            <p class="card-text" id="cardText"></p>
            <table class="table table-bordered" id="tablePredict">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">MORAL</th>
                        <th scope="col">PENAMPILAN</th>
                        <th scope="col">KEPEMIMPINAN</th>
                        <th scope="col">DISIPLIN</th>
                        <th scope="col">PENGENDALIAN DIRI</th>
                        <th scope="col">LABEL</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="card-footer bg-transparent text-end"><button id="Train" name="Train" onclick="train('dtree')" class="btn btn-primary">Train/Test</button></div>

    </div>
</div>

<?= $this->endSection('layout'); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
<?= $this->endSection('css'); ?>

<?= $this->section('script'); ?>
<script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>
<script src="/aset/js/predict.js"></script>
<script src="/aset/js/training.js"></script>
<?= $this->endSection('script'); ?>