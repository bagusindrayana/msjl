@if ($data->file_lampiran != null)
    <a href="{{ url($data->file_lampiran) }}" target="_blank" class="btn btn-info btn-sm m-1"
        aria-label="File Lampiran">
        <i class="fas fa-file"></i>
    </a>
@else
    -
@endif
