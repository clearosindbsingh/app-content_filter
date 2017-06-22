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
}
