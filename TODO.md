- [X] Vue i Vuetify instal·lat
- [X] Welcome page:
  - [X] Welcome page amb Vuetify i Parallax theme (https://vuetifyjs.com/en/layout/pre-made-themes)
  - [X] Utilitzar layout Blade diferent de la "intranet" (@extends('layouts.landing')
  - [X] CTA (Call To action - Boto principal enmig de la pantall) que porti a la home
  - [X] Acció de login (Boto)
    - [ ] Opcional-> El registre/login es poden mostrar en un dialog no una URL a part
  - [X] Acció de registre (Boto)
- [X] Login
  - [X] Pàgina de Login: 
    - [X] Vista Laravel amb layout propi (Contingut centrat)
    - [X] Realitzada amb PHP (no cal Axios ni peticions XHR)
    - [X] Errors de validació amb Laravel i PHP (objecte error)
    - [X] El formulari manté els valors ja introduits en cas d'error de validació (old)
    - [X] Validació en línia (Javascript) amb vuelidate
  - [X] Testos del Login de Laravel
  - [X] Testos i implementació alternativa (feta per naltros) de Login (LoginAlt)
- [X] Registre
  - [X] Pàgina de registre: 
    - [X] Vista Laravel amb layout propi (Contingut centrat)
    - [X] Realitzada amb PHP (no cal Axios ni peticions XHR)
    - [X] Errors de validació amb Laravel i PHP (objecte error)
    - [X] Validació en línia amb vuelidate
  - [X] Testos del registre de Laravel
  - [X] Testos i implementació alternativa (feta per naltros) de registre
  - [X] El formulari manté els valors ja introduits en cas d'error de validació (old)
- [X] Home
  - [X] Layout app per a intranet (seccions Header, menu navegació, footer, contingut)
  - [X] HEADER
    - [X] Avatar de vuetify amb el Gravatar de l'usuari Logat i el nom
    - [X] Botó de Logout
  - [X] Menú de navegació
    - [X]  Component App.vue amb un array items amb els items del menu
  -
- [X] Pàgines estatíques about/contact:
- [X] Versions de l'aplicació de tasques
  - [X] Versió simple inicial PHP
    - [X] Totes les operacions CRUD (CREATE RETRIEVE UPDATE DELETE), només PHP
  - [X] Versió simple inicial PHP+VUE  
    - [X] Presentació amb TailwindCSS   
  - [X] Versió definitiva  WIP
    - [X] Presentació amb Vuetify
- [X] Preparació de la base de dades, usuaris, permisos i entorns:
 - [X] Usuari personal creat per defecte (el vostre propi usuari)
   - [X] Helper per a crear usuari per defecte
   - [X] Executar als seeders
- [X] Tags
  - [X] TagsControllerTest. Totes les operacions CRUD
    - [X] TagsControllerTest api   
    - [X] TagsControllerTest web (només index)
    - [X] Utilitzar objectes request i validació (errors 422)
    - [X] Testos Utilitzar objectes request i validació (errors 422)
    - [X] Route Model Binding? FindOrFail
    - [X] Usuaris logats (funció Login)
- Testos
 - [X] TasksControllerTest
   - [X] TasksControllerTest web
   - [X] TasksControllerTest api
    - [X] Utilitzar objectes request i validació (errors 422)
       - [X] Testos Utilitzar objectes request i validació (errors 422)
       - [X] Route Model Binding? FindOrFail
       - [X] Usuaris logats (funció Login)
       
       
# Marin	Tejeda Cristian
- https://tasks.marinsan.scool.cat/tags
- https://github.com/navarropalatsi/tasks
- 91 commits
- Tests: 90, Assertions: 297, Failures: 5, Skipped: 1.
- [X] Arreglar tests no funcionen
- [X] Hi ha dd i/o dumps als tests que cal treure
- [X] Boto Guardar que apareix a totes les Toolbars (a algunes no té sentit aparegui) i quan té sentit realment no fa res al fer clic
- [X] No funciona la selecció de filtres (totes completades pendents)
- [X] Switch pendent al formulari add no té bé els labels (no diu completada quan està completada)
- [X] Al afegir tasques no es poden afegir com a completades (ignora el valor de switch que marco)
- [X] De fet el switch completar tampoc va a edit

# TODO comú:
- [X] Error comú als formularis de show: NO ÉS el mateix disabled que readonly. El disabled amb color més fluix queda malament.
- [X] Posar titol al projecte Github i link a la web amb el projecte en explotació
- [X] Posar a la Welcome Page que es tracta del projecte de tasques i de quin alumne
- [X] Posar a la Welcome Page link a Github del projecte
- [X] Millorar navegació del registre i Login (poder tornar a Welcome o passar de Login a registre i recuperar paraula de pas)
- [X] Activar la recuperació de paraula de pas per email i enviar emails a explotació 
- [X] Servidor en explotació no peti el enviament emails al registre
- [ ] Selecció tasques d'un usuari concret
- [X] Mostrar el email usuari al costat avatar 
- [X] Tasques que no tenen assignat un usuari -> No mostrar errors (mostrar que no té cap usuari assignat). A tasques PHP 
es poden afegir tasques sense usuari després apareixen mal a Tasques final
- [X] Botons login i Registre no s'han d'ensenyar a la welcome Page si l'usuari ja està logat
- [X] Utilitzar el select d'usuaris "currat" (component reaprofitable) que es autocompletable i mostra tota la info (inclòs avatars) dels usuaris
- [X] Utilitzar el component completar/descompletar a tot arreu 
- [X] Cerca fullsearch vaig explicar un dia a classe (veure la meva implementació)
- [X] Compte avatar mostreu en tasques que no tenen usuari associat o hi ha algun null.
 
Issues Github:
- [X] Posar com a mínim un parell de incidències a partir dels problemes he trobat en la correció a cadascún dels vostres projectes.
   - [X] Cadascú al seu repositori
   - [X] Assigneu-vos la incidència
   - [X] Tanqueu-la un cop resolta
   - Observeu com està programada l'aplicació (etiquetes, projectes)
   - Descripcions: accepten Markdown, citar usuaris (@ davant nom usuari), citar altres issues (# davant número issue) etc
   - Exemple URL issues: https://github.com/navarropalatsi/tasks/issues
   

# Recordatori de Tasques MP7

## Drop area
- TODO -> millorar la interfície de pujada de fitxers

## Empty states
- [X] No Mostrar datatables quan no hi ha cap tasca al sistema
  - [X] Mostrar més aviat quelcom més similar a una welcome Page
  - [X] Tres items:
    - [X] Imatge SVG 
    - [X] Text gran (simpàtic i esxpliqui que cal fer)
    - [X] Botó CTA 
    - [X] Opcional: background opcions: color paleta de grisos, patro, algun pattern de fons parcial 

## Refactoritzacions

- Moure als seus propis components parts del layout principal:
  - [X] component pel nemú de navegació de l'esquerra

## Menu seleccionat Actiu

- [X] Utilitzar tècnica "discreta" de colorejar un border (el dret) amb un color accent
- Cal abans refactoritzar la vista app.blade.php per crear un nou component
- [X] Opcional: canviar el color de les icones per que no siguin negres. FET per Vuetify
- [X] Color de les lletres un gris molt fos en comptes de negre
## Profile usuari

- Settings: permetre canviar el color primary com a mínim (pràctica simple utilitzar LocalStorage)
  - [X] "Selector de tema" / Theme Selector
  
# Manifest.json i PWA
- [X] Colors i icones al manifest de la system bar i de la barra de navegació 
- [ ] Add to Home Screen: Service Worker simple i comprovar la instal·lació a mobils 
  
# Background colors
    
- [X] Utilitzar l'escala de grisos que hem definit per substituir algun fons blanc
- Es pot utilitzar un gradient com a scool: 
  - https://github.com/acacha/scool/blob/master/resources/views/tenants/layouts/app.blade.php
  
  style="background: #F0F4F8;background: -webkit-linear-gradient(to right, #F0F4F8, #D9E2EC, #BCCCDC);
              background: linear-gradient(to right, #F0F4F8, #D9E2EC, #BCCCDC);"
              
##US/UI i estils

- [X] No utilitzar color roig als botons acció eliminar que tenen una opció de confirmació de l'acció. Si tenen confirmació no són tant perillosos
  - [X] Aplicar jerarquia per NO destacar el botó acció d'esborrar (secondari o terciari com a mínim)
- [X] Sí utilitzar botó roig al menú de confirmació on realment s'elimina el recurs
- [X] Botons cancel: terciaris arreu

CARDS:
- [X] Vista mòbil les tasques han de ser una card cada tasca:
 - Utilitzar font-weigth en comptes de mides de lletra o semantiques h1, h2, p per fer jerarquia:
  • A normal font weight (400 or 500 depending on the font) for most text
  • A heavier font weight (600 or 700) for text you want to emphasize
- [ ] Elevation: provar la elevation
  
TIPOGRAFIA:  
- [X] Colors de lletres en escala de grisos
  - A dark color for primary content (like the headline of an article)
  - A grey for secondary content (like the date an article was published)
  - A lighter grey for tertiary content (maybe the copyright notice in a footer)
  
FAVICON i altres icones 2:
- MASTER:140x140pixels Exemple: https://realfavicongenerator.net/files/aa721752ab56d736bb190769232caefe50591992/master_favicon_thumbnail.png
- Utilitzar

# Landing Page

- [X] Incorporar alguna icona/logo/branding a la Landing Page
- [X] Favicon. Utilitzar favicon generator
- [X] Escollir una imatge de les webs de imatges d'stock mirant que siguin el més adient possible
- [X] Augmentar les mides dels textos de la pàgina principal usnat la tipografia de vue
- [X] Instal·lar altres fonts de Google (veure exemples al document Font recommendations) per als heading i titols destacats
  - Moltes fonts són de pagament. https://1stwebdesigner.com/top-google-webfonts-header-text/
  - Roboto black
- [X] Adaptar la imatge per tenir millor contrast amb les lletres
  - [X] Incorporar sombra a les lletres
  - Apartat text needs consistent contrast
    - Overlay: http://jsfiddle.net/VsHyD/
    - Opacity: 0.5;
    - .v-parallax__image-container
# Imatges de fons

## Component Gallery

Hi han exemples al document component Gallery -> Apartat Marketing page Heroes

## Stock images

- https://www.pexels.com/
- https://unsplash.com/

## Escollir fonts especials per a textos grans

Vegeu document Font Recommendations (pdf)

## Add an overlay (Pàg 117)

- Problema: escriure text sobre fotos i es vegi correctament: https://registre.lanparty.iesebre.com/

Solucions:
- Semitransparent background a la imatge

## Screenshots

- [ ] De la mida adequada, per exemple fer captures de screenshots al mòbil per ensenyar a la landing Page
- [ ] Utilitzar Remote Devices de Chrome per fer captures de pantalla de la app al mòbil

# Seccions de la Landing Page

## Testimonials
- [ ] Llista d'usuaris i fotos al twitter (per exemple) amb el que han dit de la nostra aplicació
  - https://laracasts.com/  com exemple
  
## Footer

- Footer ample, no un simple Footer 
- Que posar:
  - [x] Qüestions secundaries
  - [ ] Pot haver-hi però un altre cop algun CTA prou important com recollir emails per mantenir-se informa't
  - [x] Site map / About section / Social media icons / Legal
  - [x] Copyright
  - [x] Altres
   - [x] FAQ/Testimonials
- Exemple:
  - https://laracasts.com/  

  - [X] notification.onclick -> developer.mozilla -> a les notificacions
  
  
 # Todo MP8
 
 # WHAT WEB CAN DO TODAY
 
 ## LOCAL NOTIFICATIONS | NOTIFICATIONS API
 
 - Permet a una aplicació web enviar notificacions de Sistema (són mostrades fora de la pàgina web utilitzant sistema notificacions de la plataforma/Sistema operatiu en ús)
 - És possible fins i tot combinant amb web workers/service workers fer-ho sense aplicació estar en execució
 
 Recursos:
 - https://developer.mozilla.org/en-US/docs/Web/API/Notifications_API
 - https://whatwebcando.today/local-notifications.html
 
 ## PUSH NOTIFICATIONS
 
 - CAL SERVICE WORKERS I SUPORT BROADCAST O INFRAESTRUCTURA DE SERVIDOR
 
 # PWA
 
 # MILLORES APLICACIó PER FACILITAT PRÀCTIQUES EXPLOTACIó
 
 ## Widgets Toolbar
 
 ### Notifications
 
 Exemple Event:
 - Tasca Completada
   - Ara:
     - Enviem Email
     - Changelog
   - Suposem també volem:
     - Enviar SMS
     - Enviar petició de broadcast en temps real: altres
     - Guardar a una base de dades la notificació per poder mostrar a l'usuari les notificacions
     - Enviar missatge Chat/Slack/Telegram
     - Push notificacion
     - Tot això són notificacions   
 
 ### Widget de Notificacions
 
 Boto Icona amb Menú Dropdown: https://codepen.io/pen/?&editable=true&editors=101 | https://vuetifyjs.com/en/components/menus
 
 STORING NOTIFICACIONS:
 
 ```
 php artisan notifications:table
 2019_01_29_140800_create_notifications_table
 php artisan migrate
 ```
 ```
 Schema::create('notifications', function (Blueprint $table) {
             $table->uuid('id')->primary();
             $table->string('type');
             $table->morphs('notifiable');
             $table->text('data');
             $table->timestamp('read_at')->nullable();
             $table->timestamps();
         });
 ```        
    
 - API: 
   - $user->notifications
   - $user->unreadNotifications
   - $notification->markAsRead();
   - $user->unreadNotifications->markAsRead();
 
 
 CANALS:
 - EMAIL -> Els usuaris tenen email
 - SMS -> Cal incorporar un mòbil al usuari
 - Slack-> ???
 - Telegram-> ?
 
 Sistema integral de notificacions per a una app:
 - [ ] Les notificacions poden ser emails/SMS/Missatges de Chat o múltiples opcions mateix temps
 
 - [ ] Task Scheduling de Laravel: utilitzar per fer neteja de notificacions antigues
   - [ ] Comanda Laravel que netegi notificacions velles (poder indicar quin és el criteri per esboorar)
   - [ ] Programar l'execució automàtica de la comanda
 
 ### Widget Missatges Chat
 TODO
 
 ### WIDGET TASQUES PENDENTS:
 - [ ] Icona tasques o similar
 - [ ] Badge amb el contador de tasques pendents
 - [ ] Un cop es fa click mostrar un menu amb la llista de tasques pendents
 - [ ] Cal incorporar camp al model Task -> progress: Enter entre 1 i 100 (tant per cent). MIgration DEFAULT: 0'
 - [ ] Al fet click a la tasca s'ha de mostrar la tasca:
   - [ ] Cal fer show tasca
   - [ ] Després del show tornar a la llista de tasques
 - REAL TIME SUPPORT: s'actualitzi en temps reals   
 Exemple: adminLTE: bandereta amb badget mostra llista de tasques pendents amb tant per cent execució
 https://adminlte.io/themes/AdminLTE/index2.html#
 
 
 # TODO MP9
 
 - [ ] controlar el que volem al log de delete
 
 # TODO comu
 
 - [ ] Acabar de fer tots els logs 
 - [X] Implementar els ripples on no ho estiguen https://vuetifyjs.com/en/directives/ripples
 - [x] Imatges passarles a webp per baixar el seu pes
 - [x] Actualitzar laravel mix https://laravel-mix.com/docs/4.0/upgrade 
 - [ ] Loading al boto de share
 - [X] Títol i botó Login, amagar per a dispositius menuts.
 - [X] Expansion panel per a filtres sons en mobile
 - [X] Formularis que no siguin en fullscreen, sols en mobile
 - [ ] Share de una tasca concreta
 - [ ] Fer inports imatges app.js, copiar de public->img a resources->img i canviar a la welcome page
 
````
Nota: al actualitzar el laravel necessitarem del vue-loader-compile 
el qual tindra que ser la mateixa versio que el vue
````