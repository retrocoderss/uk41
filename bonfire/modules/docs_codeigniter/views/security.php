
<h1>Security</h1>

<p>This page describes some "best practices" regarding web security, and details
CodeIgniter's internal security features.</p>


<h2>URI Security</h2>

<p>CodeIgniter is fairly restrictive regarding which characters it allows in your URI strings in order to help
minimize the possibility that malicious data can be passed to your application.  URIs may only contain the following:
</p>

<ul>
<li>Alpha-numeric text</li>
<li>Tilde: ~ </li>
<li>Period: .</li>
<li>Colon: :</li>
<li>Underscore: _</li>
<li>Dash: -</li>
</ul>

<h2>Register_globals</h2>

<p>During system initialization all global variables are unset, except those found in the $_GET, $_POST, and $_COOKIE arrays. The unsetting
routine is effectively the same as register_globals = off.</p>

<a name="error_reporting"></a>
<h2>error_reporting</h2>

<p>
    In production environments, it is typically desirable to disable PHP's
    error reporting by setting the internal error_reporting flag to a value of 0. This disables native PHP
    errors from being rendered as output, which may potentially contain
    sensitive information.
</p>

<p>
    Setting CodeIgniter's <kbd>ENVIRONMENT</kbd> constant in index.php to a
    value of '<kbd>production</kbd>' will turn off these errors. In development
    mode, it is recommended that a value of '<kbd>development</kbd>' is used.
    More information about differentiating between environments can be found
    on the <a href="environments.html">Handling Environments</a> page.
</p>

<h2>magic_quotes_runtime</h2>

<p>The magic_quotes_runtime directive is turned off during system initialization so that you don't have to remove slashes when
retrieving data from your database.</p>

<h1>Best Practices</h1>

<p>Before accepting any data into your application, whether it be POST data from a form submission, COOKIE data, URI data,
XML-RPC data, or even data from the SERVER array, you are encouraged to practice this three step approach:</p>

<ol>
<li>Filter the data as if it were tainted.</li>
<li>Validate the data to ensure it conforms to the correct  type, length, size, etc. (sometimes this step can replace step one)</li>
<li>Escape the data before submitting it into your database.</li>
</ol>

<p>CodeIgniter provides the following functions to assist in this process:</p>

<ul>

<li><h2>XSS Filtering</h2>

<p>CodeIgniter comes with a Cross Site Scripting filter.  This filter looks for commonly
used techniques to embed malicious Javascript into your data, or other types of code that attempt to hijack cookies
or do other malicious things. The XSS Filter is described <a href="../libraries/security.html">here</a>.
</p>
</li>

<li><h2>Validate the data</h2>

<p>CodeIgniter has a <a href="../libraries/form_validation.html">Form Validation Class</a> that assists you in validating, filtering, and prepping
your data.</p>
</li>

<li><h2>Escape all data before database insertion</h2>

<p>Never insert information into your database without escaping it. Please see the section that discusses
<a href="../database/queries.html">queries</a> for more information.</p>

</li>

</ul>


