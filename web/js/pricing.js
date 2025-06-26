/**
 * QRdoklad Pricing Module
 * Obsahuje: Pricing Toggle, Savings Calculator s pokročilými ROI výpočty
 * 
 * Barvy projektu:
 * - Primární: #B1D235
 * - Sekundární: #95B11F  
 * - Šedá: #6c757d
 * - Černá: #212529
 */

/*
==================================
PRICING TOGGLE MODULE
==================================
*/
const PricingToggle = {
    toggle: null,
    monthlyPrices: null,
    annualPrices: null,
    annualNotes: null,
    
    init() {
        console.log('PricingToggle - hledám toggle...');
        
        this.toggle = document.getElementById('priceToggle');
        if (!this.toggle) {
            console.log('PricingToggle - toggle nenalezen na této stránce');
            return;
        }
        
        console.log('PricingToggle - toggle nalezen, inicializuji...');
        
        this.monthlyPrices = document.querySelectorAll('.monthly-price');
        this.annualPrices = document.querySelectorAll('.annual-price');
        this.annualNotes = document.querySelectorAll('.annual-note');
        
        console.log(`PricingToggle - nalezeno: ${this.monthlyPrices.length} měsíčních cen, ${this.annualPrices.length} ročních cen`);
        
        this.toggle.addEventListener('change', () => {
            console.log('PricingToggle - změna na:', this.toggle.checked ? 'roční' : 'měsíční');
            this.togglePrices();
            this.trackToggle();
        });
        
        // Inicializace podle aktuálního stavu
        this.togglePrices();
        
        console.log('PricingToggle - inicializace dokončena');
    },

    togglePrices() {
        const isAnnual = this.toggle.checked;
        
        // Animace při přepnutí
        document.querySelectorAll('.pricing-card').forEach(card => {
            card.style.transform = 'scale(0.95)';
            card.style.opacity = '0.7';
        });
        
        setTimeout(() => {
            // Přepneme viditelnost cen
            this.monthlyPrices.forEach(price => {
                price.style.display = isAnnual ? 'none' : 'inline';
            });
            
            this.annualPrices.forEach(price => {
                price.style.display = isAnnual ? 'inline' : 'none';
            });
            
            // Zobrazíme/skryjeme poznámky o roční slevě
            this.annualNotes.forEach(note => {
                note.style.display = isAnnual ? 'block' : 'none';
            });
            
            // Vratime animaci
            document.querySelectorAll('.pricing-card').forEach(card => {
                card.style.transform = 'scale(1)';
                card.style.opacity = '1';
            });
        }, 150);
    },

    trackToggle() {
        // Tracking pouze pokud Analytics existuje
        if (typeof Analytics !== 'undefined') {
            Analytics.trackPricingInteraction(
                this.toggle.checked ? 'annual_view' : 'monthly_view'
            );
        } else {
            console.log('📊 Pricing Toggle:', this.toggle.checked ? 'roční' : 'měsíční');
        }
    }
};

/*
==================================
SAVINGS CALCULATOR MODULE s ROI
==================================
*/
const SavingsCalculator = {
    sliders: {},
    valueDisplays: {},
    resultElements: {},
    hasInteracted: false,
    
    init() {
        console.log('SavingsCalculator - hledám kalkulačku...');
        
        // Hledáme hlavní slider kalkulačky
        this.sliders.invoiceCount = document.getElementById('invoiceCount');
        if (!this.sliders.invoiceCount) {
            console.log('SavingsCalculator - kalkulačka nenalezena na této stránce');
            return;
        }
        
        console.log('SavingsCalculator - kalkulačka nalezena, inicializuji...');
        this.initElements();
        this.bindEvents();
        this.updateCalculator();
        this.addCalculatorStyles();
        
        console.log('SavingsCalculator - inicializace dokončena');
    },

    initElements() {
        // Všechny slidery
        this.sliders.timePerInvoice = document.getElementById('timePerInvoice');
        this.sliders.hourlyRate = document.getElementById('hourlyRate');
        
        // Zobrazovače hodnot
        this.valueDisplays.invoiceCount = document.getElementById('invoiceCountValue');
        this.valueDisplays.timePerInvoice = document.getElementById('timePerInvoiceValue');
        this.valueDisplays.hourlyRate = document.getElementById('hourlyRateValue');
        
        // Výsledkové elementy - rozšířené o ROI
        this.resultElements.timeSaved = document.getElementById('timeSaved');
        this.resultElements.moneySaved = document.getElementById('moneySaved');
        this.resultElements.yearlySavings = document.getElementById('yearlySavings');
        this.resultElements.roiTime = document.getElementById('roiTime');
        this.resultElements.roiPercentage = document.getElementById('roiPercentage');
        this.resultElements.paybackPeriod = document.getElementById('paybackPeriod');
        this.resultElements.breakEvenPoint = document.getElementById('breakEvenPoint');
        
        console.log('SavingsCalculator - elementy:', {
            sliders: Object.keys(this.sliders).filter(key => this.sliders[key]),
            displays: Object.keys(this.valueDisplays).filter(key => this.valueDisplays[key]),
            results: Object.keys(this.resultElements).filter(key => this.resultElements[key])
        });
    },

    bindEvents() {
        Object.values(this.sliders).forEach(slider => {
            if (slider) {
                slider.addEventListener('input', () => {
                    if (!this.hasInteracted) {
                        this.trackCalculatorUse();
                        this.hasInteracted = true;
                    }
                    
                    this.updateCalculator();
                });
            }
        });
    },

    updateCalculator() {
        const values = this.getSliderValues();
        this.updateDisplayedValues(values);
        const calculations = this.performAdvancedCalculations(values);
        this.updateResults(calculations);
        this.animateResults();
    },

    getSliderValues() {
        return {
            invoiceCount: parseInt(this.sliders.invoiceCount.value),
            timePerInvoice: this.sliders.timePerInvoice ? parseInt(this.sliders.timePerInvoice.value) : 15,
            hourlyRate: this.sliders.hourlyRate ? parseInt(this.sliders.hourlyRate.value) : 800
        };
    },

    updateDisplayedValues(values) {
        if (this.valueDisplays.invoiceCount) {
            this.valueDisplays.invoiceCount.textContent = values.invoiceCount;
        }
        if (this.valueDisplays.timePerInvoice) {
            this.valueDisplays.timePerInvoice.textContent = values.timePerInvoice;
        }
        if (this.valueDisplays.hourlyRate) {
            this.valueDisplays.hourlyRate.textContent = values.hourlyRate.toLocaleString('cs-CZ') + ' Kč';
        }
    },

    performAdvancedCalculations(values) {
        // Základní kalkulace
        const currentTimePerMonth = values.invoiceCount * values.timePerInvoice;
        const qrdokladTimePerInvoice = 2; // QRdoklad ušetří na 2 minuty
        const newTimePerMonth = values.invoiceCount * qrdokladTimePerInvoice;
        const timeSavedMinutes = currentTimePerMonth - newTimePerMonth;
        const timeSavedHours = Math.round(timeSavedMinutes / 60 * 10) / 10;
        
        // Finanční kalkulace
        const moneySavedPerMonth = (timeSavedMinutes / 60) * values.hourlyRate;
        const monthlySubscription = 599; // Cena QRdoklad
        const netSavingsPerMonth = moneySavedPerMonth - monthlySubscription;
        const yearlySavings = netSavingsPerMonth * 12;
        
        // POKROČILÉ ROI VÝPOČTY
        const initialInvestment = monthlySubscription; // První platba
        const monthlyROI = (netSavingsPerMonth / monthlySubscription) * 100;
        const yearlyROI = (yearlySavings / (monthlySubscription * 12)) * 100;
        
        // Payback period (doba návratnosti)
        const paybackDays = Math.ceil(monthlySubscription / (moneySavedPerMonth / 30));
        const paybackWeeks = Math.ceil(paybackDays / 7);
        const paybackMonths = Math.ceil(paybackDays / 30);
        
        // Break-even point
        const dailySavings = moneySavedPerMonth / 30;
        const dailyCost = monthlySubscription / 30;
        const breakEvenDays = Math.ceil(monthlySubscription / dailySavings);
        
        // Kumulativní úspory po roce
        const cumulativeYearlySavings = (moneySavedPerMonth * 12) - (monthlySubscription * 12);
        
        return {
            // Základní metriky
            timeSavedHours,
            netSavingsPerMonth,
            yearlySavings,
            moneySavedPerMonth,
            
            // ROI metriky
            monthlyROI,
            yearlyROI,
            paybackDays,
            paybackWeeks,
            paybackMonths,
            breakEvenDays,
            cumulativeYearlySavings,
            
            // Pro debug
            currentTimePerMonth,
            newTimePerMonth,
            timeSavedMinutes,
            monthlySubscription
        };
    },

    updateResults(calculations) {
        // Základní výsledky
        if (this.resultElements.timeSaved) {
            this.resultElements.timeSaved.textContent = calculations.timeSavedHours + ' hodin';
        }
        
        if (this.resultElements.moneySaved) {
            this.resultElements.moneySaved.textContent = Math.round(calculations.netSavingsPerMonth).toLocaleString('cs-CZ') + ' Kč';
        }
        
        if (this.resultElements.yearlySavings) {
            this.resultElements.yearlySavings.textContent = Math.round(calculations.yearlySavings).toLocaleString('cs-CZ') + ' Kč';
        }
        
        // ROI ELEMENTY - nové!
        if (this.resultElements.roiTime) {
            this.updateROITime(calculations);
        }
        
        if (this.resultElements.roiPercentage) {
            this.resultElements.roiPercentage.textContent = Math.round(calculations.yearlyROI) + '%';
        }
        
        if (this.resultElements.paybackPeriod) {
            this.updatePaybackPeriod(calculations);
        }
        
        if (this.resultElements.breakEvenPoint) {
            this.resultElements.breakEvenPoint.textContent = calculations.breakEvenDays + ' dní';
        }
    },

    updateROITime(calculations) {
        if (calculations.paybackDays <= 7) {
            this.resultElements.roiTime.textContent = calculations.paybackDays + ' dní';
            this.resultElements.roiTime.className = 'roi-excellent';
        } else if (calculations.paybackDays <= 30) {
            this.resultElements.roiTime.textContent = calculations.paybackWeeks + ' týdny';
            this.resultElements.roiTime.className = 'roi-good';
        } else if (calculations.paybackDays <= 90) {
            this.resultElements.roiTime.textContent = calculations.paybackMonths + ' měsíce';
            this.resultElements.roiTime.className = 'roi-ok';
        } else {
            this.resultElements.roiTime.textContent = calculations.paybackMonths + ' měsíců';
            this.resultElements.roiTime.className = 'roi-slow';
        }
    },

    updatePaybackPeriod(calculations) {
        let text = '';
        let className = '';
        
        if (calculations.paybackDays <= 14) {
            text = `${calculations.paybackDays} dní - Výborné!`;
            className = 'payback-excellent';
        } else if (calculations.paybackDays <= 60) {
            text = `${calculations.paybackWeeks} týdnů - Velmi dobré`;
            className = 'payback-good';
        } else {
            text = `${calculations.paybackMonths} měsíců - Přijatelné`;
            className = 'payback-ok';
        }
        
        this.resultElements.paybackPeriod.textContent = text;
        this.resultElements.paybackPeriod.className = className;
    },

    animateResults() {
        // Animace při změně hodnot - použijeme zelenou barvu
        document.querySelectorAll('.savings-value, .roi-value').forEach(element => {
            element.style.transform = 'scale(1.05)';
            element.style.color = '#B1D235';
            
            setTimeout(() => {
                element.style.transform = 'scale(1)';
                element.style.color = '';
            }, 200);
        });
    },

    addCalculatorStyles() {
        const style = document.createElement('style');
        style.textContent = `
            /* ROI indikátory */
            .roi-excellent {
                color: #B1D235 !important;
                font-weight: 700;
                text-shadow: 0 1px 3px rgba(177, 210, 53, 0.3);
            }
            
            .roi-good {
                color: #95B11F !important;
                font-weight: 600;
            }
            
            .roi-ok {
                color: #6c757d !important;
                font-weight: 500;
            }
            
            .roi-slow {
                color: #ffc107 !important;
                font-weight: 500;
            }
            
            /* Payback period indikátory */
            .payback-excellent {
                color: #B1D235 !important;
                font-weight: 700;
                background: linear-gradient(135deg, rgba(177, 210, 53, 0.1), rgba(149, 177, 31, 0.1));
                padding: 4px 8px;
                border-radius: 6px;
                border-left: 3px solid #B1D235;
            }
            
            .payback-good {
                color: #95B11F !important;
                font-weight: 600;
                background: rgba(149, 177, 31, 0.1);
                padding: 4px 8px;
                border-radius: 6px;
                border-left: 3px solid #95B11F;
            }
            
            .payback-ok {
                color: #6c757d !important;
                font-weight: 500;
                background: rgba(108, 117, 125, 0.1);
                padding: 4px 8px;
                border-radius: 6px;
                border-left: 3px solid #6c757d;
            }
            
            /* Savings animace */
            .savings-value, .roi-value {
                transition: all 0.3s ease;
                font-weight: 600;
            }
            
            /* Range slider vylepšení */
            .form-range::-webkit-slider-thumb {
                background: linear-gradient(135deg, #B1D235, #95B11F) !important;
                border: 3px solid white !important;
                box-shadow: 0 2px 8px rgba(177, 210, 53, 0.3) !important;
                height: 24px !important;
                width: 24px !important;
                transition: all 0.2s ease !important;
            }
            
            .form-range::-webkit-slider-thumb:hover {
                transform: scale(1.1) !important;
                box-shadow: 0 4px 12px rgba(177, 210, 53, 0.5) !important;
            }
            
            .form-range::-moz-range-thumb {
                background: linear-gradient(135deg, #B1D235, #95B11F) !important;
                border: 3px solid white !important;
                box-shadow: 0 2px 8px rgba(177, 210, 53, 0.3) !important;
                height: 24px !important;
                width: 24px !important;
            }
            
            /* Calculator container styling */
            .savings-calculator {
                background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
                border: 1px solid rgba(177, 210, 53, 0.2);
                border-radius: 16px;
                padding: 1.5rem;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }
            
            .calculator-result {
                background: linear-gradient(135deg, #B1D235, #95B11F);
                color: white;
                padding: 1.5rem;
                border-radius: 12px;
                text-align: center;
                margin-top: 1rem;
            }
            
            /* ROI badge styling */
            .roi-badge {
                display: inline-block;
                padding: 0.25rem 0.75rem;
                border-radius: 50px;
                font-size: 0.875rem;
                font-weight: 600;
                margin-left: 0.5rem;
            }
            
            .roi-badge.excellent {
                background: linear-gradient(135deg, #B1D235, #95B11F);
                color: #212529;
            }
            
            .roi-badge.good {
                background: #95B11F;
                color: white;
            }
        `;
        document.head.appendChild(style);
    },

    trackCalculatorUse() {
        // Tracking pouze pokud Analytics existuje
        if (typeof Analytics !== 'undefined') {
            Analytics.trackCalculatorUse();
        } else {
            console.log('📊 Calculator použit');
        }
    }
};

/*
==================================
PRICING MODULE MAIN
==================================
*/
const PricingModule = {
    init() {
        console.log('PricingModule - Inicializace začíná');
        
        // Inicializace pricing toggle
        PricingToggle.init();
        
        // Inicializace savings calculator
        SavingsCalculator.init();
        
        console.log('PricingModule - Inicializace dokončena');
    }
};

// Export pro možné použití v jiných souborech
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { PricingModule, PricingToggle, SavingsCalculator };
}