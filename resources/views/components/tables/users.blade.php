<div>
    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">login at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users ?? [] as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at
                 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
