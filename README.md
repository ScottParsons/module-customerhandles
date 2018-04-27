# Magento 2 - Customer Handles Module

## Overview

A Magento 2 module that adds customer_logged_in and customer_logged_out layout handles.

## Requirements

Magento Open Source (CE) Version 2.1.x, 2.2.x

## Installation

Include the package.

```bash
$ composer require sussexdev/module-customerhandles
```

Enable the module.

```bash
$ php bin/magento module:enable SussexDev_CustomerHandles
$ php bin/magento setup:upgrade
$ php bin/magento cache:clean
```

## Usage

Modify the module's ```view/frontend/layout/customer_logged_in.xml``` and ```view/frontend/layout/customer_logged_out.xml``` layout files to include logged in and logged out specific layout updates.
