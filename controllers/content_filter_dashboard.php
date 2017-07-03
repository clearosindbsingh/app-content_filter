<?php
/**
 * Content filter dashboard controller.
 *
 * @category   apps
 * @package    content-filter
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2011 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/content_filter/
 */

///////////////////////////////////////////////////////////////////////////////
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * Content filter controller.
 *
 * @category   apps
 * @package    content-filter
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2011 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/content_filter/
 */

class Content_Filter_Dashboard extends ClearOS_Controller
{
    /**
     * Content_Filter Thread Report view.
     *
     * @return view
     */
    function thread_report()
    {
	$this->lang->load('content_filter');
	$this->load->library('content_filter/DansGuardian');
	$data['maxchildren'] = $this->dansguardian->get_maxchildren();
	$data['currentprocess'] = $this->dansguardian->get_current_process_count();
        $this->page->view_form('content_filter/dashboard/thread_report', $data);
    }
	/**
	* Content_Filter Thread Report AJAX.
	*
	* @return JSON
	*/
	function refresh_thread_data()
	{
		$this->lang->load('content_filter');
		$this->load->library('content_filter/DansGuardian');		
		$data['maxchildren'] = $this->dansguardian->get_maxchildren();
		$data['currentprocess'] = $this->dansguardian->get_current_process_count();
		$data['success'] = true;
		echo json_encode($data); die;
	}
	/**
	* Content_Filter Content Filter Deny View page.
	*
	* @return view
	*/
	function content_filter_deny()
	{
		$this->lang->load('content_filter');
		$this->load->library('content_filter/DansGuardian');		
		$this->page->view_form('content_filter/dashboard/content_filter_deny', $data);
	}
	/**
	* Content_Filter Refresh Deny Data via AJAX.
	*
	* @return JSON
	*/
	function refresh_content_filter_deny_data()
	{
		$logs = array();
		$message = '';
		$this->lang->load('content_filter');
		$this->load->library('content_filter/DansGuardian');		
		$reports = $this->dansguardian->get_tail_report();
		foreach($reports as $key => $value)
		{
			preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $value, $ip_matches);
			preg_match('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $value, $url_match);
			$banned_explode_1 = explode("*DENIED*",$value);
			$banned_explode_2 = explode(":",$banned_explode_1[1]);
			$logs[$key]['group'] = trim($banned_explode_2[0]);
			$logs[$key]['ip_address'] = $ip_matches[0];
			$logs[$key]['website_url'] = $url_match[0];
			if($key > 10)
				break;
		}
		if(!$reports)
		{
			$message = lang('content_filter_deny_report_no_log');
		}
		$data['success'] = true;
		$data['logs'] = $logs;
		$data['message'] = $message;
		echo json_encode($data); die;
	}
}
