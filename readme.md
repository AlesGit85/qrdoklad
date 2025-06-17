# QRdoklad - Prezentační web

Moderní a responzivní prezentační web pro fakturační systém QRdoklad vytvořený v Nette Framework.

## 📁 Struktura projektu

### PHP (Nette Framework)
```
app/
├── Presentation/
│   └── Landing/
│       ├── LandingPresenter.php    # Hlavní presenter
│       ├── @layout.latte          # Základní layout
│       ├── default.latte          # Domovská stránka
│       ├── funkce.latte           # Stránka funkcí
│       ├── cenik.latte            # Ceník
│       └── kontakt.latte          # Kontaktní formulář
└── Core/
    └── RouterFactory.php          # Routing konfigurace
```

### CSS (Modulární struktura)
```
www/css/
├── landing.css                # Hlavní CSS soubor (importy)
├── base.css                   # Základní styly a proměnné
├── components.css             # Komponenty (tlačítka, karty, formuláře)
├── layout.css                 # Layout (navbar, footer, hero)
├── pages.css                  # Specifické stránky (homepage, features)
├── pricing-contact.css        # Ceník a kontakt
└── responsive.css             # Media queries pro všechny breakpointy
```

### JavaScript (Modulární struktura)
```
www/js/
├── landing.js                 # Hlavní soubor + utils
├── scroll-effects.js          # Scroll animace a navbar efekty
├── pricing.js                 # Pricing toggle a kalkulačka
└── contact.js                 # Kontaktní formulář a validace
```

### Ostatní soubory
```
www/
├── images/
│   └── logo.svg              # SVG logo
└── favicon.ico               # Favicon (volitelný)
```

## 🎨 Barevné schéma

```css
:root {
    --primary-color: #B1D235;      /* Primární zelená */
    --secondary-color: #95B11F;    /* Sekundární zelená */
    --gray-color: #6c757d;         /* Šedá */
    --dark-color: #212529;         /* Černá */
    --light-gray: #f8f9fa;         /* Světle šedá */
    --white: #ffffff;              /* Bílá */
}
```

## 📄 Stránky

### 🏠 Domovská stránka (`/`)
- Hero sekce s animovanými kartami
- Výhody systému (6 bloků)
- Ukázka funkcí s obrázkem
- Testimonials (3 reference)
- CTA sekce

### ⚙️ Funkce (`/funkce`)
- Hero sekce
- Detailní popis hlavních funkcí (4 velké karty)
- Pokročilé funkce (6 menších karet)
- Proces vystavení faktury (4 kroky)
- CTA sekce

### 💰 Ceník (`/cenik`)
- Hero sekce
- Měsíční/roční toggle
- 3 cenové balíčky (Starter, Business, Enterprise)
- FAQ sekce (5 otázek)
- Interaktivní kalkulačka úspor
- CTA sekce

### 📞 Kontakt (`/kontakt`)
- Hero sekce s rychlými kontakty
- Kontaktní formulář s validací
- Kontaktní informace
- Rychlé akce
- Mapa (placeholder)
- FAQ pro kontakt (4 otázky)
- CTA sekce

## 🔧 Funkce

### CSS Moduly
- **base.css**: CSS proměnné, základní styly, utility třídy
- **components.css**: Tlačítka, karty, formuláře, accordion
- **layout.css**: Navbar, hero, footer, CTA sekce
- **pages.css**: Homepage specifické styly (floating cards, animace)
- **pricing-contact.css**: Pricing toggle, kalkulačka, kontaktní formulář
- **responsive.css**: Všechny media queries (768px, 576px, 1400px+)

### JavaScript Moduly
- **landing.js**: Hlavní inicializace, utility funkce, tracking
- **scroll-effects.js**: Scroll animace, počítadla, navbar efekty
- **pricing.js**: Pricing toggle, kalkulačka úspor s live výpočty
- **contact.js**: Validace formuláře, auto-save, character count

### Interaktivní prvky
- ✅ Scroll animace při scrollování
- ✅ Navbar efekty (změna průhlednosti)
- ✅ Pricing toggle (měsíční/roční)
- ✅ Kalkulačka úspor s live výpočty
- ✅ Kontaktní formulář s validací
- ✅ Auto-save draftu formuláře
- ✅ Character count pro textarea
- ✅ Smooth scrolling pro anchor linky
- ✅ Google Analytics tracking

## 🚀 Instalace a spuštění

1. **Naklonuj projekt**
```bash
git clone [repository]
cd qrdoklad
```

2. **Nainstaluj závislosti**
```bash
composer install
```

3. **Spusť lokální server**
```bash
php -S localhost:8000 -t www
```

4. **Otevři v prohlížeči**
```
http://localhost:8000
```

## 📱 Responzivní design

- **Desktop**: 1400px+ (extra large screens)
- **Laptop**: 992px - 1399px (large screens)
- **Tablet**: 768px - 991px (medium screens)
- **Mobile**: 576px - 767px (small screens)
- **Tiny**: <576px (extra small screens)

## 🎯 Optimalizace

### Performance
- Minimalizované CSS importy
- Throttled scroll listenery
- Debounced resize events
- Lazy loading připraveno
- Optimalizované animace

### SEO
- Sémantické HTML tagy
- Meta description pro každou stránku
- Strukturované nadpisy (H1-H6)
- Alt texty pro obrázky
- Sitemap připraveno

### Accessibility
- Správné kontrastní poměry
- Focus stavy pro keyboard navigation
- ARIA labels kde potřeba
- Responsive font sizes
- Reduced motion podporováno

## 🔧 Další vývoj

### Co přidat
- [ ] Skutečné odesílání e-mailů z kontaktního formuláře
- [ ] Google Maps integrace
- [ ] Blog sekce
- [ ] Vícejazyčnost (EN)
- [ ] FAQ sekce
- [ ] Privacy policy & Terms of service
- [ ] Cookie consent
- [ ] Chat widget
- [ ] Newsletter signup

### Technické vylepšení
- [ ] Service Worker pro offline funkcionalität
- [ ] WebP obrázky s fallbackem
- [ ] Critical CSS inlining
- [ ] JavaScript lazy loading
- [ ] Redis cache pro Nette
- [ ] HTTPS & Security headers
- [ ] CDN pro statické soubory

## 📊 Analytics události

JavaScript automaticky trackuje tyto události:
- `CTA` - kliknutí na call-to-action tlačítka
- `Navigation` - navigace mezi stránkami
- `Pricing` - interakce s cenami a kalkulačkou
- `Contact` - práce s kontaktním formulářem
- `Calculator` - používání kalkulačky úspor

## 🔗 Užitečné odkazy

- [Nette Documentation](https://doc.nette.org/)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.3/)
- [Latte Template Documentation](https://latte.nette.org/)

---

**Vytvořeno pro QRdoklad © 2025**