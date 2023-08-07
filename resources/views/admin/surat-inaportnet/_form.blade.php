<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="klasifikasi_surat">Klasifikasi <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Klasifikasi..." type="text" name="klasifikasi_surat"
                value="{{ old('klasifikasi_surat', @$surat->klasifikasi_surat) }}" required minlength="1" maxlength="20" />
            @error('klasifikasi_surat')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="perihal_surat">Perihal <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Perihal..." type="text" name="perihal_surat" required
                value="{{ old('perihal_surat', @$surat->perihal_surat) }}" minlength="1" maxlength="100" />
            @error('perihal_surat')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        
   

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tanggal_surat">Tanggal Surat  <small class="text-danger">*</small></label>
            <input class="form-control" type="date" name="tanggal_surat" required
                value="{{ old('tanggal_surat', @$surat->tanggal_surat) }}"/>
            @error('tanggal_surat')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="kepada">Kepada <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Kepada..." type="text" name="kepada" required
                value="{{ old('kepada', @$surat->kepada) }}" minlength="1" maxlength="150" />
            @error('kepada')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_kapal">Nama Kapal <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Nama Kapal..." type="text" name="nama_kapal" required
                value="{{ old('nama_kapal', @$surat->nama_kapal) }}" minlength="1" maxlength="100" />
            @error('nama_kapal')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="gt">GT <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="GT..." type="text" name="gt" required
                value="{{ old('gt', @$surat->gt) }}" minlength="1" maxlength="20" />
            @error('gt')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="loa">LOA <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="LOA..." type="text" name="loa" required
                value="{{ old('loa', @$surat->loa) }}" minlength="1" maxlength="20" />
            @error('loa')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="bendera">Bendera <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Bendera (indonesia/malaysia/dll)..." type="text" name="bendera" required
                value="{{ old('bendera', @$surat->bendera) }}" minlength="1" maxlength="50" />
            @error('bendera')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="agent">Agent <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Agent..." type="text" name="agent" required
                value="{{ old('agent', @$surat->agent) }}" minlength="1" maxlength="100" />
            @error('agent')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="pelabuhan_asal">Asal <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Asal (Samarinda/Balikpapan/dll)..." type="text" name="pelabuhan_asal" required
                value="{{ old('pelabuhan_asal', @$surat->pelabuhan_asal) }}" minlength="1" maxlength="100" />
            @error('pelabuhan_asal')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="pelabuhan_tujuan">Tujuan <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Tujuan (Samarinda/Balikpapan/dll)..." type="text" name="pelabuhan_tujuan" required
                value="{{ old('pelabuhan_tujuan', @$surat->pelabuhan_tujuan) }}" minlength="1" maxlength="100" />
            @error('pelabuhan_tujuan')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="muatan">Muatan <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Muatan (jenis muatan / massa / ukuran / dll)..." type="text" name="muatan" required
                value="{{ old('muatan', @$surat->muatan) }}" minlength="1" maxlength="100" />
            @error('muatan')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal  <small class="text-danger">*</small></label>
            <input class="form-control" type="date" name="tanggal" required
                value="{{ old('tanggal', @$surat->tanggal) }}"/>
            @error('tanggal')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="no_siup_pbm">No. SIUP PBM <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="No. SIUP PBM..." type="text" name="no_siup_pbm" required
                value="{{ old('no_siup_pbm', @$surat->no_siup_pbm) }}" minlength="1" maxlength="50" />
            @error('no_siup_pbm')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="jasa_kapal">Jasa Kapal</label>
            <input class="form-control" placeholder="Jasa Kapal..." type="text" name="jasa_kapal"
                value="{{ old('jasa_kapal', @$surat->jasa_kapal) }}" minlength="1" maxlength="100" />
            @error('jasa_kapal')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="jasa_barang">Jasa Barang</label>
            <input class="form-control" placeholder="Jasa Barang..." type="text" name="jasa_barang"
                value="{{ old('jasa_barang', @$surat->jasa_barang) }}" minlength="1" maxlength="100" />
            @error('jasa_barang')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="jasa_labuh">Jasa Labuh</label>
            <input class="form-control" placeholder="Jasa Labuh..." type="text" name="jasa_labuh"
                value="{{ old('jasa_labuh', @$surat->jasa_labuh) }}" minlength="1" maxlength="100" />
            @error('jasa_labuh')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="jasa_pbm">Jasa PBM</label>
            <input class="form-control" placeholder="Jasa PBM..." type="text" name="jasa_pbm"
                value="{{ old('jasa_pbm', @$surat->jasa_pbm) }}" minlength="1" maxlength="100" />
            @error('jasa_pbm')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="file_lampiran">File Lampiran (PDF/Gambar,ukuran maks 5 MB)</label>
            <input class="form-control" type="file" name="file_lampiran"
                minlength="1" maxlength="100" accept="image/*,application/pdf" />
                @if (isset($surat) && $surat->file_lampiran)
                <a href="{{ asset($surat->file_lampiran) }}"
                    target="_blank">{{ basename($surat->file_lampiran) }}</a>
            @endif
            @error('file_lampiran')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>