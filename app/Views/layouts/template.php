
    <div class="wrapper">
        <?= $this->include('layouts/navbar') ?>

        <?= $this->include('layouts/sidebar') ?>

        <?= $this->renderSection('content') ?>



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/assets/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="/assets/adminlte3/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="/assets/adminlte3/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/adminlte3/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/assets/adminlte3/dist/js/pages/dashboard3.js"></script>

    <?= $this->renderSection('script') ?>
</body>

</html>