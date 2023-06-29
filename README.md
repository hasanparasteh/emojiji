# Emoji Encoder

I really had problem encoding and decoding emojis from `utf-8` to `utf-16` and vice versa
So I created this package to help me out. Hope you find it useful too :)


```
composer require hasanparasteh/emojiji
```

### Example
```php
$sampleU8 = "hello 🏦";
$sampleU16 = mb_convert_encoding("hello 🏦", "UTF-16");

echo 'UTF-16 -> UTF-8 encoded emoji: ' . \HP\Emojiji::to_utf_8($sampleU16) . PHP_EOL;
echo 'UTF8 -> UTF-16 encoded emoji: ' . \HP\Emojiji::to_utf_16($sampleU8) . PHP_EOL;
```