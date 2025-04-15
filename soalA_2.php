<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Soal A.2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Soal A.2" />
    <meta name="author" content="xortnet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/adminlte.css" />
</head>

<body class="bg-body-secondary">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form method="get" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Search By Hobi</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" name="hobi" id="inputPassword6" class="form-control"
                                        aria-describedby="passwordHelpInline"
                                        value="<?= ( ! empty( $_GET["hobi"] ) ? $_GET["hobi"] : "" ) ?>">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                                <div class="col-auto">
                                    <a href="<?= $_SERVER["PHP_SELF"] ?>" class="btn btn-warning btn-sm">Show All</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body login-card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hobi</th>
                                    <th>Jumlah Person</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n           = 1;
                                $stringQuery = "select h.* ,count(h.hobi) as jumlah_person from hobi h ";
                                if( isset( $_GET['hobi'] ) )
                                {
                                    $queryparam  = htmlspecialchars( $_GET["hobi"] );
                                    $stringQuery .= "where hobi like '%{$queryparam}%' ";
                                }
                                $stringQuery .= "group by h.hobi order by jumlah_person DESC";
                                $con         = mysqli_connect( "xort.net", "root", "@password", "php_terakorp" );
                                $query       = mysqli_query( $con, $stringQuery );
                                while( $result = mysqli_fetch_assoc( $query ) )
                                {
                                    ?>
                                    <tr>
                                        <td><?= $n ?></td>
                                        <td><?= $result["hobi"] ?></td>
                                        <td><?= $result["jumlah_person"] ?></td>
                                    </tr>
                                    <?php
                                    $n += 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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