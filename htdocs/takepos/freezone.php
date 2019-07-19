<?php
/* Copyright (C) 2018	Andreu Bisquerra	<jove@bisquerra.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 *	\file       htdocs/takepos/floors.php
 *	\ingroup    takepos
 *	\brief      Popup to enter a free line
 */

//if (! defined('NOREQUIREUSER'))	define('NOREQUIREUSER','1');	// Not disabled cause need to load personalized language
//if (! defined('NOREQUIREDB'))		define('NOREQUIREDB','1');		// Not disabled cause need to load personalized language
//if (! defined('NOREQUIRESOC'))		define('NOREQUIRESOC','1');
//if (! defined('NOREQUIRETRAN'))		define('NOREQUIRETRAN','1');
if (! defined('NOCSRFCHECK'))		define('NOCSRFCHECK', '1');
if (! defined('NOTOKENRENEWAL'))	define('NOTOKENRENEWAL', '1');
if (! defined('NOREQUIREMENU'))		define('NOREQUIREMENU', '1');
if (! defined('NOREQUIREHTML'))		define('NOREQUIREHTML', '1');
if (! defined('NOREQUIREAJAX'))		define('NOREQUIREAJAX', '1');

require '../main.inc.php';	// Load $user and permissions

$langs->loadLangs(array("bills", "cashdesk"));

$place = (GETPOST('place', 'int') > 0 ? GETPOST('place', 'int') : 0);   // $place is id of table for Ba or Restaurant
$posnb = (GETPOST('posnb', 'int') > 0 ? GETPOST('posnb', 'int') : 0);   // $posnb is id of POS

$idline = GETPOST('idline', 'int');
$action = GETPOST('action', 'alpha');


/*
 * View
 */

top_htmlhead($head, $title, $disablejs, $disablehead, $arrayofjs, $arrayofcss);

?>
<script>
function Save(){
	$.get( "invoice.php", { action: "<?php echo $action;?>", place: "<?php echo $place;?>", desc:$('#desc').val(), number:$('#number').val()} );
	parent.$.colorbox.close();
}

$( document ).ready(function() {
    $('#desc').focus()
});
</script>
</head>
<body>
<br>
<center>
<input type="text" id="desc" name="desc" style="width:40%;font-size: 200%;" placeholder="<?php echo $langs->trans('Description');?>">
<?php
if ($action=="freezone") echo '<input type="text" id="number" name="number" style="width:15%;font-size: 200%;" placeholder="'.$langs->trans('Price').'">';
if ($action=="addnote") echo '<input type="hidden" id="number" name="number" value="'.$idline.'">';
?>
<input type="hidden" name="place" value="<?php echo $place;?>">
<input type="button" class="button" style="width:15%; font-size: 200%;" value="OK" onclick="Save();">
</center>

</body>
</html>