<div class="top">
    <h1 class="title"><?php echo $item ? 'Edit Gambar' : 'Tambah Gambar'; ?></h1>
    <a class="btn" href="<?php echo site_url('gambar'); ?>">Kembali</a>
</div>
<div class="card">
    <?php echo form_open_multipart($action, array('class' => 'form')); ?>
        <div class="form-grid">
            <div>
                <div class="field">
                    <label for="judul">Judul</label>
                    <input id="judul" name="judul" type="text" maxlength="150" required value="<?php echo html_escape($item ? $item->judul : ''); ?>">
                </div>
                <div class="field">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi"><?php echo html_escape($item ? $item->deskripsi : ''); ?></textarea>
                </div>
                <div class="field">
                    <label for="file_gambar">File Gambar</label>
                    <input id="file_gambar" name="file_gambar" type="file" accept="image/*" <?php echo $item ? '' : 'required'; ?>>
                    <p class="muted">Format JPG, PNG, GIF, atau WebP. Maksimal 2 MB.</p>
                </div>
                <button class="btn primary" type="submit">Simpan</button>
                <a class="btn" href="<?php echo site_url('gambar'); ?>">Batal</a>
            </div>
            <div class="upload-preview">
                <label>Preview</label>
                <div class="upload-frame" id="upload_frame">
                    <?php if ($item): ?>
                        <img id="preview_image" src="<?php echo base_url('uploads/gambar/' . $item->file_gambar); ?>" alt="<?php echo html_escape($item->judul); ?>">
                    <?php else: ?>
                        <div class="upload-empty" id="preview_empty">Pilih gambar untuk melihat preview.</div>
                        <img id="preview_image" src="" alt="Preview gambar" style="display:none">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
(function(){
    var input = document.getElementById('file_gambar');
    var image = document.getElementById('preview_image');
    var empty = document.getElementById('preview_empty');
    if (!input || !image) return;
    input.addEventListener('change', function(){
        var file = input.files && input.files[0];
        if (!file) return;
        image.src = URL.createObjectURL(file);
        image.style.display = 'block';
        if (empty) empty.style.display = 'none';
    });
})();
</script>