<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="customer_id">Customer <small class="text-danger">*</small></label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" @if (old('customer_id', @$invoice->customer_id) == $customer->id) selected @endif>
                        {{ $customer->nama_customer }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_invoice">Tanggal Invoice <small class="text-danger">*</small></label>
            <input class="form-control" type="date" name="tanggal_invoice" required
                value="{{ old('tanggal_invoice', @$invoice->tanggal_invoice) }}" />
            @error('tanggal_invoice')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="file_invoice">File Lampiran</label>
            <input class="form-control" type="file" name="file_invoice" accept="images/*,application/pdf" />
            @if (isset($invoice) && $invoice->file_invoice)
                <a href="{{ asset('storage/' . $invoice->file_invoice) }}"
                    target="_blank">{{ basename($invoice->file_invoice) }}</a>
            @endif
            @error('file_invoice')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="keterangan_invoice">Keterangan Invoice</label>
            <textarea name="keterangan_invoice" id="keterangan_invoice" class="form-control" rows="7"
                placeholder="Keterangan tambahan...">{{ old('keterangan_invoice', @$invoice->keterangan_invoice) }}</textarea>
            @error('keterangan_invoice')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @error('deskripsi_detail')
            <span class="text-xs text-danger">
                {{ $message }}
            </span>
        @enderror
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Deskripsi
                    </th>
                    <th>
                        Periode
                    </th>
                    <th>
                        Jumlah
                    </th>
                    <th>
                        *
                    </th>
                </tr>
            </thead>
            <tbody id="list-detail">
                @if (isset($invoice))
                    @foreach ($invoice->invoice_details as $index => $item)
                        <tr>
                            <td>
                                <input type="text" name="deskripsi_detail[{{ $index }}]"
                                    value="{{ $item->deskripsi }}" required class="form-control"
                                    placeholder="Deskripsi">
                            </td>
                            <td>
                                <input type="date" name="periode_detail[{{ $index }}]"
                                    value="{{ $item->tangggal }}" required class="form-control" placeholder="Periode">
                            </td>
                            <td>
                                <input type="number" name="jumlah_detail[{{ $index }}]"
                                    value="{{ $item->jumlah }}" required class="form-control" placeholder="Jumlah">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm btn-delete-detail"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            <input type="text" name="deskripsi_detail[]" class="form-control" required
                                placeholder="Deskripsi">
                        </td>
                        <td>
                            <input type="date" name="periode_detail[]" class="form-control" required
                                placeholder="Periode">
                        </td>
                        <td>
                            <input type="number" name="jumlah_detail[]" class="form-control" required
                                placeholder="Jumlah">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm btn-delete-detail"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <button type="button" class="btn btn-primary btn-sm" id="btn-add-detail"><i
                                class="fas fa-plus"></i> Tambah</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@push('scripts')
    <script type="text/template" id="template-detail">
        <tr>
            <td>
                <input type="text" name="deskripsi_detail[]" class="form-control" required placeholder="Deskripsi">
            </td>
            <td>
                <input type="date" name="periode_detail[]" class="form-control" required placeholder="Periode">
            </td>
            <td>
                <input type="number" name="jumlah_detail[]" class="form-control" required placeholder="Jumlah">
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm btn-delete-detail"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
    </script>
    <script>
        $(document).ready(function() {
            let template = $('#template-detail').html();

            $('#btn-add-detail').click(function() {
                $('#list-detail').append(template);
            });

            $(document).on('click', '.btn-delete-detail', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
@endpush


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
