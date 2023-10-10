<!DOCTYPE html>
<html lang="en">
<body>
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Stake Out Titik Bor
                            </div>
                            <div class="card-body">
                                <table id="tabelaktual">
            <thead>
                <tr>
                    <th>CODE</th>
                    <th>SURVEYOR</th>
                    <th>DATE</th>
                    <th>SITE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($STAKEOUT as $key => $value) { ?>
                    <tr>
                        <td><?= $value['code'] ?></td>
                        <td><?= $value['svy'] ?></td>
                        <td><?= $value['date'] ?></td>
                        <td><?= $value['site'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

</div>
</body>
<script>
window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('tabelaktual');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>