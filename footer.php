</div>

<footer>
    <button id="top__button">
        <i class="material-icons">
            keyboard_arrow_up
        </i>
    </button>

    <div id="footer__container">
        <img src="<?= get_template_directory_uri() . '/assets/logo_transparent.png'; ?>"
             alt="Logo du collège Beatus Rhenanus, avec le nom du collège et différents éléments associés à l'éducation"/>

        <nav>
            <div>
                <h5>L'essentiel du Beatus</h5>
                <?php
                $college_menu_args = array(
                    'menu'           => 'MenuFooter_Beatus',
                    'theme_location' => 'main',
                    'container'      => 'div',
                    'menu_id'        => false,
                    'echo'           => true,
                    'depth'          => 2
                );

                $menu = wp_nav_menu($college_menu_args);
                ?>
            </div>

            <div>
                <h5>Les matières</h5>
                <?php
                $college_menu_args = array(
                    'menu'           => 'MenuFooter_Matieres',
                    'theme_location' => 'main',
                    'container'      => 'div',
                    'menu_id'        => false,
                    'echo'           => true,
                    'depth'          => 2
                );

                $menu = wp_nav_menu($college_menu_args);
                ?>
            </div>

            <div>
                <h5>Les sections</h5>
                <?php
                $college_menu_args = array(
                    'menu'           => 'MenuFooter_Sections',
                    'theme_location' => 'main',
                    'container'      => 'div',
                    'menu_id'        => false,
                    'echo'           => true,
                    'depth'          => 2
                );

                $menu = wp_nav_menu($college_menu_args);
                ?>
            </div>

            <address>
                <h5>Contact</h5
                <p>
                    <a href="mailto:ce.0672134f@ac-strasbourg.fr">
                        ce.0672134f@ac-strasbourg.fr
                    </a>
                </p>
                <p>03 90 56 33 30</p>
                <p>
                    2 boulevard Charlemagne<br/>
                    BP 90176<br/>
                    67600 Sélestat
                </p>
            </address>
        </nav>
    </div>
</footer>

<script type="text/javascript">
let coll = document.getElementById('display__filters__button')

if (coll !== null) {
  coll.addEventListener('click', function () {
    let content = document.getElementById('post__categories__filters')
    this.classList.toggle('active')

    content.style.maxHeight ? content.style.maxHeight = null : content.style.maxHeight = content.scrollHeight + 'px'
  })
}

let scrollPosition = window.scrollY
let topButton = document.getElementById('top__button')

window.addEventListener('scroll', () => {
  window.scrollY !== 0 ? topButton.style.display = 'block' : topButton.style.display = 'none'
})

function scrollToTop (scrollDuration) {
  let scrollStep = -window.scrollY / (scrollDuration / 15),
    scrollInterval = setInterval(() => {
      window.scrollY !== 0 ? window.scrollBy(0, scrollStep) : clearInterval(scrollInterval)
    }, 15)
}

topButton.addEventListener('click', (event) => {
  event.stopPropagation()

  scrollToTop(200)
})
</script>

</body>
</html>