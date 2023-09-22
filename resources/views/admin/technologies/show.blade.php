@extends('layouts.app')

@section('page-title', $technology->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <h2 class="fw-bold">
                Your Technlology
            </h2>

            <div class="card w-50 p-3 bg-dark text-light fs-5">
                <div class="mb-1">
                   <span class="fw-bold">ID:</span> <span>{{ $technology->id }}</span>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">NAME:</span> <span>{{ $technology->name }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h2 class="fw-bold">
                Linked Technologies
            </h2>

           
        </div>
    </div>
@endsection