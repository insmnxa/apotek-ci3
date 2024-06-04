@extends('templates/layout')

@section('content')
    <h1 class="font-bold text-4xl mb-4">Dashboard</h1>


    <div class="stats shadow">

        <div class="stat place-items-center">
            <a href="<?= base_url('admin/barang') ?>">
                <div class="stat-title">Obat</div>
                <div class="stat-value">{{ $obat_count }}</div>
            </a>
        </div>

        <div class="stat place-items-center">
            <a href="<?= base_url('admin/jenis') ?>">
                <div class="stat-title">Pasien</div>
                <div class="stat-value">{{ $pasien_count }}</div>
            </a>
        </div>

        <div class="stat place-items-center">
            <a href="<?= base_url('admin/users') ?>">
                <div class="stat-title">Dokter</div>
                <div class="stat-value">{{ $dokter_count }}</div>
            </a>
        </div>
    </div>
@endsection
