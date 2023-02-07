<div class='modal fade' id='smallModalBox' tabindex='-1'>
                                                        <div class='modal-dialog modal-md'>
                                                            <form method='post'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header>
                                                                    <h5 class='modal-title'>CheckBox</h5>
                                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                </div>
                                                                <table class='table table-bordered' id='dataModal' width='100%' cellspacing='0'>
                                                                
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Resi</th>
                                                                            <th>Invoice</th>
                                                                            <th>Ceklist</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                        $ambilperhitungan = mysqli_query($konek, 'SELECT * FROM box WHERE status='Tidak Diterima'');
                                                                        $jum = 1;
                                                                        while($tampil=mysqli_fetch_array($ambilperhitungan)){
                                                                        $resi = $tampil['resi'];
                                                                        $idb = $tampil['iddus'];
                                                                        $invoice = $tampil['invoice'];
                                                                    ?>
                                                                        <tr>
                                                                            <td><?=$jum++;?></td>
                                                                            <td><?=$resi;?></td>
                                                                            <td><?=$invoice;?></td>
                                                                            <td><input type='checkbox' name='ceklist'>
                                                                                <input type='hidden' name='idbarang' value='<?=$idb;?>'>
                                                                                <input type='hidden' name='tempstat' value='1'>
                                                                            </td>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                                <div class='text-right m-2'>
                                                                    <button type='submit' name='ceklistbutton' class='btn btn-primary text-right' data-bs-toggle='modal' data-bs-target='#smallModalCek'>Submit</button>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>