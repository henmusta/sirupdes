@extends('{module}::layouts.master')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-md-between align-items-center mb-1">
    <div class="w-auto">
        <h3 class="fw-bolder mb-0">Data {Module}</h3>
    </div>
    <div class="w-auto text-end">
        <a href="{{ route("module.{modules}.create") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New {Module}</a>
    </div>
</div>
@if (session('status')) @include('{module}::components.alert', ['status' => session('status'),'message' => session('message')]) @endif
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable-module-{module}" class="table w-100 align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-module-{module}-delete" tabindex="-1" aria-labelledby="modal-module-{module}-deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <p class="fw-bolder">Are you sure wants delete this data as permanently ?</p>
                    <form id="form-module-{module}-delete" action="" method="POST">
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

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.13.4/dataTables.bootstrap5.min.css" integrity="sha512-zY8EbjNubt5sVVeNIxLQuU6lrDn0zYpaxCtS6mBBaqQREH1ZNQLdUxhHZjPaZhrw1CbEZkNdShEbIInJxzs9dQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.13.4/dataTables.bootstrap5.min.js" integrity="sha512-KFdmxVdAssPxrj4mZh1c01AbGXMAmXmBsO4Tc/GG5+kNLqitTfUBpDHicyDwF7CaFV+pN1r808IOK+vHzWB8gw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(function(){
    'use strict'
    const DTModule_{module} = $('#datatable-module-{module}').DataTable({
        processing: true,
        serverSide: true,
        search: {
            return: true,
        },
        ajax : {
            url : `{{ route('module.{modules}.index') }}`
        },
        order : [[2,'desc']],
        columns : [
            { 
                data : 'id',
                width : '150px',
                render(data, type, row, meta){
                    return `<a class="fw-bolder" href="{{ route('module.{modules}.index') }}/${data}">${data}</a>`;
                } 
            },
            { data : 'name' },
            { 
                data : 'id',
                width : '10px', 
                className : 'text-center',
                render(data, type, row, meta){
                    return `<div class="dropdown dropstart">
                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('module.{modules}.index') }}/${data}/edit"><i class="fa fa-fw fa-edit"></i> Edit</a></li>
                            <li>
                                <a class="dropdown-item text-danger" 
                                    data-bs-toggle="modal"
                                    href="#modal-module-{module}-delete" 
                                    data-action="{{ route('module.{modules}.index') }}/${data}">
                                    <i class="fa fa-fw fa-trash"></i> Delete
                                </a>
                            </li>
                        </ul>
                    </div>`;
                }
            }
        ]
    });

    $('#form-module-{module}-delete').submit(function(e){
        e.preventDefault();
        let btn = $(e.target), btnHtml = btn.html();
        $.post(this.getAttribute('action'),{
            _method : 'DELETE',
            _token : `{{ csrf_token() }}`
        }, function(){
            $('[data-bs-dismiss="modal"]').trigger('click');
            DTModule_{module}.ajax.reload(null,false);
            btn.html(btnHtml);
        },'json');
    });

    $('#modal-module-{module}-delete').on({
        'show.bs.modal' : (e) => {
            let sourceElement   = $(e.relatedTarget),
                formDelete      = $('#form-module-{module}-delete');
            formDelete.attr('action',sourceElement.attr('data-action'));
        }
    });
});
</script>
@endpush
