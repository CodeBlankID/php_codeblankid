<!doctype html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Soal A.1</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="Soal A.1" />
  <meta name="author" content="xortnet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
    integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />

  <link rel="stylesheet" href="css/adminlte.css" />
</head>


<?php
if( isset( $_POST['row'] ) || ! empty( $_POST["row"] ) || isset( $_POST['resultpost'] ) )
{
  $baris = (int) $_POST["row"];
  $kolom = (int) $_POST["column"];
  ?>

  <body class="bg-body-secondary">
    <div class="container">
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-body login-card-body">
              <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <input type="hidden" name="row" value="<?= $baris ?>">
                <input type="hidden" name="column" value="<?= $kolom ?>">
                <?php
                for( $i = 1; $i <= $baris; $i++ )
                {
                  ?>
                  <div class="row">
                    <?php
                    for( $j = 1; $j <= $kolom; $j++ )
                    { ?>
                      <div class="col">
                        <div class="mb-3">
                          <label for="exampleInputkolom<?= $i ?><?= $j ?>" class="form-label"><?= $i ?>.<?= $j ?></label>
                          <input type="text" name="resultpost[<?= $i ?>][<?= $j ?>]" class="form-control"
                            id="exampleInputkolom<?= $i ?><?= $j ?>">
                        </div>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                  <?php
                }
                ?>
                <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-warning">Back</a>
                <button type="submit" class="btn btn-primary float-end">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php if( isset( $_POST["resultpost"] ) )
      {
        $val = $_POST["resultpost"];
        ?>
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <b>Result</b>
              </div>
              <div class="card-body border-1">
                <?php
                foreach( $val as $keyRow => $vRow )
                {
                  foreach( $vRow as $keyCol => $vCol )
                  { ?>
                    <h6><b><?= $keyRow . "." . $keyCol ?></b> : <?= $vCol ?></h6>
                  <?php }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php }
else
{
  ?>

    <body class="login-page bg-body-secondary">
      <div class="login-box">
        <div class="card">
          <div class="card-body login-card-body">
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
              <div class="mb-3">
                <label for="exampleInputbaris" class="form-label">Baris</label>
                <input type="number" name="row" class="form-control" id="exampleInputbaris">
              </div>
              <div class="mb-3">
                <label for="exampleInputkolom" class="form-label">Kolom</label>
                <input type="number" name="column" class="form-control" id="exampleInputkolom">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      <?php } ?>

      <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

      <script src="js/adminlte.js"></script>

      <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
          scrollbarTheme: 'os-theme-light',
          scrollbarAutoHide: 'leave',
          scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function () {
          const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
          if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
              scrollbars: {
                theme: Default.scrollbarTheme,
                autoHide: Default.scrollbarAutoHide,
                clickScroll: Default.scrollbarClickScroll,
              },
            });
          }
        });
      </script>

  </body>

</html>