function info(id) {

    var token = $('input[name="_token"]').attr('value')
    var data = {
        '_token': token,
    }

    $.ajax({
        url: app_url + '/dividen/' + id,
        method: 'POST',
        data: data,
        success: function (res) {
            alert(
                '\nTarikh Mula : ' + res['single'].startDura +
                '\nTarikh Tamat : ' + res['single'].endDura +
                '\nTempoh Bulan : ' + res['single'].month
            )
            // console.log(res['single'].bank)
        },
        error: function (res) { alert(res.status) }
    });
}

// Delete based on ID
function myDelete(id) {

    if (confirm('Padam?')) {

        var token = $('input[name="_token"]').attr('value')
        var method = $('input[name="_method"]').attr('value')
        var dataToken = {
            '_token': token,
            '_method': method,
        }

        $.ajax({
            url: app_url + '/dividen/' + id,
            data: dataToken,
            method: 'POST',
            success: function (res) {
                location.reload();
            },
            error: function (res) { alert(res.status) }
        });

    }
}

function date() {
    var sdate = document.getElementById('startDura').value
    var edate = document.getElementById('endDura').value
    var sDate = new Date(sdate)
    var eDate = new Date(edate)

    console.log(sDate.getMonth(), eDate.getMonth())

    var cal = eDate.getMonth() - sDate.getMonth() + (12 * (eDate.getFullYear() - sDate.getFullYear()))

    console.log(cal)

    document.getElementById('month').value = cal
}

var t = window.$('#dividens').DataTable({
    
    // "columnDefs": [{
    //     "searchable": false,
    //     "orderable": false,
    //     "targets": 0
    // }],
    // dom: 'Bfrtip',
    // buttons: [
    //     'print'
    // ],
    rowsGroup: [
        1,2
    ],
    "order": [[1, 'asc']],
});

t.on('order.dt search.dt', function () {
    t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();


// $(document).ready( function () {
//     $('#example').DataTable();
// } );

function printData() {
    var print = document.getElementById('dividens');
    var htmlToPrint = '' +
        '<style type="text/css">'+

        'table {'+
            'border-collapse: collapse;'+
        '}'+

        'table th, table td {'+
            'border:1px solid black;' +
            'padding:0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += print.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
}

function totalcommas() {
    
    var interestvalue = document.getElementById('total').value
    var interest = interestvalue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    console.log(interest)
    document.getElementById('total').value = interest
}

function valLastDurationcommas() {
    var valueLast = document.getElementById('valLastDura').value
    var newValue = valueLast.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    document.getElementById('valLastDura').value = newValue
}


