let locale = 'id';
let IDRformatter = new Intl.NumberFormat(locale, { style: 'currency', currency: 'idr', minimumFractionDigits: 2, maximumFractionDigits: 2 });
if (typeof currencyCode === "undefined") {
let USDformatter = new Intl.NumberFormat(locale, { style: 'currency', currency: currencyCode, minimumFractionDigits: 2, maximumFractionDigits: 2 });
}
let numberFormat = new Intl.NumberFormat('id', { maximumSignificantDigits: 3 });