@extends('templates/layout')

@section('content')
    <h1 class="font-bold text-4xl mb-2">User</h1>
    <button class="btn btn-active btn-link" onclick="location.href='<?= base_url('admin/user/create') ?>'">Tambah
        User</button>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @if ($user->is_active)
                                <div class="badge badge-info gap-2">active</div>
                            @else
                                <div class="badge badge-error gap-2">inactive</div>
                            @endif
                        </td>
                        <td>
                            <div class="badge badge-warning hover:cursor-pointer hover:contrast-75">
                                <a href="<?= base_url('admin/user/edit/' . $user->id) ?>">edit</a>
                            </div>
                            <form action="<?= base_url('admin/user/delete/' . $user->id) ?>" method="post" class="inline">
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
