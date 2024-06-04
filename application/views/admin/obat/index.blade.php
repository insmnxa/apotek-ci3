@extends('templates/layout')

@section('content')
    <h1 class="font-bold text-4xl mb-2">Obat</h1>
    <button class="btn btn-active btn-link" onclick="location.href='<?= base_url('admin/obat/create') ?>'">Tambah
        Obat</button>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($obat as $o)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $o->id }}</td>
                        <td>{{ $o->nama }}</td>
                        <td>{{ $o->harga }}</td>
                        <td>{{ $o->stok }}</td>
                        <td>
                            <div class="badge badge-warning hover:cursor-pointer hover:contrast-75">
                                <a href="<?= base_url('admin/obat/edit/' . $o->id) ?>">edit</a>
                            </div>
                            <form action="<?= base_url('admin/obat/delete/' . $o->id) ?>" method="post" class="inline">
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
