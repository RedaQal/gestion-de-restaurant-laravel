@props(['type' => 'success', 'width' => 'w-75'])
<div class="alert alert-{{ $type }} {{ $width }} mx-auto position-relative" role="alert" id="alert">
    {{ $slot }}
    <button class="btn-close position-absolute" style="right: 10px; top:10px;" id="close"></button>
</div>

