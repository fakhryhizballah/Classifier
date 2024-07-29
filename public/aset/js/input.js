
let tableSiswa = $('#tableSiswa').DataTable({
    ajax: '/api/siswa',
    columns: [
        { data: 'name' },
        { data: 'rank' },
        { data: 'nrp' },
        {
            data: function (data) {
                let button = `<button type="button" onclick="editSiswa(${data.id}, '${data.name}')" class="btn btn-warning"><i class="fa fa-edit"></i></button>`
                button += ` <button type="button" onclick="deleteSiswa(${data.id})" class="btn btn-danger"><i class="fa fa-trash"></i></button>`
                return button;
            }
        }
    ]
});

function deleteSiswa(id) {
    console.log(id);
    $.ajax({
        url: '/api/siswa/'+id,
        method: 'DELETE',
        success: function (data) {
            tableSiswa.ajax.reload();
        }
    })
}
function editSiswa(id, name) {
    $('#exampleModalLabel').text(name);
    $('#id_polri').val(id);
    $.ajax({
        url: '/api/nilai/siswa/'+id,
        method: 'GET',
        success: function (data) {
            console.log(data.data[0]);
             data = data.data[0];
            $('#moral').val(data.moral);
            $('#penampilan').val(data.penampilan);
            $('#kepemimpinan').val(data.kepemimpinan);
            $('#disiplin').val(data.disiplin);
            $('#pengendalian').val(data.pengendalian);
        }
        ,
        error: function (err) {
            if (err.status == 404) {
                $('#moral').val(null);
                $('#penampilan').val(null);
                $('#kepemimpinan').val(null);
                $('#disiplin').val(null);
                $('#pengendalian').val(null);
            }
        }
    })
    $('#exampleModal').modal('show');
}