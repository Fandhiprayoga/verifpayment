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

</section>