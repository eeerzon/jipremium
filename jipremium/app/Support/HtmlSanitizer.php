<?php

namespace App\Support;

use Symfony\Component\HtmlSanitizer\HtmlSanitizer as SymfonyHtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;

/**
 * Cleans admin-entered HTML (CKEditor content, notice text) before it is printed with {!! !!}.
 * Formatting tags and inline styles are kept; scripts, event handlers and javascript: URLs are removed.
 */
class HtmlSanitizer
{
    private static ?SymfonyHtmlSanitizer $sanitizer = null;

    public static function clean(?string $html): string
    {
        if ($html === null || $html === '') {
            return '';
        }

        return self::sanitizer()->sanitize($html);
    }

    private static function sanitizer(): SymfonyHtmlSanitizer
    {
        if (self::$sanitizer === null) {
            $config = (new HtmlSanitizerConfig())
                ->allowSafeElements()
                ->allowAttribute('style', '*')
                ->allowAttribute('class', '*')
                ->allowLinkSchemes(['http', 'https', 'mailto', 'tel'])
                ->allowMediaSchemes(['http', 'https', 'data'])
                ->allowRelativeLinks()
                ->allowRelativeMedias()
                ->withMaxInputLength(-1);

            self::$sanitizer = new SymfonyHtmlSanitizer($config);
        }

        return self::$sanitizer;
    }
}
