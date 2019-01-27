<div class="panel-body">
    <fieldset class="fieldset">
        <legend>Penilaian</legend>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Pegawai</th>
                
                <?php foreach ($kriteria as $kri): ?>
                    <th><?= $kri->nama_kriteria ?></th>
                <?php endforeach; ?>
    
            </thead>
                
            <?php if (!empty($penilaian) && is_array($penilaian)): ?>
                
                <?php foreach($penilaian as $key => $pen): ?>
                    
                    <tbody>
                        <tr>
                            <td><?= ($key + 1) ?></td>
                            <td><?= $pen->pegawai->nama_pegawai; ?></td>
                            
                            <?php foreach ($kriteria as $kri): ?>
                                <td><?= $nilai[$pen->id_penilaian][$kri->id_kriteria]; ?></td>
                            <?php endforeach; ?>
    
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