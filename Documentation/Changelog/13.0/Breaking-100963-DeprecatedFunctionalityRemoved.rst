.. include:: /Includes.rst.txt

.. _breaking-100963-1686129084:

====================================================
Breaking: #100963 - Deprecated functionality removed
====================================================

See :issue:`100963`

Description
===========

The following PHP classes that have previously been marked as deprecated for v12 and were now removed:

- :php:`\Full\Class\Name`

The following PHP classes have been declared :php:`final`:

- :php:`\Full\Class\Name`

The following PHP interfaces that have previously been marked as deprecated for v12 and were now removed:

- :php:`\Full\Class\Name`

The following PHP interfaces changed:

- :php:`\Full\Class\Name`

The following PHP class aliases that have previously been marked as deprecated for v12 and were now removed:

* :php:`\Full\Class\Name`

The following PHP class methods that have previously been marked as deprecated for v12 and were now removed:

- :php:`\Full\Class\Name->methodName`

The following PHP static class methods that have previously been marked as deprecated for v12 and were now removed:

- :php:`\Full\Class\Name::methodName`

The following methods changed signature according to previous deprecations in v12 at the end of the argument list:

- :php:`\Full\Class\Name->methodName` (argument 42 is now an integer)

The following public class properties have been dropped:

- :php:`\Full\Class\Name->propertyName`

The following class methods visibility have been changed to protected:

- :php:`\Full\Class\Name->methodName`

The following class methods visibility have been changed to private:

- :php:`\Full\Class\Name->methodName`

The following class properties visibility have been changed to protected:

- :php:`\Full\Class\Name->propertyName`

The following class properties visibility have been changed to private:

- :php:`\Full\Class\Name->propertyName`

The following ViewHelpers have been changed or removed:

- :html:`<f:helper.name>` Argument "foo" dropped

The following TypoScript options have been dropped or adapted:

- `typo.script.option`

The following constants have been dropped:

- :php:`CONSTANT_NAME`

The following class constants have been dropped:

- :php:`\Full\Class\Name::CONSTANT_NAME`

The following global option handling have been dropped and are ignored:

- :php:`$GLOBALS['TYPO3_CONF_VARS']['KEY']['subKey']`

The following global variables have been removed:

- :php:`$GLOBALS['KEY']`

The following hooks have been removed:

- :php:`$GLOBALS['TYPO3_CONF_VARS']['KEY']['subKey']`

The following single field configurations have been removed from TCA:

- :php:`dummy` (for TCA type :php:`dummy`)

The following single field configurations have been removed from :php:`$GLOBALS['TYPO3_USER_SETTINGS']`:

- :php:`dummy`

The following signals have been removed:

- :php:`\Full\Class\Name::signalName`

The following features are now always enabled:

- `the.feature.name`

The following features have been removed:

- A feature like a removed upgrade wizard

The following database tables have been removed:

- :sql:`table`

The following database tabel fields have been removed:

- :sql:`table.field`

The following Backend route identifiers have been removed:

- `routeIdentifier`

The following global JavaScript variables have been removed:

- :js:`Global_JavaScript_Variable_Name`

The following global JavaScript functions have been removed:

- :js:`Global_JavaScript_Function_Name`

The following JavaScript modules have been removed:

- :js:`module.name`

The following RequireJS module names have been removed:

- :js:`Dummy`

The following module configuration have been removed:

- :php:`dummy`

The following command line options have been removed:

- :bash:`a:command --option`

Impact
======

Using above removed functionality will most likely raise PHP fatal level errors,
may change website output or crashes browser JavaScript.

.. index:: Backend, CLI, Database, FlexForm, Fluid, Frontend, JavaScript, LocalConfiguration, PHP-API, RTE, TCA, TSConfig, TypoScript, PartiallyScanned
