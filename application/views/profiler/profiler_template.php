
<div id="codeigniter_profiler" style="clear:both;background-color:#fff;padding:10px;">

<?php if ($fields_displayed > 0): ?>
	<fieldset id="ci_profiler_benchmarks" style="border:1px solid #900;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
	<legend style="color:#900;">
		&nbsp;&nbsp;<?php echo $this->CI->lang->line('profiler_benchmarks'); ?>&nbsp;&nbsp;
	</legend>

	<table style="width:100%;">
	<?php	foreach ($data['benchmarks']['profile'] as $key => $val): ?>
		<?php $key = ucwords(str_replace(array('_', '-'), ' ', $key)) ?>
		<tr>
			<td style="padding:5px;width:50%;color:#000;font-weight:bold;background-color:#ddd;">
				<?php echo $key; ?>&nbsp;&nbsp;
			</td>
			<td style="padding:5px;width:50%;color:#900;font-weight:normal;background-color:#ddd;">
				<?php echo $val; ?>
			</td>
		</tr>
	<?php	endforeach ?>
	</table>
	</fieldset>

	<fieldset id="ci_profiler_get" style="border:1px solid #cd6e00;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
	<legend style="color:#cd6e00;">
		&nbsp;&nbsp;<?php echo $this->CI->lang->line('profiler_get_data'); ?>&nbsp;&nbsp;
	</legend>
	<?php if (count($_GET) === 0): ?> 
	<div style="color:#cd6e00;font-weight:normal;padding:4px 0 4px 0;">
		<?php echo $this->CI->lang->line('profiler_no_get'); ?>
	</div>
	<?php else: ?>
		<?php foreach ($_GET as $key => $val): ?>
		<tr>
			<td style="width:50%;color:#000;background-color:#ddd;padding:5px;">
				&#36;_GET['<?php echo $key; ?>']&nbsp;&nbsp; 
			</td>
			<td style="width:50%;padding:5px;color:#cd6e00;font-weight:normal;background-color:#ddd;">
			<?php if (is_array($val) OR is_object($val)): ?>
				<pre><?php echo htmlspecialchars(stripslashes(print_r($val, TRUE))); ?></pre>
			<?php else: ?>
				<?php echo htmlspecialchars(stripslashes($val)); ?>
			<?php endif ?>
			</td>
		</tr>
		<?php endforeach ?>
	<?php endif ?>
	</fieldset>

	<fieldset id="ci_profiler_memory_usage" style="border:1px solid #5a0099;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
	<legend style="color:#5a0099;">
		&nbsp;&nbsp;<?php echo $this->CI->lang->line('profiler_memory_usage'); ?>&nbsp;&nbsp;
	</legend>
	<div style="color:#5a0099;font-weight:normal;padding:4px 0 4px 0;">
	<?php if ($data['memory_usage']['usage'] > 0): ?>
		<?php echo $data['memory_usage']['usage']; ?>
	<?php else: ?>
		<?php echo $this->CI->lang->line('profiler_no_memory'); ?>
	<?php endif ?>
	</div>
	</fieldset>

	<fieldset id="ci_profiler_post" style="border:1px solid #009900;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
	<legend style="color:#009900;">
		&nbsp;&nbsp;<?php echo $this->CI->lang->line('profiler_post_data'); ?>&nbsp;&nbsp;
	</legend>
	<?php if (count($_POST) === 0 && count($_FILES) === 0): ?> 
	<div style="color:#009900;font-weight:normal;padding:4px 0 4px 0;">
		<?php echo $this->CI->lang->line('profiler_no_get'); ?>
	</div>
	<?php else: ?>
		<?php foreach ($_POST as $key => $val): ?>
		<tr>
			<td style="width:50%;padding:5px;color:#000;background-color:#ddd;">
				&#36;_POST['<?php echo $key; ?>']&nbsp;&nbsp; 
			</td>
			<td style="width:50%;padding:5px;color:#009900;font-weight:normal;background-color:#ddd;">
			<?php if (is_array($val) OR is_object($val)): ?>
				<pre><?php echo htmlspecialchars(stripslashes(print_r($val, TRUE))); ?></pre>
			<?php else: ?>
				<?php echo htmlspecialchars(stripslashes($val)); ?>
			<?php endif ?>
			</td>
		</tr>
		<?php endforeach ?>
		<?php foreach ($_FILES as $key => $val): ?>
			<?php is_int($key) OR $key = "'".$key."'"; ?>
		<tr>
			<td style="width:50%;padding:5px;color:#000;background-color:#ddd;">
				&#36;_FILES['<?php echo $key; ?>']&nbsp;&nbsp; 
			</td>
			<td style="width:50%;padding:5px;color:#009900;font-weight:normal;background-color:#ddd;">
			<?php if (is_array($val) OR is_object($val)): ?>
				<pre><?php echo htmlspecialchars(stripslashes(print_r($val, TRUE))); ?></pre>
			<?php endif ?>
			</td>
		</tr>
		<?php endforeach ?>
	<?php endif ?>
	</fieldset>

	<fieldset id="ci_profiler_uri_string" style="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
	<legend style="color:#000;">
		&nbsp;&nbsp;<?php echo $this->CI->lang->line('profiler_uri_string'); ?>&nbsp;&nbsp;
	</legend>
	<div style="color:#000;font-weight:normal;padding:4px 0 4px 0;">
	<?php if ($this->CI->uri->uri_string === ''): ?>
		<?php echo $this->CI->lang->line('profiler_no_uri'); ?>
	<?php else: ?>
		<?php echo $this->CI->uri->uri_string; ?>
	<?php endif ?>
	</div>
	</fieldset>

	<fieldset id="ci_profiler_controller_info" style="border:1px solid #995300;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
	<legend style="color:#995300;">
		&nbsp;&nbsp;<?php echo $this->CI->lang->line('profiler_controller_info'); ?>&nbsp;&nbsp;
	</legend>
	<div style="color:#995300;font-weight:normal;padding:4px 0 4px 0;">
		<?php echo $this->CI->router->class.'/'.$this->CI->router->method; ?>
	</div>
	</fieldset>

	<?php if (count($dbs) === 0): ?>
	<fieldset id="ci_profiler_queries" style="border:1px solid #0000FF;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
	<legend style="color:#0000FF;">
		&nbsp;&nbsp;<?php echo $this->CI->lang->line('profiler_queries'); ?>&nbsp;&nbsp;
	</legend>
	<table style="border:none; width:100%;">
	<tr>
		<td style="width:100%;color:#0000FF;font-weight:normal;background-color:#eee;padding:5px;">
			<?php echo $this->CI->lang->line('profiler_no_db'); ?>
		</td>
	</tr>
	</table>
	</fieldset>
	<?php else: ?>
		<?php foreach ($dbs as $name => $db): ?>
			
		<?php endforeach ?>

	<?php endif ?>

	<fieldset id="ci_profiler_http_headers" style="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
	<legend style="color:#000;">&nbsp;&nbsp;HTTP HEADERS&nbsp;&nbsp;(<span style="cursor: pointer;" onclick="var s=document.getElementById('ci_profiler_httpheaders_table').style;s.display=s.display=='none'?'':'none';this.innerHTML=this.innerHTML=='Show'?'Hide':'Show';">Show</span>)</legend>


	<table style="width:100%;display:none;" id="ci_profiler_httpheaders_table">
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_ACCEPT&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_USER_AGENT&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_CONNECTION&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">keep-alive</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">SERVER_PORT&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">80</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">SERVER_NAME&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">localhost</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">REMOTE_ADDR&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">::1</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">SERVER_SOFTWARE&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">Apache/2.4.16 (Unix) PHP/5.5.29</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_ACCEPT_LANGUAGE&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">ja,en-US;q=0.8,en;q=0.6</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">SCRIPT_NAME&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">/CodeIgniter/index.php</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">REQUEST_METHOD&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">GET</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;"> HTTP_HOST&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">REMOTE_HOST&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">CONTENT_TYPE&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">SERVER_PROTOCOL&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">HTTP/1.1</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">QUERY_STRING&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_ACCEPT_ENCODING&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">gzip, deflate, sdch</td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_X_FORWARDED_FOR&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_DNT&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;"></td></tr>
	</table>
	</fieldset>

	<fieldset id="ci_profiler_config" style="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
	<legend style="color:#000;">&nbsp;&nbsp;CONFIG VARIABLES&nbsp;&nbsp;(<span style="cursor: pointer;" onclick="var s=document.getElementById('ci_profiler_config_table').style;s.display=s.display=='none'?'':'none';this.innerHTML=this.innerHTML=='Show'?'Hide':'Show';">Show</span>)</legend>


	<table style="width:100%;display:none;" id="ci_profiler_config_table">
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">base_url&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">http://[::1]/CodeIgniter/</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">index_page&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">index.php</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">uri_protocol&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">REQUEST_URI</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">url_suffix&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">language&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">english</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">charset&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">UTF-8</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">enable_hooks&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">subclass_prefix&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">MY_</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">composer_autoload&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">permitted_uri_chars&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">a-z 0-9~%.:_\-</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">allow_get_array&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">1</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">enable_query_strings&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">controller_trigger&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">c</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">function_trigger&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">m</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">directory_trigger&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">d</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">log_threshold&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">0</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">log_path&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">log_file_extension&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">log_file_permissions&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">420</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">log_date_format&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">Y-m-d H:i:s</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">error_views_path&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cache_path&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cache_query_string&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">encryption_key&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_driver&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">files</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_cookie_name&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">ci_session</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_expiration&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">7200</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_save_path&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_match_ip&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_time_to_update&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">300</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_regenerate_destroy&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cookie_prefix&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cookie_domain&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cookie_path&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">/</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cookie_secure&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cookie_httponly&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">standardize_newlines&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">global_xss_filtering&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_protection&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_token_name&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">csrf_test_name</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_cookie_name&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">csrf_cookie_name</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_expire&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">7200</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_regenerate&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">1</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_exclude_uris&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">Array
	(
	)
	</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">compress_output&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">time_reference&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">local</td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">rewrite_short_tags&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">proxy_ips&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
	</table>
	</fieldset></div>

<?php else: ?>
	<p style="border:1px solid #5a0099;padding:10px;margin:20px 0;background-color:#eee;">
		<?php echo $this->CI->lang->line('profiler_no_profiles'); ?>
	</p>
<?php endif ?>

