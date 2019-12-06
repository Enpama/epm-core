<?php
declare(strict_types = 1);
namespace epm\lib;

class Validate
{

    public static function email(string $email): bool
    {
        return \preg_match(
            '/^[a-z\p{L}0-9!#$%&\'*+\/=?^`{}|~_-]+[.a-z\p{L}0-9!#$%&\'*+\/=?^`{}|~_-]*@[a-z\p{L}0-9]+(?:[.]?[_a-z\p{L}0-9-])*\.[a-z\p{L}0-9]+$/ui',
            $email);
    }

    public static function md5(string $md5): bool
    {
        return \preg_match('/^[a-z0-9]{32}$/ui', $md5);
    }

    public static function sha1(string $sha1): bool
    {
        return \preg_match('/^[a-z0-9]{40}$/ui', $sha1);
    }

    public static function isCleanHtml(string $html, bool $allow_iframe = false): bool
    {
        $events = 'onmousedown|onmousemove|onmmouseup|onmouseover|onmouseout|onload|onunload|onfocus|onblur|onchange';
        $events .= '|onsubmit|ondblclick|onclick|onkeydown|onkeyup|onkeypress|onmouseenter|onmouseleave|onerror|onselect|onreset|onabort|ondragdrop|onresize|onactivate|onafterprint|onmoveend';
        $events .= '|onafterupdate|onbeforeactivate|onbeforecopy|onbeforecut|onbeforedeactivate|onbeforeeditfocus|onbeforepaste|onbeforeprint|onbeforeunload|onbeforeupdate|onmove';
        $events .= '|onbounce|oncellchange|oncontextmenu|oncontrolselect|oncopy|oncut|ondataavailable|ondatasetchanged|ondatasetcomplete|ondeactivate|ondrag|ondragend|ondragenter|onmousewheel';
        $events .= '|ondragleave|ondragover|ondragstart|ondrop|onerrorupdate|onfilterchange|onfinish|onfocusin|onfocusout|onhashchange|onhelp|oninput|onlosecapture|onmessage|onmouseup|onmovestart';
        $events .= '|onoffline|ononline|onpaste|onpropertychange|onreadystatechange|onresizeend|onresizestart|onrowenter|onrowexit|onrowsdelete|onrowsinserted|onscroll|onsearch|onselectionchange';
        $events .= '|onselectstart|onstart|onstop';
        if (\preg_match('/<[\s]*script/ims', $html) || \preg_match('/(' . $events . ')[\s]*=/ims', $html) ||
            \preg_match('/.*script\:/ims', $html)) {
            return false;
        }
        if (! $allow_iframe && \preg_match('/<[\s]*(i?frame|form|input|embed|object)/ims', $html)) {
            return false;
        }
        return true;
    }

    public static function serializedArray($data): bool
    {
        return $data === null || (\is_string($data) && \preg_match('/^a:[0-9]+:{.*;}$/s', $data));
    }

    public static function json($string): bool
    {
        \json_decode($string);
        return \json_last_error() == JSON_ERROR_NONE;
    }
}
