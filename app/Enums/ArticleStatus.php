<?php

namespace App\Enums;

enum ArticleStatus: string
{
case DRAFT = 'DRAFT';
case PUBLISHED = 'PUBLISHED';

// Optionnel : ajouter un helper pour l'affichage propre dans les vues
public function label(): string
{
    return match($this) {
        self::DRAFT => 'Brouillon',
        self::PUBLISHED => 'Publié',
        };
    }
}
