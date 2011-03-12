<?php
/*
Plugin Name: CSL Exporter
Plugin URI: http://wordpress.org/extend/plugins/csl-exporter/
Description: Extracts all links from a post or page and creates a bibliography using the citation style language.
Author: Martin Fenner
Author URI: http://blogs.plos.org/mfenner
Version: 1.0
Stable tag: 1.0

GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

// Add admin menu --
if (is_admin()) {
  add_action('admin_menu', 'csl_fields_menu');
	add_action('admin_init', 'csl_fields_register');
	//add_filter( 'user_contactmethods', 'update_contactmethods' );
}

// Add whitelist options --
function csl_fields_register() {
	register_setting('csl_fields_optiongroup', 'csl_title');
	register_setting('csl_fields_optiongroup', 'csl_bibtex');
}

// Admin menu page details --
function csl_fields_menu() {
	add_options_page('CSL Exporter', 'CSL Exporter', 8, 'csl_fields', 'csl_fields_options');
}

// Add actual menu page --
function csl_fields_options() { ?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32" ><br/></div>
		<h2>CSL Exporter Options</h2>
		
		<form method="post" action="options.php">
		<?php settings_fields('csl_fields_optiongroup'); ?>
				
		<table class="form-table">
			<tr valign="top">
				<td>
				  <p>Bibliography title</p>
				</td>
				<td>
				  <input type='text' name='csl_title' value='<?php echo get_option('csl_title'); ?>'>
				</td>
			</tr>
			<tr valign="top">
			  <td>
			    <p>ALso create BibTeX file</p>
			  </td>
				<td>
					<p><input type="checkbox" name="csl_bibtex" value="1" <?php echo (get_option('csl_bibtex')) ? 'checked="checked"' : ''; ?> id="csl_bibtex" /> Automatically create BibTex file with bibliography</p>
				</td>
			</tr>
		</table>
								
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php _e('Save changes','csloptions'); ?>" />
		</p>
		</form>
	</div>
  <?php 
}

?>