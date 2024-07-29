
let tableLabel = $('#tableLabel').DataTable({
    ajax: '/api/label',
    columns: [
        { 
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { data: 'moral' },
        { data: 'penampilan' },
        { data: 'kepemimpinan' },
        { data: 'disiplin' },
        { data: 'pengendalian' },
        { data: 'label' },
        {
            data: function (data) {
                let button = `<button type="button" onclick="deleteLabel(${data.id})" class="btn btn-danger"><i class="fa fa-trash"></i></button>`
                return button;
            }
        }
    ],
    "scrollX": true,
    "scrollY": "50vh",
    "scrollCollapse": true,
    "paging": true,
    "responsive": true,
    "bAutoWidth": false,
    "columnDefs": [
        { "width": "5%", "targets": 0 },
        { "width": "5%", "targets": 1 },
        { "width": "5%", "targets": 2 },
        { "width": "5%", "targets": 3 },
        { "width": "5%", "targets": 4 },
        { "width": "10%", "targets": 5 },
        { "width": "10%", "targets": 6 }
    ],

});

function deleteLabel(id) {
    $.ajax({
        url: '/api/label/'+id,
        method: 'DELETE',
        success: function (data) {
            tableLabel.ajax.reload();
        }
    })
}
let tableSampel = $('#tableSampel').DataTable({
    ajax: '/api/sampel',
    columns: [
        { 
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { data: 'moral' },
        { data: 'penampilan' },
        { data: 'kepemimpinan' },
        { data: 'disiplin' },
        { data: 'pengendalian' },
        { data: 'label' },
        {
            data: function (data) {
                let button = `<button type="button" onclick="deleteSampel(${data.id})" class="btn btn-danger"><i class="fa fa-trash"></i></button>`
                return button;
            }
        }
    ],
    "scrollX": true,
    "scrollY": "50vh",
    "scrollCollapse": true,
    "paging": true,
    "responsive": true,
    "bAutoWidth": false,
    "columnDefs": [
        { "width": "5%", "targets": 0 },
        { "width": "5%", "targets": 1 },
        { "width": "5%", "targets": 2 },
        { "width": "5%", "targets": 3 },
        { "width": "5%", "targets": 4 },
        { "width": "10%", "targets": 5 },
        { "width": "10%", "targets": 6 }
    ],

});

function deleteSampel(id) {
    $.ajax({
        url: '/api/sampel/'+id,
        method: 'DELETE',
        success: function (data) {
            tableSampel.ajax.reload();
        }
    })
}