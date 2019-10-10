<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Website Title
|--------------------------------------------------------------------------
|
| Write the name of your website this will appear by default.
|
*/
$config['ProjectName'] = '%PROJECTNAME%';

/*
|--------------------------------------------------------------------------
| Timezone
|--------------------------------------------------------------------------
|
| http://php.net/manual/en/timezones.php
|
*/
$config['timezone'] = 'GMT';

/*
|--------------------------------------------------------------------------
| Maintenance Mode
|--------------------------------------------------------------------------
|
| 1 = Enable
| 0 = Disable
|
*/
$config['maintenance_mode'] = '0';

/*
|--------------------------------------------------------------------------
| Invitation Discord
|--------------------------------------------------------------------------
|
| Write the invitation of your discord channel.
|
*/
$config['discord_inv'] = '%DISCORD_INV%';

/*
|--------------------------------------------------------------------------
| Realmlist
|--------------------------------------------------------------------------
|
| Write the realmlist used on your server to publish it on the website.
|
*/
$config['realmlist'] = '%REALMLIST%';

/*
|--------------------------------------------------------------------------
| Forum STAFF Color
|--------------------------------------------------------------------------
|
| Enter the code of the color you want for STAFF publications in the forum
| Use the following page to obtain the color code.
| http://htmlcolorcodes.com/
| Default: 00b4ff
|
*/
$config['staff_forum_color'] = '00b4ff';

/*
|--------------------------------------------------------------------------
| Expansion Supported
|--------------------------------------------------------------------------
|
| Select the expansion that your website will use among these options:
|
| 1 = Vanilla
| 2 = The Burning Crusade
| 3 = Wrath of the Lich King
| 4 = Cataclysm
| 5 = Mist of Pandaria
| 6 = Warlords of Draenor
| 7 = Legion
| 8 = Battle for Azeroth
|
*/
$config['expansion_id'] = '%EXPANSION_ID%';

/*
|--------------------------------------------------------------------------
| Theme Name
|--------------------------------------------------------------------------
|
| Write the name of your theme
| The name is the same as the main folder
| The css must also have the same name
| Default: default
*/
$config['theme_name'] = 'default';

/*
|--------------------------------------------------------------------------
| Developer's Toolbar
|--------------------------------------------------------------------------
|
| This option allows you to enable the developer's Toolbar
|
*/
$config['fx_devbar'] = FALSE;

/*
|--------------------------------------------------------------------------
| TinyMCE Language
|--------------------------------------------------------------------------
|
| Select the language that your website will use in text editor:
|
| ""    = English (default)
| fr_FR = French (France)
| de    = German
| hu_HU = Hungarian (Hungary)
| ru    = Russian
| es    = Spanish
| th_TH = Thai (Thailand)
|
*/
$config['tinymce_language'] = '';

/*
|--------------------------------------------------------------------------
| Wowhead Tooltip
|--------------------------------------------------------------------------
|
| Select the language that your website will use in Wowhead tooltip:
| More information in https://wowhead.com/tooltips#related-advanced-usage
|
| ""    = English (default)
| fr    = French
| de    = German
| ru    = Russian
| es    = Spanish
|
*/
$config['wowhead_tooltip'] = '';

/*
| Social Links
*/
$config['social_facebook'] = "";
$config['social_twitter'] = "";
$config['social_youtube'] = "";
