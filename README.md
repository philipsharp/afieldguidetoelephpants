# Elephant Field Guide

Everything you need to know about [elephpants](http://php.net/elephpant.php)
in the wild. With acknowledgment to Roger Tory Peterson.

## Viewing Locally

_A Field Guide To Elephpants_ uses [Sculpin](https://sculpin.io/) to generate
its pages. Sculpin should be installed using [Composer](https://getcomposer.org/).

With Composer installed, run `composer install` from this directory. This will
install Sculpin and any necessary dependencies.

Once installed, use `vendor/bin/sculpin generate` to build the site. The
optional `--server` flag will start a local web server. Due to the single-page
nature of the _Field Guide_, the `--watch` flag may not work as expected.

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) for information on submitting changes,
including style and technical guidelines.

## License

[Creative Commons
Attribution-NonCommercial-ShareAlike 4.0 International License](http://creativecommons.org/licenses/by-nc-sa/4.0/)
