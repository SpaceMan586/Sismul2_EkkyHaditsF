<div class="top">
    <h1 class="title"><?php echo html_escape($item->judul); ?></h1>
    <div>
        <a class="btn primary" href="<?php echo site_url('gambar/edit/' . $item->id); ?>">Edit</a>
        <a class="btn" href="<?php echo site_url('gambar'); ?>">Kembali</a>
    </div>
</div>
<div class="card">
    <div class="detail-media">
        <div class="preview-frame">
            <img class="preview" src="<?php echo base_url('uploads/gambar/' . $item->file_gambar); ?>" alt="<?php echo html_escape($item->judul); ?>">
        </div>
    </div>
    <div class="detail-body">
        <p><?php echo nl2br(html_escape($item->deskripsi ? $item->deskripsi : 'Tidak ada deskripsi.')); ?></p>
    </div>
</div>