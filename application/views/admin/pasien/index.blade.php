@extends('templates/layout')

@section('content')
    <h1 class="font-bold text-4xl mb-2">Pasien</h1>
    <button class="btn btn-active btn-link" onclick="location.href='<?= base_url('admin/pasien/create') ?>'">Tambah
        Pasien</button>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tanggal Datang</th>
                    <th>Keluhan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($pasien as $p)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->tgl_datang }}</td>
                        <td>{{ $p->keluhan }}</td>
                        <td>
                            @if ($p->status === 'complete')
                                <div class="badge badge-success gap-2">complete</div>
                            @else
                                <div class="badge badge-warning gap-2">queued</div>
                            @endif
                        </td>
                        <td>
                            <div class="badge badge-warning hover:cursor-pointer hover:contrast-75">
                                <a href="<?= base_url('admin/pasien/edit/' . $p->id) ?>">edit</a>
                            </div>
                            <form action="<?= base_url('admin/pasien/delete/' . $p->id) ?>" method="post" class="inline">
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
