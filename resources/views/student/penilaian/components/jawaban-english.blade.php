<div class="form-check">
    <input class="form-check-input" type="radio" required name="jawaban" value="A" id="jawabanA"
        {{ $jawabanSoal == 'A' ? 'checked' : '' }}>
    <label class="form-check-label" for="jawabanA">
        {!! $penilaian->pilihanJawabanEnglish?->a !!}
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="jawaban" value="B"
        {{ $jawabanSoal == 'B' ? 'checked' : '' }} id="jawabanB">
    <label class="form-check-label" for="jawabanB">
        {!! $penilaian->pilihanJawabanEnglish?->b !!}
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="jawaban" {{ $jawabanSoal == 'C' ? 'checked' : '' }}
        value="C" id="jawabanC">
    <label class="form-check-label" for="jawabanC">
        {!! $penilaian->pilihanJawabanEnglish?->c !!}
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="jawaban" {{ $jawabanSoal == 'D' ? 'checked' : '' }}
        value="D" id="jawabanD">
    <label class="form-check-label" for="jawabanD">
        {!! $penilaian->pilihanJawabanEnglish?->d !!}
    </label>
</div>
