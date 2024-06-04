@extends('templates/layout')

@section('content')
    <h1 class="font-bold text-4xl mb-4">Edit Pasien</h1>
    <button class="btn btn-link" onclick="location.href='<?= base_url('admin/pasien') ?>'">Back</button>

    <form action="<?= base_url('admin/pasien/edit/' . $pasien->id) ?>" method="post">
        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Nama pasien</span>
            </div>
            <input type="text" placeholder="John Lenon" name="nama_pasien" value="<?= $pasien->nama ?>"
                class="input input-bordered w-full max-w-md" autofocus />
        </label>

        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Keluhan pasien</span>
            </div>
            <textarea class="textarea textarea-bordered" name="keluhan_pasien" placeholder="Keluhan"><?= $pasien->keluhan ?></textarea>
        </label>

        <label class="form-control w-full max-w-xs">
            <div class="label">
                <span class="label-text">Status Pasien</span>
            </div>
            <select class="select select-bordered" name="status">
                <option selected value="{{ $pasien->status }}">{{ $pasien->status == 'complete' ? 'Complete' : 'Queued' }}
                </option>
                <option value="queued">Queued</option>
                <option value="complete">Complete</option>
            </select>
        </label>

        <button type="submit" class="btn btn-info mt-2">Submit</button>
    </form>
@endsection
