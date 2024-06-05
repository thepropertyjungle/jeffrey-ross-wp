@php
    $isUser = is_user_logged_in();
    $user = $isUser ? wp_get_current_user() : null;
@endphp

<div
    data-component="PropertyQr" 
    data-permalink="{{ $permalink ?? '' }}" 
    data-size-small="200" 
    data-size-large="1500" 
    data-override-color-light="{{ $color_light ?? '' }}" 
    data-override-color-dark="{{ $color_dark ?? '' }}" 
    data-qr-file-name="{{ $qr_filename ?? 'qr.png' }}"
>
    <div class="tpj_qr_canvas_ui"></div>
    @if($isUser)
        <a class="tpj_download_qr_btn btn btn-primary" href="#">Download QR Code</a>
    @endif
</div>