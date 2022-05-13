@props(['status'])

@if (session()->has($status))
<div role="alert" class="alert alert-{{ $status == 'success' ? 'success' : 'danger' }}">
  {{ session($status) }}
</div>

@endif