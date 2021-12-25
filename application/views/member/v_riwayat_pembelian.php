**********************************
            Content body start
            ***********************************-->
            <div class="content-body">
                <!-- row -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Riwayat Pembelian</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Nama Project</th>
                                                    <th>Jumlah</th>
                                                    <th>Waktu Pembelian</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($project as $key => $value): ?>
                                                    <tr>
                                                        <!-- <td>
                                                            <div class="round-img">
                                                                <a href=""><img width="35" src="./images/avatar/1.png" alt="asdf"></a>
                                                            </div>
                                                        </td> -->
                                                        <td><?php echo $value['id'].'-'.$value['nama_project'] ?></td>
                                                        <td><span><?php echo $value['jml'] ?></span></td>
                                                        <td><span><?php echo date('Y-m-d, H:i',$value['timestamp']) ?></span></td>
                                                        <td><span class="badge badge-success">Done</span></td>
                                                        <!-- <span class="badge badge-warning">Pending</span> -->
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--**********************************
            Content body end
        ***********************************