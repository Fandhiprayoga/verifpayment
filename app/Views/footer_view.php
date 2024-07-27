<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
    <div class="environment">

        <p>Page rendered in {elapsed_time} seconds using {memory_usage} MB of memory.</p>

        <p>Bridging Technology for Humanity</p>

    </div>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> STI ITTP</p>

    </div>

</footer>

<!-- SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://www.google.com/recaptcha/api.js"></script>

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<script>
   function onSubmit(token) {
    $.LoadingOverlay("show", {
        image       : "",
        text        : "Loading..."
    });
    setTimeout(function(){
        $.LoadingOverlay("text", "Yep, still loading...");
    }, 2500);

     document.getElementById("formlogin").submit();
   }
 </script>

<!-- -->
<script>
    $('#paymenttable').DataTable()
</script>


<?php if (session('error') !== null) : ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "<?= session('error') ?>",
        });
    </script>
<?php endif; ?>
</body>
</html>