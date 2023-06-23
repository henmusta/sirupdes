@extends('{module}::layouts.master')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-md-between align-items-center mb-1">
    <div class="w-auto">
        <h3 class="fw-bolder mb-0">Data {Module}</h3>
    </div>
    <div class="w-auto text-end">
        <a href="{{ route("module.{modules}.index") }}" class="btn btn-outline-secondary"><i class="fa fa-reply"></i> Back</a>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-module-{module}-delete"><i class="fa fa-trash"></i> Delete</button>
        <a href="{{ route("module.{modules}.edit",['{model}'=>${model}]) }}" class="btn btn-outline-secondary"><i class="fa fa-edit"></i> Edit</a>
    </div>
</div>
@if (session('status')) @include('{module}::components.alert', ['status' => session('status'),'message' => session('message')]) @endif
<div class="card shadow">
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ ${model}->id ?? null }}</dd>
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ ${model}->name ?? null }}</dd>
            <dt class="col-sm-3">Created At</dt>
            <dd class="col-sm-9">{{ ${model}->created_at ?? null }}</dd>
            <dt class="col-sm-3">Updated At</dt>
            <dd class="col-sm-9">{{ ${model}->updated_at ?? null }}</dd>
        </dl>
    </div>
</div>
<div class="modal fade" id="modal-module-{module}-delete" tabindex="-1" aria-labelledby="modal-module-{module}-deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <p class="fw-bolder">Are you sure wants delete this data as permanently ?</p>
                    <form id="form-module-{module}-delete" action="{{ route("module.{modules}.destroy",['{model}'=>${model}]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
