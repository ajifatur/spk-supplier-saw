<?php
require 'connect.php';
require 'class/saw.php';

$cookiePilih=@$_COOKIE['pilih'];
if (isset($cookiePilih) and !empty($cookiePilih)) {
$saw=new saw();
$saw->setconfig($konek,$cookiePilih);
?>
<div id="matriks-1">
    <h4>Matriks Keputusan</h4>
    <div class="table-responsive">
        <table class="table table-sm table-hover table-striped table-bordered table-saw">
            <thead>
                <tr>
                    <th rowspan="2" width="40">No.</th>
                    <th rowspan="2">Supplier</th>
                    <th colspan="<?php echo count($saw->getKriteria()) ?>">Kriteria</th>
                </tr>
                <tr>
                    <?php
                    foreach ($saw->getKriteria() as $key) {
                        echo "<th>$key</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if(count($saw->getAlternative()) > 0) {
                    foreach ($saw->getAlternative() as $index=>$key) {
                        echo "<tr id='data'>";
                        echo "<td>".($index+1).".</td>";
                        echo "<td>".$key['namaSupplier']."</td>";
                        $no=0;
                        foreach ($saw->getNilaiMatriks($key['id_supplier']) as $data) {
                            echo "<td>$data[nilai]</td>";
                        }
                        echo "</tr>";
                    }
                }
                else{
                    echo '<tr><td colspan="'.(count($saw->getKriteria()) + 2).'" align="center"><em class="text-danger">Tidak ada supplier.</em></td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div id="matriks-2">
    <h4>Normalisasi Matriks Keputusan</h4>
    <div class="table-responsive">
        <table class="table table-sm table-hover table-striped table-bordered table-saw">
            <thead>
                <tr>
                    <th rowspan="2" width="40">No.</th>
                    <th rowspan="2">Supplier</th>
                    <th colspan="<?php echo count($saw->getKriteria()) ?>">Kriteria</th>
                </tr>
                <tr>
                    <?php
                    foreach ($saw->getKriteria() as $key) {
                        echo "<th>$key</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if(count($saw->getAlternative()) > 0){
                    //foreach data supplier
                    foreach ($saw->getAlternative() as $index=>$key) {
                        echo "<tr id='data'>";
                        echo "<td>".($index+1).".</td>";
                        echo "<td>".$key['namaSupplier']."</td>";
                        $no=0;
                        //foreach nilai supplier
                        foreach ($saw->getNilaiMatriks($key['id_supplier']) as $data) {
                            //menghitung normalisasi
                            $hasil=$saw->Normalisasi($saw->getArrayNilai($data['id_kriteria']),$data['sifat'],$data['nilai']);
                            echo "<td>$hasil</td>";
                            $hitungbobot[$key['id_supplier']][$no]=$hasil*$saw->getBobot($data['id_kriteria']);
                            $no++;
                        }
                        echo "</tr>";
                    }
                }
                else{
                    echo '<tr><td colspan="'.(count($saw->getKriteria()) + 2).'" align="center"><em class="text-danger">Tidak ada supplier.</em></td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div id="matriks-3">
    <h4>Perangkingan</h4>
    <div class="table-responsive">
        <table class="table table-sm table-hover table-striped table-bordered table-saw">
            <thead>
                <tr>
                    <th rowspan="2" width="40">Rank</th>
                    <th rowspan="2">Supplier</th>
                    <th colspan="<?php echo count($saw->getKriteria()) ?>">Kriteria</th>
                    <th rowspan="2">Hasil</th>
                </tr>
                <tr>
                    <?php
                    foreach ($saw->getKriteria() as $key) {
                        echo "<th>$key</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if(count($saw->getAlternative()) > 0){
                    $array = [];
                    foreach ($saw->getAlternative() as $key) {
                        $no = 0; $hasil = 0;
                        foreach ($hitungbobot[$key['id_supplier']] as $data) {
                            $hasil+=$data;
                        }
                        $saw->simpanHasil($key['id_supplier'],$hasil);
                        $key['hasil'] = $hasil;
                        array_push($array, $key);
                    }

                    // Urutkan berdasarkan hasil
                    usort($array, function($a, $b) {
                        return $b['hasil'] <=> $a['hasil'];
                    });

                    foreach ($array as $index=>$key) {
                        echo "<tr id='data'>";
                        echo "<td>".($index+1).".</td>";
                        echo "<td>".$key['namaSupplier']."</td>";
                        foreach ($hitungbobot[$key['id_supplier']] as $data) {
                            echo "<td>$data</td>";
                        }
                        echo "<td>".$key['hasil']."</td>";
                        echo "</tr>";
                    }
                }
                else{
                    echo '<tr><td colspan="'.(count($saw->getKriteria()) + 3).'" align="center"><em class="text-danger">Tidak ada supplier.</em></td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
//cetak hasil
$saw->getHasil();
}