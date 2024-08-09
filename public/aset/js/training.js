function train(id) {
    $.ajax({
        url: '/api/train/' + id,
        method: 'GET',
        success: function (data) {
            console.log(data);
            tableSiswa.ajax.reload();
        }
    })
    $.ajax({
        url: '/api/test',
        method: 'GET',
        success: function (data) {
            console.log(data);
            $('#cardText').text(`Accuracy decision tree ' + ${data.data.DecisionTree} + ' : ` + data.accuracy.toFixed(2) + '%`);
            // tableLabel.ajax.reload();
        }
    })
}

