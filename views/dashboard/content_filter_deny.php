<?php

/**
 * Content Filer Deny view.
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

echo form_header(lang('content_filter_deny_report'));
echo '<table class="table"><tbody style="max-height:200px; overflow:scroll;" class="body_content_filter_deny"></tbody></table>';
echo form_footer();


// Script below used to get realtime data of Threads via AJAX
echo "<script type='text/javascript'>\n";
echo "  $(document).ready(function() {\n";
echo "  refresh_content_filter_deny_data();\n";
echo "    setInterval(function(){\n";
echo "    	refresh_content_filter_deny_data();\n";
echo "    },5000);\n";
echo "  });\n";
echo "  function refresh_content_filter_deny_data(){\n";
echo "    	$.getJSON('/app/content_filter/content_filter_dashboard/refresh_content_filter_deny_data',function(data){\n";
echo "    		if(data.logs){\n";
echo "    			$('.body_content_filter_deny').html(''); \n";
echo "				var is_col_md_12 = $('.body_content_filter_deny').closest('.db-widget').hasClass('col-md-12'); \n";
echo "				var is_col_md_6 = $('.body_content_filter_deny').closest('.db-widget').hasClass('col-md-6'); \n";
echo "				var is_col_md_4 = $('.body_content_filter_deny').closest('.db-widget').hasClass('col-md-4'); \n";
echo "    			$(data.logs).each(function(k,val){ \n";
echo "					if(is_col_md_12) \n";
echo "    					var html = '<tr><td>'+val.ip_address+'</td><td>'+val.group+'</td><td>'+val.group+'</td><td width=\"50%\"><a href=\"'+val.website_url+'\" style=\"overflow:hidden !important;text-overflow: ellipsis;white-space: nowrap;width:400px;display:inline-block;\">'+val.website_url+'</td></tr>'; \n";
echo "					else if(is_col_md_6) \n";
echo "    					var html = '<tr><td>'+val.ip_address+'</td><td>'+val.group+'</td><td>'+val.group+'</td></tr>'; \n";
echo "					else \n";
echo "    					var html = '<tr><td>'+val.ip_address+'</td><td>'+val.group+'</td></tr>'; \n";
echo "    				$('.body_content_filter_deny').append(html); \n";
echo "    			});\n";
echo "    		}\n";
echo "    		if(data.message){\n";
echo "    			var html = '<tr><td class=\"dataTables_empty\" colspan=\"3\">No Log Record !</td></tr>'; \n";
echo "    			$('.body_content_filter_deny').html(data.message); \n";
echo "    		}\n";
echo "    	});\n";
echo "  }\n";
echo "</script>\n";
echo "<style>\n";
echo "	#ci_content_filter-content_filter_dashboard-content_filter_deny{ \n";
echo "		max-height:300px; overflow-x:hidden;\n";
echo "	}\n";
echo "</style>\n";

