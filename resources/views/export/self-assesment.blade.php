@foreach ($selfAssesments as $assesment)
    <table border="1">
        <tr>
            <td><b>Nama Siswa:</b> </td>
            <td><b>{{ $assesment->fullname }}</b></td>
        </tr>
        <tr>
            <td><b>NIS:</b> </td>
            <td><b>'{{ $assesment->username }}</b></td>
        </tr>
        <tr>
            <td>No</td>
            <td>Pernyataan</td>
            <td>Score</td>
        </tr>
        @php
            $no = 1;
            $totalScore = 0;
        @endphp
        @foreach ($assesment->hasManyJawabanSelfAssesment as $jawaban)
            <tr>
                <td>
                    {{ $no++ }}
                </td>
                <td>
                    {{ $jawaban->belongsToKuesioner->pernyataan }}
                </td>
                <td>
                    {{ $jawaban->jawaban }}
                    @php
                        $totalScore += $jawaban->jawaban;
                    @endphp
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" style="text-align:right">Total</td>
            <td>
                {{ $totalScore }}
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td colspan="3"></td>
        </tr>
        <tr></tr>

    </table>
@endforeach
