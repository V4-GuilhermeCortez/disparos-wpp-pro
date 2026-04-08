<?php include BASE_PATH . '/app/Views/components/report_head.php'; ?>

<body class="bg-gray-200 p-8 font-sans">

    <?php include BASE_PATH . '/app/Views/components/report_alerts.php'; ?>

    <?php include BASE_PATH . '/app/Views/components/report_actions.php'; ?>

    <div id="folha-relatorio" class="max-w-5xl mx-auto bg-white p-10 rounded shadow-sm border border-gray-200">
        
        <?php include BASE_PATH . '/app/Views/components/report_header.php'; ?>

        <?php include BASE_PATH . '/app/Views/components/report_kpis.php'; ?>
        <?php include BASE_PATH . '/app/Views/components/report_charts.php'; ?>
        <?php include BASE_PATH . '/app/Views/components/report_table.php'; ?>
        <?php include BASE_PATH . '/app/Views/components/report_polls.php'; ?>
        
    </div>

    <?php include BASE_PATH . '/app/Views/components/report_scripts.php'; ?>

</body>
</html>