<script src="assets/js/change_password.js"></script>

<footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © Copyright 
                <script>
              document.write(new Date().getFullYear())
            </script> 
            <b>Systems Development Division<b>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/jquery-3.7.1.min.js"></script>
  <script src="assets/js/script.js"></script>

  <!-- Font Awesome Icons -->
  <script src="assets/js/plugins/all.js"></script>

  <!-- Chart -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script src="assets/js/chart.js"></script>
  <script src="assets/js/chart2.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>

  <!-- Data Table -->
  <script src="assets/js/core/jquery-3.7.1.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.bootstrap5.min.js"></script>

  <script>
  //approver (view_all)
  $(document).ready( function () {
    new DataTable('#myTable', {
    order: [[3, 'desc']]
    });
  });

  //approver (AOI)
   $(document).ready( function () {
    new DataTable('#myTable2', {
    order: [[3, 'desc']]
    });
  });
  
  //approver (bylaws)
   $(document).ready( function () {
    new DataTable('#myTable3', {
    order: [[3, 'desc']]
    });
  });

  //approver (GIS)
  $(document).ready( function () {
    new DataTable('#myTable4', {
    order: [[3, 'desc']]
    });
  });

  //approver (AFS)
  $(document).ready( function () {
    new DataTable('#myTable5', {
    order: [[3, 'desc']]
    });
  });
  
  //point person (for_approval)
    $(document).ready( function () {
    new DataTable('#myTable6', {
    order: [[0, 'desc']]
    });
  });

   //point person (approved)
    $(document).ready( function () {
    new DataTable('#myTable7', {
    order: [[0, 'desc']]
    });
  });

   //point person (rejected)
    $(document).ready( function () {
    new DataTable('#myTable8', {
    order: [[0, 'desc']]
    });
  });

    //approver (for_approval)
    $(document).ready( function () {
    new DataTable('#myTable9', {
    order: [[0, 'desc']]
    });
  });

   //approver (approved)
    $(document).ready( function () {
    new DataTable('#myTable10', {
    order: [[0, 'desc']]
    });
  });

   //approver (rejected)
    $(document).ready( function () {
    new DataTable('#myTable11', {
    order: [[0, 'desc']]
    });
  });

  //security analyst (audit_trail)
    $(document).ready( function () {
    new DataTable('#myTable12', {
    order: [[0, 'desc']]
    });
  });
  </script>
  
  
  <!-- PDF Viewer -->
  <script src="assets/js/pdf.min.js"></script>
  
  <!-- SELECT 2 -->
  <script src="assets/js/plugins/select2.min.js"></script>

  <!-- HTML2 Canvas Library -->
  <script src="assets/js/html2canvas.min.js"></script>

  <!-- JSPDF Library -->
  <script src="assets/js/jspdf.debug.js"></script>

  <!-- Year Picker -->
  <script src="assets/js/yearpicker.js"></script>
  <!-- <script src="assets/js/plugins/jquery-3.3.1.slim.min.js"></script> -->

</body>
</html>
