# MarkSimple

[![CI](https://github.com/bueltge/marksimple/workflows/CI/badge.svg)](https://github.com/bueltge/marksimple/actions)
[![Maintainability](https://api.codeclimate.com/v1/badges/3ce79c7b4118c47951cc/maintainability "Maintainability")](https://codeclimate.com/github/bueltge/marksimple/maintainability)
[![Code Coverage](https://codecov.io/gh/bueltge/marksimple/branch/master/graph/badge.svg)](https://codecov.io/gh/bueltge/marksimple)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bueltge/marksimple/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bueltge/marksimple/?branch=master)

A simple Markdown parser, short and only with the rules that I currently need. The function is regex based and it is possible to enhance your custom rules.

---

Yes, **I know**, it gives a lot of __open projects__ that solve the same goal. However it was fun to write my custom parser, only with the rules that I need, Not to much overhead. Yes, also I mean that other packages are more solid, lot of usages, but not points enough to learn about regex and markdown. Besides *I know* a regex parser is not the best, fastest way, but also here, _I would to teach me in this context_.

## Demo, Tests

The solution is still active in his tests, you find it [here](https://bueltge.de/thueringen-erfahren/). This test of the class is also built as [PWA](https://developers.google.com/web/progressive-web-apps/), Progressive Web App. It was only an fun project for me to understand it on a really simple site how it works. But is important, if you see the directory `test` in this repository here and wonder about so much files there are not in the context of the Markdown parser. If you will check the PWA, use it on your mobile or play with Chrome/WebInspector.

## Active use

The class is simple and I use it for my own documentation, that I write in markdown. Here and there is the result a single oage to help in each day to find the right syntax, hints, background and others. You can see this on this examples:

 * [MarkSimple Tests](https://bueltge.de/marksimple/test/)
 * [My Git Notes](https://bueltge.de/git/)
 * [My Markdown Notes](https://bueltge.de/md/)
 * [My Linux command notes](https://bueltge.de/linux/)
 * [Thüringen erfahren - a one pager for a bicycle event](https://bueltge.de/thueringen-erfahren/)

## Support

My class supports currently the follow syntax. But Pull Request are really welcome and the solution give you the possibility to add your own rule.

 * Headers, `h1` - `h6` - `#` to `######` before the string
 * Image, `![](path/to/image.png "Alt text")`
 * Strong, bold text, `strong` - `**` or `__` before and after the string
 * Italic text, `em` - an `*` or `_` before and after the string
 * Unordered list, `ul` - `*` for each line  
 * Unordered list, `ol` 1. , 2. ,3. to some number and `.` (period ) for each line
* Inline Code, `code` - an ``` backtick before and after the code string
 * Code Blocks, `pre` - `    ` (4 spaces) or `	` (tab) in each line or the fenced code blocks by placing triple backticks and optional the language identifier,
 * Links, `a` - `[Link Text](Link URL)`
 * Horizontal line, `---` `***`
 * Break, new line, `<br>` **fixed now**

* Strike, double tilde `~~` before and after the string. 
 * Blockquote, a single one, with double to four `))`, `}}`, `]]`, but unfortunatly not yet `>>`, though in the regex.

## Usage

#### Requirements

 * PHP 7

Install static via download, clone the repository or use dependency management via Composer

Open a terminal, e.g. termux on android.
Navigate to your web root folder.
Install composer (https://getcomposer.org/download/), e.g via curl, (command :
```
curl -sSL https://getcomposer.org/installer | php

```
)
Run:
```
composer require bueltge/marksimple
```

Fix some missleading ../autoload.php, ( e.g. in test folder
```
require_once '../../../../vendor/autoload.php';
```
)
check php errors!

You find the solution and the tests in the [repository on GitHub](https://github.com/bueltge/marksimple).

See the test directory for an example with two different usages. The test directory works as PWA, for examples see only the file `index.php`.

#### Code examples

In php-files inside 
```
<?php .... ?>
```

    // Example with four spaces.
    require_once '../vendor/autoload.php';
    use Bueltge\Marksimple\Marksimple;
    $ms = new Marksimple();
    print $ms->parseFile('../README.md');

```php
// Example Github Code Block ```php.
require_once '../vendor/autoload.php';
use Bueltge\Marksimple\Marksimple;
$ms = new Marksimple();
print $ms->parseFile('../README.md');
```

#### Add Logger examples

The `MarkSimple` class instance uses the `psr/log` feature.

And the default `Logger` is the `NullLogger` it will be created when declaring `MarkSimple` class instance. The more details about `psr/log`, please visit this [link](https://www.php-fig.org/psr/psr-3/).

```php
$testee = new Marksimple();
echo get_class($testee->logger()); //output: Psr\Log\NullLogger
```


#### extensions  
add in head.php for math formula mathjax 
```
    <script id="MathJax-script" async

  src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">

</script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

    <script id="MathJax-script" async

  src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">

</script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

```
At this time you have to escape a lot the markdown syntax e.g. the `_` with `\\_` to get math sub.
#### add rules 
get in the src/rule folder. 
Create rule from the scratch or use one existent as template and rename it to Newrule.php. 
You have to change class to Newrule top in the file (approx. line 6), change regex expression, search for markdown signs in `[...]`, (approx. line 17) and write html rule resp. tags you want to get (approx line 25). 
Then add your Newrule to marksimple.php line 34 to 48 approx. like 
```
 'newtagname' => Rule\Newrule::class,
```
Newtagname like strike or sim. 
Fix variable number in contents[?] respective capture group in `(...)`. 

## ToDos 
* ~~ numbered,~~ and nested lists   
* * ordered list done now, break fixed
* cleaned and nestable unnumbered lists 
* nestable blockquote, and fix failure on angle brackets `>>` . https://www.phpliveregex.com/p/A4f
## Kudos

On the way to the goal of my simple parser I use lot of tests, tries on the online Regex testers. Thanks a lot to the authors of this followed two sites, great!

 * [PHP Live Regex](https://www.phpliveregex.com/) Really helpful in PHP context.
 * [regular expressions 101](https://regex101.com/)
 * [DebuggexBeta](https://www.debuggex.com/)
 * [Learn Regex The Easy Way](https://github.com/zeeshanu/learn-regex)
 * [RegExr](https://regexr.com/)

## License

Copyright (c) 2017 until now, [Frank Bültge](https://bueltge.de)

Good news, this plugin is free for everyone! Since it's released under the [MIT License](https://github.com/inpsyde/marksimple/blob/master/LICENSE) you can use it free of charge on your personal or commercial website.

## Contributing

 * [GitHub Repository](https://github.com/bueltge/marksimple)

All feedback / bug reports / pull requests are welcome.

---
