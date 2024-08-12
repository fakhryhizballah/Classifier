<?= $this->extend('layouts/index'); ?>
<?= $this->section('layout'); ?>
<div class="container overflow-hidden">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Comparison</h5>
            <p class="card-text">Perbadningan</p>
            <table class="table table-bordered" id="tableComparison">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NOSIS</th>
                        <th scope="col">PLETON</th>
                        <th scope="col">Native Bayes</th>
                        <th scope="col">Decision Tree</th>
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