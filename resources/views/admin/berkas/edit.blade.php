@extends('admin.layouts.app')
@section('heading')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Ubah Data Customer</h3>
            <p class="text-subtitle text-muted">
                Ubah data customer
            </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.customer.index') }}">Customer</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Ubah Data Customer
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
                    <h4 class="card-title">Data Customer</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.customer.index') }}" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.customer.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.customer._form')
                        <div class="form-group mt-4">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('admin.customer.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Batal</a>
                        </div>
                    </form>
                </div>
            </div>
           
        </section>
    </div>
</div>

@endsection
