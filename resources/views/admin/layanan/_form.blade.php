<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="nama_layanan">Nama Layanan <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Nama..." type="text" name="nama_layanan"
                value="{{ old('nama_layanan', @$layanan->nama_layanan) }}" required minlength="1" maxlength="100" />
            @error('nama_layanan')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Gambar/Icon Layanan & Jasa <small class="text-danger">*</small></label>

            <div>
                <small>Upload gambar PNG/JPEG maksimal 2MB, Disarankan ukuran gambar 88x88</small>
                <!-- File uploader with image preview -->
                <label class="dropzone" id="dropzone_gambar_layanan">
                    <h4>Drop & Drag File</h4>
                    <p>Drag and drop file here or click to select file.</p>
                    <input type="file" name="gambar_layanan" id="gambar_layanan" style="display: none;"
                        accept="image/*">
                    <img id="preview_gambar_layanan" src="#" alt="Preview" style="display: none;"
                        class="mx-auto">
                </label>
                @if (isset($layanan) && isset($layanan->gambar_layanan) && $layanan->gambar_layanan != null)
                    <img src="{{ url($layanan->gambar_layanan) }}" alt="foto logo aplikasi" class="img-saved"
                        class="img-fluid mx-auto">
                @endif
            </div>
            @error('gambar_layanan')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>


    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="deskripsi_layanan">Deskripsi Layanan <small class="text-danger">*</small></label>
            <textarea name="deskripsi_layanan" id="deskripsi_layanan" cols="30" rows="10" required class="form-control"
                placeholder="Deskripsi...">{{ old('deskripsi_layanan', @$layanan->deskripsi_layanan) }}</textarea>
            @error('deskripsi_layanan')
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
            initDropzone('gambar_layanan');
        });
    </script>
@endpush
