
let tableSiswa = $('#tablePredict').DataTable({
    ajax: '/api/nilai',
    columns: [
        {
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { data: 'name' },
        { data: 'moral' },
        { data: 'penampilan' },
        { data: 'kepemimpinan' },
        { data: 'disiplin' },
        { data: 'pengendalian' },
        {
            data: function (data) {
                if (data.nb_hasil == null || data.nb_hasil == "") {
                    return 'Not trained';
                } else {
                    return data.nb_hasil;
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