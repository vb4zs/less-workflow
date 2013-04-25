<?php

    $a_excluded_paths = array(
        '.',
        '..'
    );

    $b_dev_mode = true;

    $theme = $_GET['theme'];

    function list_external_stylesheets($theme = 'base') {
        $s_file_content = file_get_contents('config/stylesheets.json');
        $a_stylesheet_paths = json_decode($s_file_content, true);

        if (is_array($a_stylesheet_paths) && isset($a_stylesheet_paths[$theme])) {
            $a_base_stylesheets = $a_stylesheet_paths[$theme];

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

        <?php if (!empty($theme)): ?>
            <?php list_external_stylesheets($theme); ?>
        <?php endif; ?>

    <?php else: ?>
        <link rel="stylesheet" type="text/css" href="release/css/prod.min.css" />
    <?php endif; ?>

</head>
<body>

<div id="Wrapper">
    <div id="Header">
        <header><h1>Less Rulez!!!</h1></header>
    </div>
    <div id="Main">
        <div id="Sidebar">
            <aside>sidebar</aside>
        </div>
        <div id="Content">
            <section>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt, tellus non ornare ullamcorper, purus lorem cursus eros, at tincidunt elit nulla vel nunc. Pellentesque feugiat porttitor augue sit amet semper. In hac habitasse platea dictumst. Vestibulum porttitor risus a risus bibendum consequat. Aliquam porttitor erat dolor, non tempor turpis. Nulla ullamcorper dictum est, eget convallis turpis ultrices nec. Sed id tellus id est tincidunt feugiat. Aenean non diam at tortor ultricies malesuada. Donec ultrices placerat erat eget molestie. Vestibulum orci quam, tristique id ultrices a, mollis at eros.

                Donec magna dui, tincidunt nec facilisis eget, aliquet et lacus. Fusce pulvinar blandit odio eget feugiat. Vestibulum convallis purus non mauris posuere hendrerit. Pellentesque nunc urna, dignissim a pretium a, malesuada nec ligula. Mauris lacinia adipiscing felis eu ultricies. Pellentesque nibh velit, adipiscing vitae consequat vitae, porttitor ac neque. Etiam hendrerit, nisl et pulvinar ultrices, tortor risus rutrum lacus, quis sodales metus neque eget elit. Suspendisse fermentum dolor nec sem vehicula accumsan accumsan purus imperdiet. Nullam ultricies est aliquet erat consectetur congue. Integer rhoncus gravida orci, sit amet consequat lectus mattis sit amet. Aliquam erat volutpat. Curabitur eleifend est id felis egestas rutrum.

                Vivamus ornare neque mattis odio venenatis at euismod orci blandit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices ultrices consequat. Morbi leo dui, varius eu porttitor et, tincidunt vitae magna. Cras eu lacus tellus, at scelerisque magna. Quisque et tellus ipsum, at ultricies velit. Suspendisse interdum velit dictum diam egestas faucibus. Mauris at justo ac purus volutpat vulputate. Pellentesque posuere sapien at libero egestas consectetur. Fusce at quam sed ante vehicula sollicitudin.

                Curabitur id nibh eros, eget scelerisque elit. Phasellus porttitor, nisl vestibulum convallis facilisis, sapien purus fringilla nulla, eget ultrices augue massa interdum lectus. Aenean mattis turpis vel eros consectetur dignissim. Aliquam mauris massa, tempor sed eleifend nec, malesuada ut est. Morbi semper neque quis libero lacinia suscipit. Fusce ullamcorper dolor in mi consectetur luctus. Nam non magna ut massa congue semper.

                Fusce congue ipsum eget dolor posuere lacinia. Donec mollis tempor neque eu mollis. Maecenas dapibus, sem eget faucibus dignissim, orci ligula dictum massa, ac feugiat orci risus vel risus. Praesent sollicitudin malesuada molestie. Curabitur lectus nunc, pretium nec ultrices nec, hendrerit id lacus. Donec suscipit ullamcorper leo a malesuada. Nam in dui ut turpis ullamcorper ornare ac volutpat ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus sodales justo ut metus eleifend tristique. Aliquam in orci urna.
            </section>
        </div>
    </div>
    <div id="Footer">
        <footer>copyright!! &copy;</footer>
    </div>
</div>

</body>
</html>