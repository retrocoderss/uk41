<h1>Collapsible set</h1>

		<p>An accordion is created in jQuery Mobile by grouping a series of individual collapsibles into set.</p>

		<h2>Markup</h2>

		<p>Collapsible sets start with the same markup as <a href="../collapsible/index.html" data-ajax="false">individual collapsibles</a> which have a heading followed by the collapsible content. By adding a parent wrapper with a <code>data-role="collapsibleset"</code> attribute to the collapsibles they will be visually grouped and they will behave like an accordion so only one section can be open at a time.</p>

			<div data-demo-html="true">
				<div data-role="collapsibleset" data-theme="a" data-content-theme="a">
					<div data-role="collapsible">
						<h3>Section 1</h3>
					<p>I'm the collapsible content for section 1</p>
					</div>
					<div data-role="collapsible">
						<h3>Section 2</h3>
					<p>I'm the collapsible content for section 2</p>

					</div>
					<div data-role="collapsible">
						<h3>Section 3</h3>
					<p>I'm the collapsible content for section 3</p>
					</div>
				</div>
			</div><!--/demo-html -->

		<h2>Inset vs. full width</h2>

		<p>For full width collapsibles without corner styling add the <code>data-inset="false"</code> attribute to the set. This makes the collapsible set look more like an expandable <a href="../listview/index.html">listview</a>.</p>

			<div data-demo-html="true">
				<div data-role="collapsibleset" data-inset="false">
					<div data-role="collapsible">
						<h3>Animals</h3>
						<ul data-role="listview" data-inset="false">
							<li>Cats</li>
							<li>Dogs</li>
							<li>Lizards</li>
							<li>Snakes</li>
						</ul>
					</div>
					<div data-role="collapsible">
						<h3>Cars</h3>
						<ul data-role="listview" data-inset="false">
							<li>Acura</li>
							<li>Audi</li>
							<li>BMW</li>
							<li>Cadillac</li>
						</ul>
					</div>
					<div data-role="collapsible">
						<h3>Planets</h3>
						<ul data-role="listview" data-inset="false">
							<li>Earth</li>
							<li>Jupiter</li>
							<li>Mars</li>
							<li>Mercury</li>
						</ul>
					</div>
				</div>
			</div><!--/demo-html -->

		<h2>Mini</h2>

		<p>For a more compact version that is useful in tight spaces, add the <code>data-mini="true"</code> attribute to the set. </p>

			<div data-demo-html="true">
				<div data-role="collapsibleset" data-theme="a" data-content-theme="a" data-mini="true">
					<div data-role="collapsible">
						<h3>I'm a mini collapsible</h3>
					<p>This is good for tight spaces.</p>
					</div>
					<div data-role="collapsible">
						<h3>I'm another mini</h3>
					<p>Here's some collapsible content.</p>

					</div>
					<div data-role="collapsible">
						<h3>Last one</h3>
					<p>Final bit of collapsible content.</p>
					</div>
				</div>
			</div><!--/demo-html -->

		<h2>Icons</h2>

		<p>The default icons of collapsible headings can be overridden by using the <code>data-collapsed-icon</code> and <code>data-expanded-icon</code> attributes, either at the <code>collapsibleset</code> level or on any of its collapsibles individually.</p>

			<div data-demo-html="true">
				<div data-role="collapsibleset" data-theme="a" data-content-theme="a" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
					<div data-role="collapsible">
						<h3>Icon set on the set</h3>
					<p>Specify the open and close icons on the set to apply it to all the collapsibles within.</p>
					</div>
					<div data-role="collapsible">
						<h3>Icon set on the set</h3>
					<p>This collapsible also gets the icon from the set.</p>
					</div>
					<div data-role="collapsible" data-collapsed-icon="gear" data-expanded-icon="delete">
						<h3>Icon set on this collapsible</h3>
					<p>The icons here are applied to this collapsible specifically, thus overriding the set icons.</p>
					</div>
				</div>
			</div><!--/demo-html -->

		<h2>Icon position</h2>

		<p>The default icon positioning of collapsible headings can be overridden by using the <code>data-iconpos</code> attribute, either at the <code>collapsibleset</code> level or on any of its collapsibles individually.</p>

			<div data-demo-html="true">
				<div data-role="collapsibleset" data-theme="a" data-content-theme="a" data-iconpos="right">
					<div data-role="collapsible">
						<h3>Right</h3>
					<p>Inherits icon positioning from <code>data-iconpos="right"</code> attribute on set.</p>
					</div>
					<div data-role="collapsible" data-iconpos="left">
						<h3>Left</h3>
					<p>Set via <code>data-iconpos="left"</code> attribute on the collapsible</p>
					</div>
					<div data-role="collapsible" data-iconpos="bottom">
						<h3>Bottom</h3>
					<p>Set via <code>data-iconpos="bottom"</code> attribute on the collapsible</p>
					</div>
					<div data-role="collapsible" data-iconpos="top">
						<h3>Top</h3>
					<p>Set via <code>data-iconpos="top"</code> attribute on the collapsible</p>
					</div>
				</div>
			</div><!--/demo-html -->

		<h2>Corners</h2>
		<p>Add the <code>data-corners="false"</code> attribute to get an inset collapsible set without rounded corners.</p>

			<div data-demo-html="true">
				<div data-role="collapsibleset" data-corners="false" data-theme="a" data-content-theme="a">
					<div data-role="collapsible">
						<h3>Section 1</h3>
					<p>Collapsible content</p>
					</div>
					<div data-role="collapsible">
						<h3>Section 2</h3>
					<p>Collapsible content</p>

					</div>
					<div data-role="collapsible">
						<h3>Section 3</h3>
					<p>Collapsible content</p>
					</div>
				</div>
			</div><!--/demo-html -->

		<h2>Theme</h2>

		<p>Add a <code>data-theme</code> attribute to the set to set the color of each collapsible header in a set. Add the <code>data-content-theme</code> attribute to specify the color of the collapsible content. </p>

			<div data-demo-html="true">
				<div data-role="collapsibleset" data-theme="b" data-content-theme="b">
					<div data-role="collapsible">
						<h3>Heading</h3>
						<p>Content</p>
					</div>
					<div data-role="collapsible">
						<h3>Heading</h3>
						<p>Content</p>
					</div>
				</div>
			</div><!--/demo-html -->

		<p>To have individual sections in a group styled differently, add <code>data-theme</code> and <code>data-content-theme</code> attributes to specific collapsibles.</p>

			<div data-demo-html="true">
				<div data-role="collapsibleset" data-theme="b" data-content-theme="b">
					<div data-role="collapsible">
						<h3>Heading</h3>
						<p>Content</p>
					</div>
					<div data-role="collapsible" data-theme="a" data-content-theme="a">
						<h3>Heading</h3>
						<p>Content</p>
					</div>
					<div data-role="collapsible">
						<h3>Heading</h3>
						<p>Content</p>
					</div>
				</div>
		</div><!--/demo-html -->