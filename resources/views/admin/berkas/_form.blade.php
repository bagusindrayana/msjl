<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="nomor_berkas">Nomor Berkas/Surat <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Nomor..." type="text" name="nomor_berkas"
                value="{{ old('nomor_berkas', @$berkas->nomor_berkas) }}" required minlength="1" maxlength="100" />
            @error('nomor_berkas')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="asal_berkas">Asal <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Asal berkas" type="text" name="asal_berkas"
                value="{{ old('asal_berkas', @$berkas->asal_berkas) }}" minlength="1" maxlength="100" />
            @error('asal_berkas')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        
   

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="perihal">Perihal <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Perihal..." type="text" name="perihal"
                value="{{ old('perihal', @$berkas->perihal) }}" minlength="1" maxlength="200" />
            @error('perihal')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Tanggal..." type="date" name="tanggal_masuk"
                value="{{ old('tanggal_masuk', @$berkas->tanggal_masuk) }}" />
            @error('tanggal_masuk')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>



</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan"  placeholder="Keterangan..." class="form-control">{{ old('keterangan', @$berkas->keterangan) }}</textarea>
            @error('keterangan')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="file_berkas">File Berkas (PDF/IMG) maksimal 10MB <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="File..." type="file" name="file_berkas" required accept="application/pdf,image/*"/>
            @if (@$berkas->file_berkas != null)
                <a href="{{ url($data->file_berkas) }}" target="_blank" class="btn btn-info btn-sm m-1"
                    aria-label="File Berkas">
                    <i class="fas fa-file"></i>
                </a>
            @endif
            @error('file_berkas')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>


@push('styles')
    <style>
        .dropzone {
            border: 2px dashed #ccc;
            padding: 25px;
            text-align: center;
            cursor: pointer;
            width: 100%;

        }

        .dropzone img {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }

        .img-saved {
            display: block;
            margin: auto;
            max-height: 300px;
        }
    </style>
@endpush


@push('scripts')
    <script type="module">
        $(document).ready(function() {

            function initDropzone(id) {
                // Prevent default drag behaviors
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    document.getElementById('dropzone_' + id).addEventListener(eventName, preventDefaults,
                        false);
                    document.body.addEventListener(eventName, preventDefaults, false);
                });

                // Highlight drop zone when item is dragged over it
                ['dragenter', 'dragover'].forEach(eventName => {
                    document.getElementById('dropzone_' + id).addEventListener(eventName, highlight, false);
                });

                // Unhighlight drop zone when item is dragged out of it
                ['dragleave', 'drop'].forEach(eventName => {
                    document.getElementById('dropzone_' + id).addEventListener(eventName, unhighlight,
                        false);
                });

                // Handle dropped files
                document.getElementById('dropzone_' + id).addEventListener('drop', handleDrop, false);

                // Handle file input change
                document.getElementById(id).addEventListener('change', handleFileSelect, false);

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                function highlight(e) {
                    document.getElementById('dropzone_' + id).classList.add('bg-light');
                }

                function unhighlight(e) {
                    document.getElementById('dropzone_' + id).classList.remove('bg-light');
                }

                function handleDrop(e) {
                    let dt = e.dataTransfer;
                    let files = dt.files;

                    handleFiles(files);
                }

                function handleFileSelect(e) {
                    let files = e.target.files;

                    handleFiles(files);
                }

                function handleFiles(files) {
                    let file = files[0];

                    // Check if file is an image
                    if (file.type.match(/^image\//)) {
                        let reader = new FileReader();

                        reader.onload = function(e) {
                            let img = document.getElementById('preview_' + id);
                            img.src = e.target.result;
                            img.style.display = 'block';
                        }

                        reader.readAsDataURL(file);
                    }
                }
            }
            initDropzone('gambar_berkas');
        });
    </script>
@endpush
