    <style type="text/css">
        :root {
            --primary-dark: #00ADB5;
            --primary-darken: #009199;
            --secondary: #393E46;
            --font-family: 'Lato';
        }

        ::selection {background-color: var(--primary-dark);}

        /* Login */
        .material-half-bg .cover {background-color: var(--primary-dark);}
        .login-content .logo {font-family: var(--font-family);}
        .login-content .login-box {border-radius: .5rem; min-height: auto;}

        /* Header */
        .app-header {background-color: var(--primary-dark);}
        .app-header__logo {font-family: var(--font-family); background-color: var(--primary-darken);}
        @media(max-width: 767px){ .app-header {padding-right: 0;} }
        @media(min-width: 768px){ .app-header {padding-right: 15px;} }
        .dropdown-item.active, .dropdown-item:active {background-color: var(--primary-dark);}
        .dropdown-item .fa {width: 16px;}
        .app-sidebar__toggle:focus, .app-sidebar__toggle:hover {background-color: var(--primary-darken);}
        @media(min-width: 768px){
            .app-sidebar__toggle {margin-left: 230px;}
            .sidenav-toggled .app-sidebar__toggle {margin-left: 50px;}
        }

        /* Sidebar */
        .app-sidebar {background-color: #fff; z-index: 1035; box-shadow: 0 .125rem .25rem rgba(0,0,0,.075); padding-top: 0;}
        .app-sidebar__logo {margin: 1rem .5rem;}
        .app-sidebar__logo .app-menu__item:hover, .app-sidebar__logo .app-menu__item:focus {border-left-color: transparent; background-color: transparent;}
        .app-menu__item {color: #333;}
        .app-menu__item.active, .app-menu__item:hover, .app-menu__item:focus {border-left-color: var(--primary-dark); background-color: var(--primary-dark);}
        @media(max-width: 767px){
            .logo-small {display: none;}
            .logo-big {display: block;}
        }
        @media(min-width: 768px){
            .sidebar-mini.sidenav-toggled .app-menu__label {background: var(--primary-dark);}
            .logo-small {display: none;}
            .sidenav-toggled .logo-small {display: block;}
            .sidenav-toggled .logo-big {display: none;}
        }

        /* Content */
        .app-content {margin-top: 50px;}

        /* Anchor */
        a {color: var(--primary-dark);}
        a:hover {color: var(--primary-darken);}

        /* Button */
        .btn-primary {background-color: var(--primary-dark); border-color: var(--primary-dark);}
        .btn-primary:hover {background-color: var(--primary-darken); border-color: var(--primary-darken);}
        .page-item.active .page-link {background-color: var(--primary-dark); border-color: var(--primary-dark);}

        /* Form */
        .form-control:focus {border-color: var(--primary-dark);}

        /* Table */
        #datatable tr td a.btn {width: 36px;}
        #datatable tr td a.btn .fa {margin-right: 0;}
        .table-saw tr th, .table-saw tr td {text-align: center; vertical-align: middle;}
    </style>