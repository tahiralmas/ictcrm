<?php
/**
 * Advanced OpenReports, SugarCRM Reporting.
 * @package Advanced OpenReports for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */

function getCampaignList($focus, $field, $value, $view)
{
  global $current_user;
  static $campaignList = null;
//  $camp_list[] = 'Select Campaign';
  $result = $current_user->ict_broadcast_api('Campaign_List_Mode', array('status'=>''));
  if($result[0] == true) {
    $campaignList = json_decode(json_encode($result[1]), true);
    foreach ($campaignList as $campaign_list) {
      $camp_list[$campaign_list['campaign_id']] = $campaign_list['name'];
    }
  }
  return $camp_list;
}

