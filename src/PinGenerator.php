<?php

namespace Bfg\Task;

class PinGenerator
{
    
    public function generate(): array
    {
        $pins = [];
        while (count($pins) < 5) {
            $pin = $this->generatePin();
            
            if ($this->isValidPin($pin) && !in_array($pin, $pins)) {
                $pins[] = $pin; // Add pin if it's valid and unique
            }
        }
        return $pins;
    }

    private function generatePin(): string
    {
        return sprintf('%04d', rand(0, 9999));
    }

    private function isValidPin(string $pin): bool
    {
        return !$this->isSequential($pin) && !$this->isRepeating($pin) && !$this->isPalindrome($pin);
    }

    private function isSequential(string $pin): bool
    {
        $increasing = '0123456789';
        $decreasing = '9876543210';

        return strpos($increasing, $pin) !== false || strpos($decreasing, $pin) !== false;
    }

    private function isRepeating(string $pin): bool
    {
        return $pin[0] === $pin[1] && $pin[2] === $pin[3];
    }

    private function isPalindrome(string $pin): bool
    {
        return $pin === strrev($pin);
    }

}
