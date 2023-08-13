@extends('admin.layouts.app')

@section('heading')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Layanan</h3>
            <p class="text-subtitle text-muted">
                List data Layanan perusahaan.
            </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Layanan</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Data Layanan
                    </li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="modal fade" id="gambarLayanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Gambar Layanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("admin.layanan.update-gambar")}}" method="POST" enctype="multipart/form-data" id="formUpdateGambar">
                        @csrf
                        <div>
                            <small>Upload gambar PNG/JPEG maksimal 2MB</small>
                            @error('layanan_jasa_image')
                                
                            @enderror
                            <!-- File uploader with image preview -->
                            <label class="dropzone" id="dropzone_layanan_jasa_image">
                                <h4>Drop & Drag File</h4>
                                <p>Drag and drop file here or click to select file.</p>
                                <input type="file" name="layanan_jasa_image" id="layanan_jasa_image" style="display: none;"
                                    accept="image/*">
                                <img id="preview_layanan_jasa_image" src="#" alt="Preview" style="display: none;"
                                    class="mx-auto">
                            </label>
                            @php
                                $gambar = SettingHelper::get('layanan_jasa_image');
                            @endphp
                            @if ($gambar != null)
                                <img src="{{ url($gambar) }}" alt="foto logo aplikasi" class="img-saved"
                                    class="img-fluid mx-auto">
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('formUpdateGambar').submit()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="section">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Data Layanan</h4>

                        <div class="card-header-action">
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#gambarLayanan">
                                <i class="fas fa-image"></i> Gambar Layanan
                            </button> --}}
                            <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary"><i
                                    class="fas fa-plus"></i> Tambah Layanan</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        {{ $dataTable->table() }}
                    </div>
                </div>

            </section>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
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
            initDropzone('layanan_jasa_image');
        });
    </script>
@endpush