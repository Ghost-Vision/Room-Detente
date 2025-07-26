<header>
    <nav>
        <div class="mobile-menu">
            <span class="material-symbols-outlined" onclick="toggler()" id="toggler" >menu</span>
        </div>
        <div class="appBar">
            <img class="appBar__icon" src="assets/images/Logo_RoomDetente_LR.png" alt="Logo Room Détente" >
            <div class="appBar__nav">
                <ul class="menu-listing"><a class="appBar__navItem" href="index.php">Accueil</a></ul>
                <ul class="menu-listing"><a class="appBar__navItem" href="a-propos.php">A propos</a></ul>
                <ul class="menu-listing"><a class="appBar__navItem" href="services.php">Services</a></ul>
                <ul class="menu-listing"><a class="appBar__navItem" href="services.php#formules">Nos Formules</a></ul>
                <ul class="menu-listing"><a class="appBar__navItem" href="contact.php">Contacts</a></ul>
            </div>
            <div class="appBar_left">
                <a href="login.php">
                    <span class="material-symbols-outlined">step_into</span>
                </a>
            </div>
        </div>
    </nav>

    <nav class="blackBanner">
        <p class="blackBanner__title">Réservez dès maintenant</p>
        <a class="button" href="contact.php">Réservez</a>
    </nav>

    <script>
        function toggler()
        {
            const icon = document.querySelector("#toggler");
            const menu = document.querySelector('.appBar');
            const blackBanner = document.querySelector('.blackBanner');
            const mainHome = document.querySelector('main');
            const footer = document.querySelector('footer');
            const mediaQuery = window.matchMedia('(max-width: 900px)');

            if (icon.innerHTML == "menu")
            {
                icon.innerHTML = "close";

                if(mediaQuery.matches)
                {
                    menu.style.display = "flex";
                    mainHome.style.display = "none";
                    footer.style.display = "none";
                    blackBanner.style.display = "none";
                }
                else
                {
                    menu.style.display = "grid";
                }
            }
            else
            {
                icon.innerHTML = "menu";
                menu.style.display = "none";
                mainHome.style.display = "";
                footer.style.display = "";
                blackBanner.style.display = "";
            }
        }
    </script>
</header>


