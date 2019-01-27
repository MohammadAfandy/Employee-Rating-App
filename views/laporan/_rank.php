<div class="panel-body">
    <fieldset class="fieldset">
        <legend>Ranking</legend>
        <table class="table table-hover table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Rank</th>
            </thead>
                
            <?php if (!empty($rank) && is_array($rank)): ?>
                
                <?php $no = 0; ?>
                <?php foreach($penilaian as $key => $pen): ?>
                <?php //foreach($rank as $key => $r): ?>
                    
                    <tbody>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $pen->pegawai->id_pegawai ?></td>
                            <td><?= $rank[$pen->id_penilaian]; ?> </td>
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