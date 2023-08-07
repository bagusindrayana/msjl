<div class="d-flex">
    <a href="{{ route('admin.surat-inaportnet.show', $data->id) }}" target="_blank"
        class="btn btn-info btn-sm m-1"
        aria-label="Edit">
        <i class="fas fa-print"></i>
    </a>
    <a href="{{ route('admin.surat-inaportnet.edit', $data->id) }}"
        class="btn btn-warning btn-sm m-1"
        aria-label="Edit">
        <i class="fas fa-edit"></i>
    </a>
    
    <form action="{{ route('admin.surat-inaportnet.destroy', $data->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <button
            class="btn btn-danger btn-sm  m-1"
            aria-label="Delete"  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>