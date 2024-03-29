<h1>FTP Class</h1>

<p>CodeIgniter's FTP Class permits files to be transfered to a remote server. Remote files can also be moved, renamed,
and deleted.  The FTP class also includes a "mirroring" function that permits an entire local directory to be recreated remotely via FTP.</p>

<p class="important"><strong>Note:</strong>&nbsp; SFTP and SSL FTP protocols are not supported, only standard FTP.</p>

<h2>Initializing the Class</h2>

<p>Like most other classes in CodeIgniter, the FTP class is initialized in your controller using the <dfn>$this->load->library</dfn> function:</p>

<code>$this->load->library('ftp');</code>
<p>Once loaded, the FTP object will be available using: <dfn>$this->ftp</dfn></p>


<h2>Usage Examples</h2>

<p>In this example a connection is opened to the FTP server, and a local file is read and uploaded in ASCII mode. The
file permissions are set to 755.</p>

<code>
$this->load->library('ftp');<br />
<br />
$config['hostname'] = 'ftp.example.com';<br />
$config['username'] = 'your-username';<br />
$config['password'] = 'your-password';<br />
$config['debug']	= TRUE;<br />
<br />
$this->ftp->connect($config);<br />
<br />
$this->ftp->upload('/local/path/to/myfile.html', '/public_html/myfile.html', 'ascii', 0775);<br />
<br />
$this->ftp->close();

</code>


<p>In this example a list of files is retrieved from the server.</p>

<code>
$this->load->library('ftp');<br />
<br />
$config['hostname'] = 'ftp.example.com';<br />
$config['username'] = 'your-username';<br />
$config['password'] = 'your-password';<br />
$config['debug']	= TRUE;<br />
<br />
$this->ftp->connect($config);<br />
<br />
$list = $this->ftp->list_files('/public_html/');<br />
<br />
print_r($list);<br />
<br />
$this->ftp->close();
</code>

<p>In this example a local directory is mirrored on the server.</p>


<code>
$this->load->library('ftp');<br />
<br />
$config['hostname'] = 'ftp.example.com';<br />
$config['username'] = 'your-username';<br />
$config['password'] = 'your-password';<br />
$config['debug']	= TRUE;<br />
<br />
$this->ftp->connect($config);<br />
<br />
$this->ftp->mirror('/path/to/myfolder/', '/public_html/myfolder/');<br />
<br />
$this->ftp->close();
</code>


<h1>Function Reference</h1>

<h2>$this->ftp->connect()</h2>

<p>Connects and logs into to the FTP server. Connection preferences are set by passing an array
to the function, or you can store them in a config file.</p>


<p>Here is an example showing how you set preferences manually:</p>

<code>
$this->load->library('ftp');<br />
<br />
$config['hostname'] = 'ftp.example.com';<br />
$config['username'] = 'your-username';<br />
$config['password'] = 'your-password';<br />
$config['port']&nbsp;&nbsp;&nbsp;&nbsp; = 21;<br />
$config['passive']&nbsp;&nbsp;= FALSE;<br />
$config['debug']&nbsp;&nbsp;&nbsp;&nbsp;= TRUE;<br />
<br />
$this->ftp->connect($config);<br />
</code>

<h3>Setting FTP Preferences in a Config File</h3>

<p>If you prefer you can store your FTP preferences in a config file.
Simply create a new file called the <var>ftp.php</var>,  add the <var>$config</var>
array in that file. Then save the file at <var>config/ftp.php</var> and it will be used automatically.</p>

<h3>Available connection options:</h3>


<ul>
<li><strong>hostname</strong> - the FTP hostname.  Usually something like:&nbsp; <dfn>ftp.example.com</dfn></li>
<li><strong>username</strong> - the FTP username.</li>
<li><strong>password</strong> - the FTP password.</li>
<li><strong>port</strong> - The port number. Set to <dfn>21</dfn> by default.</li>
<li><strong>debug</strong> - <kbd>TRUE/FALSE</kbd> (boolean). Whether to enable debugging to display error messages.</li>
<li><strong>passive</strong> - <kbd>TRUE/FALSE</kbd> (boolean). Whether to use passive mode.  Passive is set automatically by default.</li>
</ul>



<h2>$this->ftp->upload()</h2>

<p>Uploads a file to your server.  You must supply the local path and the remote path, and you can optionally set the mode and permissions.
Example:</p>


<code>$this->ftp->upload('/local/path/to/myfile.html', '/public_html/myfile.html', 'ascii', 0775);</code>

<p><strong>Mode options are:</strong>&nbsp; <kbd>ascii</kbd>, <kbd>binary</kbd>, and <kbd>auto</kbd> (the default). If
<kbd>auto</kbd> is used it will base the mode on the file extension of the source file.</p>

<p>Permissions can be passed as an <kbd>octal</kbd> value in the fourth parameter.</p>

<h2>$this->ftp->download()</h2>

<p>Downloads a file from your server.  You must supply the remote path and the local path, and you can optionally set the mode.
Example:</p>

<code>$this->ftp->download('/public_html/myfile.html', '/local/path/to/myfile.html', 'ascii');</code>

<p><strong>Mode options are:</strong>&nbsp; <kbd>ascii</kbd>, <kbd>binary</kbd>, and <kbd>auto</kbd> (the default). If
<kbd>auto</kbd> is used it will base the mode on the file extension of the source file.</p>

<p>Returns FALSE if the download does not execute successfully (including if PHP does not have permission to write the local file)</p>


<h2>$this->ftp->rename()</h2>
<p>Permits you to rename a file.  Supply the source file name/path and the new file name/path.</p>

<code>
// Renames green.html to blue.html<br />
$this->ftp->rename('/public_html/foo/green.html', '/public_html/foo/blue.html');
</code>

<h2>$this->ftp->move()</h2>
<p>Lets you move a file.  Supply the source and destination paths:</p>

<code>
// Moves blog.html from "joe" to "fred"<br />
$this->ftp->move('/public_html/joe/blog.html', '/public_html/fred/blog.html');
</code>

<p>Note: if the destination file name is different the file will be renamed.</p>


<h2>$this->ftp->delete_file()</h2>
<p>Lets you delete a file.  Supply the source path with the file name.</p>

<code>
$this->ftp->delete_file('/public_html/joe/blog.html');
</code>


<h2>$this->ftp->delete_dir()</h2>
<p>Lets you delete a directory and everything it contains.  Supply the source path to the directory with a trailing slash.</p>

<p class="important"><strong>Important</strong>&nbsp; Be VERY careful with this function.  It will recursively delete
<b>everything</b> within the supplied path, including sub-folders and all files.  Make absolutely sure your path is correct.
Try using the <kbd>list_files()</kbd> function first to verify that your path is correct.</p>

<code>
$this->ftp->delete_dir('/public_html/path/to/folder/');
</code>



<h2>$this->ftp->list_files()</h2>
<p>Permits you to retrieve a list of files on your server returned as an <dfn>array</dfn>.  You must supply
the path to the desired directory.</p>

<code>
$list = $this->ftp->list_files('/public_html/');<br />
<br />
print_r($list);
</code>


<h2>$this->ftp->mirror()</h2>

<p>Recursively reads a local folder and everything it contains (including sub-folders) and creates a
mirror via FTP based on it.  Whatever the directory structure of the original file path will be recreated on the server.
You must supply a source path and a destination path:</p>

<code>
$this->ftp->mirror('/path/to/myfolder/', '/public_html/myfolder/');
</code>



<h2>$this->ftp->mkdir()</h2>

<p>Lets you create a directory on your server.  Supply the path ending in the folder name you wish to create, with a trailing slash.
Permissions can be set by passed an <kbd>octal</kbd> value in the second parameter.</p>

<code>
// Creates a folder named "bar"<br />
$this->ftp->mkdir('/public_html/foo/bar/', DIR_WRITE_MODE);
</code>


<h2>$this->ftp->chmod()</h2>

<p>Permits you to set file permissions.  Supply the path to the file or folder you wish to alter permissions on:</p>

<code>
// Chmod "bar" to 777<br />
$this->ftp->chmod('/public_html/foo/bar/', DIR_WRITE_MODE);
</code>




<h2>$this->ftp->close();</h2>
<p>Closes the connection to your server.  It's recommended that you use this when you are finished uploading.</p>



