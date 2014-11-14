# Changelog

## 0.1.0

First release.

## 1.0.0

- Added `Formativ\Query\Factory`
- Renamed `Formativ\Query\Builder` to `Formativ\Query\BuilderProxy`
- Renamed `Formativ\Query\Runner` to `Formativ\Query\RunnerProxy`
- Repurposed `Formativ\Query\Factory\Factory`
- Added `Formativ\Query\Factory\BuilderFactory`
- Added `Formativ\Query\Factory\ProcessFactory`
- Added `Formativ\Query\Factory\RunnerFactory`
- Removed `Formativ\Query\Factory\AuraFactory`
- Added `Formativ\Query\Process\Process`
- Added `Formativ\Query\Process\SymfonyProcess`
- Added `Formativ\Query\Traits\UnacceptableTrait`
- Minor changes to `Formativ\Query\Builder\Builder`
- Minor changes to `Formativ\Query\Builder\AuraBuilder`
- Major changes to `Formativ\Query\Runner\Runner`
- Major changes to `Formativ\Query\Runner\ProcessRunner`

Basically, everything changed!

## 2.0.0

- Renamed `Formativ\Query` to `League\Squery`
- Removed public API for `League\Squery\Runner\Runner::runCommand()`
- Added documentation

## 2.1.0

- Excluded `composer.lock` from the zip archive.
