@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-primary my-4">
            Posts
        </h2>

        <div class="card mb-3">
            <div class="card-header">
                {{ $posts->links() }}
            </div>

            <ul class="list-group list-group-flush d-flex">
                <li class="list-group-item">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col" class="text-primary col-1">#</th>

                                <th scope="col" class="text-primary col-2">Title</th>

                                <th scope="col" class="text-primary col-5">Body</th>

                                <th scope="col" class="text-primary text-center col-1">Archived</th>

                                <th scope="col" class="text-primary text-center col-3">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row" class="col-1">{{ $post['id'] }}</th>

                                    <td class="col-2">{{ $post['title'] }}</td>

                                    <td class="col-5">{{ $post['body'] }}</td>

                                    <td class="text-center col-1">{{ $post['is_archived'] ? 'Yes' : 'No' }}</td>

                                    <td class="text-center col-3">
                                        <menu class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-sm btn-primary">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                                @csrf

                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </menu>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </li>

                <li class="list-group-item text-center">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
