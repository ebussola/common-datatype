<?php

namespace ebussola\common\datatype;

/**
 * User: Leonardo Shinagawa
 * Date: 12/03/13
 * Time: 00:12
 */

/**
 * Class String
 * @package ebussola\common\datatype
 *
 * @method \ebussola\common\datatype\String addcslashes  Quote string with slashes in a C style
 * @method \ebussola\common\datatype\String addslashes  Quote string with slashes
 * @method \ebussola\common\datatype\String chop  Alias of rtrim
 * @method \ebussola\common\datatype\String chunk_split  Split a string into smaller chunks
 * @method \ebussola\common\datatype\String convert_cyr_string  Convert from one Cyrillic character set to another
 * @method \ebussola\common\datatype\String convert_uudecode  Decode a uuencoded string
 * @method \ebussola\common\datatype\String convert_uuencode  Uuencode a string
 * @method \ebussola\common\datatype\String count_chars  Return information about characters used in a string
 * @method \ebussola\common\datatype\String crc32  Calculates the crc32 polynomial of a string
 * @method \ebussola\common\datatype\String crypt  One-way string hashing
 * @method \ebussola\common\datatype\String explode  Split a string by string
 * @method \ebussola\common\datatype\String fprintf  Write a formatted string to a stream
 * @method \ebussola\common\datatype\String get_html_translation_table  Returns the translation table used by htmlspecialchars and htmlentities
 * @method \ebussola\common\datatype\String hebrev  Convert logical Hebrew text to visual text
 * @method \ebussola\common\datatype\String hebrevc  Convert logical Hebrew text to visual text with newline conversion
 * @method \ebussola\common\datatype\String hex2bin  Decodes a hexadecimally encoded binary string
 * @method \ebussola\common\datatype\String html_entity_decode  Convert all HTML entities to their applicable characters
 * @method \ebussola\common\datatype\String htmlentities  Convert all applicable characters to HTML entities
 * @method \ebussola\common\datatype\String htmlspecialchars_decode  Convert special HTML entities back to characters
 * @method \ebussola\common\datatype\String htmlspecialchars  Convert special characters to HTML entities
 * @method \ebussola\common\datatype\String implode  Join array elements with a string
 * @method \ebussola\common\datatype\String join  Alias of implode
 * @method \ebussola\common\datatype\String lcfirst  Make a string's first character lowercase
 * @method \ebussola\common\datatype\String levenshtein  Calculate Levenshtein distance between two strings
 * @method \ebussola\common\datatype\String localeconv  Get numeric formatting information
 * @method \ebussola\common\datatype\String ltrim  Strip whitespace ( or other characters) from the beginning of a string
 * @method \ebussola\common\datatype\String md5_file  Calculates the md5 hash of a given file
 * @method \ebussola\common\datatype\String md5  Calculate the md5 hash of a string
 * @method \ebussola\common\datatype\String metaphone  Calculate the metaphone key of a string
 * @method \ebussola\common\datatype\String money_format  Formats a number as a currency string
 * @method \ebussola\common\datatype\String nl_langinfo  Query language and locale information
 * @method \ebussola\common\datatype\String nl2br  Inserts HTML line breaks before all newlines in a string
 * @method \ebussola\common\datatype\String number_format  Format a number with grouped thousands
 * @method \ebussola\common\datatype\String ord  Return ASCII value of character
 * @method \ebussola\common\datatype\String parse_str  Parses the string into variables
 * @method \ebussola\common\datatype\String print  Output a string
 * @method \ebussola\common\datatype\String printf  Output a formatted string
 * @method \ebussola\common\datatype\String quoted_printable_decode  Convert a quoted-printable string to an 8 bit string
 * @method \ebussola\common\datatype\String quoted_printable_encode  Convert a 8 bit string to a quoted-printable string
 * @method \ebussola\common\datatype\String quotemeta  Quote meta characters
 * @method \ebussola\common\datatype\String rtrim  Strip whitespace ( or other characters) from the end of a string
 * @method \ebussola\common\datatype\String setlocale  Set locale information
 * @method \ebussola\common\datatype\String sha1_file  Calculate the sha1 hash of a file
 * @method \ebussola\common\datatype\String sha1  Calculate the sha1 hash of a string
 * @method \ebussola\common\datatype\String similar_text  Calculate the similarity between two strings
 * @method \ebussola\common\datatype\String soundex  Calculate the soundex key of a string
 * @method \ebussola\common\datatype\String sprintf  Return a formatted string
 * @method \ebussola\common\datatype\String sscanf  Parses input from a string according to a format
 * @method \ebussola\common\datatype\String str_getcsv  Parse a CSV string into an array
 * @method \ebussola\common\datatype\String str_ireplace  Case-insensitive version of str_replace.
 * @method \ebussola\common\datatype\String str_pad  Pad a string to a certain length with another string
 * @method \ebussola\common\datatype\String str_repeat  Repeat a string
 * @method \ebussola\common\datatype\String str_replace  Replace all occurrences of the search string with the replacement string
 * @method \ebussola\common\datatype\String str_rot13  Perform the rot13 transform on a string
 * @method \ebussola\common\datatype\String str_shuffle  Randomly shuffles a string
 * @method \ebussola\common\datatype\String str_split  Convert a string to an array
 * @method \ebussola\common\datatype\String str_word_count  Return information about words used in a string
 * @method \ebussola\common\datatype\String strcasecmp  Binary safe case-insensitive string comparison
 * @method \ebussola\common\datatype\String strchr  Alias of strstr
 * @method \ebussola\common\datatype\String strcmp  Binary safe string comparison
 * @method \ebussola\common\datatype\String strcoll  Locale based string comparison
 * @method \ebussola\common\datatype\String strcspn  Find length of initial segment not matching mask
 * @method \ebussola\common\datatype\String strip_tags  Strip HTML and PHP tags from a string
 * @method \ebussola\common\datatype\String stripcslashes  Un-quote string quoted with addcslashes
 * @method \ebussola\common\datatype\String stripos  Find the position of the first occurrence of a case-insensitive substring in a string
 * @method \ebussola\common\datatype\String stripslashes  Un-quotes a quoted string
 * @method \ebussola\common\datatype\String stristr  Case-insensitive strstr
 * @method \ebussola\common\datatype\String strlen  Get string length
 * @method \ebussola\common\datatype\String strnatcasecmp  Case insensitive string comparisons using a "natural order" algorithm
 * @method \ebussola\common\datatype\String strnatcmp  String comparisons using a "natural order" algorithm
 * @method \ebussola\common\datatype\String strncasecmp  Binary safe case-insensitive string comparison of the first n characters
 * @method \ebussola\common\datatype\String strncmp  Binary safe string comparison of the first n characters
 * @method \ebussola\common\datatype\String strpbrk  Search a string for any of a set of characters
 * @method \ebussola\common\datatype\String strpos  Find the position of the first occurrence of a substring in a string
 * @method \ebussola\common\datatype\String strrchr  Find the last occurrence of a character in a string
 * @method \ebussola\common\datatype\String strrev  Reverse a string
 * @method \ebussola\common\datatype\String strripos  Find the position of the last occurrence of a case-insensitive substring in a string
 * @method \ebussola\common\datatype\String strrpos  Find the position of the last occurrence of a substring in a string
 * @method \ebussola\common\datatype\String strspn  Finds the length of the initial segment of a string consisting entirely of characters contained within a given mask.
 * @method \ebussola\common\datatype\String strstr  Find the first occurrence of a string
 * @method \ebussola\common\datatype\String strtok  Tokenize string
 * @method \ebussola\common\datatype\String strtolower  Make a string lowercase
 * @method \ebussola\common\datatype\String strtoupper  Make a string uppercase
 * @method \ebussola\common\datatype\String strtr  Translate characters or replace substrings
 * @method \ebussola\common\datatype\String substr_compare  Binary safe comparison of two strings from an offset, up to length characters
 * @method \ebussola\common\datatype\String substr_count  Count the number of substring occurrences
 * @method \ebussola\common\datatype\String substr_replace  Replace text within a portion of a string
 * @method \ebussola\common\datatype\String substr  Return part of a string
 * @method \ebussola\common\datatype\String trim  Strip whitespace ( or other characters) from the beginning and end of a string
 * @method \ebussola\common\datatype\String ucfirst  Make a string's first character uppercase
 * @method \ebussola\common\datatype\String ucwords  Uppercase the first character of each word in a string
 * @method \ebussola\common\datatype\String vfprintf  Write a formatted string to a stream
 * @method \ebussola\common\datatype\String vprintf  Output a formatted string
 * @method \ebussola\common\datatype\String vsprintf  Return a formatted string
 * @method \ebussola\common\datatype\String wordwrap  Wraps a string to a given number of characters
 */
class String {

    /**
     * @var string
     */
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    /**
     * Magic method to catch any methods and delegate to string functions of php
     * It also adds chainability
     *
     * @param       $name
     * @param array $args
     * @return String
     */
    public function __call($name, array $args=array()) {
        $param_arr = array_merge(array($this->value), $args);
        $result = call_user_func_array($name, $param_arr);

        if (!in_array($name, ['strlen', 'count_chars'])) {
            $result = new self($result);
        }

        return $result;
    }

    public function __toString() {
        return (string)$this->value;
    }

}
