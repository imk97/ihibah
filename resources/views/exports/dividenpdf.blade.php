@extends('layouts.app')

@section('content')
<section class="pb_sm_py_cover overflow-hidden pb_gradient_v1 cover-bg-opacity-6" id="dashboard">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 justify-content-center">
                <div class="table-responsive">
                    @php
                    echo session('bank');
                    echo session('acc');
                    @endphp
                    <div class="text-center">
                        <button id="print" class="">Print</button>
                    </div>
                    <table id="dividens" class="table table-bordered table-sm" width="100%" style="font-size: 14px;">
                        <caption style="color-background: black">PENYATA SIMPANAN TETAP BERAKHIR</caption><br>
                        <thead>
                            <tr>
                                <th>BIL</th>
                                <th>BANK</th>
                                <th>NO AKAUN/NO SIJIL</th>
                                <th>BAKI PADA</th>
                                <th>RM</th>
                                <th>BULAN</th>
                                <th>DURASI PELABURAN</th>
                                <th>KADAR FAEDAH</th>
                                <th>KADAR DITERIMA <br>RM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dividen)
                            <tr>
                                <td></td>
                                <td>{{ $dividen->bank }}</td>
                                <td>{{ $dividen->account }} </td>
                                <td>{{ $dividen->lastDura }}</td>
                                <td class="text-right">{{ $dividen->valLastDura }}</td>
                                <td class="text-center">{{ $dividen->month }}</td>
                                <td class="text-center">{{ $dividen->startDura. ' - ' .$dividen->endDura }}</td>
                                <td class="text-center">{{ $dividen->interest }}</td>
                                <td class="text-right">{{ $dividen->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Jumlah Keseluruhan</th>
                                <th class="text-right"></th>
                                <th colspan="4" class="text-right"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END section -->

{{-- <script src="//cdn.datatables.net/plug-ins/1.10.21/api/sum().js"></script> --}}

<script>
    $(document).ready(function(){
        var baki = []
        // var bank = []
        $('table tbody tr').find('td:eq(3)').each(function (index, val) {
            // console.log(val.innerHTML)
            if (val.innerHTML === '0') {
                val.innerHTML = ''  
            } 

            if (val.innerHTML) {
                
            }
        })

        // $('table tbody tr').find('td:eq(1)').each(function (index, val) {
        //     bank.push(val.innerHTML)
            
        // })
        // console.log(bank)
    })

    var groupColumn = 1
    var t = window.$('#dividens').DataTable({
        rowsGroup: [
            1,2,3
        ],
        "columnDefs": [
            { "visible": true, "targets": groupColumn }
        ],
        "order": [[ 1, 'asc' ]],
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( { page: 'current' }).nodes();
            var last = null;

            // var subTotal = new Array();
            var groupID = -1;
            var aData = new Array();
            var index = 0;

            console.log(api)
            api.column(groupColumn, { page: 'current' }).data().each( function ( group, i) {

                var vals = api.row(api.row($(rows).eq(i)).index()).data();
                // console.log(vals)
                let n1 = intVal(vals[8])
                let n2 = intVal(vals[4])
                var jumlah =  n1 ? parseFloat(n1) : 0;
                var baki = n2 ? parseFloat(n2) : 0;

                function intVal(i) {
                    return typeof i === 'string' ?
                    i.replace(/[\RM,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
                }

                if (typeof aData[group] == 'undefined') {
                    aData[group] = new Array();
                    aData[group].rows = [];
                    aData[group].total = [];
                    aData[group].vallastDura = [];
                }

                aData[group].rows.push(i)
                aData[group].total.push(jumlah)
                aData[group].vallastDura.push(baki)
            });

            var idx = 0;

            for (let jlh in aData) {
                idx = Math.max.apply(Math, aData[jlh].rows)
                var sum = 0
                var value = 0
                $.each(aData[jlh].total, function(a,b){
                    value = value + b
                    
                })
                value = value.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                $.each(aData[jlh].vallastDura, function(a,b){
                    sum = sum + b
                    
                })
                sum = sum.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                $(rows).eq(idx).after(
                    '<tr>'+
                        '<td colspan="4">'+jlh+'</td>'+
                        '<td class="text-right">' + sum + '</td>'+
                        '<td colspan="3"></td>'+
                        '<td class="text-right">' + value + '</td>' +
                        
                    '</tr>'
                )
                
            }

        },
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;

            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\RM,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            total = api
                    .column(8)
                    .data()
                    .reduce( function (a,b) {
                        return intVal(a) + intVal(b);
                    }, 0);
            
            vallastDura = api
                        .column(4)
                        .data()
                        .reduce( function (a,b) {
                            return intVal(a) + intVal(b);
                        }, 0);

            // Update footer
            $(api.column(8).footer()).html(
                total = total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","),
                'RM' + total
            );
            $(api.column(4).footer()).html(
                vallastDura = vallastDura.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","),
                'RM' + vallastDura
            );
        },
        lengthMenu: [-1],
        
        searching: false,
        pagination: false,
    })

    // Order by the grouping
    $('#dividens tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );

    // t.column(3).data().sum()

    t.on('order.dt search.dt', function () {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $('#print').on('click', function() {
        printData()
    })

    function printData() {
        var print = document.getElementById('dividens')
        var htmlToPrint = '' +
        '<style type="text/css">'+

        'table {'+
            'border-collapse: collapse;'+
        '}'+

        'table th, table td {'+
            'border:1px solid black;' +
            'padding:0.5em;' +
        '}' +

        '.text-center {' +
            'text-align: center;' +
        '}' +

        '.text-right {' +
            'text-align: right;' +
        '}' +

        '.text-left {' +
            'text-align: leftl' +
        '}' +
        '</style>';
        htmlToPrint += print.outerHTML;
        newWin = window.open("")
        newWin.document.write(htmlToPrint)
        newWin.print()
        newWin.close()
    }


</script>
@endsection