@extends('templates/layout')

@section('content')
    <h1 class="font-bold text-4xl mb-4">Buat Resep</h1>
    <button class="btn btn-link" onclick="location.href='<?= base_url('admin/pasien') ?>'">Back</button>

    <form action="<?= base_url('admin/resep/create/' . $pasien->id) ?>" method="post">

        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">ID pasien</span>
            </div>
            <input type="text" disabled value="<?= $pasien->id ?>" name="id_pasien"
                class="input input-bordered w-full max-w-md" autofocus />
        </label>

        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Nama pasien</span>
            </div>
            <input type="text" disabled value="<?= $pasien->nama ?>" name="nama_pasien"
                class="input input-bordered w-full max-w-md" autofocus />
        </label>

        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Keluhan pasien</span>
            </div>
            <textarea class="textarea textarea-bordered" disabled name="keluhan_pasien" placeholder="Keluhan"><?= $pasien->keluhan ?></textarea>
        </label>

        <label class="form-control w-full max-w-xs">
            <div class="label">
                <span class="label-text">Dokter</span>
            </div>
            <select class="select select-bordered" name="dokter">
                @foreach ($dokter as $d)
                    <option value="<?= $d->id ?>"><?= $d->nama ?></option>
                @endforeach
            </select>
        </label>

        <div class="label">
            <span class="label-text ">
                Resep Obat
            </span>
        </div>
        <div class="flex flex-wrap">
            @foreach ($obat as $o)
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text mr-2"><?= $o->nama ?></span>
                        <input type="checkbox" name="obat[]" value="<?= $o->id ?>" class="checkbox" />
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-info mt-2">Submit</button>
    </form>
@endsection
