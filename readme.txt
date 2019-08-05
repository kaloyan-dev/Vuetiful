--------
Vuetiful
--------

A simple and fast theme for WordPress built using Vue.js.

Current features:

- theme colors and favicon - go to Appearance > Vuetiful Options to change the site favicon and the main theme color

- modules - to create a module, simply add new folder with a module.php file inside a "modules" directory in the theme root. For example, a "slider" module should be in modules/slider/module.php file in the theme's root folder (not to be mistaken with lib/modules). Those modules can be turned on and of by going to Appearance > Vuetiful Options > Modules in the dashboard

- zero loading time pagination - posts are loaded into a JSON object which Vue uses to quickly render them on the page and show/hide them based on the current page