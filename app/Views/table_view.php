<div style="display: flex;flex-direction: column;gap:10px;">
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInput" name="fullname" placeholder="nanajhonson" value="{fullname}" readonly>
    <label for="floatingInput">Fullname</label>
  </div>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingPassword" name="prodi" placeholder="prodi" value="{prodi}" readonly>
    <label for="floatingPassword">Program Studi</label>
  </div>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingPassword" name="prodi" placeholder="prodi" value="{nim}" readonly>
    <label for="floatingPassword">NIM</label>
  </div>
  
  <table class="table table-striped table-hover table-bordered" id="paymenttable" style="font-size: 12px;">
    <thead>
      <tr>
        <!-- <th scope="col">#</th> -->
        <th scope="col">TA/Semester</th>
        <th scope="col">Tunggakan</th>
        <th scope="col">BPP</th>
        <th scope="col">Beasiswa</th>
        <th scope="col">Potongan</th>
        <th scope="col">Tagihan</th>
        <th scope="col">Total Terbayar</th>
        <th scope="col">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      {data}
      <tr>
        <!-- <th scope="row">1</th> -->
        <td>{THNAKADEMIK}</td>
        <td>{TUNGGAKAN}</td>
        <td>{BPP}</td>
        <td>{BEASISWA}</td>
        <td>{POTONGAN}</td>
        <td>{TOTALTAGIHAN}</td>
        <td>{TOTALBAYAR}</td>
        <td>{SETTLEDSTTUS}</td>
      </tr>
      {/data}
    </tbody>
  </table>
</div>

</section>