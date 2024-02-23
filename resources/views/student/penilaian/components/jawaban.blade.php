<div class="form-check">
    <input class="form-check-input" type="radio" name="jawaban" value="A" id="jawabanA"
        {{ $jawabanSoal == 'A' ? 'checked' : '' }}>
    <label class="form-check-label" for="jawabanA">
        {!! $penilaian->pilihanJawaban->a !!}
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="jawaban" value="B"
        {{ $jawabanSoal == 'B' ? 'checked' : '' }} id="jawabanB">
    <label class="form-check-label" for="jawabanB">
        {!! $penilaian->pilihanJawaban->b !!}
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="jawaban" {{ $jawabanSoal == 'C' ? 'checked' : '' }}
        value="C" id="jawabanC">
    <label class="form-check-label" for="jawabanC">
        {!! $penilaian->pilihanJawaban->c !!}
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="jawaban" {{ $jawabanSoal == 'D' ? 'checked' : '' }}
        value="D" id="jawabanD">
    <label class="form-check-label" for="jawabanD">
        {!! $penilaian->pilihanJawaban->d !!}
    </label>
</div>
