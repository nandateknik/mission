</div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Nanda Teknik Banyuwangi</div>
            <div>
                <a href="https://www.instagram.com/nandateknikbanyuwangi">Profile</a>
                &middot;
                <a href="https://www.nandateknik.com">Website</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<?= $this->session->userdata('pesan'); ?>
<?php $this->session->unset_userdata('pesan'); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/admin/') ?>js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/admin/') ?>assets/demo/datatables-demo.js"></script>

<?php

$date_raw = date("r");
$date = date('d F', strtotime('-20 day', strtotime($date_raw)));

$tanggal = array();
$tanggal2 = array();
$data = array();

for ($i = 1; $i <= 20; $i++) {
    $tanggal[] = date('d F', strtotime($date . ' + ' . $i . ' days'));
    $tanggal2[] = date('Y-m-d', strtotime($date . ' + ' . $i . ' days'));
}

foreach ($tanggal2 as $list) {
    $this->db->where('status', 'Selesai');
    $this->db->like('tanggal', $list);
    $this->db->from('rencana');
    $data[] = $this->db->count_all_results();
}

?>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php foreach ($tanggal as $label) {
                    echo '"' . $label . '"' . ',';
                } ?>
            ],
            datasets: [{
                label: "Sessions",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [<?php foreach ($data as $key) {
                            echo '' . $key . ',';
                        } ?>],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 12
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 20,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });
</script>

<!-- Logout Delete Confirmation-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah kamu akan keluar dari aplikasi ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-danger" href="<?= base_url('aplikasi/pengaturan/logout') ?>">Yakin</a>
            </div>
        </div>
    </div>
</div>

</body>

</html>