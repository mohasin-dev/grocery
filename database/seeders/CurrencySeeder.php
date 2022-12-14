<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // $currencies = [
        //     [
        //         'code'       => 'USD',
        //         'symbol'     => '$',
        //         'created_at' => now(),
        //     ],

        //     [
        //         'code'       => 'Rs',
        //         'symbol'     => '₹',
        //         'created_at' => now(),
        //     ],

        //     [
        //         'code'       => 'BDT',
        //         'symbol'     => '৳',
        //         'created_at' => now(),
        //     ]

        // ];

        $currencies = [
            [ "country" => "Afghanistan", "currency" => "Afghani", "code" => "AFN", "symbol" => "؋" ],
            [ "country" => "Åland Islands", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Albania", "currency" => "Lek", "code" => "ALL", "symbol" => "Lek" ],
            [ "country" => "American Samoa", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Andorra", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Argentina", "currency" => "Argentine Peso", "code" => "ARS", "symbol" => "$" ],
            [ "country" => "Australia", "currency" => "Australian Dollar", "code" => "AUD", "symbol" => "$" ],
            [ "country" => "Austria", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Bahamas", "currency" => "Bahamian Dollar", "code" => "BSD", "symbol" => "$" ],
            [ "country" => "Bangladesh", "currency" => "Taka", "code" => "BDT", "symbol" => "৳" ],
            [ "country" => "Barbados", "currency" => "Barbados Dollar", "code" => "BBD", "symbol" => "$" ],
            [ "country" => "Belgium", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Belize", "currency" => "Belize Dollar", "code" => "BZD", "symbol" => "BZ$" ],
            [ "country" => "Bhutan", "currency" => "Indian Rupee", "code" => "INR", "symbol" => "₹" ],
            [ "country" => "Bonaire, Sint Eustatius And Saba", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Brazil", "currency" => "Brazilian Real", "code" => "BRL", "symbol" => "R$" ],
            [ "country" => "British Indian Ocean Territory", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Bulgaria", "currency" => "Bulgarian Lev", "code" => "BGN", "symbol" => "лв" ],
            [ "country" => "Cambodia", "currency" => "Riel", "code" => "KHR", "symbol" => "៛" ],
            [ "country" => "Canada", "currency" => "Canadian Dollar", "code" => "CAD", "symbol" => "$" ],
            [ "country" => "Chile", "currency" => "Chilean Peso", "code" => "CLP", "symbol" => "$" ],
            [ "country" => "China", "currency" => "Yuan Renminbi", "code" => "CNY", "symbol" => "¥" ],
            [ "country" => "Colombia", "currency" => "Colombian Peso", "code" => "COP", "symbol" => "$" ],
            [ "country" => "Cook Islands", "currency" => "New Zealand Dollar", "code" => "NZD", "symbol" => "$" ],
            [ "country" => "Croatia", "currency" => "Kuna", "code" => "HRK", "symbol" => "kn" ],
            [ "country" => "Cyprus", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Czechia", "currency" => "Czech Koruna", "code" => "CZK", "symbol" => "Kč" ],
            [ "country" => "Denmark", "currency" => "Danish Krone", "code" => "DKK", "symbol" => "kr" ],
            [ "country" => "Ecuador", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "El Salvador", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Estonia", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "European Union", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Finland", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "France", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "French Guiana", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "French Southern Territories", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Georgia", "currency" => "Lari", "code" => "GEL", "symbol" => "₾" ],
            [ "country" => "Germany", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Greece", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Guadeloupe", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Guam", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Guernsey", "currency" => "Pound Sterling", "code" => "GBP", "symbol" => "£" ],
            [ "country" => "Haiti", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Holy See (Vatican)", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Hong Kong", "currency" => "Hong Kong Dollar", "code" => "HKD", "symbol" => "$" ],
            [ "country" => "Hungary", "currency" => "Forint", "code" => "HUF", "symbol" => "ft" ],
            [ "country" => "India", "currency" => "Indian Rupee", "code" => "INR", "symbol" => "₹" ],
            [ "country" => "Indonesia", "currency" => "Rupiah", "code" => "IDR", "symbol" => "Rp" ],
            [ "country" => "Ireland", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Isle Of Man", "currency" => "Pound Sterling", "code" => "GBP", "symbol" => "£" ],
            [ "country" => "Israel", "currency" => "New Israeli Sheqel", "code" => "ILS", "symbol" => "₪" ],
            [ "country" => "Italy", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Japan", "currency" => "Yen", "code" => "JPY", "symbol" => "¥" ],
            [ "country" => "Jersey", "currency" => "Pound Sterling", "code" => "GBP", "symbol" => "£" ],
            [ "country" => "Kenya", "currency" => "Kenyan Shilling", "code" => "KES", "symbol" => "Ksh" ],
            [ "country" => "Korea (the Republic Of)", "currency" => "Won", "code" => "KRW", "symbol" => "₩" ],
            [ "country" => "Latvia", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Lithuania", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Luxembourg", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Malaysia", "currency" => "Malaysian Ringgit", "code" => "MYR", "symbol" => "RM" ],
            [ "country" => "Malta", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Marshall Islands", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Martinique", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Mayotte", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Mexico", "currency" => "Mexican Peso", "code" => "MXN", "symbol" => "$" ],
            [ "country" => "Micronesia", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Monaco", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Montenegro", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Morocco", "currency" => "Moroccan Dirham", "code" => "MAD", "symbol" => " .د.م " ],
            [ "country" => "Netherlands", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "New Zealand", "currency" => "New Zealand Dollar", "code" => "NZD", "symbol" => "$" ],
            [ "country" => "Nigeria", "currency" => "Naira", "code" => "NGN", "symbol" => "₦" ],
            [ "country" => "Niue", "currency" => "New Zealand Dollar", "code" => "NZD", "symbol" => "$" ],
            [ "country" => "Northern Mariana Islands", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Norway", "currency" => "Norwegian Krone", "code" => "NOK", "symbol" => "kr" ],
            [ "country" => "Pakistan", "currency" => "Pakistan Rupee", "code" => "PKR", "symbol" => "Rs" ],
            [ "country" => "Palau", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Panama", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Peru", "currency" => "Sol", "code" => "PEN", "symbol" => "S" ],
            [ "country" => "Philippines", "currency" => "Philippine Peso", "code" => "PHP", "symbol" => "₱" ],
            [ "country" => "Pitcairn", "currency" => "New Zealand Dollar", "code" => "NZD", "symbol" => "$" ],
            [ "country" => "Poland", "currency" => "Zloty", "code" => "PLN", "symbol" => "zł" ],
            [ "country" => "Portugal", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Puerto Rico", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Réunion", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Romania", "currency" => "Romanian Leu", "code" => "RON", "symbol" => "lei" ],
            [ "country" => "Russian Federation", "currency" => "Russian Ruble", "code" => "RUB", "symbol" => "₽" ],
            [ "country" => "Saint Barthélemy", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Saint Martin (French Part)", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Saint Pierre And Miquelon", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "San Marino", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Singapore", "currency" => "Singapore Dollar", "code" => "SGD", "symbol" => "$" ],
            [ "country" => "Slovakia", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Slovenia", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "South Africa", "currency" => "Rand", "code" => "ZAR", "symbol" => "R" ],
            [ "country" => "Spain", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Sri Lanka", "currency" => "Sri Lanka Rupee", "code" => "LKR", "symbol" => "Rs" ],
            [ "country" => "Sweden", "currency" => "Swedish Krona", "code" => "SEK", "symbol" => "kr" ],
            [ "country" => "Thailand", "currency" => "Baht", "code" => "THB", "symbol" => "฿" ],
            [ "country" => "Timor-leste", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Tokelau", "currency" => "New Zealand Dollar", "code" => "NZD", "symbol" => "$" ],
            [ "country" => "Turkey", "currency" => "Turkish Lira", "code" => "TRY", "symbol" => "₺" ],
            [ "country" => "Turks And Caicos Islands", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Ukraine", "currency" => "Hryvnia", "code" => "UAH", "symbol" => "₴" ],
            [ "country" => "United Arab Emirates", "currency" => "UAE Dirham", "code" => "AED", "symbol" => "د.إ" ],
            [ "country" => "United Kingdom Of Great Britain And Northern Ireland", "currency" => "Pound Sterling", "code" => "GBP", "symbol" => "£" ],
            [ "country" => "United States Minor Outlying Islands", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "United States Of America", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Vietnam", "currency" => "Dong", "code" => "VND", "symbol" => "₫" ],
            [ "country" => "Virgin Islands (British)", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Virgin Islands (U.S.)", "currency" => "US Dollar", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Albania", "currency" => "Leke", "code" => "ALL", "symbol" => "Lek" ],
            [ "country" => "America", "currency" => "Dollars", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Afghanistan", "currency" => "Afghanis", "code" => "AFN", "symbol" => "؋" ],
            [ "country" => "Argentina", "currency" => "Pesos", "code" => "ARS", "symbol" => "$" ],
            [ "country" => "Aruba", "currency" => "Guilders", "code" => "AWG", "symbol" => "ƒ" ],
            [ "country" => "Australia", "currency" => "Dollars", "code" => "AUD", "symbol" => "$" ],
            [ "country" => "Azerbaijan", "currency" => "New Manats", "code" => "AZN", "symbol" => "ман" ],
            [ "country" => "Bahamas", "currency" => "Dollars", "code" => "BSD", "symbol" => "$" ],
            [ "country" => "Barbados", "currency" => "Dollars", "code" => "BBD", "symbol" => "$" ],
            [ "country" => "Belarus", "currency" => "Rubles", "code" => "BYR", "symbol" => "p." ],
            [ "country" => "Belgium", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Beliz", "currency" => "Dollars", "code" => "BZD", "symbol" => "BZ$" ],
            [ "country" => "Bermuda", "currency" => "Dollars", "code" => "BMD", "symbol" => "$" ],
            [ "country" => "Bolivia", "currency" => "Bolivianos", "code" => "BOB", "symbol" => '$b' ],
            [ "country" => "Bosnia and Herzegovina", "currency" => "Convertible Marka", "code" => "BAM", "symbol" => "KM" ],
            [ "country" => "Botswana", "currency" => "Pula", "code" => "BWP", "symbol" => "P" ],
            [ "country" => "Bulgaria", "currency" => "Leva", "code" => "BGN", "symbol" => "лв" ],
            [ "country" => "Brazil", "currency" => "Reais", "code" => "BRL", "symbol" => "R$" ],
            [ "country" => "Britain (United Kingdom)", "currency" => "Pounds", "code" => "GBP", "symbol" => "£" ],
            [ "country" => "Brunei Darussalam", "currency" => "Dollars", "code" => "BND", "symbol" => "$" ],
            [ "country" => "Cambodia", "currency" => "Riels", "code" => "KHR", "symbol" => "៛" ],
            [ "country" => "Canada", "currency" => "Dollars", "code" => "CAD", "symbol" => "$" ],
            [ "country" => "Cayman Islands", "currency" => "Dollars", "code" => "KYD", "symbol" => "$" ],
            [ "country" => "Chile", "currency" => "Pesos", "code" => "CLP", "symbol" => "$" ],
            [ "country" => "China", "currency" => "Yuan Renminbi", "code" => "CNY", "symbol" => "¥" ],
            [ "country" => "Colombia", "currency" => "Pesos", "code" => "COP", "symbol" => "$" ],
            [ "country" => "Costa Rica", "currency" => "Colón", "code" => "CRC", "symbol" => "₡" ],
            [ "country" => "Croatia", "currency" => "Kuna", "code" => "HRK", "symbol" => "kn" ],
            [ "country" => "Cuba", "currency" => "Pesos", "code" => "CUP", "symbol" => "₱" ],
            [ "country" => "Cyprus", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Czech Republic", "currency" => "Koruny", "code" => "CZK", "symbol" => "Kč" ],
            [ "country" => "Denmark", "currency" => "Kroner", "code" => "DKK", "symbol" => "kr" ],
            [ "country" => "Dominican Republic", "currency" => "Pesos", "code" => "DOP ", "symbol" => "RD$" ],
            [ "country" => "East Caribbean", "currency" => "Dollars", "code" => "XCD", "symbol" => "$" ],
            [ "country" => "Egypt", "currency" => "Pounds", "code" => "EGP", "symbol" => "£" ],
            [ "country" => "El Salvador", "currency" => "Colones", "code" => "SVC", "symbol" => "$" ],
            [ "country" => "England (United Kingdom)", "currency" => "Pounds", "code" => "GBP", "symbol" => "£" ],
            [ "country" => "Euro", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Falkland Islands", "currency" => "Pounds", "code" => "FKP", "symbol" => "£" ],
            [ "country" => "Fiji", "currency" => "Dollars", "code" => "FJD", "symbol" => "$" ],
            [ "country" => "France", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Ghana", "currency" => "Cedis", "code" => "GHC", "symbol" => "¢" ],
            [ "country" => "Gibraltar", "currency" => "Pounds", "code" => "GIP", "symbol" => "£" ],
            [ "country" => "Greece", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Guatemala", "currency" => "Quetzales", "code" => "GTQ", "symbol" => "Q" ],
            [ "country" => "Guernsey", "currency" => "Pounds", "code" => "GGP", "symbol" => "£" ],
            [ "country" => "Guyana", "currency" => "Dollars", "code" => "GYD", "symbol" => "$" ],
            [ "country" => "Holland (Netherlands)", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Honduras", "currency" => "Lempiras", "code" => "HNL", "symbol" => "L" ],
            [ "country" => "Hong Kong", "currency" => "Dollars", "code" => "HKD", "symbol" => "$" ],
            [ "country" => "Hungary", "currency" => "Forint", "code" => "HUF", "symbol" => "Ft" ],
            [ "country" => "Iceland", "currency" => "Kronur", "code" => "ISK", "symbol" => "kr" ],
            [ "country" => "India", "currency" => "Rupees", "code" => "INR", "symbol" => "Rp" ],
            [ "country" => "Indonesia", "currency" => "Rupiahs", "code" => "IDR", "symbol" => "Rp" ],
            [ "country" => "Iran", "currency" => "Rials", "code" => "IRR", "symbol" => "﷼" ],
            [ "country" => "Ireland", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Isle of Man", "currency" => "Pounds", "code" => "IMP", "symbol" => "£" ],
            [ "country" => "Israel", "currency" => "New Shekels", "code" => "ILS", "symbol" => "₪" ],
            [ "country" => "Italy", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Jamaica", "currency" => "Dollars", "code" => "JMD", "symbol" => "J$" ],
            [ "country" => "Japan", "currency" => "Yen", "code" => "JPY", "symbol" => "¥" ],
            [ "country" => "Jersey", "currency" => "Pounds", "code" => "JEP", "symbol" => "£" ],
            [ "country" => "Kazakhstan", "currency" => "Tenge", "code" => "KZT", "symbol" => "лв" ],
            [ "country" => "Korea (North)", "currency" => "Won", "code" => "KPW", "symbol" => "₩" ],
            [ "country" => "Korea (South)", "currency" => "Won", "code" => "KRW", "symbol" => "₩" ],
            [ "country" => "Kyrgyzstan", "currency" => "Soms", "code" => "KGS", "symbol" => "лв" ],
            [ "country" => "Laos", "currency" => "Kips", "code" => "LAK", "symbol" => "₭" ],
            [ "country" => "Latvia", "currency" => "Lati", "code" => "LVL", "symbol" => "Ls" ],
            [ "country" => "Lebanon", "currency" => "Pounds", "code" => "LBP", "symbol" => "£" ],
            [ "country" => "Liberia", "currency" => "Dollars", "code" => "LRD", "symbol" => "$" ],
            [ "country" => "Liechtenstein", "currency" => "Switzerland Francs", "code" => "CHF", "symbol" => "CHF" ],
            [ "country" => "Lithuania", "currency" => "Litai", "code" => "LTL", "symbol" => "Lt" ],
            [ "country" => "Luxembourg", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Macedonia", "currency" => "Denars", "code" => "MKD", "symbol" => "ден" ],
            [ "country" => "Malaysia", "currency" => "Ringgits", "code" => "MYR", "symbol" => "RM" ],
            [ "country" => "Malta", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Mauritius", "currency" => "Rupees", "code" => "MUR", "symbol" => "₨" ],
            [ "country" => "Mexico", "currency" => "Pesos", "code" => "MXN", "symbol" => "$" ],
            [ "country" => "Mongolia", "currency" => "Tugriks", "code" => "MNT", "symbol" => "₮" ],
            [ "country" => "Mozambique", "currency" => "Meticais", "code" => "MZN", "symbol" => "MT" ],
            [ "country" => "Namibia", "currency" => "Dollars", "code" => "NAD", "symbol" => "$" ],
            [ "country" => "Nepal", "currency" => "Rupees", "code" => "NPR", "symbol" => "₨" ],
            [ "country" => "Netherlands Antilles", "currency" => "Guilders", "code" => "ANG", "symbol" => "ƒ" ],
            [ "country" => "Netherlands", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "New Zealand", "currency" => "Dollars", "code" => "NZD", "symbol" => "$" ],
            [ "country" => "Nicaragua", "currency" => "Cordobas", "code" => "NIO", "symbol" => "C$" ],
            [ "country" => "Nigeria", "currency" => "Nairas", "code" => "NGN", "symbol" => "₦" ],
            [ "country" => "North Korea", "currency" => "Won", "code" => "KPW", "symbol" => "₩" ],
            [ "country" => "Norway", "currency" => "Krone", "code" => "NOK", "symbol" => "kr" ],
            [ "country" => "Oman", "currency" => "Rials", "code" => "OMR", "symbol" => "﷼" ],
            [ "country" => "Pakistan", "currency" => "Rupees", "code" => "PKR", "symbol" => "₨" ],
            [ "country" => "Panama", "currency" => "Balboa", "code" => "PAB", "symbol" => "B/." ],
            [ "country" => "Paraguay", "currency" => "Guarani", "code" => "PYG", "symbol" => "Gs" ],
            [ "country" => "Peru", "currency" => "Nuevos Soles", "code" => "PEN", "symbol" => "S/." ],
            [ "country" => "Philippines", "currency" => "Pesos", "code" => "PHP", "symbol" => "Php" ],
            [ "country" => "Poland", "currency" => "Zlotych", "code" => "PLN", "symbol" => "zł" ],
            [ "country" => "Qatar", "currency" => "Rials", "code" => "QAR", "symbol" => "﷼" ],
            [ "country" => "Romania", "currency" => "New Lei", "code" => "RON", "symbol" => "lei" ],
            [ "country" => "Russia", "currency" => "Rubles", "code" => "RUB", "symbol" => "руб" ],
            [ "country" => "Saint Helena", "currency" => "Pounds", "code" => "SHP", "symbol" => "£" ],
            [ "country" => "Saudi Arabia", "currency" => "Riyals", "code" => "SAR", "symbol" => "﷼" ],
            [ "country" => "Serbia", "currency" => "Dinars", "code" => "RSD", "symbol" => "Дин." ],
            [ "country" => "Seychelles", "currency" => "Rupees", "code" => "SCR", "symbol" => "₨" ],
            [ "country" => "Singapore", "currency" => "Dollars", "code" => "SGD", "symbol" => "$" ],
            [ "country" => "Slovenia", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Solomon Islands", "currency" => "Dollars", "code" => "SBD", "symbol" => "$" ],
            [ "country" => "Somalia", "currency" => "Shillings", "code" => "SOS", "symbol" => "S" ],
            [ "country" => "South Africa", "currency" => "Rand", "code" => "ZAR", "symbol" => "R" ],
            [ "country" => "South Korea", "currency" => "Won", "code" => "KRW", "symbol" => "₩" ],
            [ "country" => "Spain", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Sri Lanka", "currency" => "Rupees", "code" => "LKR", "symbol" => "₨" ],
            [ "country" => "Sweden", "currency" => "Kronor", "code" => "SEK", "symbol" => "kr" ],
            [ "country" => "Switzerland", "currency" => "Francs", "code" => "CHF", "symbol" => "CHF" ],
            [ "country" => "Suriname", "currency" => "Dollars", "code" => "SRD", "symbol" => "$" ],
            [ "country" => "Syria", "currency" => "Pounds", "code" => "SYP", "symbol" => "£" ],
            [ "country" => "Taiwan", "currency" => "New Dollars", "code" => "TWD", "symbol" => "NT$" ],
            [ "country" => "Thailand", "currency" => "Baht", "code" => "THB", "symbol" => "฿" ],
            [ "country" => "Trinidad and Tobago", "currency" => "Dollars", "code" => "TTD", "symbol" => "TT$" ],
            [ "country" => "Turkey", "currency" => "Lira", "code" => "TRY", "symbol" => "TL" ],
            [ "country" => "Turkey", "currency" => "Liras", "code" => "TRL", "symbol" => "£" ],
            [ "country" => "Tuvalu", "currency" => "Dollars", "code" => "TVD", "symbol" => "$" ],
            [ "country" => "Ukraine", "currency" => "Hryvnia", "code" => "UAH", "symbol" => "₴" ],
            [ "country" => "United Kingdom", "currency" => "Pounds", "code" => "GBP", "symbol" => "£" ],
            [ "country" => "United States of America", "currency" => "Dollars", "code" => "USD", "symbol" => "$" ],
            [ "country" => "Uruguay", "currency" => "Pesos", "code" => "UYU", "symbol" => '$U' ],
            [ "country" => "Uzbekistan", "currency" => "Sums", "code" => "UZS", "symbol" => "лв" ],
            [ "country" => "Vatican City", "currency" => "Euro", "code" => "EUR", "symbol" => "€" ],
            [ "country" => "Venezuela", "currency" => "Bolivares Fuertes", "code" => "VEF", "symbol" => "Bs" ],
            [ "country" => "Vietnam", "currency" => "Dong", "code" => "VND", "symbol" => "₫" ],
            [ "country" => "Yemen", "currency" => "Rials", "code" => "YER", "symbol" => "﷼" ],
            [ "country" => "Zimbabwe", "currency" => "Zimbabwe Dollars", "code" => "ZWD", "symbol" => "Z$" ],
            [ "country" => "India", "currency" => "Rupees", "code" => "INR", "symbol" => "₹" ],
        ];

        DB::table( 'currencies' )->insert( $currencies );
    }
}
