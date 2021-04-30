<?php # -*- coding: utf-8 -*-
declare(strict_types=1);

namespace Bueltge\Marksimple\Rule;

class Blockquote extends AbstractRegexRule
{

    /**
     * Get the regex rule to identify the content for the callback.
     * blockquote via right bracket >.
     *
     * @return string
     */
    public function rule(): string
    {  
return  '#^ *?(\){2,4}|>{2,4}|}{2,4}|\]{2,4}|(&gt;){2,4})(.+?)$#m';
    }

    /**
     * {@inheritdoc}
     */
    protected function render(array $content): string
    {
        return sprintf('<blockquote style="color: grey;border-left: 5px #7d7d7d solid;">%s</blockquote>', $content[3]);
    }

}
## echo "hier blockquote";
