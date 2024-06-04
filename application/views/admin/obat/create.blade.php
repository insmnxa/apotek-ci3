@extends('templates/layout')

@section('content')
    <h1 class="font-bold text-4xl mb-4">Tambah Obat</h1>
    <button class="btn btn-link" onclick="location.href='<?= base_url('admin/obat') ?>'">Back</button>

    <form action="<?= base_url('admin/obat/create') ?>" method="post">
        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Nama obat</span>
            </div>
            <input type="text" placeholder="John Lenon" name="nama_obat" class="input input-bordered w-full max-w-md"
                autofocus />
        </label>

        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Harga obat</span>
            </div>
            <input type="number" placeholder="John Lenon" name="harga_obat" class="input input-bordered w-full max-w-md"
                autofocus />
        </label>

        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Stok obat</span>
            </div>
            <input type="number" placeholder="John Lenon" name="stok_obat" class="input input-bordered w-full max-w-md"
                autofocus />
        </label>

        <button type="submit" class="btn btn-info mt-2">Submit</button>
    </form>
@endsection
