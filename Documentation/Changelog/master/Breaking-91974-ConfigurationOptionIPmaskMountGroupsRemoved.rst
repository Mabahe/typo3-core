.. include:: ../../Includes.txt

=================================================================
Breaking: #91974 - Configuration Option IPmaskMountGroups removed
=================================================================

See :issue:`91974`

Description
===========

The global configuration option `$GLOBALS['TYPO3_CONF_VARS']['FE']['IPmaskMountGroups'] has been removed. It allowed to automatically assign
groups to users visiting the TYPO3 Frontend from specific IP addresses / networks.

This is especially handy to show content only in Intranet/Extranet
sites where internal members see restricted content automatically.

However, showing content based on certain contexts, are usually solved with a much more flexible way through third-party extensions
such as EXT:contexts. Third-party extensions allow even for automatic login based on IP-addresses, which should be used instead.


Impact
======

The mentioned option is automatically removed from LocalConfiguration.php
on upgrade, and never evaluated anymore.


Affected Installations
======================

Installations having the global configuration setting set in
:php:`typo3conf/LocalConfiguration.php` or :php:`typo3conf/AdditionalConfiguration.php`, mostly related to intranet / extranet websites.


Migration
=========

If this functionality explicitly is required, it can be overcome
with a third-party extension, or a custom extension registering
a AuthenticationService ("getGroupsFE") to assign the groups
on a more specific approach.

.. index:: LocalConfiguration, FullyScanned, ext:frontend