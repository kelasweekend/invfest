<form method="POST" enctype="multipart/form-data" action="{{route('kategori.update', $item->id)}}">
    @csrf
    @method('PATCH')
    <div class="mb-2">
        <label for="nama_kategori" class="form-label">Title </label>
        <input type="text" name="nama_kategori" value="{{$item->nama_kategori}}" class="form-control" id="nama_kategori" placeholder="E.g IF 07 K"
            autocomplete="off" required>
    </div>
    <div class="mb-2">
        <label for="body">Deskripsi singkat</label>
        <textarea class="form-control" name="deskripsi" id="description" required>{!! $item->deskripsi !!}</textarea>
    </div>
    <div class="mb-2">
        <label for="pelajaran" class="form-label">Update Rulebook</label>
        <div class="custom-file">
            <input type="file" name="rulebook" class="custom-file-input" id="file">
            <label class="custom-file-label" for="file">Upload</label>
        </div>
    </div>
    <button class="btn btn-secondary float-right" type="submit">Update</button>
</form>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('textarea').summernote();
    });
</script>
