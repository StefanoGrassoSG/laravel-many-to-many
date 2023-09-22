@extends('layouts.app')

@section('page-title', 'Projects table')

@section('main-content')
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.projects.create')}}" class="btn btn-success mb-3">
                +Add New Project
            </a>
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Project Status</th>
                    <th scope="col">Languages</th>
                    <th scope="col">Project Link</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>
                                {{ $project->id }}
                            </td>
                            <td>
                                {{ $project->name }}
                            </td>
                            <td>
                                {{ $project->slug }}
                            </td>
                            <td>
                                @if ($project->type)
                                    <a href="{{ route('admin.types.show', ['type'=> $project->type->id]) }}">{{ $project->type->name }}</a>
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                {{ $project->description }}
                            </td>
                            <td>
                                {{ $project->start_date }}
                            </td>
                            <td>
                                {{ $project->end_date }}
                            </td>
                            <td>
                                {{ $project->project_status }}
                            </td>
                            <td>
                                {{ $project->languages }}
                            </td>
                            <td>
                                <a href="{{ $project->project_link }}" target="_blank">
                                    {{ $project->project_link }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" class="btn btn-primary w-100">
                                    View
                                </a>
                                <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="btn btn-warning w-100 my-2">
                                    Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="post" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger w-100">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection