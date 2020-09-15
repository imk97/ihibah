<table>
    <thead>
        <tr>
            <th><b>Bank</b></th>
            <th><b>Akaun</b></th>
            <th><b>Baki Pada</b></th>
            <th><b>Jumlah (RM)</b></th>
            <th><b>Tarikh Mula</b></th>
            <th><b>Tarikh Akhir</b></th>
            <th><b>Bulan</b></th>
            <th><b>Faedah</b></th>
            <th><b>Faedah Diterima (RM)</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dividens as $dividen)
            <tr>
                <td>{{ $dividen->bank }}</td>
                <td>{{ $dividen->account }}</td>
                <td>{{ $dividen->lastDura }}</td>
                <td>{{ $dividen->valLastDura }}</td>
                <td>{{ $dividen->startDura }}</td>
                <td>{{ $dividen->endDura }}</td>
                <td>{{ $dividen->month }}</td>
                <td>{{ $dividen->interest }}</td>
                <td>{{ $dividen->total }}</td>
            </tr>
        @endforeach
    </tbody>
</table>