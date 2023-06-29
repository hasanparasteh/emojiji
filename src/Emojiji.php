<?php

namespace HP;

use Incenteev\EmojiPattern\EmojiPattern;

class Emojiji
{
    public static function extract_utf8_emoji(string $message): array
    {
        $matches = [];
        preg_match(
            '/' . EmojiPattern::getEmojiPattern() . '/u',
            $message,
            $matches
        );
        return $matches;
    }

    public static function extract_utf16_emoji(string $message): array
    {
        $matches = [];
        preg_match(
            '/' . EmojiPattern::getEmojiPattern() . '/u',
            mb_convert_encoding($message, "UTF-8", "UTF-16"),
            $matches
        );
        return $matches;
    }

    public static function to_utf_8(string $message): string
    {
        foreach (self::extract_utf16_emoji($message) as $emoji) {
            $emoji_u16 = mb_convert_encoding($emoji, 'UTF-16', 'UTF-8');
            $emoji_u8 = mb_convert_encoding($emoji_u16, 'UTF-8', 'UTF-16');
            $message = str_replace($emoji_u16, $emoji_u8, $message);
        }

        return $message;
    }

    public static function to_utf_16(string $message): string
    {
        foreach (self::extract_utf8_emoji($message) as $emoji) {
            $emoji_u16 = mb_convert_encoding($emoji, "UTF-16", "UTF-8");
            $message = str_replace($emoji, $emoji_u16, $message);
        }

        return $message;
    }

    // TODO: remove emoji method
    // TODO: emoji detection methods
}