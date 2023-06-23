@php
$alert_class = "danger";
$alert_title = "Failed";
if(in_array($status, [true, 'OK', 'Success'])){
    $alert_class = "success";
    $alert_title = "Success";
}
@endphp
<div class="alert alert-dismissible fade show alert-{{ $alert_class }}" role="alert">
    <strong>{{ $alert_title ?? '' }} !</strong><br/>{{ $message ?? '' }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>