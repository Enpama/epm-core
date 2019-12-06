<?php
declare(strict_types = 1);
namespace epm\lib;

class Str
{

    /**
     * The cache of snake-cased words.
     *
     * @var array
     */
    protected static $snakeCache = [];

    /**
     * The cache of camel-cased words.
     *
     * @var array
     */
    protected static $camelCache = [];

    /**
     * The cache of studly-cased words.
     *
     * @var array
     */
    protected static $studlyCache = [];

    /**
     * Return the remainder of a string after the first occurrence of a given value.
     *
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function after(string $subject, string $search): string
    {
        return $search === '' ? $subject : \array_reverse(\explode($search, $subject, 2))[0];
    }

    /**
     * Return the remainder of a string after the last occurrence of a given value.
     *
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function afterLast(string $subject, string $search): string
    {
        return $search === '' ? $subject : \array_reverse(\explode($search, $subject))[0];
    }

    /**
     * Transliterate a UTF-8 value to ASCII.
     *
     * @param string $value
     * @param string $language
     * @return string
     */
    public static function ascii(string $value, string $language = 'en'): string
    {
        $languageSpecific = static::languageSpecificCharsArray($language);

        if (! is_null($languageSpecific)) {
            $value = \str_replace($languageSpecific[0], $languageSpecific[1], $value);
        }

        foreach (static::charsArray() as $key => $val) {
            $value = \str_replace($val, $key, $value);
        }

        return \preg_replace('/[^\x20-\x7E]/u', '', $value);
    }

    /**
     * Get the portion of a string before the first occurrence of a given value.
     *
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function before(string $subject, string $search): string
    {
        return $search === '' ? $subject : \explode($search, $subject)[0];
    }

    /**
     * Get the portion of a string before the last occurrence of a given value.
     *
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function beforeLast(string $subject, string $search): string
    {
        if ($search === '') {
            return $subject;
        }

        $pos = \mb_strrpos($subject, $search);

        if ($pos === false) {
            return $subject;
        }

        return static::substr($subject, 0, $pos);
    }

    /**
     * Convert a value to camel case.
     *
     * @param string $value
     * @return string
     */
    public static function camel(string $value): string
    {
        if (isset(static::$camelCache[$value])) {
            return static::$camelCache[$value];
        }

        return static::$camelCache[$value] = \lcfirst(static::studly($value));
    }

    /**
     * Determine if a given string contains a given substring.
     *
     * @param string $haystack
     * @param string|array $needles
     * @return bool
     */
    public static function contains(string $haystack, string $needles): string
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && \mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string contains all array values.
     *
     * @param string $haystack
     * @param array $needles
     * @return bool
     */
    public static function containsAll(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if (! static::contains($haystack, $needle)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * @param string $haystack
     * @param string|array $needles
     * @return bool
     */
    public static function endsWith(string $haystack, $needles): bool
    {
        foreach ((array) $needles as $needle) {
            if (\substr($haystack, - \strlen($needle)) === (string) $needle) {
                return true;
            }
        }

        return false;
    }

    /**
     * Cap a string with a single instance of a given value.
     *
     * @param string $value
     * @param string $cap
     * @return string
     */
    public static function finish(string $value, string $cap): string
    {
        $quoted = \preg_quote($cap, '/');

        return \preg_replace('/(?:' . $quoted . ')+$/u', '', $value) . $cap;
    }

    /**
     * Convert a string to kebab case.
     *
     * @param string $value
     * @return string
     */
    public static function kebab(string $value): string
    {
        return static::snake($value, '-');
    }

    /**
     * Return the length of the given string.
     *
     * @param string $value
     * @param string $encoding
     * @return int
     */
    public static function length(string $value, string $encoding = null): int
    {
        if ($encoding) {
            return \mb_strlen($value, $encoding);
        }

        return \mb_strlen($value);
    }

    /**
     * Limit the number of characters in a string.
     *
     * @param string $value
     * @param int $limit
     * @param string $end
     * @return string
     */
    public static function limit(string $value, int $limit = 100, string $end = '...'): string
    {
        if (\mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }

        return \rtrim(\mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end;
    }

    /**
     * Convert the given string to lower-case.
     *
     * @param string $value
     * @return string
     */
    public static function lower(string $value): string
    {
        return \mb_strtolower($value, 'UTF-8');
    }

    /**
     * Limit the number of words in a string.
     *
     * @param string $value
     * @param int $words
     * @param string $end
     * @return string
     */
    public static function words(string $value, int $words = 100, string $end = '...'): string
    {
        $matches = array();
        \preg_match('/^\s*+(?:\S++\s*+){1,' . $words . '}/u', $value, $matches);

        if (! isset($matches[0]) || static::length($value) === static::length($matches[0])) {
            return $value;
        }

        return \rtrim($matches[0]) . $end;
    }

    /**
     * Parse a Class@method style callback into class and method.
     *
     * @param string $callback
     * @param string|null $default
     * @return array
     */
    public static function parseCallback(string $callback, ?string $default = null): array
    {
        return static::contains($callback, '@') ? \explode('@', $callback, 2) : [
            $callback,
            $default
        ];
    }

    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param int $length
     * @return string
     */
    public static function random(int $length = 16): string
    {
        $string = '';

        while (($len = \strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = \random_bytes($size);

            $string .= \substr(\str_replace([
                '/',
                '+',
                '='
            ], '', \base64_encode($bytes)), 0, $size);
        }

        return $string;
    }

    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param string $search
     * @param array $replace
     * @param string $subject
     * @return string
     */
    public static function replaceArray(string $search, array $replace, string $subject): string
    {
        $segments = \explode($search, $subject);

        $result = \array_shift($segments);

        foreach ($segments as $segment) {
            $result .= (\array_shift($replace) ?? $search) . $segment;
        }

        return $result;
    }

    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param string $search
     * @param string $replace
     * @param string $subject
     * @return string
     */
    public static function replaceFirst(string $search, string $replace, string $subject): string
    {
        if ($search == '') {
            return $subject;
        }

        $position = \strpos($subject, $search);

        if ($position !== false) {
            return \substr_replace($subject, $replace, $position, strlen($search));
        }

        return $subject;
    }

    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param string $search
     * @param string $replace
     * @param string $subject
     * @return string
     */
    public static function replaceLast(string $search, string $replace, string $subject): string
    {
        $position = \strrpos($subject, $search);

        if ($position !== false) {
            return \substr_replace($subject, $replace, $position, strlen($search));
        }

        return $subject;
    }

    /**
     * Begin a string with a single instance of a given value.
     *
     * @param string $value
     * @param string $prefix
     * @return string
     */
    public static function start(string $value, string $prefix): string
    {
        $quoted = \preg_quote($prefix, '/');

        return $prefix . \preg_replace('/^(?:' . $quoted . ')+/u', '', $value);
    }

    /**
     * Convert the given string to upper-case.
     *
     * @param string $value
     * @return string
     */
    public static function upper(string $value): string
    {
        return \mb_strtoupper($value, 'UTF-8');
    }

    /**
     * Convert the given string to title case.
     *
     * @param string $value
     * @return string
     */
    public static function title(string $value): string
    {
        return \mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }

    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param string $title
     * @param string $separator
     * @param string|null $language
     * @return string
     */
    public static function slug(string $title, string $separator = '-', ?string $language = 'en'): string
    {
        $title = $language ? static::ascii($title, $language) : $title;

        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';

        $title = \preg_replace('![' . \preg_quote($flip) . ']+!u', $separator, $title);

        // Replace @ with the word 'at'
        $title = \str_replace('@', $separator . 'at' . $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = \preg_replace('![^' . \preg_quote($separator) . '\pL\pN\s]+!u', '', static::lower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = \preg_replace('![' . \preg_quote($separator) . '\s]+!u', $separator, $title);

        return \trim($title, $separator);
    }

    /**
     * Convert a string to snake case.
     *
     * @param string $value
     * @param string $delimiter
     * @return string
     */
    public static function snake(string $value, string $delimiter = '_'): string
    {
        $key = $value;

        if (isset(static::$snakeCache[$key][$delimiter])) {
            return static::$snakeCache[$key][$delimiter];
        }

        if (! \ctype_lower($value)) {
            $value = \preg_replace('/\s+/u', '', \ucwords($value));

            $value = static::lower(\preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value));
        }

        return static::$snakeCache[$key][$delimiter] = $value;
    }

    /**
     * Determine if a given string starts with a given substring.
     *
     * @param string $haystack
     * @param string|array $needles
     * @return bool
     */
    public static function startsWith(string $haystack, $needles): bool
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && \substr($haystack, 0, \strlen($needle)) === (string) $needle) {
                return true;
            }
        }

        return false;
    }

    /**
     * Convert a value to studly caps case.
     *
     * @param string $value
     * @return string
     */
    public static function studly(string $value): string
    {
        $key = $value;

        if (isset(static::$studlyCache[$key])) {
            return static::$studlyCache[$key];
        }

        $value = \ucwords(\str_replace([
            '-',
            '_'
        ], ' ', $value));

        return static::$studlyCache[$key] = \str_replace(' ', '', $value);
    }

    /**
     * Returns the portion of string specified by the start and length parameters.
     *
     * @param string $string
     * @param int $start
     * @param int|null $length
     * @return string
     */
    public static function substr(string $string, int $start, ?int $length = null): string
    {
        return \mb_substr($string, $start, $length, 'UTF-8');
    }

    /**
     * Make a string's first character uppercase.
     *
     * @param string $string
     * @return string
     */
    public static function ucfirst(string $string): string
    {
        return static::upper(static::substr($string, 0, 1)) . static::substr($string, 1);
    }

    /**
     * Returns the replacements for the ascii method.
     *
     * Note: Adapted from Stringy\Stringy.
     *
     * @see https://github.com/danielstjules/Stringy/blob/3.1.0/LICENSE.txt
     *
     * @return array
     */
    protected static function charsArray(): array
    {
        static $charsArray;

        if (isset($charsArray)) {
            return $charsArray;
        }

        return $charsArray = [
            '0' => [
                '°',
                '₀',
                '۰',
                '０'
            ],
            '1' => [
                '¹',
                '₁',
                '۱',
                '１'
            ],
            '2' => [
                '²',
                '₂',
                '۲',
                '２'
            ],
            '3' => [
                '³',
                '₃',
                '۳',
                '３'
            ],
            '4' => [
                '⁴',
                '₄',
                '۴',
                '٤',
                '４'
            ],
            '5' => [
                '⁵',
                '₅',
                '۵',
                '٥',
                '５'
            ],
            '6' => [
                '⁶',
                '₆',
                '۶',
                '٦',
                '６'
            ],
            '7' => [
                '⁷',
                '₇',
                '۷',
                '７'
            ],
            '8' => [
                '⁸',
                '₈',
                '۸',
                '８'
            ],
            '9' => [
                '⁹',
                '₉',
                '۹',
                '９'
            ],
            'a' => [
                'à',
                'á',
                'ả',
                'ã',
                'ạ',
                'ă',
                'ắ',
                'ằ',
                'ẳ',
                'ẵ',
                'ặ',
                'â',
                'ấ',
                'ầ',
                'ẩ',
                'ẫ',
                'ậ',
                'ā',
                'ą',
                'å',
                'α',
                'ά',
                'ἀ',
                'ἁ',
                'ἂ',
                'ἃ',
                'ἄ',
                'ἅ',
                'ἆ',
                'ἇ',
                'ᾀ',
                'ᾁ',
                'ᾂ',
                'ᾃ',
                'ᾄ',
                'ᾅ',
                'ᾆ',
                'ᾇ',
                'ὰ',
                'ά',
                'ᾰ',
                'ᾱ',
                'ᾲ',
                'ᾳ',
                'ᾴ',
                'ᾶ',
                'ᾷ',
                'а',
                'أ',
                'အ',
                'ာ',
                'ါ',
                'ǻ',
                'ǎ',
                'ª',
                'ა',
                'अ',
                'ا',
                'ａ',
                'ä',
                'א'
            ],
            'b' => [
                'б',
                'β',
                'ب',
                'ဗ',
                'ბ',
                'ｂ',
                'ב'
            ],
            'c' => [
                'ç',
                'ć',
                'č',
                'ĉ',
                'ċ',
                'ｃ'
            ],
            'd' => [
                'ď',
                'ð',
                'đ',
                'ƌ',
                'ȡ',
                'ɖ',
                'ɗ',
                'ᵭ',
                'ᶁ',
                'ᶑ',
                'д',
                'δ',
                'د',
                'ض',
                'ဍ',
                'ဒ',
                'დ',
                'ｄ',
                'ד'
            ],
            'e' => [
                'é',
                'è',
                'ẻ',
                'ẽ',
                'ẹ',
                'ê',
                'ế',
                'ề',
                'ể',
                'ễ',
                'ệ',
                'ë',
                'ē',
                'ę',
                'ě',
                'ĕ',
                'ė',
                'ε',
                'έ',
                'ἐ',
                'ἑ',
                'ἒ',
                'ἓ',
                'ἔ',
                'ἕ',
                'ὲ',
                'έ',
                'е',
                'ё',
                'э',
                'є',
                'ə',
                'ဧ',
                'ေ',
                'ဲ',
                'ე',
                'ए',
                'إ',
                'ئ',
                'ｅ'
            ],
            'f' => [
                'ф',
                'φ',
                'ف',
                'ƒ',
                'ფ',
                'ｆ',
                'פ',
                'ף'
            ],
            'g' => [
                'ĝ',
                'ğ',
                'ġ',
                'ģ',
                'г',
                'ґ',
                'γ',
                'ဂ',
                'გ',
                'گ',
                'ｇ',
                'ג'
            ],
            'h' => [
                'ĥ',
                'ħ',
                'η',
                'ή',
                'ح',
                'ه',
                'ဟ',
                'ှ',
                'ჰ',
                'ｈ',
                'ה'
            ],
            'i' => [
                'í',
                'ì',
                'ỉ',
                'ĩ',
                'ị',
                'î',
                'ï',
                'ī',
                'ĭ',
                'į',
                'ı',
                'ι',
                'ί',
                'ϊ',
                'ΐ',
                'ἰ',
                'ἱ',
                'ἲ',
                'ἳ',
                'ἴ',
                'ἵ',
                'ἶ',
                'ἷ',
                'ὶ',
                'ί',
                'ῐ',
                'ῑ',
                'ῒ',
                'ΐ',
                'ῖ',
                'ῗ',
                'і',
                'ї',
                'и',
                'ဣ',
                'ိ',
                'ီ',
                'ည်',
                'ǐ',
                'ი',
                'इ',
                'ی',
                'ｉ',
                'י'
            ],
            'j' => [
                'ĵ',
                'ј',
                'Ј',
                'ჯ',
                'ج',
                'ｊ'
            ],
            'k' => [
                'ķ',
                'ĸ',
                'к',
                'κ',
                'Ķ',
                'ق',
                'ك',
                'က',
                'კ',
                'ქ',
                'ک',
                'ｋ',
                'ק'
            ],
            'l' => [
                'ł',
                'ľ',
                'ĺ',
                'ļ',
                'ŀ',
                'л',
                'λ',
                'ل',
                'လ',
                'ლ',
                'ｌ',
                'ל'
            ],
            'm' => [
                'м',
                'μ',
                'م',
                'မ',
                'მ',
                'ｍ',
                'מ',
                'ם'
            ],
            'n' => [
                'ñ',
                'ń',
                'ň',
                'ņ',
                'ŉ',
                'ŋ',
                'ν',
                'н',
                'ن',
                'န',
                'ნ',
                'ｎ',
                'נ'
            ],
            'o' => [
                'ó',
                'ò',
                'ỏ',
                'õ',
                'ọ',
                'ô',
                'ố',
                'ồ',
                'ổ',
                'ỗ',
                'ộ',
                'ơ',
                'ớ',
                'ờ',
                'ở',
                'ỡ',
                'ợ',
                'ø',
                'ō',
                'ő',
                'ŏ',
                'ο',
                'ὀ',
                'ὁ',
                'ὂ',
                'ὃ',
                'ὄ',
                'ὅ',
                'ὸ',
                'ό',
                'о',
                'و',
                'ို',
                'ǒ',
                'ǿ',
                'º',
                'ო',
                'ओ',
                'ｏ',
                'ö'
            ],
            'p' => [
                'п',
                'π',
                'ပ',
                'პ',
                'پ',
                'ｐ',
                'פ',
                'ף'
            ],
            'q' => [
                'ყ',
                'ｑ'
            ],
            'r' => [
                'ŕ',
                'ř',
                'ŗ',
                'р',
                'ρ',
                'ر',
                'რ',
                'ｒ',
                'ר'
            ],
            's' => [
                'ś',
                'š',
                'ş',
                'с',
                'σ',
                'ș',
                'ς',
                'س',
                'ص',
                'စ',
                'ſ',
                'ს',
                'ｓ',
                'ס'
            ],
            't' => [
                'ť',
                'ţ',
                'т',
                'τ',
                'ț',
                'ت',
                'ط',
                'ဋ',
                'တ',
                'ŧ',
                'თ',
                'ტ',
                'ｔ',
                'ת'
            ],
            'u' => [
                'ú',
                'ù',
                'ủ',
                'ũ',
                'ụ',
                'ư',
                'ứ',
                'ừ',
                'ử',
                'ữ',
                'ự',
                'û',
                'ū',
                'ů',
                'ű',
                'ŭ',
                'ų',
                'µ',
                'у',
                'ဉ',
                'ု',
                'ူ',
                'ǔ',
                'ǖ',
                'ǘ',
                'ǚ',
                'ǜ',
                'უ',
                'उ',
                'ｕ',
                'ў',
                'ü'
            ],
            'v' => [
                'в',
                'ვ',
                'ϐ',
                'ｖ',
                'ו'
            ],
            'w' => [
                'ŵ',
                'ω',
                'ώ',
                'ဝ',
                'ွ',
                'ｗ'
            ],
            'x' => [
                'χ',
                'ξ',
                'ｘ'
            ],
            'y' => [
                'ý',
                'ỳ',
                'ỷ',
                'ỹ',
                'ỵ',
                'ÿ',
                'ŷ',
                'й',
                'ы',
                'υ',
                'ϋ',
                'ύ',
                'ΰ',
                'ي',
                'ယ',
                'ｙ'
            ],
            'z' => [
                'ź',
                'ž',
                'ż',
                'з',
                'ζ',
                'ز',
                'ဇ',
                'ზ',
                'ｚ',
                'ז'
            ],
            'aa' => [
                'ع',
                'आ',
                'آ'
            ],
            'ae' => [
                'æ',
                'ǽ'
            ],
            'ai' => [
                'ऐ'
            ],
            'ch' => [
                'ч',
                'ჩ',
                'ჭ',
                'چ'
            ],
            'dj' => [
                'ђ',
                'đ'
            ],
            'dz' => [
                'џ',
                'ძ',
                'דז'
            ],
            'ei' => [
                'ऍ'
            ],
            'gh' => [
                'غ',
                'ღ'
            ],
            'ii' => [
                'ई'
            ],
            'ij' => [
                'ĳ'
            ],
            'kh' => [
                'х',
                'خ',
                'ხ'
            ],
            'lj' => [
                'љ'
            ],
            'nj' => [
                'њ'
            ],
            'oe' => [
                'ö',
                'œ',
                'ؤ'
            ],
            'oi' => [
                'ऑ'
            ],
            'oii' => [
                'ऒ'
            ],
            'ps' => [
                'ψ'
            ],
            'sh' => [
                'ш',
                'შ',
                'ش',
                'ש'
            ],
            'shch' => [
                'щ'
            ],
            'ss' => [
                'ß'
            ],
            'sx' => [
                'ŝ'
            ],
            'th' => [
                'þ',
                'ϑ',
                'θ',
                'ث',
                'ذ',
                'ظ'
            ],
            'ts' => [
                'ц',
                'ც',
                'წ'
            ],
            'ue' => [
                'ü'
            ],
            'uu' => [
                'ऊ'
            ],
            'ya' => [
                'я'
            ],
            'yu' => [
                'ю'
            ],
            'zh' => [
                'ж',
                'ჟ',
                'ژ'
            ],
            '(c)' => [
                '©'
            ],
            'A' => [
                'Á',
                'À',
                'Ả',
                'Ã',
                'Ạ',
                'Ă',
                'Ắ',
                'Ằ',
                'Ẳ',
                'Ẵ',
                'Ặ',
                'Â',
                'Ấ',
                'Ầ',
                'Ẩ',
                'Ẫ',
                'Ậ',
                'Å',
                'Ā',
                'Ą',
                'Α',
                'Ά',
                'Ἀ',
                'Ἁ',
                'Ἂ',
                'Ἃ',
                'Ἄ',
                'Ἅ',
                'Ἆ',
                'Ἇ',
                'ᾈ',
                'ᾉ',
                'ᾊ',
                'ᾋ',
                'ᾌ',
                'ᾍ',
                'ᾎ',
                'ᾏ',
                'Ᾰ',
                'Ᾱ',
                'Ὰ',
                'Ά',
                'ᾼ',
                'А',
                'Ǻ',
                'Ǎ',
                'Ａ',
                'Ä'
            ],
            'B' => [
                'Б',
                'Β',
                'ब',
                'Ｂ'
            ],
            'C' => [
                'Ç',
                'Ć',
                'Č',
                'Ĉ',
                'Ċ',
                'Ｃ'
            ],
            'D' => [
                'Ď',
                'Ð',
                'Đ',
                'Ɖ',
                'Ɗ',
                'Ƌ',
                'ᴅ',
                'ᴆ',
                'Д',
                'Δ',
                'Ｄ'
            ],
            'E' => [
                'É',
                'È',
                'Ẻ',
                'Ẽ',
                'Ẹ',
                'Ê',
                'Ế',
                'Ề',
                'Ể',
                'Ễ',
                'Ệ',
                'Ë',
                'Ē',
                'Ę',
                'Ě',
                'Ĕ',
                'Ė',
                'Ε',
                'Έ',
                'Ἐ',
                'Ἑ',
                'Ἒ',
                'Ἓ',
                'Ἔ',
                'Ἕ',
                'Έ',
                'Ὲ',
                'Е',
                'Ё',
                'Э',
                'Є',
                'Ə',
                'Ｅ'
            ],
            'F' => [
                'Ф',
                'Φ',
                'Ｆ'
            ],
            'G' => [
                'Ğ',
                'Ġ',
                'Ģ',
                'Г',
                'Ґ',
                'Γ',
                'Ｇ'
            ],
            'H' => [
                'Η',
                'Ή',
                'Ħ',
                'Ｈ'
            ],
            'I' => [
                'Í',
                'Ì',
                'Ỉ',
                'Ĩ',
                'Ị',
                'Î',
                'Ï',
                'Ī',
                'Ĭ',
                'Į',
                'İ',
                'Ι',
                'Ί',
                'Ϊ',
                'Ἰ',
                'Ἱ',
                'Ἳ',
                'Ἴ',
                'Ἵ',
                'Ἶ',
                'Ἷ',
                'Ῐ',
                'Ῑ',
                'Ὶ',
                'Ί',
                'И',
                'І',
                'Ї',
                'Ǐ',
                'ϒ',
                'Ｉ'
            ],
            'J' => [
                'Ｊ'
            ],
            'K' => [
                'К',
                'Κ',
                'Ｋ'
            ],
            'L' => [
                'Ĺ',
                'Ł',
                'Л',
                'Λ',
                'Ļ',
                'Ľ',
                'Ŀ',
                'ल',
                'Ｌ'
            ],
            'M' => [
                'М',
                'Μ',
                'Ｍ'
            ],
            'N' => [
                'Ń',
                'Ñ',
                'Ň',
                'Ņ',
                'Ŋ',
                'Н',
                'Ν',
                'Ｎ'
            ],
            'O' => [
                'Ó',
                'Ò',
                'Ỏ',
                'Õ',
                'Ọ',
                'Ô',
                'Ố',
                'Ồ',
                'Ổ',
                'Ỗ',
                'Ộ',
                'Ơ',
                'Ớ',
                'Ờ',
                'Ở',
                'Ỡ',
                'Ợ',
                'Ø',
                'Ō',
                'Ő',
                'Ŏ',
                'Ο',
                'Ό',
                'Ὀ',
                'Ὁ',
                'Ὂ',
                'Ὃ',
                'Ὄ',
                'Ὅ',
                'Ὸ',
                'Ό',
                'О',
                'Ө',
                'Ǒ',
                'Ǿ',
                'Ｏ',
                'Ö'
            ],
            'P' => [
                'П',
                'Π',
                'Ｐ'
            ],
            'Q' => [
                'Ｑ'
            ],
            'R' => [
                'Ř',
                'Ŕ',
                'Р',
                'Ρ',
                'Ŗ',
                'Ｒ'
            ],
            'S' => [
                'Ş',
                'Ŝ',
                'Ș',
                'Š',
                'Ś',
                'С',
                'Σ',
                'Ｓ'
            ],
            'T' => [
                'Ť',
                'Ţ',
                'Ŧ',
                'Ț',
                'Т',
                'Τ',
                'Ｔ'
            ],
            'U' => [
                'Ú',
                'Ù',
                'Ủ',
                'Ũ',
                'Ụ',
                'Ư',
                'Ứ',
                'Ừ',
                'Ử',
                'Ữ',
                'Ự',
                'Û',
                'Ū',
                'Ů',
                'Ű',
                'Ŭ',
                'Ų',
                'У',
                'Ǔ',
                'Ǖ',
                'Ǘ',
                'Ǚ',
                'Ǜ',
                'Ｕ',
                'Ў',
                'Ü'
            ],
            'V' => [
                'В',
                'Ｖ'
            ],
            'W' => [
                'Ω',
                'Ώ',
                'Ŵ',
                'Ｗ'
            ],
            'X' => [
                'Χ',
                'Ξ',
                'Ｘ'
            ],
            'Y' => [
                'Ý',
                'Ỳ',
                'Ỷ',
                'Ỹ',
                'Ỵ',
                'Ÿ',
                'Ῠ',
                'Ῡ',
                'Ὺ',
                'Ύ',
                'Ы',
                'Й',
                'Υ',
                'Ϋ',
                'Ŷ',
                'Ｙ'
            ],
            'Z' => [
                'Ź',
                'Ž',
                'Ż',
                'З',
                'Ζ',
                'Ｚ'
            ],
            'AE' => [
                'Æ',
                'Ǽ'
            ],
            'Ch' => [
                'Ч'
            ],
            'Dj' => [
                'Ђ'
            ],
            'Dz' => [
                'Џ'
            ],
            'Gx' => [
                'Ĝ'
            ],
            'Hx' => [
                'Ĥ'
            ],
            'Ij' => [
                'Ĳ'
            ],
            'Jx' => [
                'Ĵ'
            ],
            'Kh' => [
                'Х'
            ],
            'Lj' => [
                'Љ'
            ],
            'Nj' => [
                'Њ'
            ],
            'Oe' => [
                'Œ'
            ],
            'Ps' => [
                'Ψ'
            ],
            'Sh' => [
                'Ш',
                'ש'
            ],
            'Shch' => [
                'Щ'
            ],
            'Ss' => [
                'ẞ'
            ],
            'Th' => [
                'Þ',
                'Θ',
                'ת'
            ],
            'Ts' => [
                'Ц'
            ],
            'Ya' => [
                'Я',
                'יא'
            ],
            'Yu' => [
                'Ю',
                'יו'
            ],
            'Zh' => [
                'Ж'
            ],
            ' ' => [
                "\xC2\xA0",
                "\xE2\x80\x80",
                "\xE2\x80\x81",
                "\xE2\x80\x82",
                "\xE2\x80\x83",
                "\xE2\x80\x84",
                "\xE2\x80\x85",
                "\xE2\x80\x86",
                "\xE2\x80\x87",
                "\xE2\x80\x88",
                "\xE2\x80\x89",
                "\xE2\x80\x8A",
                "\xE2\x80\xAF",
                "\xE2\x81\x9F",
                "\xE3\x80\x80",
                "\xEF\xBE\xA0"
            ]
        ];
    }

    /**
     * Returns the language specific replacements for the ascii method.
     *
     * Note: Adapted from Stringy\Stringy.
     *
     * @see https://github.com/danielstjules/Stringy/blob/3.1.0/LICENSE.txt
     *
     * @param string $language
     * @return array|null
     */
    protected static function languageSpecificCharsArray(string $language): ?array
    {
        static $languageSpecific;

        if (! isset($languageSpecific)) {
            $languageSpecific = [
                'bg' => [
                    [
                        'х',
                        'Х',
                        'щ',
                        'Щ',
                        'ъ',
                        'Ъ',
                        'ь',
                        'Ь'
                    ],
                    [
                        'h',
                        'H',
                        'sht',
                        'SHT',
                        'a',
                        'А',
                        'y',
                        'Y'
                    ]
                ],
                'da' => [
                    [
                        'æ',
                        'ø',
                        'å',
                        'Æ',
                        'Ø',
                        'Å'
                    ],
                    [
                        'ae',
                        'oe',
                        'aa',
                        'Ae',
                        'Oe',
                        'Aa'
                    ]
                ],
                'de' => [
                    [
                        'ä',
                        'ö',
                        'ü',
                        'Ä',
                        'Ö',
                        'Ü'
                    ],
                    [
                        'ae',
                        'oe',
                        'ue',
                        'AE',
                        'OE',
                        'UE'
                    ]
                ],
                'he' => [
                    [
                        'א',
                        'ב',
                        'ג',
                        'ד',
                        'ה',
                        'ו'
                    ],
                    [
                        'ז',
                        'ח',
                        'ט',
                        'י',
                        'כ',
                        'ל'
                    ],
                    [
                        'מ',
                        'נ',
                        'ס',
                        'ע',
                        'פ',
                        'צ'
                    ],
                    [
                        'ק',
                        'ר',
                        'ש',
                        'ת',
                        'ן',
                        'ץ',
                        'ך',
                        'ם',
                        'ף'
                    ]
                ],
                'ro' => [
                    [
                        'ă',
                        'â',
                        'î',
                        'ș',
                        'ț',
                        'Ă',
                        'Â',
                        'Î',
                        'Ș',
                        'Ț'
                    ],
                    [
                        'a',
                        'a',
                        'i',
                        's',
                        't',
                        'A',
                        'A',
                        'I',
                        'S',
                        'T'
                    ]
                ]
            ];
        }

        return $languageSpecific[$language] ?? null;
    }
}
