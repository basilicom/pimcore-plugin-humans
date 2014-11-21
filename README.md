Humans Pimcore Plugin
================================================

[![Codacy Badge](https://www.codacy.com/project/badge/b6cacabef596460eaa38363e07938b45)](https://www.codacy.com/public/basilicom/pimcorepluginhumans)
[![Dependency Status](https://www.versioneye.com/user/projects/545f22d5eb8df23de80000d8/badge.svg?style=flat)](https://www.versioneye.com/user/projects/545f22d5eb8df23de80000d8)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/basilicom/pimcore-plugin-humans/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/basilicom/pimcore-plugin-humans/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/basilicom/pimcore-plugin-humans/badges/build.png?b=master)](https://scrutinizer-ci.com/g/basilicom/pimcore-plugin-humans/build-status/master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9bddd4b9-2aba-40eb-a750-19fe96898ea3/mini.png)](https://insight.sensiolabs.com/projects/9bddd4b9-2aba-40eb-a750-19fe96898ea3)

Developer info: [Pimcore at basilicom](http://basilicom.de/en/pimcore)

## Synopsis

This Pimcore http://www.pimcore.org plugin installs a set
of sample user avatar images that are automatically used
by the first n users (currently six).

## Code Example / Method of Operation

The sample user default images are copied to the location
where pimcore usually keeps user provided avatars during
plugin installation. It is possible to fork this repository
and just drop in a couple of different PNGs.

## Motivation

The default "robot" images of pimcore are too toy-like. This
plugin contains sample icons that are neutral and professionally
looking. Each one has a distinctive color to tell accounts apart.

## Installation

Add "basilicom-pimcore/plugin-humans" as a requirement to the
composer.json in the toplevel directory of your Pimcore installation.

Example:

    {
        "require": {
            "basilicom-pimcore-plugin/humans": ">=1.0.0"
        }
    }

## API Reference

* n/a

## Tests

* none

## Contributors

* Pimcore team (provided the sample code)

## License

* BSD-3-Clause
* Sample icons: CC BY-NC-ND 3.0
