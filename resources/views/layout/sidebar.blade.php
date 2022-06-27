<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
    data-img="{{ asset('/images/backgrounds/02.jpg') }}">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo"
                        alt="Chameleon admin logo" src="{{ asset('/images/logo/logo.png') }}" />
                    <h3 class="brand-text">SupMS</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ Route::currentRouteName() == 'home' ? 'active' : 'nav-item' }}"><a href="/"><i
                        class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>
            <li class="{{ Route::currentRouteName() == 'fonctions' ? 'active' : 'nav-item' }}"><a href="/fonctions"><i
                        class="la la-suitcase"></i><span class="menu-title" data-i18n="">Fonctions</span></a>
            </li>
            <li class="{{ in_array(Route::currentRouteName(), ['employes', 'ajouter-employe', 'modifier-employe'])  ? 'active' : 'nav-item' }}"><a href="/employes"><i
                        class="la la-users"></i><span class="menu-title" data-i18n="">Employes</span></a>
            </li>
            <li class="{{ in_array(Route::currentRouteName(), ['professeurs', 'ajouter-professeur', 'modifier-professeur'])  ? 'active' : 'nav-item' }}"><a href="/professeurs"><i
                        class="la la-book"></i><span class="menu-title" data-i18n="">Professeurs</span></a>
            </li>
            <li class="{{ in_array(Route::currentRouteName(), ['etudiants', 'ajouter-etudiant', 'modifier-etudiant'])  ? 'active' : 'nav-item' }}"><a href="/etudiants"><i
                        class="la la-book"></i><span class="menu-title" data-i18n="">Etudiants</span></a>
            </li>
        </ul>
    </div>
    <div class="navigation-background"></div>
</div>
