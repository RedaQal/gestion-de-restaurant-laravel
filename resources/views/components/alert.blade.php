@props(['type'=>'success'])
<div class="alert alert-{{ $type }} w-75 mx-auto position-relative p-5" role="alert" id="alert">
    {{ $slot }}
    <button class="btn-close position-absolute top-0 end-0" id="close"></button>
</div>
