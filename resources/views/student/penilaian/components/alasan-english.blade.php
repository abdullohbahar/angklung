<div class="form-check">
    <input class="form-check-input" required type="radio" name="alasan" value="A" id="alasanA"
        {{ $jawabanAlasan == 'A' ? 'checked' : '' }}>
    <label class="form-check-label" for="alasanA">
        {!! $penilaian->alasanEnglish?->a !!}
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="alasan" value="B" id="alasanB"
        {{ $jawabanAlasan == 'B' ? 'checked' : '' }}>
    <label class="form-check-label" for="alasanB">
        {!! $penilaian->alasanEnglish?->b !!}
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="alasan" value="C" id="alasanC"
        {{ $jawabanAlasan == 'C' ? 'checked' : '' }}>
    <label class="form-check-label" for="alasanC">
        {!! $penilaian->alasanEnglish?->c !!}
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="alasan" value="D" id="alasanD"
        {{ $jawabanAlasan == 'D' ? 'checked' : '' }}>
    <label class="form-check-label" for="alasanD">
        {!! $penilaian->alasanEnglish?->d !!}
    </label>
</div>
