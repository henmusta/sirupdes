@extends('{module}::layouts.master')

@section('content')
<form action="{{ request()->routeIs(config('{module}.route.name').'edit') ? route(config('{module}.route.name').'update',['{model}'=>${model}]) : route(config('{module}.route.name').'store') }}" autocomplete="off" method="POST">
    @csrf
    @method((request()->routeIs(config('{module}.route.name').'edit') ? 'PUT' : 'POST'))
    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-center mb-1">
        <div class="w-auto">
            <h3 class="fw-bolder mb-0">Data {Module}</h3>
        </div>
        <div class="w-auto text-end">
            <a href="{{ route(config('{module}.route.name')."index") }}" class="btn btn-outline-secondary"><i class="fa fa-ban"></i> Cancel</a>
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
    @if (session('status')) @include('{module}::components.alert', ['status' => session('status'),'message' => session('message')]) @endif
    <div class="card shadow">
        <div class="card-body">
            <div class="mb-3">
                <label for="">ID</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id',( ${model}->id ?? '' )) }}">
                @error('id')
                <div class="invalid-feedback">{{ $message ?? '' }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',( ${model}->name ?? '' )) }}">
                @error('name')
                <div class="invalid-feedback">{{ $message ?? '' }}</div>
                @enderror
            </div>
        </div>
    </div>
</form>
@endsection