
let tableSiswa = $('#tableComparison').DataTable({
    ajax: '/api/comparison',
    columns: [
        {
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + 1;
            }
        },
        { data: 'name' },
        { data: 'NOSIS' },
        { data: 'PLETON' },
        {
            data: function (data) {
                if (data.dt == null || data.dt == "") {
                    return 'Not trained';
                } else {
                    return data.dt;
                }
            }
        },
        {
            data: function (data) {
                if (data.nb == null || data.nb == "") {
                    return 'Not trained';
                } else {
                    return data.nb;
                }
            }
        },
        { data: 'label' }
    ],
    "scrollX": true,
    "scrollY": "50vh",
    "scrollCollapse": true,
    "paging": true,
    "responsive": true,
    "bAutoWidth": false,
});
let tableAkurasi = $('#tableAkurasi').DataTable({
    ajax: '/api/akurasi',
    columns: [
        {
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + 1;
            }
        },
        { data: 'index' },
        {
            data: 'dt',
            render: function (data, type, row, meta) {
                return (data * 100).toFixed(0) + '%';
            }
        },
        {
            data: 'nb',
            render: function (data, type, row, meta) {
                return (data * 100).toFixed(0) + '%';
            }
        }
    ],
    "scrollX": true,
    "scrollY": "50vh",
    "scrollCollapse": true,
    "paging": true,
    "responsive": true,
    "bAutoWidth": false,
})