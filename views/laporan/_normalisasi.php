<div class="panel-body">
    <fieldset class="fieldset">
        <legend>Normalisasi</legend>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Pegawai</th>
                
                <?php foreach ($kriteria as $kri): ?>
                    <th><?= $kri['nama_kriteria'] ?></th>
                <?php endforeach; ?>
    
            </thead>
                
            <?php if (!empty($penilaian) && is_array($penilaian)): ?>
                <?php $no = 1; ?>
                <?php foreach($penilaian as $key => $pen): ?>
                    <tbody>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $pen['pegawai']['nama_pegawai']; ?></td>
                            
                            <?php foreach ($kriteria as $kri): ?>
                                <td><?= $normalisasi[$pen['id_penilaian']][$kri['id_kriteria']]; ?></td>
                            <?php endforeach; ?>
                            <?php $no++; ?>
                        </tr>
                    </tbody>
                    
                <?php endforeach; ?>
            
            <?php else: ?>
                
                <tbody>
                    <tr>
                        <td colspan="<?= count($kriteria) + 3 ?>">Data Tidak Ditemukan</td>
                    </tr>
                </tbody>
            
            <?php endif; ?>
        
        </table>
    </fieldset>
</div>