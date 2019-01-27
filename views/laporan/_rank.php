<div class="panel-body">
    <fieldset class="fieldset">
        <legend>Ranking</legend>
        <table class="table table-bordered">
            <thead>
                <th>Nama Pegawai</th>
                <th>Nilai</th>
                <th>Peringkat</th>
            </thead>
                
            <?php if (!empty($penilaian) && is_array($penilaian)): ?>
                <?php
                usort($penilaian, function ($a, $b) use ($sort) {
                    $pos_a = array_search($a['id_penilaian'], $sort);
                    $pos_b = array_search($b['id_penilaian'], $sort);
                    return $pos_a - $pos_b;
                });
                ?>
                <?php foreach($penilaian as $key => $pen): ?>
                    
                    <tbody>
                        <tr>
                            <td><?= $pen->pegawai->nama_pegawai ?></td>
                            <td><?= $rank[$pen->id_penilaian]; ?> </td>
                            <td><?= $key + 1 ?></td>
                        </tr>
                    </tbody>
                
                <?php endforeach; ?>
            
            <?php else: ?>
                
                <tbody>
                    <tr>
                        <td colspan="3">Data Tidak Ditemukan</td>
                    </tr>
                </tbody>
            
            <?php endif; ?>
        
        </table>
    </fieldset>
</div>
