<?php # -*- coding: utf-8 -*-
declare(strict_types=1);

namespace Bueltge\Marksimple\Rule;

class Strike extends AbstractRegexRule
{

    /**
     * Get the regex rule to identify the content for the callback.
     * Strike via double  tilde ~~ .
     *
     * @return string
     */
    public function rule(): string
    {
        return '#(?<!\\\)([~]{2})([^\n]+?)\1#';
    }

    /**
     * {@inheritdoc}
     */
    public function render(array $content): string
    {
        return sprintf('<strike>%s</strike>', $content[2]);
    }
}
