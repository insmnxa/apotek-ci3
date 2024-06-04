@extends('templates/layout')

@section('content')
    <h1 class="font-bold text-4xl mb-4">Edit Dokter</h1>
    <button class="btn btn-link" onclick="location.href='<?= base_url('admin/dokter') ?>'">Back</button>

    <form action="<?= base_url('admin/dokter/edit/' . $dokter->id) ?>" method="post">
        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Nama dokter</span>
            </div>
            <input type="text" placeholder="John Lenon" name="nama_dokter" value="<?= $dokter->nama ?>"
                class="input input-bordered w-full max-w-md" autofocus />
        </label>

        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Alamat dokter</span>
            </div>
            <input type="text" placeholder="Menayu Lor" name="alamat_dokter" value="<?= $dokter->alamat ?>"
                class="input input-bordered w-full max-w-md" required />
        </label>

        <button type="submit" class="btn btn-info mt-2">Submit</button>
    </form>
@endsection
