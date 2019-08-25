<header>
    <section>
        <img src="<?= get_template_directory_uri() . '/assets/logo_transparent.png'; ?>"
             alt="Logo du collège Beatus Rhenanus, avec le nom du collège et différents éléments associés à l'éducation"/>

        <address>
            <span>
                <i class="material-icons">phone</i>&nbsp
                03 90 56 33 30
            </span>
            <a href="mailto:ce.0672134f@ac-strasbourg.fr">
                <i class="material-icons">mail</i>&nbsp
                ce.0672134f@ac-strasbourg.fr
            </a>
        </address>
    </section>

    <nav>
        <?php
        $college_menu_args = array(
            'menu'           => 'MenuVertical',
            'theme_location' => 'main',
            'container'      => false,
            'menu_id'        => false,
            'menu_class'     => 'responsive-menu',
            'echo'           => true
        );

        wp_nav_menu($college_menu_args);
        ?>
    </nav>

    <section id="title">
        <section>
            <h1>Bienvenue au collège Beatus Rhenanus</h1>

            <p>
                Bonjour et bienvenue sur le site du collège Beatus Rhenanus à Sélestat. Ce site se veut une fenêtre
                ouverte sur le collège et son environnement local, afin de partager avec vous la vie qui s’y déroule
                chaque jour… Il est celui des élèves et de tous les adultes qui les encadrent et les accompagnent dans
                leur parcours.
            </p>
            <p>
                Il est le reflet du dynamisme et de l’enthousiasme de tous, de la conviction intrinsèque que l’éducation
                et le savoir mènent à la découverte du monde qui est le nôtre, à la découverte de soi et de l’Autre,
                points fondamentaux pour la construction quotidienne de son accomplissement au sein du groupe. En vous
                souhaitant une bonne et agréable visite.
            </p>
        </section>
        <section>
            <div id="orange__circle"></div>
            <div id="yellow__circle"></div>
            <div id="green__circle"></div>
            <div id="img__circle"></div>
        </section>
    </section>
</header>