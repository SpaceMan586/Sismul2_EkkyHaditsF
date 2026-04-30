<div class="top">
    <div>
        <h1 class="title">Data Gambar</h1>
        <p class="subtitle">Tambah, lihat, ubah, dan hapus gambar.</p>
    </div>
    <a class="btn primary" href="<?php echo site_url('gambar/tambah'); ?>">Tambah Gambar</a>
</div>
<div class="card">
    <table>
        <thead>
            <tr><th class="image-cell">Preview</th><th>Judul</th><th>Deskripsi</th><th class="actions">Aksi</th></tr>
        </thead>
        <tbody>
            <?php if (empty($gambar)): ?>
                <tr><td colspan="4" class="empty">Belum ada gambar.</td></tr>
            <?php endif; ?>
            <?php foreach ($gambar as $item): ?>
                <tr>
                    <td class="image-cell"><a class="thumb-frame" href="<?php echo site_url('gambar/detail/' . $item->id); ?>"><img class="thumb" src="<?php echo base_url('uploads/gambar/' . $item->file_gambar); ?>" alt="<?php echo html_escape($item->judul); ?>"></a></td>
                    <td><strong><?php echo html_escape($item->judul); ?></strong></td>
                    <td class="muted"><?php echo html_escape(character_limiter($item->deskripsi, 90)); ?></td>
                    <td class="actions">
                        <a class="btn" href="<?php echo site_url('gambar/detail/' . $item->id); ?>">Detail</a>
                        <a class="btn" href="<?php echo site_url('gambar/edit/' . $item->id); ?>">Edit</a>
                        <form class="inline" method="post" action="<?php echo site_url('gambar/hapus/' . $item->id); ?>" onsubmit="return confirm('Hapus gambar ini?')">
                            <button class="btn danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>