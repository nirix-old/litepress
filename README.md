Setup
------

Setup is quite easy, simply place the files into the directory
you want to run LitePress from, then rename the `db.new.php`
and `env.new.php` in the `system/config` directory to `db.php`
and `env.php`, then in the `system/config/production` directory
rename the `db.new.php` file to `db.php` then open it and enter
your database details.

**Note:** For the next part, you will need PHP available to the
command line, either in your PATH or by using the full path to
the executable.

Then from the command line, in the directory with the `oil` file
run `php oil r setup` and follow the instructions.


Requirements
------------

For LitePress to work, you will need the following:

- PHP 5.3+
- MySQL 5.0+
- Apache + mod rewrite
- or NGiNX with a correctly configured FCGI pass-through.

Copyright & Credits
-------------------

LitePress is (C) 2011 Nirix (Jack P.) <nrx@nirix.net>

**Credits**

- FuelPHP team
- jQuery
- Creators of the textile class, see `system/packages/formatting/classTextile.php`