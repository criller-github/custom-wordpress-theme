# Custom Webshop Theme

## 1. Introduction
Dette er mit custom WordPress-theme, der blev udviklet som del 1 af projektet "WordPress Webshop Assignment"
Formålet var at lave en simpel webshop-løsning i 2 forskellige fremgangsmåder - ét med brug af Twenty Four temaet og ét andet ved brug af et selvlavet tema.
Disse to temaer skulle ligne hinanden så meget som muligt, både i funktionalitet og uddseende.

## 2. Installation
1. Download eller klon repoet fra GitHub.
2. Upload mappen "customwebshoptheme" til `wp-content/themes/`.
3. Aktivér temaet i WordPress under "Udseende > Temaer".

## 3. Theme Structure
- `functions.php` (her registerer jeg menuer, aktiverer featured images, enqueuer styles og Google Fonts)
- `header.php` (indeholder logo, logotekst, og navigation)
- `footer.php` (indeholder logo, navigation og copyright)
- `front-page.php` (viser forsiden med "Velkommen"-tekst og CTA "Shop" knap)
- `page-shop.php` (viser alle indlæg i et grid med featured image, overskrift og 25 ord med en læs mere knap. både billedet og overskriften og læs mere fører til hvert enkel post page)
- `single.php` (viser et enkelt indlæg med billede, overskrift, lorum ipsum tekst, pris og en "tilføj til kurv" knap ( knappens funktionalitet virker ikke))
- `style.css` (overordnede CSS-regler, farver, layout)

## 4. Development Choices
Jeg valgte først at arbejde med Twenty Twenty-Four temaet for at afprøve, hvor meget jeg kunne opnå med standardværktøjerne og Site Editor. Dette gav mig et overblik over de indbyggede muligheder, og sørgede for at jeg ikke fik lavet et custom theme først, som ikke kunne genskabes i  Twenty Twenty-Four temaet.

I mit custom tema besluttede jeg mig også for at opdele koden så meget som muligt, hvilket sørger for at jeg har selvstændige filer til både **header**, **footer**, **forside** (front-page), **enkelt post-side** (single), **shop** (liste af posts), og **checkout** (kurv). Formålet er at holde koden organiseret og nem at vedligeholde. 

Nedenfor er nogle af de vigtigste tekniske valg, jeg tog undervejs:

- **Indlæsning af CSS og Fonts**  
  Jeg bruger `wp_enqueue_style()` i `functions.php` til både min `style.css` og Google Font (`Inter`), hvilket følger WordPress’ "best practice" i stedet for at tilføje `<link>` direkte i `header.php`.

- **Understøttelse af Featured Images**  
  Jeg aktiverede `add_theme_support('post-thumbnails')`, for at efterligne Twenty Twenty-Four temaet så meget som muligt og for at kunne tilføje fremhævede billeder på hver post. Disse billeder fungerer som “produktbilleder” i min shop-del.

- **Farveskema og Typografi**  
  Jeg valgte en **mørk baggrund** (#424549) og **hvid tekst** for at skabe en moderne “dark mode”-stemning. Til teksten bruger jeg Google Font **Inter**, da det er personligt én af mine favoritter at bruge på dark mode og på grund af at den er letlæselig og passer godt til et minimalistisk design.

- **Shop i 3-spaltet grid**  
  Jeg besluttede at vise mine posts (produkter) i et **3-spaltet grid** på shopsiden, så man hurtigt kan få et visuelt overblik over produkterne.

- **Hooks og Tema-setup**  
  For at styre temaets funktioner og menuer bruger jeg `after_setup_theme`-hooket. Det er her, jeg registrerer menuer og aktiverer `title-tag` og `post-thumbnails`. Samtidig bruger jeg `wp_enqueue_scripts`-hooket til at indlæse mine stylesheets (herunder Google Fonts), så alt bliver lagt korrekt i `<head>` uden konflikter.


## 5. Short Reflection: Custom vs. Twenty Twenty-Four
- **Twenty Twenty-Four**: Meget hurtigere opsætning via Site Editor, dog begrænset tilpasning, hvilket er grunden for valget til at lave shoppen i dette tema først.
- **Custom Theme**: På den anden side gav mit eget tema langt større mulighed for tilpasning, men tog også længere tid at udvikle – sandsynligvis fordi jeg stadig var ved at lære opsætningen
- **Konklusion**: Begge tilgange har fordele og ulemper. Jeg foretrækker personligt custom theme for større fleksibilitet, men Twenty Twenty-Four er fint og indtil videre hurtigere til små projekter.
