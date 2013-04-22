<?php

    $a_excluded_paths = array(
        '.',
        '..'
    );

    $b_dev_mode = true;

    function list_external_stylesheets() {
        $s_file_content = file_get_contents('config/stylesheets.json');
        $a_stylesheet_paths = json_decode($s_file_content, true);

        if (is_array($a_stylesheet_paths) && isset($a_stylesheet_paths['base'])) {
            $a_base_stylesheets = $a_stylesheet_paths['base'];

            for ($i = 0, $il = count($a_base_stylesheets); $i < $il; $i++) {
                $src = preg_replace('/^less\//', 'css/', $a_base_stylesheets[$i]);
                $src = preg_replace('/.less$/', '.css', $src);

                echo "\t" . '<link rel="stylesheet" type="text/css" href="' . $src . '" />' . "\n";
            }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo ($b_dev_mode === true) ? '[DEV]' : '[PRODUCTION]' ?></title>
    <?php if ($b_dev_mode === true): ?>
        <?php list_external_stylesheets(); ?>
    <?php else: ?>
        <link rel="stylesheet" type="text/css" href="release/css/prod.min.css" />
    <?php endif; ?>
</head>
<body>

<div id="Wrapper">
    <div id="Header">
        <header>Less Rulez!!!</header>
    </div>
    <div id="Main">
        <div id="Sidebar">
            <aside>sidebar</aside>
        </div>
        <div id="Content">
            <section>
                <div class="hulk"></div>
            </section>
        </div>
    </div>
</div>

</body>
</html>