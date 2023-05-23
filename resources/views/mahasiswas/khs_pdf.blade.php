<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" <div
    class="container mt-5">
<div class="row justify-content-center align-items-center">
    <table border="0" width="100%" style="text-align:center;">
        <tbody>
            <tr>
                <td align="left" width="15%"><img src="http://siakad.polinema.ac.id/assets/logo/polinemabw.png"
                        width="100px" height="100px" alt="Logo Polinema" title="Logo Polinema"></td>
                <td align="center" width="70%">
                    <div>
                        <span style="font-family: 'Times New Roman'; font-size:12pt">KEMENTERIAN PENDIDIKAN,
                            KEBUDAYAAN,<br>RISET, DAN TEKNOLOGI</span><br>
                        <span style="font-family: 'Times New Roman'; font-size:14pt"><strong>POLITEKNIK NEGERI
                                MALANG</strong></span><br>
                        <span style="font-family: 'Times New Roman'; font-size:14pt"><strong>JURUSAN TEKNOLOGI
                                INFORMASI</strong></span><br>
                        <span style="font-family: 'Times New Roman'; font-size:11pt">Jalan Soekarno-Hatta No.9
                            Malang 65141 </span><br>
                        <span style="font-family: 'Times New Roman'; font-size:11ptt">Telepon (0341) 404424 - 404425
                            Fax (0341) 404420<br>http://www.polinema.ac.id</span>
                    </div>
                </td>
                <td align="left" width="15%"><img src="http://siakad.polinema.ac.id/assets/logo/isobw.png"
                        width="100px" height="100px" alt="Logo Polinema" title="Logo Polinema"></td>
            </tr>
        </tbody>
    </table>
    <hr style="height:10px; border:0; border-top:3px double #000000">
    <div style="text-align: center">
        <h3>Kartu Hasil Studi (KHS)</h3>
    </div>

    <ul class="list-group list-group-flush">
        <li style="font-family: 'Times New Roman'; font-size:12pt" class="list-group"><b>Nama :
            </b>{{ $Mahasiswa->Nama }}</li>
        <li style="font-family: 'Times New Roman'; font-size:12pt" class="list-group"><b>Nim : </b>{{ $Mahasiswa->Nim }}
        </li>
        <li style="font-family: 'Times New Roman'; font-size:12pt" class="list-group"><b>Kelas :
            </b>{{ $Mahasiswa->kelas->nama_kelas }}</li>
    </ul><br>
    <table class="table-responsive">
        <table class="table table-bordered">
            <tr style="font-family: 'Times New Roman'; font-size:12pt">
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Nilai</th>
            </tr>
            @foreach ($Mahasiswa_Matakuliah as $MahasiswaMatakuliah)
                <tr style="font-family: 'Times New Roman'; font-size:12pt">
                    <td>{{ $MahasiswaMatakuliah->matakuliah->nama_matkul }}</td>
                    <td>{{ $MahasiswaMatakuliah->matakuliah->sks }}</td>
                    <td>{{ $MahasiswaMatakuliah->matakuliah->semester }}</td>
                    <td>{{ $MahasiswaMatakuliah->nilai }}</td>
                </tr>
            @endforeach
        </table>
    </table>
</div>
</div>
</div>
</body>
</html>