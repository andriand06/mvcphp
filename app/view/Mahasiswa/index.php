<h1>Daftar Mahasiswa</h1>
<?php foreach($data['mhs'] as $mhs) : 
?>
<ul>
    <li><?= $mhs['nama'];?></li>
    <li><?= $mhs['email'];?></li>
</ul>
<?php endforeach; ?>