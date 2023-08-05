@extends('admin.layouts.app')

@section('heading')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Profil</h3>
            <p class="text-subtitle text-muted">
                List data Profil yang mengelola website.
            </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Profil</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Data Profil
                    </li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('admin.konten.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <section class="section">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Data Profil</h4>
                            
                        </div>
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="app_name">Nama Aplikasi <small class="text-danger">*</small></label>
                                        <input class="form-control" placeholder="Judul..." type="text" name="app_name"
                                            value="{{ old('app_name', @$setting->app_name) }}" required minlength="1" maxlength="100" />
                                        @error('app_name')
                                            <span class="text-xs text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="app_description">Deskripsi Aplikasi <small class="text-danger">*</small></label>
                                        <textarea name="app_description" id="app_description" cols="30" rows="7" required class="form-control" placeholder="Deskripsi...">{{ old('app_description', @$setting->app_description) }}</textarea>
                                        @error('app_description')
                                            <span class="text-xs text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_description">Profil <small class="text-danger">*</small></label>
                                        <textarea name="profile_description" id="profile_description" cols="30" rows="10" required class="form-control" placeholder="Profil...">{{ old('profile_description', @$setting->profile_description) }}</textarea>
                                        @error('profile_description')
                                            <span class="text-xs text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    
                                </div>
                            
                            
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Logo Aplikasi <small class="text-danger">*</small></label>
                                    <br>
                                    <small>Upload gambar PNG/JPEG maksimal 2MB, Rekomendasi ukuran dengan rasio 1:1</small>
                                    <!-- File uploader with image preview -->
                                    <label class="dropzone" id="dropzone_app_logo">
                                        <h4>Drop & Drag File</h4>
                                        <p>Drag and drop file here or click to select file.</p>
                                        <input type="file" name="app_logo" id="app_logo" style="display: none;"
                                            accept="image/*">
                                        <img id="preview_app_logo" src="#" alt="Preview" style="display: none;" class="mx-auto">
                                    </label>
                                    @if (isset($setting) && $setting->app_logo != null)
                                        
                                        <img src="{{ url($setting->app_logo) }}" alt="foto logo aplikasi" class="img-saved"  class="img-fluid mx-auto">
                                        
                                    @endif
                                    @error('app_logo')
                                        <span class="text-xs text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Gambar Banner <small class="text-danger">*</small></label>
                                    <br>
                                    <small>Upload gambar PNG/JPEG maksimal 2MB, Rekomendasi ukuran dengan rasio 1:1</small>
                                    <!-- File uploader with image preview -->
                                    <label class="dropzone" id="dropzone_banner_image">
                                        <h4>Drop & Drag File</h4>
                                        <p>Drag and drop file here or click to select file.</p>
                                        <input type="file" name="banner_image" id="banner_image" style="display: none;"
                                            accept="image/*">
                                        <img id="preview_banner_image" src="#" alt="Preview" style="display: none;" class="mx-auto">
                                    </label>
                                    @if (isset($setting) &&  isset($setting->banner_image) && $setting->banner_image != null)
                                        
                                        <img src="{{ url($setting->banner_image) }}" alt="foto logo banner" class="img-saved" class="img-fluid mx-auto">
                                        
                                    @endif
                                    @error('banner_image')
                                        <span class="text-xs text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            
                        </div>
                    </div>
                   
                </section>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                <section class="section">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Visi & Misi</h4>
                            
                        </div>
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="visi">Visi <small class="text-danger">*</small></label>
                                        <textarea name="visi" id="visi" cols="30" rows="10" required class="form-control" placeholder="Visi...">{{ old('visi', @$setting->visi) }}</textarea>
                                        @error('visi')
                                            <span class="text-xs text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="misi">Misi <small class="text-danger">*</small></label>
                                        <textarea name="misi" id="misi" cols="30" rows="10" required class="form-control" placeholder="Misi...">{{ old('misi', @$setting->misi) }}</textarea>
                                        @error('misi')
                                            <span class="text-xs text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    
                                </div>
                            
                            
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Gambar Visi & Misi <small class="text-danger">*</small></label>
                                    <br>
                                    <small>Upload gambar PNG/JPEG maksimal 2MB</small>
                                    <!-- File uploader with image preview -->
                                    <label class="dropzone" id="dropzone_visi_misi_image">
                                        <h4>Drop & Drag File</h4>
                                        <p>Drag and drop file here or click to select file.</p>
                                        <input type="file" name="visi_misi_image" id="visi_misi_image" style="display: none;"
                                            accept="image/*">
                                        <img id="preview_visi_misi_image" src="#" alt="Preview" style="display: none;" class="mx-auto">
                                    </label>
                                    @if (isset($setting) && isset($setting->visi_misi_image) && $setting->visi_misi_image != null)
                                        
                                        <img src="{{ url($setting->visi_misi_image) }}" alt="foto logo aplikasi" class="img-saved"  class="img-fluid mx-auto">
                                        
                                    @endif
                                    @error('visi_misi_image')
                                        <span class="text-xs text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                               
                            </div>
    
                            
                        </div>
                    </div>
                   
                </section>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </form>

@endsection

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
                    document.getElementById('dropzone_'+id).addEventListener(eventName, preventDefaults, false);
                    document.body.addEventListener(eventName, preventDefaults, false);
                });

                // Highlight drop zone when item is dragged over it
                ['dragenter', 'dragover'].forEach(eventName => {
                    document.getElementById('dropzone_'+id).addEventListener(eventName, highlight, false);
                });

                // Unhighlight drop zone when item is dragged out of it
                ['dragleave', 'drop'].forEach(eventName => {
                    document.getElementById('dropzone_'+id).addEventListener(eventName, unhighlight, false);
                });

                // Handle dropped files
                document.getElementById('dropzone_'+id).addEventListener('drop', handleDrop, false);

                // Handle file input change
                document.getElementById(id).addEventListener('change', handleFileSelect, false);

                function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight(e) {
            document.getElementById('dropzone_'+id).classList.add('bg-light');
        }

        function unhighlight(e) {
            document.getElementById('dropzone_'+id).classList.remove('bg-light');
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
                    let img = document.getElementById('preview_'+id);
                    img.src = e.target.result;
                    img.style.display = 'block';
                }

                reader.readAsDataURL(file);
            }
        }
            }
            initDropzone('app_logo');
            initDropzone('banner_image');
            initDropzone('visi_misi_image');
        });

        
    </script>
@endpush

