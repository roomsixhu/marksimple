<?php # -*- coding: utf-8 -*-
declare(strict_types=1);

namespace Bueltge\Marksimple\Rule;

class OrderedList extends AbstractRegexRule
{

    /**
     * Get the regex rule to identify the content for the callback.
     * blockquote via right bracket >.
     *
     * @return string
     */
    public function rule(): string
    {
        return '#^ *[*\d]+\. +(.*?)$#m';
    }

    /**
     * {@inheritdoc}
     */
    protected function render(array $content): string
    {
        return sprintf('<ol><li>%s</li></ol>', trim($content[1]));
    }
}
