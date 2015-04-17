
<h1>Input Class</h1>

<p>The Input Class serves two purposes:</p>

<ol>
<li>It pre-processes global input data for security.</li>
<li>It provides some helper functions for fetching input data and pre-processing it.</li>
</ol>

<p class="important"><strong>Note:</strong> This class is initialized automatically by the system so there is no need to do it manually.</p>


<h2>Security Filtering</h2>

<p>The security filtering function is called automatically when a new <a href="../general/controllers.html">controller</a> is invoked.  It does the following:</p>

<ul>
<li>If $config['allow_get_array'] is FALSE(default is TRUE), destroys the global GET array.</li>
<li>Destroys all global variables in the event register_globals is turned on.</li>
<li>Filters the GET/POST/COOKIE array keys, permitting only alpha-numeric (and a few other) characters.</li>
<li>Provides XSS (Cross-site Scripting Hacks) filtering.  This can be enabled globally, or upon request.</li>
<li>Standardizes newline characters to \n(In Windows \r\n)</li>
</ul>


<h2>XSS Filtering</h2>

<p>The Input class has the ability to filter input automatically to prevent cross-site scripting attacks.  If you want the filter to run automatically every time it encounters POST or COOKIE data you can enable it by opening your
<kbd>application/config/config.php</kbd> file and setting this:</p>

<code>$config['global_xss_filtering'] = TRUE;</code>

<p>Please refer to the <a href="security.html">Security class</a> documentation for information on using XSS Filtering in your application.</p>


<h2>Using POST, COOKIE, or SERVER Data</h2>

<p>CodeIgniter comes with three helper functions that let you fetch POST, COOKIE or SERVER items.  The main advantage of using the provided
functions rather than fetching an item directly ($_POST['something']) is that the functions will check to see if the item is set and
return false (boolean) if not.  This lets you conveniently use data without having to test whether an item exists first.
In other words, normally you might do something like this:</p>

<code>
if ( ! isset($_POST['something']))<br />
{<br />
&nbsp;&nbsp;&nbsp;&nbsp;$something = FALSE;<br />
}<br />
else<br />
{<br />
&nbsp;&nbsp;&nbsp;&nbsp;$something = $_POST['something'];<br />
}</code>

<p>With CodeIgniter's built in functions you can simply do this:</p>

<code>$something = $this->input->post('something');</code>

<p>The three functions are:</p>

<ul>
<li>$this->input->post()</li>
<li>$this->input->cookie()</li>
<li>$this->input->server()</li>
</ul>

<h2>$this->input->post()</h2>

<p>The first parameter will contain the name of the POST item you are looking for:</p>

<code>$this->input->post('some_data');</code>

<p>The function returns FALSE (boolean) if the item you are attempting to retrieve does not exist.</p>

<p>The second optional parameter lets you run the data through the XSS filter.  It's enabled by setting the second parameter to boolean TRUE;</p>

<code>$this->input->post('some_data', TRUE);</code>

<p>To return an array of all POST items call without any parameters.</p>
<p>To return all POST items and pass them through the XSS filter set the first parameter NULL while setting the second parameter to boolean;</p>
<p>The function returns FALSE (boolean) if there are no items in the POST.</p>

<code>
	$this->input->post(NULL, TRUE); // returns all POST items with XSS filter
	<br />
	$this->input->post(); // returns all POST items without XSS filter
</code>

<h2>$this->input->get()</h2>

<p>This function is identical to the post function, only it fetches get data:</p>

<code>$this->input->get('some_data', TRUE);</code>

<p>To return an array of all GET items call without any parameters.</p>
<p>To return all GET items and pass them through the XSS filter set the first parameter NULL while setting the second parameter to boolean;</p>
<p>The function returns FALSE (boolean) if there are no items in the GET.</p>

<code>
	$this->input->get(NULL, TRUE); // returns all GET items with XSS filter
	<br />
	$this->input->get(); // returns all GET items without XSS filtering
</code>

<h2>$this->input->get_post()</h2>

<p>This function will search through both the post and get streams for data, looking first in post, and then in get:</p>

<code>$this->input->get_post('some_data', TRUE);</code>

<h2>$this->input->cookie()</h2>

<p>This function is identical to the post function, only it fetches cookie data:</p>

<code>$this->input->cookie('some_data', TRUE);</code>

<h2>$this->input->server()</h2>

<p>This function is identical to the above functions, only it fetches server data:</p>

<code>$this->input->server('some_data');</code>


<h2>$this->input->set_cookie()</h2>

<p>Sets a cookie containing the values you specify.  There are two ways to pass information to this function so that a cookie can be set:
Array Method, and Discrete Parameters:</p>

<h4>Array Method</h4>

<p>Using this method, an associative array is passed to the first parameter:</p>

<code>$cookie = array(<br />
&nbsp;&nbsp;&nbsp;&nbsp;'name'&nbsp;&nbsp;&nbsp;=> 'The Cookie Name',<br />
&nbsp;&nbsp;&nbsp;&nbsp;'value'&nbsp;&nbsp;=> 'The Value',<br />
&nbsp;&nbsp;&nbsp;&nbsp;'expire' => '86500',<br />
&nbsp;&nbsp;&nbsp;&nbsp;'domain' => '.some-domain.com',<br />
&nbsp;&nbsp;&nbsp;&nbsp;'path'&nbsp;&nbsp;&nbsp;=> '/',<br />
&nbsp;&nbsp;&nbsp;&nbsp;'prefix' => 'myprefix_',<br />
&nbsp;&nbsp;&nbsp;&nbsp;'secure' => TRUE<br />
);<br />
<br />
$this->input->set_cookie($cookie);
</code>

<p><strong>Notes:</strong></p>

<p>Only the name and value are required. To delete a cookie set it with the expiration blank.</p>

<p>The expiration is set in <strong>seconds</strong>, which will be added to the current time.  Do not include the time, but rather only the
number of seconds from <em>now</em> that you wish the cookie to be valid.  If the expiration is set to
zero the cookie will only last as long as the browser is open.</p>
<p>For site-wide cookies regardless of how your site is requested, add your URL to the <strong>domain</strong> starting with a period, like this:  .your-domain.com</p>
<p>The path is usually not needed since the function sets a root path.</p>
<p>The prefix is only needed if you need to avoid name collisions with other identically named cookies for your server.</p>
<p>The secure boolean is only needed if you want to make it a secure cookie by setting it to TRUE.</p>

<h4>Discrete Parameters</h4>

<p>If you prefer, you can set the cookie by passing data using individual parameters:</p>

<code>$this->input->set_cookie($name, $value, $expire, $domain, $path, $prefix, $secure);</code>

<h2>$this->input->cookie()</h2>

<p>Lets you fetch a cookie.  The first parameter will contain the name of the cookie you are looking for (including any prefixes):</p>

<code>cookie('some_cookie');</code>

<p>The function returns FALSE (boolean) if the item you are attempting to retrieve does not exist.</p>

<p>The second optional parameter lets you run the data through the XSS filter.  It's enabled by setting the second parameter to boolean TRUE;</p>

<p><code>cookie('some_cookie', TRUE);</code></p>


<h2>$this->input->ip_address()</h2>
<p>Returns the IP address for the current user.  If the IP address is not valid, the function will return an IP of: 0.0.0.0</p>
<code>echo $this->input->ip_address();</code>


<h2>$this->input->valid_ip(<var>$ip</var>)</h2>

<p>Takes an IP address as input and returns TRUE or FALSE (boolean) if it is valid or not.  Note:  The $this->input->ip_address() function above
validates the IP automatically.</p>

<code>if ( ! $this-&gt;input-&gt;valid_ip($ip))<br />
{<br />
&nbsp;&nbsp;&nbsp;&nbsp; echo 'Not Valid';<br />
}<br />
else<br />
{<br />
&nbsp;&nbsp;&nbsp;&nbsp; echo 'Valid';<br />
}</code>
<p>Accepts an optional second string parameter of "IPv4" or "IPv6" to specify an IP format. The default checks for both formats.</p>

<h2>$this->input->user_agent()</h2>
<p>Returns the user agent (web browser) being used by the current user. Returns FALSE if it's not available.</p>
<code>echo $this->input->user_agent();</code>
<p>See the <a href="user_agent.html">User Agent Class</a> for methods which extract information from the user agent string.</p>

<h2>$this->input->request_headers()</h2>
<p>Useful if running in a non-Apache environment where <a href="http://php.net/apache_request_headers">apache_request_headers()</a> will not be supported.  Returns an array of headers.</p>

<code>$headers = $this->input->request_headers();</code>

<h2>$this->input->get_request_header();</h2>
<p>Returns a single member of the request headers array.</p>

<code>$this->input->get_request_header('some-header', TRUE);</code>


<h2>$this->input->is_ajax_request()</h2>
<p>Checks to see if the <var>HTTP_X_REQUESTED_WITH</var> server header has been set, and returns a boolean response.</p>


<h2>$this->input->is_cli_request()</h2>
<p>Checks to see if the <var>STDIN</var> constant is set, which is a failsafe way to see if PHP is being run on the command line.</p>

<code>$this->input->is_cli_request()</code>
