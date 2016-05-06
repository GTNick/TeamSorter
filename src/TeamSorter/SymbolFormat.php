<?php

namespace TeamSorter;

use pocketmine\utils\TextFormat as TF;

class SymbolFormat{

    public static function PrefixTF($prefix){
        $symbol = "&";
        $othersymbol = "§";
        $prefix = str_replace($symbol . "0", TF::BLACK, $prefix);
        $prefix = str_replace($symbol . "1", TF::DARK_BLUE, $prefix);
        $prefix = str_replace($symbol . "2", TF::DARK_GREEN, $prefix);
        $prefix = str_replace($symbol . "3", TF::DARK_AQUA, $prefix);
        $prefix = str_replace($symbol . "4", TF::DARK_RED, $prefix);
        $prefix = str_replace($symbol . "5", TF::DARK_PURPLE, $prefix);
        $prefix = str_replace($symbol . "6", TF::GOLD, $prefix);
        $prefix = str_replace($symbol . "7", TF::GRAY, $prefix);
        $prefix = str_replace($symbol . "8", TF::DARK_GRAY, $prefix);
        $prefix = str_replace($symbol . "9", TF::BLUE, $prefix);
        $prefix = str_replace($symbol . "a", TF::GREEN, $prefix);
        $prefix = str_replace($symbol . "b", TF::AQUA, $prefix);
        $prefix = str_replace($symbol . "c", TF::RED, $prefix);
        $prefix = str_replace($symbol . "d", TF::LIGHT_PURPLE, $prefix);
        $prefix = str_replace($symbol . "e", TF::YELLOW, $prefix);
        $prefix = str_replace($symbol . "f", TF::WHITE, $prefix);
        $prefix = str_replace($symbol . "k", TF::OBFUSCATED, $prefix);
        $prefix = str_replace($symbol . "l", TF::BOLD, $prefix);
        $prefix = str_replace($symbol . "m", TF::STRIKETHROUGH, $prefix);
        $prefix = str_replace($symbol . "n", TF::UNDERLINE, $prefix);
        $prefix = str_replace($symbol . "o", TF::ITALIC, $prefix);
        $prefix = str_replace($symbol . "r", TF::RESET, $prefix);
        $prefix = str_replace($othersymbol . "0", TF::BLACK, $prefix);
        $prefix = str_replace($othersymbol . "2", TF::DARK_GREEN, $prefix);
        $prefix = str_replace($othersymbol . "3", TF::DARK_AQUA, $prefix);
        $prefix = str_replace($othersymbol . "4", TF::DARK_RED, $prefix);
        $prefix = str_replace($othersymbol . "5", TF::DARK_PURPLE, $prefix);
        $prefix = str_replace($othersymbol . "6", TF::GOLD, $prefix);
        $prefix = str_replace($othersymbol . "7", TF::GRAY, $prefix);
        $prefix = str_replace($othersymbol . "8", TF::DARK_GRAY, $prefix);
        $prefix = str_replace($othersymbol . "9", TF::BLUE, $prefix);
        $prefix = str_replace($othersymbol . "a", TF::GREEN, $prefix);
        $prefix = str_replace($othersymbol . "b", TF::AQUA, $prefix);
        $prefix = str_replace($othersymbol . "c", TF::RED, $prefix);
        $prefix = str_replace($othersymbol . "d", TF::LIGHT_PURPLE, $prefix);
        $prefix = str_replace($othersymbol . "e", TF::YELLOW, $prefix);
        $prefix = str_replace($othersymbol . "f", TF::WHITE, $prefix);
        $prefix = str_replace($othersymbol . "k", TF::OBFUSCATED, $prefix);
        $prefix = str_replace($othersymbol . "l", TF::BOLD, $prefix);
        $prefix = str_replace($othersymbol . "m", TF::STRIKETHROUGH, $prefix);
        $prefix = str_replace($othersymbol . "n", TF::UNDERLINE, $prefix);
        $prefix = str_replace($othersymbol . "o", TF::ITALIC, $prefix);
        $prefix = str_replace($othersymbol . "r", TF::RESET, $prefix);
        return $prefix;
    }
    
}

?>