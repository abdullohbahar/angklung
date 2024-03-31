<div class="col-sm-12 col-md-12 col-lg-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-center">
                    <div id="countdown"></div>
                </div>
                <div class="col-12 text-center">
                    <h2>Pilihan Ganda</h2>
                </div>
                @foreach ($soal as $index => $soal)
                    <a href="{{ route('student.penilaian', $index + 1) }}"
                        class="rounded-4 border border-2 text-decoration-none nomor {{ $no == $index + 1 && $tipe == 'pilgan' ? 'current' : '' }} {{ $soal->riwayatPenilaian != null ? 'answered' : '' }}">
                        {{ $index + 1 }}
                    </a>
                @endforeach
                <div class="col-12 text-center mt-5">
                    <h2>Essay</h2>
                </div>
                @foreach ($soalEssay as $row => $essay)
                    <a href="{{ route('student.penilaian.essay', $row + 1) }}"
                        class="rounded-4 border border-2 text-decoration-none nomor {{ $no == $row + 1 && $tipe == 'essay' ? 'current' : '' }} {{ $essay->jawabanPenilaianEssay != null ? 'answered' : '' }}">
                        {{ $row + 1 }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
