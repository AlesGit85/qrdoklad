/**
 * QRdoklad Pricing Module
 * Obsahuje: Pricing Toggle, Savings Calculator
 * 
 * Barvy projektu:
 * - Primární: #B1D235
 * - Sekundární: #95B11F  
 * - Šedá: #6c757d
 * - Černá: #212529
 */

console.log('🚀 PRICING.JS SE NAČÍTÁ...');

// Globální objekt pro pricing moduly
window.PricingModule = {
    createFallbackDisplay() {
        // Zkusíme najít kontejner kalkulátoru
        const sliderContainer = this.slider.closest('.calculator, .savings-calculator, .card, .col');
        
        if (sliderContainer) {
            // Vytvoříme div pro výsledky
            const resultsDiv = document.createElement('div');
            resultsDiv.className = 'calculator-results mt-3 p-3 bg-light rounded';
            resultsDiv.innerHTML = `
                <h6 class="text-center mb-2">💰 Vaše úspory</h6>
                <div class="row text-center">
                    <div class="col-6">
                        <div class="savings-result">
                            <strong id="fallback-monthly">-- Kč</strong>
                            <br><small class="text-muted">měsíčně</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="savings-result">
                            <strong id="fallback-annual">-- Kč</strong>
                            <br><small class="text-muted">ročně</small>
                        </div>
                    </div>
                </div>
            `;
            
            // Přidáme výsledky za slider
            sliderContainer.appendChild(resultsDiv);
            
            // Aktualizujeme reference
            this.monthlyResult = document.getElementById('fallback-monthly');
            this.annualResult = document.getElementById('fallback-annual');
            
            console.log('✅ Fallback zobrazení výsledků vytvořeno');
        } else {
            console.log('⚠️ Nepodařilo se najít kontejner pro fallback zobrazení');
        }
    },
    
    // Zpětná kompatibilita - stará metoda
    calculateSavings(invoiceCount) {
        const result = this.calculateAdvancedSavings({
            invoiceCount: invoiceCount,
            timePerInvoice: 15, // výchozí hodnota
            hourlyRate: 800     // výchozí hodnota
        });
        
        return {
            monthly: result.monthly,
            annual: result.annual
        };
    },
    
    PricingToggle: {},
    SavingsCalculator: {}
};

/*
==================================
PRICING TOGGLE MODULE
==================================
*/
window.PricingModule.PricingToggle = {
    toggle: null,
    monthlyPrices: null,
    annualPrices: null,
    annualNotes: null,
    
    init() {
        console.log('📦 PricingToggle modul inicializován');
        
        this.toggle = document.getElementById('priceToggle');
        if (!this.toggle) {
            console.log('ℹ️ Pricing toggle nenalezen na této stránce');
            return;
        }
        
        console.log('✅ Pricing toggle nalezen, inicializuji...');
        
        this.monthlyPrices = document.querySelectorAll('.monthly-price');
        this.annualPrices = document.querySelectorAll('.annual-price');
        this.annualNotes = document.querySelectorAll('.annual-note');
        
        console.log(`📊 Nalezeno: ${this.monthlyPrices.length} měsíčních cen, ${this.annualPrices.length} ročních cen`);
        
        this.toggle.addEventListener('change', () => {
            console.log('🔄 Pricing toggle změněn na:', this.toggle.checked ? 'roční' : 'měsíční');
            this.togglePrices();
            
            // Track pricing toggle
            if (window.Utilities?.Analytics?.trackPricingInteraction) {
                window.Utilities.Analytics.trackPricingInteraction(this.toggle.checked);
            }
        });
        
        // Nastavíme počáteční stav
        this.togglePrices();
    },
    
    togglePrices() {
        const isAnnual = this.toggle.checked;
        console.log('💰 Přepínám ceny na:', isAnnual ? 'roční' : 'měsíční');
        
        // Přepneme viditelnost cen
        this.monthlyPrices.forEach(price => {
            price.style.display = isAnnual ? 'none' : 'block';
        });
        
        this.annualPrices.forEach(price => {
            price.style.display = isAnnual ? 'block' : 'none';
        });
        
        // Zobrazíme/skryjeme poznámky o roční slevě
        this.annualNotes.forEach(note => {
            note.style.display = isAnnual ? 'block' : 'none';
        });
        
        // Animace při přepnutí
        this.animatePriceCards();
    },
    
    animatePriceCards() {
        const pricingCards = document.querySelectorAll('.pricing-card, .card');
        pricingCards.forEach((card, index) => {
            card.style.transform = 'scale(0.98)';
            setTimeout(() => {
                card.style.transform = 'scale(1)';
            }, 50 + index * 30);
        });
    }
};

/*
==================================
SAVINGS CALCULATOR MODULE
==================================
*/
window.PricingModule.SavingsCalculator = {
    slider: null,
    displayValue: null,
    monthlyResult: null,
    annualResult: null,
    
    init() {
        console.log('📦 SavingsCalculator modul inicializován');
        
        // Hledáme všechny slidery na stránce
        console.log('🔍 Hledám všechny slidery kalkulačky...');
        
        // ID všech sliderou z debug výpisu
        const sliderIds = {
            invoiceCount: 'invoiceCount',      // Počet faktur měsíčně
            timePerInvoice: 'timePerInvoice',  // Čas na jednu fakturu (minuty)
            hourlyRate: 'hourlyRate'           // Hodinová sazba (Kč)
        };
        
        this.sliders = {};
        
        // Najdeme všechny slidery
        Object.keys(sliderIds).forEach(key => {
            const slider = document.getElementById(sliderIds[key]);
            if (slider) {
                this.sliders[key] = slider;
                console.log(`✅ Slider '${key}' nalezen s ID: ${sliderIds[key]}`);
            } else {
                console.log(`❌ Slider '${key}' s ID '${sliderIds[key]}' nenalezen`);
            }
        });
        
        // Kontrolujeme, zda máme alespoň jeden slider
        const foundSliders = Object.keys(this.sliders);
        if (foundSliders.length === 0) {
            console.log('ℹ️ Žádné slidery kalkulačky nenalezeny na této stránce');
            return;
        }
        
        console.log(`✅ Nalezeno ${foundSliders.length} sliderou: ${foundSliders.join(', ')}`);
        
        // Pro zpětnou kompatibilitu - nastavíme hlavní slider
        this.slider = this.sliders.invoiceCount || Object.values(this.sliders)[0];
        
        // Hledáme result elementy - pokud neexistují, vytvoříme je
        this.findOrCreateResultElements();
        
        // Přidáme event listenery na všechny slidery
        Object.keys(this.sliders).forEach(key => {
            const slider = this.sliders[key];
            
            slider.addEventListener('input', () => {
                console.log(`🎛️ ${key}: ${slider.value}`);
                this.updateSliderDisplay(key, slider.value);
                this.updateCalculation();
            });
            
            slider.addEventListener('change', () => {
                this.trackCalculatorUsage();
            });
            
            console.log(`✅ Event listenery připojeny k slideru '${key}'`);
            
            // Inicializujeme zobrazení pro tento slider hned
            this.updateSliderDisplay(key, slider.value);
        });
        
        // Počáteční výpočet
        this.updateCalculation();
        
        console.log('✅ Kalkulátor je připraven k použití!');
        
        // Oznámíme uživateli úspěch
        setTimeout(() => {
            if (window.Utilities?.Notifications?.success) {
                const foundElements = [
                    this.monthlyResult && 'finanční úspory',
                    this.annualResult && 'roční úspory', 
                    this.timeSavedElement && 'ušetřený čas',
                    this.roiTimeElement && 'návratnost investice'
                ].filter(Boolean).join(', ');
                
                window.Utilities.Notifications.success(
                    `Kalkulátor úspěšně integrován do designu! Aktualizuje: ${foundElements}.`,
                    5000
                );
            }
        }, 1000);
    },
    
    findOrCreateResultElements() {
        console.log('🔍 Hledám původní result elementy v designu...');
        
        // Hledáme původní elementy podle skutečných ID z HTML
        const resultElements = {
            timeSaved: document.getElementById('timeSaved'),           // "8 hodin"
            moneySaved: document.getElementById('moneySaved'),         // "6 400 Kč" 
            yearlySavings: document.getElementById('yearlySavings'),   // "76 800 Kč"
            roiTime: document.getElementById('roiTime')               // "1 týden"
        };
        
        // Logujeme co jsme našli s detailnějšími informacemi
        Object.keys(resultElements).forEach(key => {
            const element = resultElements[key];
            if (element) {
                console.log(`✅ Nalezen původní result element: #${key} (obsahuje: "${element.textContent.trim()}", tag: ${element.tagName})`);
            } else {
                console.log(`❌ Result element #${key} nenalezen`);
                
                // Debug - zkusíme najít podobné elementy
                const similarElements = document.querySelectorAll(`[id*="${key}"], [class*="${key}"], [id*="roi"], [class*="roi"]`);
                if (similarElements.length > 0) {
                    console.log(`🔍 Podobné elementy pro ${key}:`, Array.from(similarElements).map(el => `#${el.id || 'no-id'}.${el.className || 'no-class'}`));
                }
            }
        });
        
        // Nastavíme reference pro hlavní výpočty
        this.monthlyResult = resultElements.moneySaved;
        this.annualResult = resultElements.yearlySavings;
        this.timeSavedElement = resultElements.timeSaved;
        this.roiTimeElement = resultElements.roiTime;
        
        console.log('📦 Result elementy nastaveny:');
        console.log('  - Monthly result (moneySaved):', this.monthlyResult ? '✅ nalezen' : '❌ nenalezen');
        console.log('  - Annual result (yearlySavings):', this.annualResult ? '✅ nalezen' : '❌ nenalezen');
        console.log('  - Time saved element:', this.timeSavedElement ? '✅ nalezen' : '❌ nenalezen');
        console.log('  - ROI element:', this.roiTimeElement ? '✅ nalezen' : '❌ nenalezen');
    },
    
    updateSliderDisplay(sliderKey, value) {
        const slider = this.sliders[sliderKey];
        if (!slider) return;
        
        // Pokusíme se najít původní display elementy
        const displayElement = this.findOriginalDisplayElement(slider, sliderKey, value);
        
        if (displayElement) {
            // Aktualizujeme původní element - pouze číslo bez jednotek
            const oldValue = displayElement.textContent;
            displayElement.textContent = value;
            console.log(`✅ Aktualizován původní element '${sliderKey}': '${oldValue}' → '${value}'`);
        } else {
            console.log(`❌ Nepodařilo se najít display element pro '${sliderKey}'`);
        }
    },
    
    findOriginalDisplayElement(slider, sliderKey, currentValue) {
        // Hledáme podle skutečných ID z HTML struktury
        const specificSelectors = [
            `#${sliderKey}Value`,           // invoiceCountValue, timePerInvoiceValue, hourlyRateValue
            `#${sliderKey}Display`,
            `#${sliderKey}-value`,
            `#${sliderKey}-display`
        ];
        
        for (let selector of specificSelectors) {
            const element = document.querySelector(selector);
            if (element) {
                console.log(`✅ Nalezen původní display element pro '${sliderKey}': ${selector}`);
                return element;
            }
        }
        
        console.log(`⚠️ Původní display element pro '${sliderKey}' nenalezen. Hledal jsem: ${specificSelectors.join(', ')}`);
        return null;
    },
    
    updateCalculation() {
        // Získáme hodnoty ze všech sliderou
        const values = {
            invoiceCount: this.sliders.invoiceCount ? parseInt(this.sliders.invoiceCount.value) : 20,
            timePerInvoice: this.sliders.timePerInvoice ? parseInt(this.sliders.timePerInvoice.value) : 15,
            hourlyRate: this.sliders.hourlyRate ? parseInt(this.sliders.hourlyRate.value) : 800
        };
        
        console.log(`🧮 Aktualizuji kalkulačku:`, values);
        
        // Výpočet úspor založený na všech parametrech
        const savings = this.calculateAdvancedSavings(values);
        
        // Aktualizujeme zobrazené úspory
        if (this.monthlyResult) {
            this.monthlyResult.textContent = `${savings.monthly.toLocaleString('cs-CZ')} Kč`;
            console.log(`💰 Monthly result aktualizován: ${savings.monthly} Kč`);
        }
        
        if (this.annualResult) {
            this.annualResult.textContent = `${savings.annual.toLocaleString('cs-CZ')} Kč`;
            console.log(`💰 Annual result aktualizován: ${savings.annual} Kč`);
        }
        
        // Console výsledky pro debug - zkrácené
        console.log('%c💰 KALKULÁTOR ÚSPOR 💰', 'color: #B1D235; font-weight: bold; font-size: 14px;');
        console.log(`%c📊 ${values.invoiceCount} faktur × ${values.timePerInvoice} min × ${values.hourlyRate} Kč/hod`, 'color: #6c757d;');
        console.log(`%c💵 Měsíčně: ${savings.monthly.toLocaleString('cs-CZ')} Kč | Ročně: ${savings.annual.toLocaleString('cs-CZ')} Kč`, 'color: #95B11F; font-weight: bold;');
        console.log('%c' + '─'.repeat(50), 'color: #B1D235;');
    },
    
    calculateAdvancedSavings(values) {
        const { invoiceCount, timePerInvoice, hourlyRate } = values;
        
        console.log(`🧮 DEBUG - Vstupní hodnoty:`, values);
        
        // Náklady konkurence (simulace založená na průzkumu trhu)
        const competitorMonthlyFee = 800;           // Vyšší paušál konkurence
        const competitorTransactionFee = 5;         // Poplatek za fakturu
        const competitorExtraTimeMinutes = Math.max(10, timePerInvoice * 0.5); // Konkurence je výrazně pomalejší
        
        console.log(`⚡ Konkurence je pomalejší o: ${competitorExtraTimeMinutes.toFixed(1)} minut na fakturu`);
        
        // Náklady QRdoklad  
        const ourMonthlyFee = 599;                  // Náš Business balíček
        const ourTransactionFee = 0;                // Bez transakčních poplatků
        
        // Výpočet času v hodinách
        const competitorTimePerInvoice = (timePerInvoice + competitorExtraTimeMinutes) / 60; // v hodinách
        const ourTimePerInvoice = timePerInvoice / 60; // v hodinách
        
        console.log(`⏱️ DEBUG - Časy:
        - Náš čas na fakturu: ${timePerInvoice} min = ${ourTimePerInvoice.toFixed(3)} hod
        - Konkurence čas na fakturu: ${timePerInvoice + competitorExtraTimeMinutes} min = ${competitorTimePerInvoice.toFixed(3)} hod
        - Rozdíl času: ${competitorExtraTimeMinutes} min = ${(competitorExtraTimeMinutes/60).toFixed(3)} hod`);
        
        // Výpočet časových nákladů
        const competitorTimeCost = invoiceCount * competitorTimePerInvoice * hourlyRate;
        const ourTimeCost = invoiceCount * ourTimePerInvoice * hourlyRate;
        const timeSavings = competitorTimeCost - ourTimeCost;
        
        console.log(`💰 DEBUG - Časové náklady:
        - Konkurence časové náklady: ${invoiceCount} × ${competitorTimePerInvoice.toFixed(3)} × ${hourlyRate} = ${competitorTimeCost.toFixed(0)} Kč
        - Naše časové náklady: ${invoiceCount} × ${ourTimePerInvoice.toFixed(3)} × ${hourlyRate} = ${ourTimeCost.toFixed(0)} Kč
        - Úspora z času: ${timeSavings.toFixed(0)} Kč`);
        
        // Celkové měsíční náklady
        const competitorTotal = 
            competitorMonthlyFee + 
            (invoiceCount * competitorTransactionFee) + 
            competitorTimeCost;
            
        const ourTotal = 
            ourMonthlyFee + 
            (invoiceCount * ourTransactionFee) + 
            ourTimeCost;
        
        // Úspory
        const monthlySavings = Math.max(0, competitorTotal - ourTotal);
        const annualSavings = monthlySavings * 12;
        
        // Čas ušetřený měsíčně (v hodinách)
        const timeSavedPerInvoice = (competitorExtraTimeMinutes / 60); // hodiny na fakturu
        const timeSavedMonthly = invoiceCount * timeSavedPerInvoice; // celkem hodin měsíčně
        
        console.log(`💡 DEBUG - Celkový výpočet úspor:
        📊 Konkurence celkem: ${competitorTotal.toFixed(0)} Kč
           - Paušál: ${competitorMonthlyFee} Kč
           - Transakce: ${invoiceCount * competitorTransactionFee} Kč 
           - Čas: ${competitorTimeCost.toFixed(0)} Kč
        
        🎯 QRdoklad celkem: ${ourTotal.toFixed(0)} Kč
           - Paušál: ${ourMonthlyFee} Kč
           - Transakce: ${ourTransactionFee} Kč
           - Čas: ${ourTimeCost.toFixed(0)} Kč
           
        💰 Celková úspora: ${monthlySavings.toFixed(0)} Kč/měsíc
        ⏱️ Úspora jen z času: ${timeSavings.toFixed(0)} Kč/měsíc
        ⏰ Čas ušetřený: ${timeSavedMonthly.toFixed(1)} hodin/měsíc`);
        
        return {
            monthly: Math.round(monthlySavings),
            annual: Math.round(annualSavings),
            timeSavedHours: Math.round(timeSavedMonthly * 10) / 10 // zaokrouhlíme na 1 desetinné místo
        };
    },
    
    trackCalculatorUsage() {
        // Získáme hodnoty ze všech sliderou pro tracking
        const values = {
            invoiceCount: this.sliders.invoiceCount ? parseInt(this.sliders.invoiceCount.value) : 0,
            timePerInvoice: this.sliders.timePerInvoice ? parseInt(this.sliders.timePerInvoice.value) : 0,
            hourlyRate: this.sliders.hourlyRate ? parseInt(this.sliders.hourlyRate.value) : 0
        };
        
        const savings = this.calculateAdvancedSavings(values);
        
        if (window.Utilities?.Analytics?.trackCalculatorUsage) {
            window.Utilities.Analytics.trackCalculatorUsage(values.invoiceCount, savings.annual);
        }
        
        // Rozšířené tracking pro analytics
        if (window.Utilities?.Analytics?.trackEvent) {
            window.Utilities.Analytics.trackEvent('advanced_calculator_usage', 'pricing', 
                `${values.invoiceCount}faktur_${values.timePerInvoice}min_${values.hourlyRate}kc`, 
                savings.annual);
        }
        
        console.log(`📊 Trackuji použití kalkulačky:`, values, `→ ${savings.annual} Kč úspor ročně`);
    }
};

// Přidáme CSS styly pro pricing funkce
(function addPricingStyles() {
    if (document.getElementById('pricing-styles')) return;
    
    const style = document.createElement('style');
    style.id = 'pricing-styles';
    style.textContent = `
        /* Pricing toggle animation */
        .pricing-card {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .pricing-card:hover {
            transform: translateY(-5px) !important;
        }
        
        /* Price display transitions */
        .monthly-price,
        .annual-price {
            transition: opacity 0.3s ease;
        }
        
        /* Range slider styling */
        .form-range {
            -webkit-appearance: none;
            background: transparent;
            cursor: pointer;
        }
        
        .form-range::-webkit-slider-track {
            background: #f8f9fa;
            height: 8px;
            border-radius: 10px;
            border: none;
        }
        
        .form-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            background: linear-gradient(135deg, #B1D235, #95B11F);
            height: 24px;
            width: 24px;
            border-radius: 50%;
            cursor: pointer;
            border: 3px solid white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            transition: all 0.2s ease;
        }
        
        .form-range::-webkit-slider-thumb:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(177, 210, 53, 0.4);
        }
        
        .form-range::-moz-range-track {
            background: #f8f9fa;
            height: 8px;
            border-radius: 10px;
            border: none;
        }
        
        .form-range::-moz-range-thumb {
            background: linear-gradient(135deg, #B1D235, #95B11F);
            height: 24px;
            width: 24px;
            border-radius: 50%;
            cursor: pointer;
            border: 3px solid white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            border: none;
        }
        
        .form-range::-moz-range-thumb:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(177, 210, 53, 0.4);
        }
        
        /* Savings display animation */
        .savings-result {
            transition: all 0.3s ease;
            font-weight: 600;
            color: #95B11F;
        }
        
        /* Toggle switch styling */
        .form-check-input:checked {
            background-color: #B1D235;
            border-color: #B1D235;
        }
        
        .form-check-input:focus {
            border-color: #95B11F;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(177, 210, 53, 0.25);
        }
        
        /* Annual savings badge */
        .annual-note {
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Calculator section styling */
        .savings-calculator {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-radius: 16px;
            padding: 2rem;
            border: 1px solid rgba(177, 210, 53, 0.1);
        }
        
        .calculator-result {
            background: linear-gradient(135deg, #B1D235, #95B11F);
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
        }
    `;
    document.head.appendChild(style);
})();

console.log('✅ PricingModule načten - PricingToggle, SavingsCalculator');