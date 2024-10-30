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
    <div class="card mt-2">
        <h5 class="card-title text-center">Naive Bayes</h5>
        <div class="card-body">
            <div id="wrapper">
                <span class="label">
                    Apakah ada nilai Mental Kepribadian Siswa ≥ 4,5
                </span>
                <div class="branch lv1">
                    <div class="entry ">
                        <span class="label">TIDAK BERPRESTASI</span>
                    </div>
                    <div class="entry ">
                        <span class="label">Apakah terdapat minimal 2 nilai yang ≥ 4,5</span>
                        <div class="branch lv1">
                            <div class="entry ">
                                <span class="label">TIDAK BERPRESTASI</span>
                            </div>
                            <div class="entry ">
                                <span class="label">BERPRESTASI</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-2">
        <div class="card-body text-center">
            <h5 class="card-title">Root Tree</h5>
            <ul class="tree">
                <li><span>Apakah ada nilai Mental Kepribadian Siswa ≥ 4,5</span>
                    <ul>
                        <li><span>TIDAK BERPRESTASI</span>

                        </li>
                        <li><span>Apakah terdapat minimal 2 nilai yang ≥ 4,5</span>
                            <ul>
                                <li><span>TIDAK BERPRESTASI</span>

                                </li>
                                <li><span>BERPRESTASI</span>

                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<?= $this->endSection('layout'); ?>

<?= $this->section('css'); ?>
<link rel=" stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
<link rel="stylesheet" href="/aset/css/tree.css" />
<link rel="stylesheet" href="/aset/css/tree2.css" />
<?= $this->endSection('css'); ?>

<?= $this->section('script'); ?>
<script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>
<script src="/aset/js/predict.js"></script>
<script src="/aset/js/training.js"></script>
<?= $this->endSection('script'); ?>