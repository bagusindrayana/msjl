@if ($data->file_invoice != null)
    <a href="{{ url($data->file_invoice) }}" target="_blank" class="btn btn-info btn-sm m-1"
        aria-label="File Lampiran Invoice">
        <i class="fas fa-file"></i>
    </a>
@else
    -
@endif
