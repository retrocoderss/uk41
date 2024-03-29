
<h1>CodeIgniter at a Glance</h1>


<h2>CodeIgniter is an Application Framework</h2>

<p>CodeIgniter is a toolkit for people who build web applications using PHP.  Its goal is to enable you to develop projects much faster than you could if you were writing code
from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and
logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by
minimizing the amount of code needed for a given task.</p>

<h2>CodeIgniter is Free</h2>
<p>CodeIgniter is licensed under an Apache/BSD-style open source license so you can use it however you please.
For more information please read the <a href="../license.html">license agreement</a>.</p>

<h2>CodeIgniter is Light Weight</h2>
<p>Truly light weight.  The core system requires only a few very small libraries. This is in stark contrast to many frameworks that require significantly more resources.
Additional libraries are loaded dynamically upon request, based on your needs for a given process, so the base system
is very lean and quite fast.
</p>

<h2>CodeIgniter is Fast</h2>
<p>Really fast. We challenge you to find a framework that has better performance than CodeIgniter.</p>


<h2>CodeIgniter Uses M-V-C</h2>
<p>CodeIgniter uses the Model-View-Controller approach, which allows great separation between logic and presentation.
This is particularly good for projects in which designers are working with your template files, as the code these file contain will be minimized. We describe MVC in more detail on its own page.</p>

<h2>CodeIgniter Generates Clean URLs</h2>
<p>The URLs generated by CodeIgniter are clean and search-engine friendly.  Rather than using the standard "query string"
approach to URLs that is synonymous with dynamic systems, CodeIgniter uses a segment-based approach:</p>

<code>example.com/<var>news</var>/<dfn>article</dfn>/<samp>345</samp></code>

<p>Note: By default the index.php file is included in the URL but it can be removed using a simple .htaccess file.</p>

<h2>CodeIgniter Packs a Punch</h2>
<p>CodeIgniter comes with  full-range of libraries that enable the most commonly needed web development tasks,
like accessing a database, sending email, validating form data, maintaining sessions, manipulating images, working with XML-RPC data and
much more.</p>

<h2>CodeIgniter is Extensible</h2>
<p>The system can be easily extended through the use of your own libraries, helpers, or through class extensions or system hooks.</p>


<h2>CodeIgniter Does Not Require a Template Engine</h2>
<p>Although CodeIgniter <em>does</em> come with a simple template parser that can be optionally used, it does not force you to use one.

Template engines simply can not match the performance of native PHP, and the syntax that must be learned to use a template
engine is usually only marginally easier than learning the basics of PHP.  Consider this block of PHP code:</p>

<code>&lt;ul><br />
<br />
&lt;?php foreach ($addressbook as $name):?><br />
<br />
&lt;li>&lt;?=$name?>&lt;/li><br />
<br />
&lt;?php endforeach; ?><br />
<br />
&lt;/ul></code>

<p>Contrast this with the pseudo-code used by a template engine:</p>

<code>&lt;ul><br />
<br />
{foreach from=$addressbook item="name"}<br />
<br />
&lt;li>{$name}&lt;/li><br />
<br />
{/foreach}<br />
<br />
&lt;/ul></code>

<p>Yes, the template engine example is a bit cleaner, but it comes at the price of performance, as the pseudo-code must be converted
back into PHP to run. Since one of our goals is <em>maximum performance</em>, we opted to not require the use of a template engine.</p>


<h2>CodeIgniter is Thoroughly Documented</h2>
<p>Programmers love to code and hate to write documentation.  We're no different, of course, but
since documentation is <strong>as important</strong> as the code itself,
we are committed to doing it. Our source code is extremely clean and well commented as well.</p>


<h2>CodeIgniter has a Friendly Community of Users</h2>

<p>Our growing community of users can be seen actively participating in our <a href="http://codeigniter.com/forums/">Community Forums</a>.</p>
