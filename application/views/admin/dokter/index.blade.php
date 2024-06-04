@extends('templates/layout')

@section('content')
    <h1 class="font-bold text-4xl mb-2">Dokter</h1>
    <button class="btn btn-active btn-link" onclick="location.href='<?= base_url('admin/dokter/create') ?>'">Tambah
        Dokter</button>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Spesialisasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($dokter as $d)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->alamat }}</td>
                        <td></td>
                        <td>
                            <div class="badge badge-warning hover:cursor-pointer hover:contrast-75">
                                <a href="<?= base_url('admin/dokter/edit/' . $d->id) ?>">edit</a>
                            </div>
                            <form action="<?= base_url('admin/dokter/delete/' . $d->id) ?>" method="post" class="inline">
                                <button type="submit" class="badge badge-error hover:cursor-pointer hover:contrast-75">
                                    delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
