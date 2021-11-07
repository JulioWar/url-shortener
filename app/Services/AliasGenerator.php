<?php

namespace App\Services;

use App\Contracts\AliasGeneratorContract;

class AliasGenerator implements AliasGeneratorContract {

    public function generate(int $length = NULL): string {
        $alias = "";
        $characters = str_split("qwertyuiopasdfghjklzxcvbnmQERTYUIOPASDFGHJKLZXCVBNM1234567890");
        $totalCharacters = count($characters);
        $finalAliasLength = (is_null($length)) ? rand(5, 8) : $length;

        for ($i = 0; $i < $finalAliasLength; $i++) {
            $alias .= $characters[rand(0, $totalCharacters - 1)];
        }

        return $alias;
    }
}
