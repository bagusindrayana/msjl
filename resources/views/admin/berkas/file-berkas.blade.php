@if ($data->file_berkas != null)
    <a href="{{ url($data->file_berkas) }}" target="_blank" class="btn btn-info btn-sm m-1"
        aria-label="File Berkas">
        <i class="fas fa-file"></i>
    </a>
@else
    -
@endif