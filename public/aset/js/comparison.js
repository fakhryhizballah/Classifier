
let tableSiswa = $('#tableComparison').DataTable({
    ajax: '/api/comparison',
    columns: [
        {
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
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
    ],
    "scrollX": true,
    "scrollY": "50vh",
    "scrollCollapse": true,
    "paging": true,
    "responsive": true,
    "bAutoWidth": false,
});