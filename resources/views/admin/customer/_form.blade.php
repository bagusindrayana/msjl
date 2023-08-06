<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="nama_customer">Nama Customer <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Nama Customer..." type="text" name="nama_customer"
                value="{{ old('nama_customer', @$customer->nama_customer) }}" required minlength="1" maxlength="100" />
            @error('nama_customer')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="no_telp_customer">No Telp Customer</label>
            <input class="form-control" placeholder="08123..." type="number" name="no_telp_customer"
                value="{{ old('no_telp_customer', @$customer->no_telp_customer) }}" minlength="1" maxlength="100" />
            @error('no_telp_customer')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        
   

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email_customer">Email Customer</label>
            <input class="form-control" placeholder="my@email.com..." type="email" name="email_customer"
                value="{{ old('email_customer', @$customer->email_customer) }}" minlength="1" maxlength="100" />
            @error('email_customer')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat_customer">Alamat Customer</label>
            <input class="form-control" placeholder="Alamat..." type="text" name="alamat_customer"
                value="{{ old('alamat_customer', @$customer->alamat_customer) }}" minlength="1" maxlength="100" />
            @error('alamat_customer')
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
            initDropzone('gambar_customer');
        });
    </script>
@endpush
