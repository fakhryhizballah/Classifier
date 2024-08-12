function train(id) {
    $.ajax({
        url: '/api/train/' + id,
        method: 'GET',
        success: function (data) {
            console.log(data);
            tableSiswa.ajax.reload();
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Training Success",
                showConfirmButton: false,
                timer: 1500
            });
        },
        error: function (data) {
            console.log(data);
            tableSiswa.ajax.reload();
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Training Failed",
                showConfirmButton: false,
                timer: 1500
            });
        }
    })
    // $.ajax({
    //     url: '/api/test',
    //     method: 'GET',
    //     success: function (data) {
    //         console.log(data);
    //         $('#cardText').text(`Accuracy decision tree ' + ${data.data.DecisionTree} + ' : ` + data.accuracy.toFixed(2) + '%`);
    //         // tableLabel.ajax.reload();
    //     }
    // })
}

