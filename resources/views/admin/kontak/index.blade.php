@extends('admin.layouts.app')

@section('heading')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Kontak</h3>
            <p class="text-subtitle text-muted">
                List data Kontak perusahaan.
            </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Kontak</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Data Kontak
                    </li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <section class="section">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Data Kontak</h4>

                        <div class="card-header-action">
                            <a href="{{ route('admin.kontak.create') }}" class="btn btn-primary"><i
                                    class="fas fa-plus"></i> Tambah Kontak</a>
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
