    </div>
 <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.1
        </div>
        <strong id="copyright"></strong>.All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.3 -->
    <script src="/app/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="/app/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="/app/assets/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='/app/assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="/app/assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="/app/assets/customJs.js" type="text/javascript"></script>
    <script type="text/javascript">
        function getLogged(){
            var $username = '{$session->username}';
            var $loggedOn = '{$session->loggedOn}';

            var result = {
                username: $username,
                loggedOn: $loggedOn
            }

            return result;
        };
    </script>
  </body>
</html>