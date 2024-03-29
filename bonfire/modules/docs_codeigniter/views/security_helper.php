
<h1>Security Helper</h1>

<p>The Security Helper file contains security related functions.</p>


<h2>Loading this Helper</h2>

<p>This helper is loaded using the following code:</p>
<code>$this->load->helper('security');</code>

<p>The following functions are available:</p>


<h2>xss_clean()</h2>

<p>Provides Cross Site Script Hack filtering.  This function is an alias to the one in the
<a href="../libraries/input.html">Input class</a>.  More info can be found there.</p>


<h2>sanitize_filename()</h2>

<p>Provides protection against directory traversal.  This function is an alias to the one in the
<a href="../libraries/security.html">Security class</a>.  More info can be found there.</p>


<h2>do_hash()</h2>

<p>Permits you to create SHA1 or MD5 one way hashes suitable for encrypting passwords.  Will create SHA1 by default. Examples:</p>

<code>
$str = do_hash($str); // SHA1<br />
<br />
$str = do_hash($str, 'md5'); // MD5
</code>

<p class="important"><strong>Note:</strong>  This function was formerly named <kbd>dohash()</kbd>, which has been deprecated in favour of <kbd>do_hash()</kbd>.</p>



<h2>strip_image_tags()</h2>

<p>This is a security function that will strip image tags from a string.  It leaves the image URL as plain text.</p>

<code>$string = strip_image_tags($string);</code>


<h2>encode_php_tags()</h2>

<p>This is a security function that converts PHP tags to entities. Note: If you use the XSS filtering function it does this automatically.</p>

<code>$string = encode_php_tags($string);</code>






