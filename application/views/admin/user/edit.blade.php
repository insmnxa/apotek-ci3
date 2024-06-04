@extends('templates/layout')

@section('content')
    <h1 class="font-bold text-4xl mb-4">Edit User</h1>
    <button class="btn btn-link" onclick="location.href='<?= base_url('admin/user') ?>'">Back</button>

    <form action="<?= base_url('admin/user/edit/' . $user->id) ?>" method="post">
        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Username</span>
            </div>
            <input type="text" placeholder="John doe" name="username" value="<?= $user->username ?>"
                class="input input-bordered w-full max-w-md" autofocus required />
        </label>

        <label class="form-control w-full max-w-md">
            <div class="label">
                <span class="label-text">Password</span>
            </div>
            <input type="password" placeholder="leave blank if you don't want to change it" name="password"
                class="input input-bordered w-full max-w-md" />
        </label>

        <label class="form-control w-full max-w-xs">
            <div class="label">
                <span class="label-text">Status User</span>
            </div>
            <select class="select select-bordered" name="user_status">
                <option selected value="{{ $user->is_active }}">{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}
                </option>
                <option value="0">Inactive</option>
                <option value="1">Active</option>
            </select>
        </label>

        <button type="submit" class="btn btn-info mt-2">Submit</button>
    </form>
@endsection
