Yii2 Formgenerator
=======================

Library to dynamically generate forms in database.

[![Latest Stable Version](https://poser.pugx.org/roaresearch/yii2-formgenerator/v/stable)](https://packagist.org/packages/roaresearch/yii2-formgenerator)
[![Total Downloads](https://poser.pugx.org/roaresearch/yii2-formgenerator/downloads)](https://packagist.org/packages/roaresearch/yii2-formgenerator)
[![Code Coverage](https://scrutinizer-ci.com/g/roaresearch/yii2-formgenerator/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/roaresearch/yii2-formgenerator/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/roaresearch/yii2-formgenerator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/roaresearch/yii2-formgenerator/?branch=master)

Scrutinizer [![Build Status Scrutinizer](https://scrutinizer-ci.com/g/roaresearch/yii2-formgenerator/badges/build.png?b=master&style=flat)](https://scrutinizer-ci.com/g/roaresearch/yii2-formgenerator/build-status/master)
Travis [![Build Status Travis](https://travis-ci.org/roaresearch/yii2-formgenerator.svg?branch=master&style=flat?style=for-the-badge)](https://travis-ci.org/roaresearch/yii2-formgenerator)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

- Install PHP 7.1 or higher
- [Composer Installed](https://getcomposer.org/doc/00-intro.md)

The rest of the requirements are checked by composer when installing the
repository on the next step.

### Installation
----------------

You can use composer to install the library `roaresearch/yii2-formgenerator` by running
the command;

`composer require roaresearch/yii2-formgenerator`

or edit the `composer.json` file

```json
require: {
    "roaresearch/yii2-formgenerator": "*",
}
```

### Deployment

Then run the required migrations

`php yii migrate/up -p=@roaresearch/formgenerator/migrations/tables`

Which will install the following table structure

![Database Diagram](diagram.png)


#### ROA Backend Usage
-----------------

The ROA support is very simple and can be done by just adding a module version
to the api container which will be used to hold the resources.

```php
class Api extends \roaresearch\yii2\roa\modules\ApiContainer
{
   $versions = [
       // other versions
       'fg1' => ['class' => 'roaresearch\yii2\formgenerator\roa\modules\Version'],
   ];
}
```

You can then access the module to check the available resources.

- data-type
- field
- field/<field_id:\d+>/rule
- field/<field_id:\d+>/rule/<rule_id:\d+>/property
- form
- form/<form_id:\d+>/section
- form/<form_id:\d+>/section/<section_id:\d+>/field
- form/<form_id:\d+>/solicitude
- form/<form_id:\d+>/solicitude/<solicitude_id:\d+>/value

Which will implement CRUD functionalities for a formgenerator.

Alternatively you can add the resource routes to your existing version.

## Running the tests

This library contains tools to set up a testing environment using composer scripts, for more information see [Testing Environment](https://github.com/roaresearch/yii2-formgenerator/blob/master/CONTRIBUTING.md) section.

### Break down into end to end tests

Once testing environment is setup, run the following commands.

```
composer deploy-tests
```

Run tests.

```
composer run-tests
```

Run tests with coverage.

```
composer run-coverage
```

## Live Demo

You can run a live demo on a freshly installed project to help you run testing
or understand the responses returned by the server. The live demo is initialized
with the command.

```
php -S localhost:8000 -t tests/_app
```

Where `:8000` is the port number which can be changed. This allows you call ROA
services on a browser or REST client.

## Use Cases

TO DO

## Built With

* Yii 2: The Fast, Secure and Professional PHP Framework [http://www.yiiframework.com](http://www.yiiframework.com)

## Code of Conduct

Please read [CODE_OF_CONDUCT.md](https://github.com/roaresearch/yii2-formgenerator/blob/master/CODE_OF_CONDUCT.md) for details on our code of conduct.

## Contributing

Please read [CONTRIBUTING.md](https://github.com/roaresearch/yii2-formgenerator/blob/master/CONTRIBUTING.md) for details on the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/ROAResearch/yii2-formgenerator/tags).

_Considering [SemVer](http://semver.org/) for versioning rules 9, 10 and 11 talk about pre-releases, they will not be used within the ROAResearch._

## Authors

* [**Angel Guevara**](https://github.com/Faryshta) - Initial work
* [**Carlos Llamosas**](https://github.com/neverabe) - Initial work

See also the list of [contributors](https://github.com/ROAResearch/yii2-formgenerator/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
