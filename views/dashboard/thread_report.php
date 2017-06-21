<?php

/**
 * Thread Report view.
 *
 * @category   apps
 * @package    base
 * @subpackage views
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2011 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/base/
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
// Load dependencies
///////////////////////////////////////////////////////////////////////////////

$this->lang->load('content_filter');

///////////////////////////////////////////////////////////////////////////////
// Form
///////////////////////////////////////////////////////////////////////////////

echo form_header(lang('content_filter_thread_report'));

echo field_input('maxchildren', $maxchildren, lang('content_filter_max_children'),array('readonly' => 'readonly'));

echo field_input('currentprocess', $currentprocess, lang('content_filter_current_process'),array('readonly' => 'readonly'));

echo form_footer();


// Script below used to display action selected (shutdown or reboot)
echo "<script type='text/javascript'>\n";
echo "  $(document).ready(function() {";
echo "    setInterval(function(){";
echo "    })";
echo "  });";
echo "</script>\n";

