<?php

enum Civilite: string{
    case M = "M";
    case Mme = "Mme";

    public static function fromString (string $name): ?Civilite {
        foreach (Civilite::cases() as $value) {
            if ($value->value === $name) {
                return $value;
            }
        }
        return null;

    }

    public function toString (): string {
        return $this->value;
    }

}
