@extends('layouts.app')

@section('page-title', 'Projects table')

@section('main-content')
    <div class="row">
        <div class="col">
            <h2 class="fw-bold">
                Insert New Project Data
            </h2>
            <form action="{{ route('admin.projects.store') }}" method="POST" class="d-flex justify-content-center mt-5 mb-3">
                @csrf
                <div class="w-50 me-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="floatingInput">
                        <label for="floatingInput">Name<span class="text-danger">*</span></label>
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="form-floating">
                        <input type="text" class="form-control" name="description" id="floatingInput">
                        <label for="floatingInput">Description<span class="text-danger">*</span></label>
                        @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="date" class="form-control" name="start_date" id="floatingInput">
                        <label for="floatingInput">Start Date<span class="text-danger">*</span></label>
                        @error('start_date')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="form-floating">
                        <input type="date" class="form-control" name="end_date" id="floatingInput">
                        <label for="floatingInput">End Date</label>
                        @error('end_date')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success mt-3">
                            Save
                        </button>
                    </div>
                </div>
                <div class="w-50 ms-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="project_status" id="floatingInput">
                        <label for="floatingInput">Project Status<span class="text-danger">*</span></label>
                        @error('project_status')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="form-floating">
                        <input type="text" class="form-control" name="languages" id="floatingInput">
                        <label for="floatingInput">Languages<span class="text-danger">*</span></label>
                        @error('languages')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" class="form-control" name="project_link" id="floatingInput">
                        <label for="floatingInput">Project Link<span class="text-danger">*</span></label>
                        @error('project_link')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-3">
                        <select class="form-select" id="floatingSelect" name="type_id" aria-label="Floating label select example">
                          <option>Select a Type</option>
                          @foreach ($types as $type)
                              <option value="{{ $type->id }}" {{ old('type_id') == $type->id ?  'selected' : '' }}>{{ $type->name }}</option>
                          @endforeach
                        </select>
                        <label for="floatingSelect">Type</label>
                        @error('type_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection